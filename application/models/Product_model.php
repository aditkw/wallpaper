<?php

/**
*
*/
class Product_model extends MY_Model
{

	protected $_table_name = 'product';
	protected $_primary_key = 'product_id';
	public $rules = array(
		'category' => array(
			'field' => 'category',
			'label' => 'Category',
			'rules' => 'required'
			),
		// 'subcat' => array(
		// 	'field' => 'subcat',
		// 	'label' => 'Sub Category',
		// 	'rules' => 'required'
		// 	),
		'name' => array(
			'field' => 'name',
			'label' => 'Product Name',
			'rules' => 'required'
			),
		// 'desc' => array(
		// 	'field' => 'desc',
		// 	'label' => 'Product Description',
		// 	'rules' => 'required'
		// 	),
		'price' => array(
			'field' => 'price',
			'label' => 'Product Proce',
			'rules' => 'required'
			),
		'stock' => array(
			'field' => 'stock',
			'label' => 'Product Stock',
			'rules' => 'required'
			),
		'weight' => array(
			'field' => 'weight',
			'label' => 'Product Weight',
			'rules' => 'required'
			),
		'page' => array(
			'field' => 'page',
			'label' => 'Product Page',
			'rules' => 'required'
			),
		'width' => array(
			'field' => 'width',
			'label' => 'Size (Width)',
			'rules' => 'required'
			),
		'height' => array(
			'field' => 'height',
			'label' => 'Size (Height)',
			'rules' => 'required'
			)
		);

	function __construct()
	{
		parent::__construct();
	}

	public function get_product($where = NULL, $limit = NULL, $offset= NULL, $single=FALSE, $select=NULL, $like = NULL, $order = NULL, $color = NULL)
	{
		$this->db->join('{PRE}'.'category', '{PRE}'.'category.category_id = {PRE}'.$this->_table_name.'.category_id');
		$this->db->join('{PRE}'.'brand', '{PRE}'.'brand.brand_id = {PRE}'.$this->_table_name.'.brand_id');
		$this->db->join('{PRE}'.'motif', '{PRE}motif.motif_id = {PRE}brand.motif_id');
		$this->db->join('{PRE}'.'color', '{PRE}color.color_id = {PRE}product.color_id');
		$this->db->join('{PRE}'.'image', '{PRE}'.'image.parent_id = {PRE}'.$this->_table_name.'.product_id');
		if ($like) {
			$this->db->like($like);
		}
		if ($order) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}
		if ($color) {
			$i=0;
			$count = count($color) - 1;
			foreach ($color as $color) {
				if ($i==0) {
					$this->db->where("({PRE}product.color_id = $color->color_id");
				}elseif($i==$count) {
					$this->db->or_where("{PRE}product.color_id=  $color->color_id)");
				}else {
					$this->db->or_where("{PRE}product.color_id=  $color->color_id");
				}
				$i++;
			}
		}
		return parent::get_by($where,$limit,$offset,$single,$select);
	}

	public function count_product($where = NULL, $like = NULL)
	{
		$this->db->join('{PRE}'.'image', '{PRE}'.'image.parent_id = {PRE}'.$this->_table_name.'.product_id');
		$this->db->join('{PRE}'.'brand', '{PRE}'.'brand.brand_id = {PRE}'.$this->_table_name.'.brand_id');
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
