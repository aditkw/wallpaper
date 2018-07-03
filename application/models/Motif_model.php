<?php

/**
*
*/
class Motif_model extends MY_Model
{

	protected $_table_name = 'motif';
	protected $_primary_key = 'motif_id';
	protected $_order_by = 'motif_name';
	protected $_order_by_type = 'ASC';
	public $rules;

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
