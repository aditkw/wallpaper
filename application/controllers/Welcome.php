<?php
/**
*
*/
class Welcome extends Frontend_Controller {

	public function index()
	{
		$this->data['content']	= 'pages/home';

		$this->load->view('index', $this->data);
	}
}
