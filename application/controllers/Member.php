<?php

/**
*
*/
class Member extends Frontend_Controller
{

	public function index()
	{
		/*cek sesion member_access*/
		if ($this->member_access && $this->member_active) {
			$member_id = $this->encrypt->decode(hash_link_decode($this->session->userdata('member_session')));
			$where_transaction = array(
				'trans_status_id' => 1,
				'member_id' => $member_id,
				'transaction_hide' => '88',
				'transaction_cancel' => '88'
				);

			$this->data['content'] 	= 'pages/member/dashboard';
			$this->data['member'] 	= $this->member_model->get($member_id);
			$this->data['transaction']  = $this->transaction_model->get_by($where_transaction);
			$this->data['count_trans'] = $this->transaction_model->count($where_transaction);

			$this->load->view('index', $this->data);
		}

		else {
			redirect(site_url());
		}
	}

	public function profile()
	{
		if ($this->member_access && $this->member_active) {
			$post 	= $this->input->post(NULL, TRUE);
			$rules 	= $this->member_model->rules;
			$member_id = $this->encrypt->decode(hash_link_decode($this->session->userdata('member_session')));
			$this->data['member'] 	= $this->member_model->get($member_id);

			/*PROSES UPDATE DATA MEMBER*/
			if (isset($_POST['update'])) {
				$this->form_validation->set_rules($rules);
				$province = explode(':', $post['prov']);
				$city = explode(':', $post['city']);
				$district = explode(':', $post['district']);
				/*jika password diganti*/
				if (!empty($post['password'])) {
					$this->form_validation->set_rules('password', 'Password Lama', 'required');
					$this->form_validation->set_rules('pass1', 'Password Baru', 'required');
					$this->form_validation->set_rules('pass2', 'Konfirmasi Password', 'matches[pass1]');
				}
				/*tampung data dalam array*/
				$array_data['member_name'] 		= $post['nama'];
				$array_data['member_phone'] 	= $post['telp'];
				$array_data['member_address'] = $post['alamat'];
				$array_data['province_id'] 		= $province[0];
				$array_data['city_id']				= $city[0];
				$array_data['district_id']		= $district[0];

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
					redirect(site_url('member-area/profile'));
				}

				else {
					/*jika password diganti*/
					if (!empty($post['password'])) {
						$password = hash_string($post['password']);
						/*cek password lama*/
						if ($password != $this->data['member']->member_password) {
							alert_js('Password lama salah.','-1');
						}
						/*jika password lama benar*/
						else {
							$array_data['member_password'] 		= hash_string($post['pass2']);

							$this->member_model->update($array_data, array('member_email' => $this->session->userdata('member_email')));

							$this->session->set_flashdata('success', 'Profile berhasil di-update');
							redirect(site_url('member-area/profile'));
						}
					}
					/*jika password tidak diganti*/
					else {
						$this->member_model->update($array_data, array('member_email' => $this->session->userdata('member_email')));

						$this->session->set_flashdata('success', 'Profile berhasil di-update');
						redirect(site_url('member-area/profile'));
					}
				}
			}

			$this->data['content'] 	= 'pages/member/profile';
			$this->load->view('index', $this->data);
		}

		else {
			redirect(site_url('member-login'));
		}
	}

	public function transaksi($order_no = NULL)
	{
		if ($this->member_access && $this->member_active) {
			$member_id = $this->encrypt->decode(hash_link_decode($this->session->userdata('member_session')));

			/*DETAIL TRANSAKSI*/
			/*jika parameter tersedia*/
			if (isset($order_no)) {
				$this->data['content'] 	= 'pages/member/detail';
				$this->data['count_trans'] = $this->transaction_model->count(
					array('order_no' => $order_no)
					);
				$this->data['trans'] = $this->transaction_model->get_transaction(
					array('{PRE}transaction.order_no' => $order_no),
					1,
					NULL,
					TRUE
					);

				$this->data['trans_item'] = $this->transaction_item_model->get_transaction_item(
					array(
						'{PRE}transaction_item.order_no' => $order_no,
						'{PRE}image.image_seq' => 0
						)
					);
				/*mengambil data kecamatan*/
				$get_district = $this->lawave_shipment->subdistrict($this->data['trans']->city_id);

				foreach ($get_district['rajaongkir']['results'] as $subdistrict) {

					if ($subdistrict['subdistrict_id'] == $this->data['trans']->district_id) {
						/*data kecamatan*/
						$this->data['district'] = $subdistrict['subdistrict_name'];
					}
				}
				$this->data['city'] = $this->city_model->get($this->data['trans']->city_id);
				$this->data['province'] = $this->province_model->get($this->data['trans']->province_id);

				$this->load->view('index', $this->data);
			}

			else {

				$this->data['member'] 	= $this->member_model->get($member_id);
				$this->data['content'] 	= 'pages/member/transaction';
				$this->data['transaction']  = $this->transaction_model->get_transaction(
					array(
						'{PRE}transaction.member_id' => $member_id,
						'{PRE}transaction.transaction_hide' => '88'
						)
					);
				$this->data['count_trans'] = $this->transaction_model->count(
					array(
						// 'trans_status_id' => 1,
						'member_id' => $member_id,
						'transaction_hide' => '88'
						)
					);

				$this->load->view('index', $this->data);
			}
		}

		else {
			redirect(site_url('member-login'));
		}
	}

	public function login()
	{
		/*hanya menampilkan halaman*/
		if ($this->member_access && $this->member_active) {
			redirect('member-area');
		}

		else {
			$this->data['content']	= 'pages/member/login';

			$this->load->view('index', $this->data);
		}
	}

	public function registrasi()
	{
		/*hanya menampilkan halaman*/
		if ($this->member_access && $this->member_active) {
			redirect('member-area');
		}

		else {
			$this->data['content']	= 'pages/member/register';

			$this->load->view('index', $this->data);
		}
	}

	public function auth()
	{
		$post = $this->input->post(NULL, TRUE);

		$email 	= $post['email'];
		$pass 	= hash_string($post['password']);

		$member_count = $this->member_model->count(
			array(
				'member_email' => $email
				)
			);

		if ($member_count > 0) {
			$get_member = $this->member_model->get_by(
				array(
					'member_email' => $email
				),
				1,
				NULL,
				TRUE
				);

			if ($get_member->member_password != $pass) {
				alert_js('Password anda salah.', '-1');
			}

			else {

				if ($get_member->member_status == 'unverified') {
					$this->session->set_flashdata('failed', 'Anda belum melakukan verifikasi email.');
					redirect(site_url('member-login'));
				}

				elseif ($get_member->member_block == 'block') {
					$this->session->set_flashdata('failed', 'Akun anda telah diblokir.<br> Silahkan hubungi kontak kami untuk informasi lebih lanjut');
					redirect(site_url('member-login'));
				}

				else {
					$array_sess['member_session'] 	= hash_link_encode($this->encrypt->encode($get_member->member_id));
					$array_sess['member_name']			= $get_member->member_name;
					$array_sess['member_email'] 		= $get_member->member_email;
					$array_sess['is_login_member']	= TRUE;

					$this->session->set_userdata($array_sess);
					$this->session->set_flashdata('success', 'Selamat datang '.$get_member->member_name.'.');
					redirect(site_url('member-login'));
				}
			}
		}

		else {
			alert_js('Anda belum terdaftar.', '-1');
		}
	}

	public function reg()
	{
		$post = $this->input->post(NULL, TRUE);

		$this->form_validation->set_rules('email','Email','required|is_unique[lwd_member.member_email]');
		$this->form_validation->set_rules('pass1','Password','required|min_length[6]');
		$this->form_validation->set_rules('pass2','Re-type Password','matches[pass1]');

		$array_data['member_name'] 		= $post['nama'];
		$array_data['member_email']		= $post['email'];
		$array_data['member_phone']		= $post['telp'];
		$array_data['member_password']= hash_string($post['pass2']);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('registrasi'));
		}

		else {
			$id_member = $this->member_model->insert($array_data);
			$this->data['member'] = $this->member_model->get($id_member);
			$id_encode = hash_link_encode($this->encrypt->encode($id_member));

			/*kirim email ke customer*/
			if ($this->to_customer) {
				$this->data['activation_link'] = site_url('member/activation/'.$id_encode);
				$this->data['content'] = 'pages/email/customer_register';
				/*mengganti object ke string dengan parameter ke 3 bernilai TRUE*/
				$email = $this->load->view('email', $this->data, TRUE);

				lwd_send_email($post['email'], $this->customer_register, $email);
			}

			/*kirim email ke admin*/
			if ($this->to_admin) {
				$this->data['content'] = 'pages/email/admin_register';
				/*mengganti object ke string dengan parameter ke 3 bernilai TRUE*/
				$email = $this->load->view('email', $this->data, TRUE);

				lwd_send_email($this->data['site']->site_email, $this->admin_register, $email);
			}

			$this->session->set_flashdata('success', 'Terima kasih telah bergabung. <br>Silahkan cek email anda untuk melakukan <strong>verifikasi akun</strong>.');
			redirect(site_url('registrasi'));
		}
	}

	public function activation($id = NULL)
	{
		if ($id == NULL) {
			redirect(site_url());
		}

		else {
			$member_id = $this->encrypt->decode(hash_link_decode($id));

			if ($member_id == NULL) {
				redirect(site_url());
				die();
			}
			$count_member = $this->member_model->count(array('member_id' => $member_id));

			if ($count_member > 0) {
				$array_data['member_status'] = 'verified';

				$this->member_model->update($array_data, array('member_id' => $member_id));
				$this->session->set_flashdata('success', 'Verifikasiakun anda berhasil. Silahkan login untuk mengakses halaman member.');
				redirect(site_url('member-login'));
			}

			else {
				redirect(site_url());
			}
		}
	}

	public function reverify()
	{
		$post = $this->input->post(NULL, TRUE);
		$count_member = $this->member_model->count(array('member_email' => $post['email']));

		if ($count_member == NULL) {
			$this->session->set_flashdata('failed', 'Email anda belum terdaftar.<br>Periksa kembali alamat email anda atau silahkan lakukan registrasi.');
			redirect(site_url('member-login'));
			die();
		}

		else {
			$this->data['member'] = $this->member_model->get_by(array('member_email' => $post['email']), 1, NULL, TRUE);

			if ($this->data['member']->member_status == 'verified') {
				$this->session->set_flashdata('failed', 'Akun anda telah aktif. Tidak perlu email verifikasi ulang.');
				redirect(site_url('member-login'));
			}

			else {
				$id_encode = hash_link_encode($this->encrypt->encode($this->data['member']->member_id));
				/*KIRIM EMAIL VERIFIKASI*/
				$this->data['activation_link'] = site_url('member/activation/'.$id_encode);
				$this->data['content'] = 'pages/email/customer_register';
				/*mengganti object ke string dengan parameter ke 3 bernilai TRUE*/
				$email = $this->load->view('email', $this->data, TRUE);

				lwd_send_email($post['email'], $this->customer_register, $email);

				$this->session->set_flashdata('success', 'Email verifikasi telah dikirim. <br>Silahkan cek email anda untuk melakukan <strong>verifikasi akun</strong>.');
				redirect(site_url('member-login'));
			}
		}
	}

	public function forgot()
	{
		$post = $this->input->post(NULL, TRUE);

		$count_member = $this->member_model->count(array('member_email' => $post['email']));

		if ($count_member > 0) {
			$this->data['member'] = $this->member_model->get_by(array('member_email' => $post['email']), 1, NULL, TRUE);

			$id_encode = hash_link_encode($this->encrypt->encode($this->data['member']->member_id));

			$this->data['link'] = site_url('member/reset/'.$this->data['member']->member_password.'/'.$id_encode);
			$link = site_url('member/reset/'.$this->data['member']->member_password.'/'.$id_encode);
			$link = "<a href='$link'>bypass</a>";
			$this->data['content'] = 'pages/email/customer_forgot';
			/*mengganti object ke string dengan parameter ke 3 bernilai TRUE*/
			$email = $this->load->view('email', $this->data, TRUE);

			lwd_send_email($post['email'], $this->customer_forgot, $email);

			$this->session->set_flashdata('success', 'Silahkan cek email untuk mereset password anda. '.$link);
			redirect(site_url('member-login'));
		}

		else {
			$this->session->set_flashdata('failed', 'Email anda tidak terdaftar. <br>Cek kembali alamat email anda atau silahkan registrasi.');
			redirect(site_url('member-login'));
		}
	}

	public function reset($pass = NULL, $id = NULL)
	{
		if ($pass == NULL || $id ==  NULL) {
			redirect(site_url());
		}

		else {
			$member_id = $this->encrypt->decode(hash_link_decode($id));
			$count_member = $this->member_model->count(array('member_id' => $member_id, 'member_password' => $pass));

			if ($count_member > 0) {
				$this->data['content'] = 'pages/member/forgot';
				$this->load->view('index', $this->data);
			}

			else {
				redirect(site_url());
			}
		}
	}

	public function respass($pass, $id)
	{
		$post = $this->input->post(NULL, TRUE);

		$this->form_validation->set_rules('pass1','Password','required|min_length[6]');
		$this->form_validation->set_rules('pass2','Konfirmasi Password','matches[pass1]');

		$array_where['member_id'] = $this->encrypt->decode(hash_link_decode($id));
		$array_where['member_password'] = $pass;

		$array_data['member_password']= hash_string($post['pass2']);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('member/reset/'.$pass.'/'.$id));
		}

		else {
			$this->member_model->update($array_data, $array_where);

			$this->session->set_flashdata('success', 'Password berhasil diganti.<br>Silahkan login untuk masuk ke halaman member.');
			redirect(site_url('member-login'));
		}
	}

	public function logout()
	{
		$array_sess 	= array('member_session', 'member_name', 'member_email', 'is_login_member');
		$unset 				= $this->session->unset_userdata($array_sess);

		if ($unset) {
			$this->session->set_flashdata('success','Anda berhasil <strong>Logout</strong>. <br>Terima kasih.');
			redirect(site_url());
		}

		else {
			$this->session->set_flashdata('failed','Gagal logout. <br>Silahkan coba lagi.');
			redirect(site_url());
		}
	}

	function subscribe()
	{
		$email			= $this->input->post('email_address');

		$this->form_validation->set_rules('email_address','Email','required|is_unique[lwd_mailchimp.mailchimp_email]');
		$this->form_validation->set_error_delimiters('', '');

		if ($this->form_validation->run() == FALSE) {
			$data['message'] = validation_errors();
			$data['status'] = 0;
		}
		else {
			$array_data['mailchimp_email'] = $email;
			/*mendapatkan id member, jika bukan member, id_member bernilai 0 (nol)*/
			$member_id = (!empty($this->session->userdata('member_session')))
				?
					$this->encrypt->decode(hash_link_decode($this->session->userdata('member_session')))
						:
						 0;

			$array_data['member_id'] = $member_id;

			$data['id_sub'] = $this->mailchimp_model->insert($array_data);
			$data['message'] = 'Terima kasih sudah berlangganan email dari kami!';
			$data['status'] = 1;
		}

		echo json_encode($data);

	}

	public function ajax_city()
	{
		$id 					= $this->input->post('dataID');
		$array_where 	= array('province_id' => $id);
		$get_data 		= $this->city_model->get_by($array_where);
		$output 			= '';

		if ($get_data) {
			$output .= '<option disabled selected>Pilih Kota / Kabupaten</option>';
			foreach ($get_data as $result) {
				$output .= '<option value="'.$result->city_id.':'.$result->city_name.'">';
				$output .= ucwords($result->city_name);
				$output .= '</option>';
			}
			echo $output;
		}
	}

	public function ajax_district()
	{
		$id 					= $this->input->post('dataID');
		$get_data 		= $this->lawave_shipment->subdistrict($id);
		$output 			= '';

		if ($get_data) {
			$output .= '<option disabled selected>Pilih Kecamatan</option>';
			foreach ($get_data['rajaongkir']['results'] as $result) {
				$output .= '<option value="'.$result['subdistrict_id'].':'.$result['subdistrict_name'].'">';
				$output .= ucwords($result['subdistrict_name']);
				$output .= '</option>';
			}
			echo $output;
		}
	}
}
