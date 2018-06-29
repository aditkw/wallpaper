<?php 

/**
* 
*/
class Transaksi extends Frontend_Controller
{
	
	function order()
	{

		if (!empty($this->data['cart_session'])) {
			$post = $this->input->post(NULL, TRUE);
			/*mengambil data order dari database*/
			$get_order = $this->order_model->get_by(array('order_no' => $this->data['cart_session']));
			/*menghitung data order di database sesuai order_no = cart_session*/
			$order_count = $this->transaction_model->count(array('order_no' => $this->data['cart_session']));
			/*menghitung data transaksi di database sesuai order_no = cart_session*/
			$trans_count = $this->transaction_model->count(array('order_no' => $this->data['cart_session']));
			
			/*mendapatkan id member, jika bukan member, id_member bernilai 0 (nol)*/
			$member_id = (!empty($this->session->userdata('member_session')))
				?
					$this->encrypt->decode(hash_link_decode($this->session->userdata('member_session')))
						:
						 0;

			$sub = total_sub($get_order, 'order');
			/*mendapatkan code kurir dan layanan*/
			$shipping_code = explode(':', $post['shipment']);
			
			$shipcost	= $this->lawave_shipment->cost(
				$this->origin_code, 
				$this->origin_type, 
				$post['kecamatan'], 
				$this->destination_type, 
				$sub['total_weight'], 
				$this->courier
				);

			foreach ($shipcost['rajaongkir']['results'] as $result) {
				if ($result['code'] == $shipping_code[0]) {
					foreach ($result['costs'] as $costs) {
						if ($costs['service'] == $shipping_code[1]) {
							foreach ($costs['cost'] as $value) {
								$trans_data['transaction_shipping'] = $result['name'].' | ('.$costs['service'].') '.$costs['description'] ;
								$trans_data['transaction_shipping_cost'] = $value['value'];
							}
						}
					}
				}
			}

			$transaction_total = $sub['total_price'] + $trans_data['transaction_shipping_cost'];

			/*data yang akan diinputkan ke dalam table transaksi*/
			$trans_data['order_no'] = $this->data['cart_session'];
			$trans_data['member_id'] = $member_id;
			$trans_data['province_id'] = $post['provinsi'];
			$trans_data['city_id'] = $post['kota'];
			$trans_data['district_id'] = $post['kecamatan'];
			$trans_data['province_id'] = $post['provinsi'];
			$trans_data['trans_status_id'] = 1;
			$trans_data['transaction_name'] = $post['nama'];
			$trans_data['transaction_email'] = $post['email'];
			$trans_data['transaction_phone'] = $post['telp'];
			$trans_data['transaction_address'] = $post['alamat'];
			$trans_data['transaction_cost'] = $sub['total_price'];
			$trans_data['transaction_weight'] = $sub['total_weight'];
			$trans_data['transaction_total'] = $transaction_total;
			$trans_data['transaction_note'] = $post['catatan'];

			foreach ($get_order as $order) {
				/*data order yang akan di insert ke tabel transaction_item*/
				$trans_item[] = array(
					'order_no' => $this->data['cart_session'],
					'product_id' => $order->product_id,
					'transaction_item_price' => $order->order_price,
					'transaction_item_qty' => $order->order_qty,
					'transaction_item_subtotal' => $order->order_subtotal,
					'transaction_item_weight' => $order->order_weight
					);

				/*update stock produk*/
				$get_product = $this->product_model->get($order->product_id);
				$new_stock = $get_product->product_stock - $order->order_qty;

				$this->product_model->update(
					array('product_stock' => $new_stock),
					array('product_id' => $order->product_id)
					);
			}

			/*proses input table transaction_item*/
			$this->transaction_item_model->insert($trans_item, TRUE);
			/*proses input table transaction*/
			$id_trans = $this->transaction_model->insert($trans_data);
			/*proses hapus data order*/
			$this->order_model->delete_by(array('order_no' => $this->data['cart_session']));
			/*update nomor invoice transaksi*/
			$transaction_no = $this->data['cart_session'].'/'.$id_trans.'/'.$this->invoice_site.'/'.date('d/m/Y');

			/*update nomor transaksi berdasarkan id_transaksi*/
			$data_update['transaction_no'] = $transaction_no;
			/*proses update*/
			$this->transaction_model->update($data_update, array('transaction_id' => $id_trans));


			/*KIRIM EMAIL NOTIFIKASI*/
			/*$this->data = berupa arary data yang akan dikirim ke page email*/
			$this->data['transaction'] = $this->transaction_model->get_transaction(
				array(
					'{PRE}transaction.transaction_id' => $id_trans
					),
				1,
				NULL,
				TRUE
				);
			$this->data['bank'] = $this->bank_model->get();
			$this->data['item'] = $this->transaction_item_model->get_transaction_item(
				array(
					'{PRE}transaction_item.order_no' => $this->data['cart_session'],
					'{PRE}image.image_seq' => 0
					)
				);

			/*kirim email ke customer*/
			if ($this->to_customer) {
				$this->data['content'] = 'pages/email/customer_order';
				/*mengganti object ke string dengan parameter ke 3 bernilai TRUE*/
				$email = $this->load->view('email', $this->data, TRUE);

				lwd_send_email($post['email'], $this->customer_order, $email);
			}

			/*kirim email ke admin*/
			if ($this->to_admin) {
				$this->data['content'] = 'pages/email/admin_order';
				/*mengganti object ke string dengan parameter ke 3 bernilai TRUE*/
				$email = $this->load->view('email', $this->data, TRUE);

				lwd_send_email($this->data['site']->site_email, $this->admin_order, $email);
			}
			/*hapus session cart*/
			$this->session->unset_userdata(array('cart'));

			redirect(site_url('transaksi/info/'.$trans_data['order_no']));
			/*transaction_no = erakomp/order_no/id_trans/dd/mm/YYYY */
		}

		else {
			redirect(site_url('keranjang-belanja'));
		}
	}

	public function approve($order_no, $id)
	{
		$transaction_id = $this->encrypt->decode(hash_link_decode($id));
		$count_transaction = $this->transaction_model->count(
			array('transaction_id' => $transaction_id)
			);

		if ($count_transaction > 0) {
			$date = date('Y-m-d');

			$array_data['transaction_receive_date'] = $date;
			$array_data['transaction_receive_note'] = $this->input->post('note');
			$array_data['trans_status_id'] = 4;

			$this->transaction_model->update($array_data, array('transaction_id' => $transaction_id));
			redirect(site_url('member-area/transaksi'));
		}
	}

	public function info($order_no)
	{
		if (!empty($order_no)) {
			$count_transaction = $this->transaction_model->count(array('order_no' => $order_no));

			$this->data['status'] = ($count_transaction > 0) ? TRUE : FALSE;

			$this->data['content'] = 'pages/transaction/info';
			$this->data['trans'] = $this->transaction_model->get_transaction(array('{PRE}transaction.order_no' => $order_no), 1, NULL, TRUE);
			$this->data['trans_item'] = $this->transaction_item_model->get_transaction_item(
				array(
					'{PRE}transaction_item.order_no' => $order_no, 
					'{PRE}image.image_seq' => 0)
				);
			$this->data['bank'] = $this->bank_model->get();
			$this->data['order_no'] = $order_no;

			/*3% bunga payment gateway*/
			$addc = (3 * $this->data['trans']->transaction_total) / 100;
			$total_addc = $this->data['trans']->transaction_total + $addc;
			$this->data['addc'] = $addc;
			$this->data['total_addc'] = $total_addc;



			$this->load->view('index', $this->data);
		}

		else {
			redirect(site_url('keranjang-belanja'));
		}
	}

	public function cari()
	{
		if (isset($_POST['notrans'])) {
			$order_no = $_POST['notrans'];
			redirect(site_url('transaksi/info/'.$order_no));
		}

		else {
			redirect(site_url());
		}
	}
}