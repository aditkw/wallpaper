<?php

/**
* 
*/
class User extends Backend_Controller
{
	protected $max_size					= 1024 * 200;
	protected $width_thumbnail 	= 320;
	protected $height_thumbnail = 0; 
	protected $image_input_name = 'image';


	public function index()
	{
		$this->data['content'] = 'admin/pages/user/view';
		$this->data['users'] = $this->user_model->get();
		
		$this->load->view('admin/media', $this->data);
	}

	public function delete($id)
	{
		// jika tidak ada parameter, maka dikembalikan ke halaman user
		if ($id == NULL) {
			redirect(site_url('admin/user'));
		} 

		else {
			// hapus data
			$this->user_model->delete_by(array('user_session' => $id));
			// flash data untuk alert
			$this->session->set_flashdata('success', $this->delete_text);
			redirect('admin/user');
		}
	}

	public function insert()
	{
		$post 						= $this->input->post(NULL, TRUE);
		$rules						= $this->user_model->rules;

		// setting rules validasi
		$this->form_validation->set_rules('username','Username','required|is_unique[lwd_user.user_username]');
		$this->form_validation->set_rules('newpass','Password','required|alpha_numeric');
		$this->form_validation->set_rules('passconf','Password Confirmation','required|matches[newpass]');
		$this->form_validation->set_rules($rules);

		$array_data['user_name']				= $post['name'];
		$array_data['user_username'] 		= $post['username'];
		$array_data['user_email'] 			= $post['email'];
		$array_data['user_level'] 			= $post['level'];
		$array_data['user_status'] 			= $post['status'];
		$array_data['user_password'] 		= hash_string($post['passconf']);
		$array_data['user_session'] 		= hash_string($post['passconf']);


		// jika validasi tidak sesuai, maka dikembalikan ke halaman data
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/user'));
		} 

		else {
			// data dibentuk array

			// insert data
			$this->user_model->insert($array_data);
			// flash data
			$this->session->set_flashdata('success',$this->add_text);
			redirect(site_url('admin/user'));
		}
	}

	public function update()
	{
		$post 						= $this->input->post(NULL, TRUE);
		$id 							= $post['id'];
		$array_id 				= array('user_session' => $id);
		$rules						= $this->user_model->rules;

		// dapatkan data sesuai id_session
		$get_data = $this->user_model->get_by($array_id, NULL, NULL, TRUE);

		// validasi. jika usernamenya diubah, maka username yang baru harus bernilai unique
		if ($post['username'] != $get_data->user_username) {
			$is_unique = '|is_unique[user.user_username]';
		}

		else {
			$is_unique = '';
		}
		
		if (empty($post['newpass']) AND empty($post['passconf'])) {
			// set validasi jika password tidak diganti
			$this->form_validation->set_rules('username','Username','required'.$is_unique);
			$this->form_validation->set_rules($rules);
		} 

		else {
			// set validasi jika password diganti
			$this->form_validation->set_rules('username','Username','required'.$is_unique);
			$this->form_validation->set_rules('newpass','Password','required|alpha_numeric');
			$this->form_validation->set_rules('passconf','Password Confirmation','required|matches[newpass]');
			$this->form_validation->set_rules($rules);
		}

		$array_data['user_name'] 				= $post['name'];
		$array_data['user_username'] 		= $post['username'];
		$array_data['user_email'] 			= $post['email'];
		$array_data['user_level'] 			= $post['level'];
		$array_data['user_status'] 			= $post['status'];
		$array_data['user_session'] 		= $post['id'];

		if ($this->form_validation->run() == FALSE) {			
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/user'));
		} 

		else if(empty($post['newpass']) AND empty($post['passconf'])) {
			// update data jika password tidak diganti

			$this->user_model->update($array_data, $array_id);
			$this->session->set_flashdata('success',$this->edit_text);
			redirect(site_url('admin/user'));
		} 

		else if (hash_string($post['oldpass']) == $get_data->user_password) {
			// update data jika password diganti
			$array_data['user_password'] = hash_string($post['passconf']);

			$this->user_model->update($array_data, $array_id);
			$this->session->set_flashdata('success',$this->edit_text);
			redirect(site_url('admin/user'));	
		} 

		else {
			// jika password lama salah
			$this->session->set_flashdata('failed',$this->pass_inc_text);
			redirect(site_url('admin/user'));
		}
	}

	public function update_load()
	{
		$id 			= $this->input->post('dataID');
		$array_id = array('user_session' => $id);
		$get_data = $this->user_model->get_by($array_id, NULL, NULL, TRUE);

		$this->data['id'] 			= $get_data->user_session;
		$this->data['name'] 		= $get_data->user_name;
		$this->data['username'] = $get_data->user_username;
		$this->data['email'] 		= $get_data->user_email;
		$this->data['level'] 		= $get_data->user_level;
		$this->data['status'] 	= $get_data->user_status;

		echo json_encode($this->data);
	}
}