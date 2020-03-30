<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class addData_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function insert($number,$cost)
	{
		$data = array('so' => $number , 'gia' => $cost);
		$this->db->insert('so_sim', $data);
		return $this->db->insert_id(); // return one value is it's id
	}
}

/* End of file addData_model.php */
/* Location: ./application/models/addData_model.php */