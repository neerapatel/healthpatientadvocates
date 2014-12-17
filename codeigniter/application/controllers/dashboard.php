<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
	}

	
	 
	public function index()
	{
		//load the session library
		$this->load->library('session');

		//if there is no session
		if (!$this->session->userdata('validEntry')) {
			//prompt users that there is no session
 			redirect(base_url());		
		
		}
		// else {
		
			//get the session[user_input]
			//$userinput = $this->session->userdata('validEntry');
			//$data["msg"] = $userinput;
			
			$projects = $this->dashboard_model->getProjects();
			    if($projects)	
				$data["projects"] = $projects;
				else
				$data["projects"] = array();
			
			$data['success'] = $this->session->userdata('project_post');
			$this->session->set_userdata('project_post','');
			
			$this->load->template("dashboard_view",$data);
			
		//}
	}
	
	// code to enlist all quotes from professionals and their reviews in relevant
	
	/*public function getBidders($project_id)
	{
			$bidders = $this->dashboard_model->getBidders($project_id);
			if($bidders)
			$data["bidders"] = $bidders;
			else
			$data["bidders"] = array();
	}*/
	
	// ajax call that can load all data for that professional
	

}
?>