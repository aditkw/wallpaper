<?php

/**
* 
*/
class Term extends Backend_Controller
{
	protected $catinfo_id = '2';

	function index()
	{
		$array_where =  array('catinfo_id' => $this->catinfo_id);

		$this->data['content'] 	= 'admin/pages/term/view';
		$this->data['term'] 		= $this->term_model->get_term($array_where);

		$this->load->view('admin/media', $this->data);
	}

	public function insert()
	{
		$array_where 	=  array('catinfo_id' => $this->catinfo_id);
		$rules 				= $this->term_model->rules;
		$post 				= $this->input->post(NULL, TRUE);

		$array_data['catinfo_id'] = $this->catinfo_id;
		$array_data['info_name'] 	= $post['title'];
		$array_data['info_desc'] 	= $post['desc'];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/term-and-condition'));
		}

		else {
			$this->term_model->insert($array_data);
			$this->session->set_flashdata('success',$this->add_text);

			redirect(site_url('admin/term-and-condition'));
		}
	}

	public function update()
	{
		$array_where 	=  array('catinfo_id' => $this->catinfo_id);
		$post 				= $this->input->post(NULL, TRUE);
		$array_id			= array('info_id' => $post['id']);
		$rules 				= $this->term_model->rules;

		$array_data['info_name'] = $post['title'];
		$array_data['info_desc'] = $post['desc'];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/term-and-condition'));
		}

		else {
			$this->term_model->update($array_data, $array_id);
			$this->session->set_flashdata('success',$this->edit_text);

			redirect(site_url('admin/term-and-condition'));
		}
	}

	public function delete($id)
	{
		$this->term_model->delete($id);
		$this->session->set_flashdata('success',$this->delete_text);

		redirect(site_url('admin/term-and-condition'));
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

		redirect(site_url('admin/term-and-condition'));
	}

	public function update_load()
	{	
		$id 					= $this->input->post('dataID');
		$term 				= $this->term_model->get($id);

		$this->data['id'] 		= $term->info_id;
		$this->data['title'] 	= $term->info_name;
		$this->data['desc'] 	= $term->info_desc;

		echo json_encode($this->data);
	}	
}