<?php 

/**
* 
*/
class Seo extends Backend_Controller
{
	
	function index()
	{
		$this->data['content']	= 'admin/pages/seo/view';
		$this->data['seo']			= $this->seo_model->get();

		$this->load->view('admin/media', $this->data);
	}

	public function update()
	{
		$post 		= $this->input->post(NULL, TRUE);
		$id 			= $post['id'];
		$get_data = $this->seo_model->get($id);
		$rules 		= $this->seo_model->rules;
		$array_id = array('seo_id' => $id);

		$array_data['seo_title'] 		= $post['title'];
		$array_data['seo_keyword'] 	= $post['keyword'];
		$array_data['seo_desc'] 		= $post['desc'];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/seo'));
		}

		else {
			$this->seo_model->update($array_data, $array_id);
			$this->session->set_flashdata('success', $this->edit_text);
			redirect(site_url('admin/seo'));
		}
	}

	public function update_load()
	{	
		$id 			= $this->input->post('dataID');
		$get_data = $this->seo_model->get($id);

		$this->data['id'] 			= $get_data->seo_id;
		$this->data['title'] 		= $get_data->seo_title;
		$this->data['keyword'] 	= $get_data->seo_keyword;
		$this->data['desc'] 		= $get_data->seo_desc;

		echo json_encode($this->data);
	}	
}