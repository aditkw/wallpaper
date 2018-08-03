<?php

/**
*
*/
class Email extends Backend_Controller
{

	function index()
	{
		$this->data['content'] 	= 'admin/pages/email/view';
		$this->data['email'] 		= $this->mailchimp_model->get_member();
		$this->data['members'] 		= $this->member_model->get();

		$this->load->view('admin/media', $this->data);
	}

	public function insert()
	{
		$post = $this->input->post();

		$array_data['mailchimp_email'] = $post['email'];
		$array_data['member_id'] = $post['member_id'];

		$this->form_validation->set_rules('email', 'Email Address', 'required|is_unique[lwd_mailchimp.mailchimp_email]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/email'));
		}

		else {
			$this->mailchimp_model->insert($array_data);
			$this->session->set_flashdata('success', $this->add_text);

			redirect(site_url('admin/email'));
		}
	}

	public function update()
	{
		$post 						= $this->input->post();
		$id								= $post['id'];
		$get_data 				= $this->mailchimp_model->get($id);
		$array_id 				= array('mailchimp_id' => $id);

		$array_data['mailchimp_email'] = $post['email'];
		$array_data['member_id'] = $post['member_id'];

		$is_unique = $this->mailchimp_model->unique_update($post['email'], $id, 'mailchimp_email');

		$this->form_validation->set_rules('email', 'Email Address', 'required'.$is_unique);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/email'));
		}

		else {
			$this->mailchimp_model->update($array_data, $array_id);
			$this->session->set_flashdata('success', $this->add_text);

			redirect(site_url('admin/email'));
		}
	}

	public function delete($id)
	{
		$get_data = $this->mailchimp_model->get($id);

		$this->mailchimp_model->delete($id);
		$this->session->set_flashdata('success', $this->delete_text);

		redirect(site_url('admin/email'));
	}

	public function export()
	{
		$this->load->dbutil();
		$this->load->helper('file');
    $this->load->helper('download');
		$query = $this->db->query("SELECT mailchimp.mailchimp_email AS `Email Address`, member.member_name AS `First Name`, member.member_address AS `Address`, member.member_phone AS `Phone` FROM `lwd_mailchimp` AS `mailchimp` INNER JOIN `lwd_member` AS `member` ON mailchimp.member_id = member.member_id");
		$delimiter = ",";
    $newline = "\r\n";
    $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
    force_download('CSV_Report.csv', $data);
	}

	// public function publish($id)
	// {
	// 	$array_id = array('mailchimp_id' => $id);
	//
	// 	$get_data = $this->mailchimp_model->get($id);
	//
	// 	if ($get_data->mailchimp_pub == '88') {
	// 		$array_data['mailchimp_pub'] = '99';
	// 		$text_msg = $this->publish_text;
	// 	}
	//
	// 	else {
	// 		$array_data['mailchimp_pub'] = '88';
	// 		$text_msg = $this->unpublish_text;
	// 	}
	//
	// 	$this->mailchimp_model->update($array_data, $array_id);
	// 	$this->session->set_flashdata('success', $text_msg);
	//
	// 	redirect(site_url('admin/mailchimp'));
	// }

	public function update_load()
	{
		$id 			= $this->input->post('dataID');
		$get_data = $this->mailchimp_model->get($id);

		$this->data['id'] 	= $get_data->mailchimp_id;
		$this->data['email'] = $get_data->mailchimp_email;
		$this->data['member_id'] = $get_data->member_id;

		echo json_encode($this->data);
	}
}
