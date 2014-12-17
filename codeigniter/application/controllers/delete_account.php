<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete_Account extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('delete_account_model');
	}

	
	 
	public function index()
	{
		//load the session library
		$this->load->library('session');
		
		
		if (!$this->session->userdata('validEntry')) {
			//prompt users that there is no session
			 redirect(base_url());
		
		} else {
		
			//get the session[user_input]
			$userinput = $this->session->userdata('validEntry');
			$data["msg"] = $userinput;
		
			// load form validation library
			$this->load->library('form_validation');
			
			$this->load->template("delete_account_view",$data);
			}
	}

	public function deleteAccount()
	{
	
		$delaccount = $this->input->post('delaccount');
		$delreason = $this->input->post('deactivation_reason');
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		
		$this->form_validation->set_rules('delaccount', 'delaccount', 'trim|required|xss_clean');
		
		$this->form_validation->set_message('required', 'Please confirm you want to delete this account.');

		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		
		}
		else
		{
			
			$data = array($delaccount,$delreason);
			// adding user to database
			$this->delete_account_model->deleteAccount($data);
			
		
			redirect(base_url());
		}
	}
	
	

	
}
?>