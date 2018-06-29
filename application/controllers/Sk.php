<?php 

/**
* 
*/
class Sk extends Frontend_Controller
{
	protected $catinfo_id = '2';
	
	function index()
	{
		$array_where =  array('catinfo_id' => $this->catinfo_id);

		$this->data['content'] 	= 'pages/term/view';
		$this->data['term'] 		= $this->term_model->get_term($array_where);

		$this->load->view('index', $this->data);
	}
}