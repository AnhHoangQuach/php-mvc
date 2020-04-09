<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'UploadHandler.php';
class nhansu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('nhansu_model');
		$result = $this->nhansu_model->getAllData();
		$result = array("data_array" => $result);

		$this->load->view('nhansu_view', $result);
	}

	public function nhansu_add()
	{
		$target_dir = "FileUpLoad/";
		$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check file size
		if ($_FILES["avatar"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
		       	echo "Sorry, there was an error uploading your file.";
		    }
		}

		$name = $this->input->post('name');
		$age = $this->input->post('age');
		$order = $this->input->post('sodonhang');
		$linkfb = $this->input->post('linkfb');
		$phone = $this->input->post('phone');
		$avatar = base_url() . "FileUpLoad/" . basename($_FILES["avatar"]["name"]);

		$this->load->model('nhansu_model');
		$check = $this->nhansu_model->insertData($name,$age,$phone,$order,$linkfb,$avatar);
		if($check) {
			//echo "Success";
			$this->load->view('insert_success_view');
		} else {
			echo "Failed";
		}
	}

	public function sua_nhansu($id)
	{
		$this->load->model('nhansu_model');
		$result = $this->nhansu_model->getDataByID($id);
		$result = array('result_array' => $result);
		$this->load->view('sua_nhanvien_view', $result);
	}

	public function xoa_nhansu($id)
	{
		$this->load->model('nhansu_model');
		$check = $this->nhansu_model->removeDataByID($id);
		if($check) {
			$this->load->view('xoa_success_view');
		} else {
			echo "Failed";
		}
	}

	public function update_nhansu()
	{
		$id = $this->input->post('id');
		$age = $this->input->post('age');
		$order = $this->input->post('sodonhang');
		$linkfb = $this->input->post('linkfb');
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');

		$target_dir = "FileUpLoad/";
		$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check file size
		if ($_FILES["avatar"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}

		$avatar = basename($_FILES["avatar"]["name"]);
		if($avatar) {
			$avatar = base_url() . "FileUpLoad/" . basename($_FILES["avatar"]["name"]);
		} else {
			$avatar = $this->input->post('avatar2');
		}

		$this->load->model('nhansu_model');
		$check = $this->nhansu_model->updateByID($id,$name,$age,$phone,$avatar,$linkfb,$order);
		if($check) {
			$this->load->view('insert_success_view');
		} else {
			echo "Failed";
		}
	}

	public function ajax_add()
	{
		$name = $this->input->post('name');
		$age = $this->input->post('age');
		$order = $this->input->post('sodonhang');
		$avatar = $this->input->post('image');
		$linkfb = $this->input->post('linkfb');
		$phone = $this->input->post('phone');

		$this->load->model('nhansu_model');
		$check = $this->nhansu_model->insertData($name, $age, $phone, $linkfb, $avatar, $order);
		if($check) {
			echo "Success";
		} else {
			echo "Failed";
		}
	}

	public function uploadFile()
	{
		$uploadfile = new UploadHandler();
	}
}
/* End of file nhansu.php */
/* Location: ./application/controllers/nhansu.php */