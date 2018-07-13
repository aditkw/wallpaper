<?php

/**
*
*/
class Kalkulator extends Frontend_Controller
{

	function index()
	{
		$this->data['content'] 	= 'pages/kalkulator/view';

		$this->load->view('index', $this->data);
	}
}
