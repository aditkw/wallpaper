<?php

/**
*
*/
class Sample_model extends MY_Model
{

	protected $_table_name = 'sample';
	protected $_primary_key = 'id';
	protected $_order_by = 'id';
	protected $_order_by_type = 'DESC';
	public $rules = array(
		'nama' => array(
			'field' => 'nama',
			'label' => 'Nama',
			'rules' => 'required|is_unique[lwd_sample.nama]'
			),
		'alamat' => array(
			'field' => 'alamat',
			'label' => 'alamat Description',
			'rules' => 'required'
			)
		);

	function __construct()
	{
		parent::__construct();
	}

	public function get_sample($id = NULL, $single = FALSE)
	{
		// $this->db->join('{PRE}'.'article_cat', '{PRE}'.'article_cat.article_cat_id = {PRE}'.$this->_table_name.'.article_cat_id');
		// $this->db->join('{PRE}'.'image', '{PRE}'.'image.parent_id = {PRE}'.$this->_table_name.'.article_id');
		return $this->get();
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
