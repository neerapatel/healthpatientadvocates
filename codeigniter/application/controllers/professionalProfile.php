<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProfessionalProfile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('project_model');
		//$this->load->model('register_model');
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
			$data["postdata"]['services'] = $postdata;
			
			
			$this->load->library('form_validation');
			$this->load->template("professional_profile_view",$data);

	}
	
	
	public function showServices(){
    
		$data = array();
		$objProject = new Project_Model;
		$query = $objProject->getAllServices();
		if ($query)
		{ 
			$data['records'] = $query;
	
		}
		return $data;

 	}

	
}
?>