<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bids extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('bids_model');
	}

	
	 
	public function index($project_id=0,$professional_id=0)
	{
		//load the session library
		$this->load->library('session');

		//if there is no session
		if (!$this->session->userdata('validEntry')) {
			//prompt users that there is no session
 			redirect(base_url());		
		
		}
		$data['project_id'] = $project_id;

		$bidders = $this->bids_model->getBiddersBids($project_id,$professional_id);
		if($bidders)	
		$data["bidders"] = $bidders;
		else
		$data["bidders"] = array();
			
		$this->load->template("bid_view",$data);
			
	}
	
	public function getQuoteInfo($user,$project)
	{
	
		$msg = $this->bids_model->getQuoteDetails($user,$project);
		return $msg;
	}	
	
	public function hire($project_id=0,$professional_id=0)
	{
		$this->bids_model->updateHired($project_id,$professional_id);
		echo "success";
	}
	
	public function decline()
	{
		/*echo "<pre>";
		print_r($_POST);
		echo "</pre>";*/
		$this->bids_model->updateDeclined($_POST);
		echo 'true';

		
	}

}
?>