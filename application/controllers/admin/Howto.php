<?php

/**
* 
*/
class Howto extends Backend_Controller
{
	protected $catinfo_id = '4';

	function index()
	{
		$array_where =  array('catinfo_id' => $this->catinfo_id);

		$this->data['content'] 	= 'admin/pages/howto/view';
		$this->data['howto'] 		= $this->howto_model->get_by($array_where);

		$this->load->view('admin/media', $this->data);
	}

	public function insert()
	{
		$array_where 	= array('catinfo_id' => $this->catinfo_id);
		$rules 				= $this->howto_model->rules;
		$post 				= $this->input->post(NULL, TRUE);

		$array_data['catinfo_id'] = $this->catinfo_id;
		$array_data['info_name'] 	= $post['name'];
		$array_data['info_desc'] 	= $post['desc'];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/how-to-buy'));
		}

		else {
			$this->howto_model->insert($array_data);
			$this->session->set_flashdata('success',$this->add_text);

			redirect(site_url('admin/how-to-buy'));
		}
	}

	public function update()
	{
		$array_where 	=  array('catinfo_id' => $this->catinfo_id);
		$post 				= $this->input->post(NULL, TRUE);
		$array_id			= array('info_id' => $post['id']);
		$rules 				= $this->howto_model->rules;

		$array_data['info_name'] = $post['name'];
		$array_data['info_desc'] = $post['desc'];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/how-to-buy'));
		}

		else {
			$this->howto_model->update($array_data, $array_id);
			$this->session->set_flashdata('success',$this->edit_text);

			redirect(site_url('admin/how-to-buy'));
		}
	}

	public function delete($id)
	{
		$this->howto_model->delete($id);
		$this->session->set_flashdata('success',$this->delete_text);

		redirect(site_url('admin/how-to-buy'));
	}

	public function publish($id)
	{
		$array_id = array('info_id' => $id);

		$get_data = $this->howto_model->get($id);

		if ($get_data->info_pub == '88') {
			$array_data['info_pub'] = '99';
			$text_msg = $this->publish_text;
		} 

		else {
			$array_data['info_pub'] = '88';
			$text_msg = $this->unpublish_text;
		}

		$this->howto_model->update($array_data, $array_id);
		$this->session->set_flashdata('success',$text_msg);

		redirect(site_url('admin/how-to-buy'));
	}

	public function update_load()
	{	
		$id 			= $this->input->post('dataID');
		$get_data	= $this->howto_model->get($id);

		$this->data['id'] 		= $get_data->info_id;
		$this->data['name'] 	= $get_data->info_name;
		$this->data['desc'] 	= $get_data->info_desc;

		echo json_encode($this->data);
	}	
}