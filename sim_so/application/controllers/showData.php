<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class showData extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//$this->load->view('showData_view'); check ban dau
		$this->load->model('showData_model');
		$data = $this->showData_model->getdatabase();
		$data = array('datasim' => $data); // bien du lieu thanh mang array
		$this->load->view('showData_view', $data, FALSE);
	}

	public function deleteData($id)
	{
		$this->load->model('showData_model');
		$check = $this->showData_model->deleteDataById($id);
		if($check) {
			$this->load->view('deletesuccess');
		}
	}

	public function editSim($id)
	{
		$this->load->model('showData_model');
		$result = $this->showData_model->editById($id);
		$result = array('arrayresult' => $result);
		$this->load->view('editData_view', $result, FALSE);
	}

	public function updateData()
	{
		$id = $this->input->post('id');
		$so = $this->input->post('number');
		$gia = $this->input->post('cost');
		$this->load->model('showData_model');
		$check = $this->showData_model->updateDataById($id,$so,$gia);
		if($check) {
			echo "Success";
		} else {
			echo "Failed";
		}
	}
}

/* End of file showData.php */
/* Location: ./application/controllers/showData.php */