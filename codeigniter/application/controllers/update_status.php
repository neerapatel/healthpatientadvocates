<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Update_Status extends CI_Controller {

	function __construct()
	{
	   parent::__construct();
	   $this->load->model('update_status_model');
	}
 
 	public function index($project_id='')
	{  
		//load the session library
		$this->load->library('session');
		$this->load->library('encrypt');


		//if there is no session
		if (!$this->session->userdata('validEntry')) {
		
			//prompt users that there is no session
 			redirect(base_url());		
		
		} else {
			//get the session[user_input]
			$userinput = $this->session->userdata('validEntry');
			$data["msg"] = $userinput;
			$data['project_id'] = base64_decode($project_id);
			//print_r($_GET);
			//echo $project_id;
			
			
			$reasons = $this->showReasons();
			$data['reasons'] = $reasons;
			
			
			$this->load->helper('form');
						
			$this->load->template("update_status_view",$data);
			
		}
		
	}
	
	public function updateStatus(){
	
		$closure_reason = $this->input->post('status');
		$project_id = $this->input->post('project_id');
		//echo $closure_reason."--".$project_id;
		$data_project = array($closure_reason,$project_id);
		
		$this->update_status_model->update_status($data_project);
		redirect(base_url().'dashboard');

		
	}
	
	public function showReasons(){
    
		$data = array();
	
		$query = $this->update_status_model->getReasons();
		if ($query)
		{ 
			$data['records'] = $query;
	
		}
		return $data;

 	}
	
	
	
}
 
?>