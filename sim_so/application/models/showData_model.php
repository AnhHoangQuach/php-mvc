<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class showData_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getdatabase()
	{
		$this->db->select('*'); // giong cau lenh sql SELECT * FROM
		$ketqua = $this->db->get('so_sim'); // limit: lay bao nhieu gia tri sau offset, offset: tu vi tri nao
		$ketqua = $ketqua->result_array(); // bien doi thanh mot mang
		//var_dump($ketqua); check mang co gi
		return $ketqua;
	}

	public function deleteDataById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('so_sim');
	}

	public function editById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$data = $this->db->get('so_sim');
		$data = $data->result_array();
		return $data;
	}

	public function updateDataById($id, $number, $cost)
	{
		$dataUpdate = array('id' => $id , 'so' => $number, 'gia' => $cost);
		$this->db->where('id', $id);
		return $this->db->update('so_sim', $dataUpdate);
	}
}

/* End of file showData_model.php */
/* Location: ./application/models/showData_model.php */