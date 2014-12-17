<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Account_edit extends CI_Controller {
 function __construct()
 {
   parent::__construct();
   $this->load->model('account_edit_model');
  
 }
 
 	public function index()
	{  
		//load the session library
		$this->load->library('session');

		//if there is no session
		if (!$this->session->userdata('validEntry')) {
			//prompt users that there is no session
 			redirect(base_url());		
		
		} else {
		
			//get the session[user_input]
			$userinput = $this->session->userdata('validEntry');
			$data["msg"] = $userinput;
			
			$this->load->helper('form');
						
			$this->load->template("account_edit_view",$data);
			
		}
		
	}
	
	public function updateUser()
	{
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');
			$timezone = $this->input->post('timezone');
			$userid = $this->input->post('user_id');
			
			
			$data = array($firstname,$lastname,$timezone,$userid);
			$this->account_edit_model->updateUser($data);
			redirect(base_url().'settings');

	}
	
	
}
 
?>