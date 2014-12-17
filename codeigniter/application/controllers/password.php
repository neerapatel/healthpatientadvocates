<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Password extends CI_Controller {

	function __construct()
	{
	   parent::__construct();
	   $this->load->model('password_model');
	}
 
 	public function index()
	{  
		//load the session library
		$this->load->library('session');

		//if there is no session
		//if (!$this->session->userdata('validEntry')) {
			//prompt users that there is no session
 			//redirect(base_url());		
		
		//} else {
		
			//get the session[user_input]
			$userinput = $this->session->userdata('validEntry');
			$data["msg"] = $userinput;
			
			//print_r($data);
			if($this->password_model->getPass($data['msg']['user_email']))
			{
			$data['old_pass'] = "false";
			}
			
			$this->load->helper('form');
						
			$this->load->template("password_view",$data);
			
		//}
		
	}
	
	public function updatePass()
	{
		
		$email=$this->session->userdata['validEntry']['user_email'];
		
		if(isset($_POST['old_password']))
			$password = md5($this->input->post('old_password'));
		else
			$password = 'complex';

		$result=$this->password_model->validPass($email,$password);
		
		if($result) { 
			
			$con_password = $this->input->post('con_password');
			$userid = $this->input->post('user_id');
			
			
			$data = array($con_password,$userid);
			$this->password_model->updatePass($data);
			
			redirect(base_url().'settings');
			
		}
		else
		{
		//die("in");
		
			//get the session[user_input]
			$userinput = $this->session->userdata('validEntry');
			$data["msg"] = $userinput;

			$data['error']= 'Error! Password could not be updated.';
			$this->load->helper('form');

			$this->load->template("password_view",$data);

		}
		

	}
	
	
}
 
?>