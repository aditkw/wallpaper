<?php 

/**
* 
*/
class Kontak extends Frontend_Controller
{
	
	function index()
	{
		$post = $this->input->post(NULL, TRUE);

		$this->data['content'] = 'pages/contact/view';
		$this->data['contact'] = $this->contact_model->get(1);

		if (isset($post['send'])) {
			$this->contact['nama'] = $post['nama'];
			$this->contact['email'] = $post['email'];
			$this->contact['telp'] = $post['telp'];
			$this->contact['pesan'] = $post['pesan'];
			$subject = 'Pesan dari pengunjung website';

			$this->data['content'] = 'pages/email/contact';
			$email = $this->load->view('email', $this->data, TRUE);

			lwd_send_email($this->data['site']->site_email, $subject, $email);
		}

		$this->load->view('index', $this->data);
	}
}