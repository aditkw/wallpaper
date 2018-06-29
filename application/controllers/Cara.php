<?php 

/**
*
*/
class Cara extends Frontend_Controller
{
	protected $catinfo_id = '4';

	function index()
	{
		$array_where =  array('catinfo_id' => $this->catinfo_id);

		$this->data['content'] 	= 'pages/howto/view';
		$this->data['howto'] 		= $this->howto_model->get_by($array_where);

		$this->load->view('index', $this->data);
	}
}
