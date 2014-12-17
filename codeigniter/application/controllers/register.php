<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('register_model');
	}

	
	 
	public function index()
	{
		//load the session library
		$this->load->library('session');
		
		// load form validation library
		$this->load->library('form_validation');
		
		$this->load->template("register_view");
	}

	public function registerUser()
	{
	
		$firstname = $_POST['firstname'];
		$lastname = $_REQUEST['lastname'];
		$email = $_REQUEST['email'];
		$newsletter = $_REQUEST['newsletter'];
		$password = md5($_REQUEST['password']);
		$user_type = $_POST['user_type'];
		
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		
		$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|xss_clean');
		$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|matches[passconf]|min_length[6]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|is_unique[user.email]');

		$this->form_validation->set_message('is_unique', 'Email Already exists in records.');
		
		if ($this->form_validation->run() == FALSE)
		{
			//$data = array("error" => "Registration error","error1" => "Registration error1");
			$this->index();
		
		}
		else
		{
			
			/*$this->register_model->setFirstname($firstname);
			$this->register_model->setLastname($lastname);
			$this->register_model->setEmail($email);
			$this->register_model->setNewsletter($newsletter);
			$this->register_model->setPassword($password);
			$this->register_model->setUserType($user_type);
			*/
			$data_user = array($firstname,$lastname,$email,$newsletter,$password,$user_type);

			// adding user to database
			$this->register_model->addUser($data_user);
			if($user_type == 'C')		
				redirect(base_url().'dashboard');
			else
				redirect(base_url().'dashboardProfessional');
		}
	}
	
	public function check_email()
	{
		$email=$this->input->post('email');
        $result=$this->register_model->check_email_exist($email);
        if($result)
        {
			echo "false";
			
        }
        else{
			
			echo "true";
        }
	}
	
	public function validate_email()
	{
		$email=$this->input->post('email');
        $result=$this->register_model->check_email_exist($email);
        if($result)
        {
			echo "true";
			
        }
        else{
			
			echo "false";
        }
	}

	
}
?>