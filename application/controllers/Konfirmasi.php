<?php

/**
*
*/
class Konfirmasi extends Frontend_Controller
{

	function index()
	{
		if (isset($_GET['order'])) {
			$order_no = $_GET['order'];
			$this->data['count_trans'] = $this->transaction_model->count(array('order_no' => $order_no, 'trans_status_id' => 1));

			if ($this->data['count_trans'] < 1) {
				$this->session->set_flashdata('failed', 'ID Order tidak tersedia.');
				redirect(site_url('konfirmasi-pembayaran'));
			}

			else {
				$this->data['trans'] = $this->transaction_model->get_by(
					array('order_no' => $order_no),
					1,
					NULL,
					TRUE
					);
			}
		}

		if (isset($_POST['confirm'])) {
			$post = $this->input->post(NULL, TRUE);
			$order_no = $post['notrans'];
			$count_trans = $this->transaction_model->count(
				array(
					'order_no' => $order_no,
					'trans_status_id' => 1)
				);

			if ($count_trans < 1) {
				$this->session->set_flashdata('failed', 'ID Order yang dimasukan tidak tersedia.');
				redirect(site_url('konfirmasi-pembayaran'));
			}

			else {
				$get_trans = $this->transaction_model->get_by(
					array(
						'order_no' => $order_no,
						'trans_status_id' => 1
						),
					1,
					NULL,
					TRUE
					);

				$array_data['transaction_id'] = $get_trans->transaction_id;
				$array_data['bank_id'] = $post['rek_tujuan'];
				$array_data['payment_account'] = $post['atas_nama'];
				$array_data['payment_no'] = $post['no_rek'];
				$array_data['payment_bank'] = $post['nama_bank'];
				$array_data['payment_total'] = $post['total_bayar'];
				$array_data['payment_date'] = $post['tgl_bayar'];
				if (!empty($post['catatan'])){
					$catetan = $post['catatan'];
				}
				else{
					$catetan = $get_trans->transaction_note;
				}

				$id_payment = $this->payment_model->insert($array_data);
				$this->transaction_model->update(
					array('trans_status_id' => 2, 'transaction_note' => $catetan),
					array('transaction_id' => $get_trans->transaction_id)
					);

				$this->data['payment'] = $this->payment_model->get_payment(array('{PRE}payment.payment_id' => $id_payment), 1, NULL, TRUE);
				$this->data['transaction'] = $this->transaction_model->get($get_trans->transaction_id);

				/*kirim email ke admin*/
				if ($this->to_admin) {
					$this->data['content'] = 'pages/email/admin_confirm';
					/*mengganti object ke string dengan parameter ke 3 bernilai TRUE*/
					$email = $this->load->view('email', $this->data, TRUE);

					lwd_send_email($this->data['site']->site_email, $this->admin_confirm, $email);
				}

				$this->session->set_flashdata('success', 'Konfirmasi berhasil.');
				redirect(site_url('konfirmasi-pembayaran'));
			}

		}
		$this->data['content'] = 'pages/payment/confirm';
		$this->data['bank'] = $this->bank_model->get();

		$this->load->view('index', $this->data);
	}
}
