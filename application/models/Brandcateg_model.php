<?php

/**
*
*/
class Brandcateg_model extends MY_Model
{

	protected $_table_name = 'brandcateg';
	protected $_primary_key = 'brandcateg_id';
	protected $_order_by = 'brandcateg_id';
	protected $_order_by_type = 'ASC';
	// public $rules;

	function __construct()
	{
		parent::__construct();
	}

	public function brand_categ($where=NULL)
	{
		$this->db->select('bc.category_id as category_id, c.category_name, c.category_link, GROUP_CONCAT(b.brand_name) as brand_name, GROUP_CONCAT(b.brand_link) as brand_link');
		$this->db->from('{PRE}brandcateg as bc');
		$this->db->join('{PRE}brand as b', 'bc.brand_id = b.brand_id', 'inner');
		$this->db->join('{PRE}category as c', 'bc.category_id = c.category_id', 'inner');

		if ($where) {
			$this->db->where($where);
		}

		$this->db->group_by('category_id');
		return $this->db->get()->result();
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
