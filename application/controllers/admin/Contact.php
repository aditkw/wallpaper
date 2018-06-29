<?php

/**
* 
*/
class Contact extends Backend_Controller
{
	
	public function index()
	{
		$id = 1;

		$this->data['content'] = 'admin/pages/contact/view';
		$this->data['contact'] = $this->contact_model->get($id);

		$this->load->view('admin/media', $this->data);
	}

	public function update($form)
	{
		$id = 1;
		$array_id = array('contact_id' => $id);
		$post 		= $this->input->post(NULL, TRUE);

		if ($form == 'contact') {
			$array_data = array(
				'contact_phone' => $post['phone'],
				'contact_fax' => $post['fax'],
				'contact_email' => $post['email']
				);
		} else if ($form == 'address') {
			$array_data = array(
				'contact_address' => $post['address'],
				'contact_maps' => $this->input->post('maps')
				);
		} else if ($form == 'media') {
			$array_data = array(
				'contact_fb' => $post['fb'],
				'contact_tw' => $post['tw'],
				'contact_ig' => $post['ig']
				);
		}

		$update = $this->contact_model->update($array_data, $array_id);

		$this->session->set_flashdata('success',$this->edit_text);

		redirect(site_url('admin/contact'));
	}
}