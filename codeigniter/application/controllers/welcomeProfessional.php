<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WelcomeProfessional extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('welcome_model');
		$this->load->model('register_model');
	}


	public function index()
	{
		
		//$this->load->templatepro('welcome_message_p');
		$objServices = new Welcome_Model();

		$services = $objServices->getAllServices();
		if ($services)
		{ 
			$records['records'] = $services;
	
		}
		$data['records'] = $records;
		//print_r($data['records']);
		$this->load->templatepro('welcome_message_p',$data);


	}
	
	public function addServicesIndex()
	{
			$newdata = $_POST['services'];
			$this->session->set_userdata("postdata",$newdata);
			echo 'true';
	}		
	
	public function addLocation()
	{
			//$newdata = $_POST['services'];
			//$this->session->set_userdata("postdata",$newdata);
			
			$this->load->templatepro('professional_location_view');

	}
	
	public function addSessLocation()
	{
			$newdata = $_POST;
			$this->session->set_userdata("location",$newdata);
			
			echo 'true';

	}
	
	
	public function addWhereBusiness()
	{
	
				$this->load->templatepro('professional_business_view');

	}
	
	public function addSessBusiness()
	{
	
			$newdata = $_POST;
			$this->session->set_userdata("business",$newdata);
			
			echo 'true';

	}
	
	public function descBusiness()
	{
	
			$this->load->templatepro('professional_desc_business_view');

	}
	
	public function addSessDescBusiness()
	{
	
			$newdata = $_POST;
			$this->session->set_userdata("business_desc",$newdata);
			
			echo 'true';

	}
	
	
	public function contactBusiness()
	{
	
			$this->load->templatepro('professional_contact_business_view');

	}
	
	public function addSessContactBusiness()
	{
	
			$newdata = $_POST;
			$this->session->set_userdata("contact_business",$newdata);
			//data will be added to db here
			
			$session_data_services = $this->session->userdata('postdata');

			$session_data_location = $this->session->userdata('location');

			$session_data_business = $this->session->userdata('business');
			
			$session_data_business_desc = $this->session->userdata('business_desc');
			
			$session_data_contact_business = $this->session->userdata('contact_business');


			//echo "<pre>";
			//print_r($session_data_services);
			//echo "<pre>";


			//echo "<pre>";
			//print_r($session_data_location);
			//echo "<pre>";
			
			//echo "<pre>";
			//print_r($session_data_business);
			//echo "<pre>";
			
			//echo "<pre>";
			//print_r($session_data_business_desc);
			//echo "<pre>";
			
			//echo "<pre>";
			//print_r($session_data_contact_business);
			//echo "<pre>";

			$email = $session_data_contact_business['email'];
			if(isset($session_data_contact_business['password']))
				$password = $session_data_contact_business['password'];
			else
				$password = 'complex';
			$first_name =$session_data_contact_business['first_name'];
			$last_name = $session_data_contact_business['last_name'];
			$user_type = 'P';
			
			$data_user = array($email,$password,$first_name,$last_name,$user_type);
			
			
			$street_address = $session_data_location['street'];
			$suite_apt = $session_data_location['suite'];
			$city = $session_data_location['city'];
			$state = $session_data_location['state'];
			$zipcode = $session_data_location['zipcode'];
			
			if(count($session_data_business['wbusiness'])>1)
			$work_location = implode(",",$session_data_business['wbusiness']);
			else
			$work_location = $session_data_business['wbusiness'];
			
			
			if(isset($session_data_business['service_radius_miles']))
			$service_radius_miles = $session_data_business['service_radius_miles'];
			else
			$service_radius_miles =0;
			
			$contact_no = $session_data_contact_business['phone_no'];
			$rate_per_hr = 0;
			$business_name = $session_data_business_desc['business_name'];
			$website = $session_data_business_desc['website'];
			$business_desc = $session_data_business_desc['desciption'];
			
			
			if(isset($session_data_location['notify']))
			$notification_type = 'both';
			else
			$notification_type = 'email';
			
			$address_privacy = $session_data_location['privacy'];
			
			
			$data_professional_profile = array($street_address,$suite_apt,$city,$state,$zipcode,$work_location,$service_radius_miles,$contact_no,$rate_per_hr,$business_name,$website,$business_desc,$notification_type,$address_privacy);
			
			
			$services = $session_data_services;
			$data_professional_service_map = array($services);

			$objServices = new Welcome_Model();

			$objServices->add_records($data_user, $data_professional_profile, $data_professional_service_map);

			//die("here");
			
			echo 'true';

	}
	
	
	/*public function loadProfilePage()
	{
			$this->load->library('form_validation');

			$this->load->templatepro('professional_profile_view');
	}*/
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

?>