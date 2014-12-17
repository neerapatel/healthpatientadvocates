<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Delete_Account_Model extends CI_Model{
	
	function deleteAccount($data)
    {
            	$user_id = $this->session->userdata["validEntry"]['user_id'];
				
				$datapost = array(
					'Status' => $data[0],
					'deactivation_reason' => $data[1],
					);

             
				if ($this->db->update("user", $datapost, array("user_id" => $user_id))) {

				$this->logout();
				
				return true;
				}
	return false;            
    }
	
	function logout()
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