<?php

/**
*
*/
class Testi_model extends MY_Model
{

	protected $_table_name = 'testi';
	protected $_primary_key = 'testi_id';
	protected $_order_by = 'testi_id';
	protected $_order_by_type = 'DESC';
	public $rules =  array(
		'desc' => array(
			'field' => 'desc',
			'label' => 'Description',
			'rules' => 'required'
			),
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required'
			),
		'job' => array(
			'field' => 'job',
			'label' => 'Job',
			'rules' => 'required'
			)
		);

	function __construct()
	{
		parent::__construct();
	}

	public function unique_update($value, $id, $field)
	{
		$get_data = $this->get($id);

		if ($value == $get_data->$field) {
			$require = '';
		}

		else {
			$require = '|is_unique[{PRE}'.$this->_table_name.'.'.$field.']';
		}

		return $require;
	}
}
