<?php 

/**
* 
*/
class Keranjang extends Frontend_Controller
{
	
	function index()
	{
		/*menghitung data order dari database*/
		$order_count 							= $this->order_model->count(array('order_no' => $this->data['cart_session']));
		$this->data['content']		= 'pages/transaction/cart';
		$array_where							= array();
		$i 												= 1;

		/*cek jumlah data*/
		if ($order_count > 0) {
			$array_where['{PRE}image.image_seq'] = '0';

			/*cek session cart*/
			if ($this->data['cart_session'] != NULL) {
				$array_where['{PRE}order.order_no'] = $this->data['cart_session'];
			}

			/*mendapatkan data order dari database*/
			$this->data['order']			= $this->order_model->get_order($array_where);

			/*mendapatkan total_sub dari weight, price dan qty menggunakan fungsi total_sub dalam cart_helper*/
			$sub = total_sub($this->data['order'], 'order');

			$this->data['total_sub'] 	= $sub['total_price'];
		}

		$this->load->view('index', $this->data);
	}

	public function buy()
	{
		/*cek get['cd']*/
		if (!empty($_GET['cd'])) {

			/*dekripsi get['cd'] menjadi id produk*/
			$product_id 	= $this->encrypt->decode(hash_link_decode($_GET['cd']));
			$count_product= $this->product_model->count(array('product_id' => $product_id));

			/*cek jika produk tersedia*/
			if ($count_product > 0) {
				$get_product 	= $this->product_model->get($product_id);

				/*cek session cart*/
				if (empty($this->session->userdata('cart'))) {

					/*aktifkan nomor acak untuk session cart*/
					$rand_1 			= rand(10, 199);
					$rand_2				= rand(200, 999);
					$order_no			= $rand_1 * $rand_2;

					$array_session['cart'] 					= $order_no;

					/*buat session cart bernilai nomor acak*/
					$this->session->set_userdata($array_session);
					$array_data['order_no']					= $order_no;
				} 

				else {
					$array_data['order_no']			= $this->data['cart_session'];
				}

				/*jika beli dari halaman detail dan input qty*/
				$array_data['order_qty'] = (isset($_POST['qty'])) ? $_POST['qty'] : '1' ;

				/*tampung data produk yang di klik 'beli' sebagai array untuk diinsert ke database*/
				$array_data['product_id'] 		= $product_id;
				$array_data['order_price']		= $get_product->product_price;
				$array_data['order_subtotal']	= $get_product->product_price * $array_data['order_qty'];
				$array_data['order_weight']		= $get_product->product_weight * $array_data['order_qty'];

				$this->order_model->insert($array_data);

				/*mengembalikan ke halama yang sebelumnya*/
				$redirect = ($this->agent->is_referral()) ? site_url(): $this->agent->referrer() ;
				redirect($redirect);
			}

			else {
				redirect(site_url());
			}
		}

		else {
			redirect(site_url());
		}
	}

	public function update()
	{
		$post = $this->input->post(NULL, TRUE);

		if (isset($_POST['update'])) {
			$count_qty  		= count($_POST['qty']);

			for ($i=0; $i < $count_qty; $i++) { 
				$get_order = $this->order_model->get_by(
					array(
						'order_no' => $this->data['cart_session'],
						'product_id' => $this->encrypt->decode(hash_link_decode($_POST['id'][$i]))
						),
					NULL,
					NULL,
					TRUE
					);

				$subtotal = $_POST['qty'][$i] * $get_order->order_price;

				$array_data['order_subtotal'] = $subtotal;
				$array_data['order_qty'] = $_POST['qty'][$i];

				$this->order_model->update($array_data, array(
					'order_no' => $this->data['cart_session'], 
					'product_id' => $this->encrypt->decode(hash_link_decode($_POST['id'][$i]))
					)
				);
			}

			redirect(site_url('keranjang-belanja'));
		}
	}

	public function cancel($id)
	{
		if (!empty($id)) {
			$product_id = $this->encrypt->decode(hash_link_decode($id));

			$this->order_model->delete_by(
				array(
					'order_no' => $this->data['cart_session'], 
					'product_id' => $product_id
					)
				);
			
			redirect(site_url('keranjang-belanja'));
		}

		else {
			redirect(site_url('keranjang-belanja'));
		}
	}

	public function checkout()
	{
		if (!empty($this->data['cart_session'])) {
			$order_count = $this->order_model->count(array('order_no' => $this->data['cart_session']));
			
			if ($order_count > 0) {				
				$this->data['content']		= 'pages/transaction/checkout';
				$this->data['member']			= $this->member_model->get($this->encrypt->decode(hash_link_decode($this->session->userdata('member_session'))));
			
				$this->load->view('index', $this->data);
			}

			else {
				redirect(site_url('keranjang-belanja'));
			}
		}

		else {
			redirect(site_url('keranjang-belanja'));
		}
	}

	public function shipment()
	{
		if (!empty($this->data['cart_session'])) {
			$order_count = $this->order_model->count(array('order_no' => $this->data['cart_session']));
			
			if ($order_count > 0) {
				/*tujuan pengiriman berdasarkan select kecamatan*/
				$destination_code = explode(':', $this->input->post('district'));
				$array_where['{PRE}image.image_seq'] = '0';

				if ($this->data['cart_session'] != NULL) {
					$array_where['{PRE}order.order_no'] = $this->data['cart_session'];
				}
				$order = $this->order_model->get_order($array_where);
				$sub = total_sub($order, 'order');
				
				$this->data['content'] 		= 'pages/transaction/shipment';
				/*mementukan service yang ditampilkan dalam pilihan paket pengiriman. cek MY_Controller*/
				$this->data['service'] 		= $this->service;
				$this->data['total_sub']	= $sub['total_price'];
				
				/*custom library untuk menampilkan hasil dari ongkos kirim*/
				/*parameter ke 1, code kota / kecamatan awal pengiriman. tergantung dari type setelahnya. cek MY_Controller*/
				/*parameter ke 2, type tempat awal pengiriman bernilai subdisrtict, atau city. cek MY_Controller*/
				/*parameter ke 3, code tujuan pengiriman kota atau kabupaten. tergantung dari type setelahnya*/
				/*parameter ke 4, type tempat tujuan pengiriman bernilai subdisrtict, atau city. cek MY_Controller*/
				/*parameter ke 5, total beban /  berat dalam gram*/
				/*parameter ke 6, ekspedisi / kurir yang disediakan. cek MY_Controller*/
				$this->data['cost']	= $this->lawave_shipment->cost(
					$this->origin_code, 
					$this->origin_type, 
					$destination_code[0], 
					$this->destination_type, 
					$sub['total_weight'], 
					$this->courier
					);

				$this->load->view('index', $this->data);
			}

			else {
				redirect(site_url('keranjang-belanja'));
			}
		}

		else {
			redirect(site_url('keranjang-belanja'));
		}
	}

	/*BELUM DIGUNAKAN !!*/
	public function ajax_shipment()
	{
		$i 						= 1;
		$output 			= '<option disabled selected>Pilih Paket Pengiriman</option>';
		$dest					= $this->input->post('dataID');
		$array_where['{PRE}image.image_seq'] = '0';
		$array_where['{PRE}order.order_no'] = $this->data['cart_session'];

		$this->data['order']			= $this->order_model->get_order($array_where);

		foreach ($this->data['order'] as $value) {
			$array_weight[$i] = $value->order_weight * $value->order_qty;
			$i++;
		}

		$total_weight = array_sum($array_weight);
		
		$rajaongkir 	= $this->lawave_shipment->cost(
			$this->origin_code, 
			$this->origin_type, 
			$dest, 
			$this->destination_type, 
			$total_weight, 
			$this->courier
			);

		echo '<option disabled selected>Pilih Paket Pengiriman</option>';
		foreach ($rajaongkir['rajaongkir']['results'] as $res) {
			echo "<optgroup label='".strtoupper($res['code'])."'>";
				foreach ($res['costs'] as $cont) {
					foreach ($cont['cost'] as $value) {

						if (empty($this->service)) {
							echo "<option value=".$res['code'].":".$cont['service']."'>".$cont['service']." - ".$cont['description']." - ".rupiah($value['value'])."</option>";
						}

						else{

							if (array_search($cont['service'], $this->service )){
								echo "<option value=".$res['code'].":".$cont['service']."'>".$cont['service']." - ".$cont['description']." - ".rupiah($value['value'])."</option>";
							}
						}
					}
				}
			echo "</optgroup>";
		}
	}
}