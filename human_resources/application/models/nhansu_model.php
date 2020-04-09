<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu_model extends CI_Model {

	public $variable;

	public function __construct()	
	{
		parent::__construct();
		
	}

	public function insertData($name, $age, $phone, $linkfb, $image, $order)
	{
		$data = array(
			'ten' => $name, 
			'tuoi' => $age,
			'sdt' => $phone,
			'anhavatar' => $image,
			'linkfb' => $linkfb,
			'sodonhang' => $order
		);
		$this->db->insert('nhan_vien', $data);
		return $this->db->insert_id();
	}

	public function getAllData()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'asc');
		$data = $this->db->get('nhan_vien');
		$data = $data->result_array();
		return $data;
	}

	public function getDataByID($key)
	{
		$this->db->select('*');
		$this->db->where('id', $key);
		$data = $this->db->get('nhan_vien');
		$data = $data->result_array();
		return $data;
	}

	public function updateByID($id,$ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang)
	{
		$data = array(
			'id' => $id,
			'ten' => $ten,
			'tuoi' => $tuoi,
			'sdt' => $sdt,
			'anhavatar' => $anhavatar,
			'linkfb' => $linkfb,
			'sodonhang' => $sodonhang
		);
		$this->db->where('id', $id);
		return $this->db->update('nhan_vien', $data);
	}

	public function removeDataByID($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('nhan_vien');
	}
}

/* End of file nhansu_model.php */
/* Location: ./application/models/nhansu_model.php */