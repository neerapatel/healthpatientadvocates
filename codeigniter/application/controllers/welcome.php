<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('welcome_model');
	}


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
	public function index()
	{
		
				//load the session library
		$this->load->library('session');

		$services = $this->showServices();
		$data['records'] = $services;
		
		$this->load->template('welcome_message',$data);

	}
	
	public function getdata()
	{
			//add all data to session
			$newdata = $_POST;
			$this->session->set_userdata("postdata",$newdata);
		
			echo true;
		//if there is no session
		//if (!$this->session->userdata('validEntry')) {
			
			//echo false;
			//prompt users that there is no session
 			//redirect(base_url()."login");		
		
		//} else {
			//echo true;
			//redirect(base_url()."postproject");

		//}
	}
	
		public function showServices(){
    
		$data = array();
	
		$query = $this->welcome_model->getAllServices();
		if ($query)
		{ 
			$data['records'] = $query;
	
		}
		return $data;

 	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

?>