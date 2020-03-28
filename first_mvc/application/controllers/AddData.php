<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddData extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('AddData_view');
	}

	public function insertData_controller()
	{	
		// take data of form
		$number = $this->input->post('number');
		$cost = $this->input->post('cost');
		// pass data to model
		$this->load->model('addData_model');
		$value_insert = $this->addData_model->insert($number,$cost);
		if($value_insert) {
			//echo "Success";
			$this->load->view('success');
		} else {
			echo "Failed";
		}
	}
}

/* End of file AddData.php */
/* Location: ./application/controllers/AddData.php */