<?php

/**
*
*/
class Brand_model extends MY_Model
{

	protected $_table_name = 'brand';
	protected $_primary_key = 'brand_id';
	protected $_order_by = 'brand_name';
	protected $_order_by_type = 'ASC';
	public $rules;

	function __construct()
	{
		parent::__construct();
	}

	public function get_brand($where = NULL, $limit = NULL, $offset= NULL, $single=FALSE, $select=NULL, $like = NULL, $order = NULL)
	{
		$this->db->join('{PRE}'.'category', '{PRE}'.'category.category_id = {PRE}'.$this->_table_name.'.category_id');
		$this->db->join('{PRE}'.'motif', '{PRE}'.'motif.motif_id = {PRE}'.$this->_table_name.'.motif_id');
		if ($like) {
			$this->db->like($like);
		}
		if ($order) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}
		return parent::get_by($where,$limit,$offset,$single,$select);
	}

	public function count_brand($where = NULL, $like = NULL)
	{
		$this->db->join('{PRE}'.'category', '{PRE}'.'category.category_id = {PRE}'.$this->_table_name.'.category_id');
		$this->db->join('{PRE}'.'motif', '{PRE}'.'motif.motif_id = {PRE}'.$this->_table_name.'.motif_id');
		if ($like) {
			$this->db->like($like);
		}
		return parent::count($where);
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
