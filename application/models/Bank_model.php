<?php 

/**
* Bank model
*/
class Bank_model extends MY_Model
{
	
	protected $_table_name 		= 'bank';
	protected $_primary_key 	= 'bank_id';
	protected $_order_by 			= 'bank_id';
	protected $_order_by_type = 'DESC';
	
	/*
	| nilai dari variable diatas akan dikirim ke MY_Model dan digunakan untuk mengakses table
	*/

	public $rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Bank Name',
			'rules' => 'required'
			),
		'account' => array(
			'field' => 'account',
			'label' => 'Bank Account',
			'rules' => 'required'
			),
		'no' => array(
			'field' => 'no',
			'label' => 'Bank Number',
			'rules' => 'required'
			)
		);

	/*
	| nilai rules digunakan untuk proses validasi form CI
	*/

	function __construct()
	{
		parent::__construct();
	}
}