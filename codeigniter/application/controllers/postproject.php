<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PostProject extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('project_model');
		$this->load->model('register_model');
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
			
			$services = $this->showServices();
			$data['records'] = $services;
			
			$postdata = $this->session->userdata('postdata');
			$data["postdata"] = $postdata;
			
			
			$this->load->library('form_validation');
			$this->load->template("postproject_view",$data);
		//}		
		
		

	}
	
	function addProject() {
		
		// get form variable
		
		$services = implode(",",$this->input->post('services'));
		$gender = $this->input->post('gender');
		$age = $this->input->post('age');
		$problem_desc = $this->input->post('problem_desc');
		$advocate_help_desc = $this->input->post('advocate_help_desc');
		$timings = addslashes($this->input->post('timings'));
		$notification_mode = $this->input->post('notification_mode');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$call_directly = $this->input->post('call_directly');
		$zipcode = $this->input->post('zipcode');
		$full_name = $this->input->post('full_name');
		$customer_id = $this->input->post('customer_id');
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('services', 'Services', 'required|xss_clean');
		$this->form_validation->set_rules('gender', 'Gender', 'required|xss_clean');
		$this->form_validation->set_rules('age', 'Age', 'trim|required|xss_clean|numeric|max_length[3]');
		$this->form_validation->set_rules('problem_desc', 'Problem Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('advocate_help_desc', 'Advocate_help_desc', 'trim|required|xss_clean');
		$this->form_validation->set_rules('timings', 'Timings', 'required|xss_clean');
		$this->form_validation->set_rules('notification_mode', 'Notification Mode', 'required|xss_clean');
		//$this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('call_directly', 'Call Directly', 'required|xss_clean');
		$this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required|numeric|xss_clean|exact_length[5]');
		$this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		
		}
		else
		{

				$data_patient = array($gender, $age, $problem_desc,$advocate_help_desc,$timings,$notification_mode,$call_directly,$zipcode,$full_name,$email,$phone);
				$data_project = array($services,$customer_id);
				$data_user = array();
				
				if($customer_id == '')
				{
					if(strstr($full_name," ")){ $name = explode(" ",$full_name); $firstname = $name[0]; $lastname = $name[1];}
					else {$firstname = $full_name; $lastname=""; }
					$data_user = array($firstname,$lastname,$email,'N','complex','C');
					
					$this->project_model->add_project($data_patient, $data_project, $data_user);
				}
				else
					$this->project_model->add_project($data_patient, $data_project, $data_user);
				
				
				$this->session->set_userdata('project_post','success');
				redirect(base_url().'dashboard');
		}
	}
	
	public function showServices(){
    
		$data = array();
	
		$query = $this->project_model->getAllServices();
		if ($query)
		{ 
			$data['records'] = $query;
	
		}
		return $data;

 	}


}
?>