<?php

/**
*
*/
class Login extends Frontend_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function auth()
	{
		$post		= $this->input->post(NULL, TRUE);
		$rules 	= $this->login_model->rules;

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		}

		else {
			$user = $post['username'];
			$pass = hash_string($post['password']);
			// echo $pass; die();

			$array_login['user_username'] = $user;
			$array_login['user_password'] = $pass;
			$array_login['user_status'] 	= 'active';

			$login 	= $this->login_model->get_by($array_login, NULL, NULL, TRUE);

			$level 	= $login->user_level;
			$name		= $login->user_name;

			if ($login) {
				$array_sess['user_session'] 	= hash_link_encode($this->encrypt->encode($login->user_id));
				$array_sess['username' ]			= $user;
				$array_sess['level'] 					= $level;
				$array_sess['name']	 					= $name;
				$array_sess['is_login'] 			= TRUE;

				$this->session->set_userdata($array_sess);
				redirect('admin');
			}

			else {
				$this->session->set_flashdata('failed', 'Oops.. Username atau password salah!');
				redirect('login');
			}
		}
	}

	public function session_id_proccess($data)
	{
		$sid_lama = session_id();
		session_regenerate_id();
		$sid_baru = session_id();

		$array_sid_baru 	= array('user_session' => $sid_baru);
		$array_where			= array('user_username' => $data);

		$this->login_model->update_session($array_sid_baru, $array_where);
		return $sid_baru;
	}

	public function logout()
	{
		$array_sess 	= array('user_session', 'username', 'level', 'name', 'is_login', 'count_all_member', 'count_new_member', 'count_bl_member');
		$unset 				= $this->session->unset_userdata($array_sess);

		if ($unset) {
			$this->session->set_flashdata('success','Logout berhasil.');
			redirect(site_url('login'));
		}

		else {
			redirect(site_url('admin'));
		}
	}
}
