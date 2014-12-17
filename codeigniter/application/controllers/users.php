<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view("login_view");
	}

	public function show()
	{
	 	//Always ensure an integer
		//$userId = (int)$userId;
		$userId = $_POST['username'];
		$password = $_POST['password'];
		//Load the user factory
		$this->load->library("UserFactory");
		//Create a data array so we can pass information to the view
		
		//$data = array(
		//	"users" => $this->userfactory->getUser($userId)
		//);
		$verifiedFlag = $this->userfactory->verifyUser($userId,$password);
		if($verifiedFlag){
			echo "This user is valid in controller";
		}else{
			$data = array("test" => "Logon error");
			$this->load->view("login_view",$data);
		}
		//Load the view and pass the data to it
		//$this->load->view("show_users", $data);
	}
}
?>