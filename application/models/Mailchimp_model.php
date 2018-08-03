<?php

/**
*
*/
class Mailchimp_model extends MY_Model
{

	protected $_table_name = 'mailchimp';
	protected $_primary_key = 'mailchimp_id';
	protected $_order_by = 'mailchimp_id';
	protected $_order_by_type = 'ASC';
	public $rules;

	function __construct()
	{
		parent::__construct();
	}

	public function get_member($where = NULL, $limit = NULL, $offset= NULL, $single=FALSE, $select=NULL)
	{
		$this->db->join('{PRE}'.'member', '{PRE}'.'member.member_id = {PRE}'.$this->_table_name.'.member_id');
		return parent::get_by($where,$limit,$offset,$single,$select);
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
