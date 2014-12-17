<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logout extends CI_Controller {

    function index()
    {
	
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_type');
		$this->session->unset_userdata('user_email');
		$this->session->unset_userdata('fullname');
		$this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
 
?>