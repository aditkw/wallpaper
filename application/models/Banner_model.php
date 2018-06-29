<?php 

/**
* 
*/
class Banner_model extends MY_Model
{
	
	protected $_table_name = 'banner';
	protected $_primary_key = 'banner_id';
	protected $_order_by = 'banner_id';
	protected $_order_by_type = 'ASC';
	public $rules = array(
		'link' => array(
			'field' => 'link',
			'label' => 'Slider Link',
			'rules' => 'required'
			),
		'alt' => array(
			'field' => 'alt',
			'label' => 'Slider Alt',
			'rules' => 'required'
			)
		);

	function __construct()
	{
		parent::__construct();
	}
}