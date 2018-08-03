<?php

/**
*
*/
class About extends Frontend_Controller
{

	function index()
	{
		$this->data['about'] = $this->about_model->get(1);
		$this->data['content'] 	= 'pages/about/view';

		$this->load->view('index', $this->data);
	}
}
