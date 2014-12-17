<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('bids_model');
	}

	
	 
	public function index()
	{
		//load the session library
		$this->load->library('session');

		$this->load->template("signup_view");
			
	}
	
	
}
?>