<?php

/**
*
*/
class Voucher extends Backend_Controller
{

	function index()
	{
		$this->data['content'] 	= 'admin/pages/voucher/view';
		$this->data['voucher'] 		= $this->voucher_model->get();

		$this->load->view('admin/media', $this->data);
	}

	public function insert()
	{
		$post = $this->input->post();

		$array_data['voucher_code'] = $post['code'];
		$array_data['voucher_discount'] = $post['discount'];
		$array_data['voucher_limit'] = $post['limit'];
		$array_data['voucher_expired'] = $post['expired'];

		$this->form_validation->set_rules('code', 'Voucher Code', 'required|is_unique[lwd_voucher.voucher_code]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/voucher'));
		}

		else {
			$this->voucher_model->insert($array_data);
			$this->session->set_flashdata('success', $this->add_text);

			redirect(site_url('admin/voucher'));
		}
	}

	public function update()
	{
		$post 						= $this->input->post();
		$id								= $post['id'];
		$rules 						= $this->voucher_model->rules;
		$get_data 				= $this->voucher_model->get($id);
		$array_id 				= array('voucher_id' => $id);

		$array_data['voucher_code'] = $post['code'];
		$array_data['voucher_discount'] = $post['discount'];
		$array_data['voucher_limit'] = $post['limit'];
		$array_data['voucher_expired'] = $post['expired'];

		$is_unique = $this->voucher_model->unique_update($post['code'], $id, 'voucher_code');

		$this->form_validation->set_rules('code', 'Voucher Code', 'required'.$is_unique);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/voucher'));
		}

		else {
			$this->voucher_model->update($array_data, $array_id);
			$this->session->set_flashdata('success', $this->add_text);

			redirect(site_url('admin/voucher'));
		}
	}

	public function delete($id)
	{
		$get_data = $this->voucher_model->get($id);

		$this->voucher_model->delete($id);
		$this->session->set_flashdata('success', $this->delete_text);

		redirect(site_url('admin/voucher'));
	}

	public function publish($id)
	{
		$array_id = array('voucher_id' => $id);

		$get_data = $this->voucher_model->get($id);

		if ($get_data->voucher_pub == '88') {
			$array_data['voucher_pub'] = '99';
			$text_msg = $this->publish_text;
		}

		else {
			$array_data['voucher_pub'] = '88';
			$text_msg = $this->unpublish_text;
		}

		$this->voucher_model->update($array_data, $array_id);
		$this->session->set_flashdata('success', $text_msg);

		redirect(site_url('admin/voucher'));
	}

	public function update_load()
	{
		$id 			= $this->input->post('dataID');
		$get_data = $this->voucher_model->get($id);

		$this->data['id'] 	= $get_data->voucher_id;
		$this->data['code'] = $get_data->voucher_code;
		$this->data['limit'] = $get_data->voucher_limit;
		$this->data['discount'] = $get_data->voucher_discount;
		$this->data['expired'] = $get_data->voucher_expired;

		echo json_encode($this->data);
	}
}
