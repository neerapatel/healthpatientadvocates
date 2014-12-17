<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login_Model extends CI_Model{

	function login($email,$password)
    {
		$this->db->where("email",$email);
        $this->db->where("password",$password);
            
        $query=$this->db->get("user");
        if($query->num_rows()>0)
        {
         	foreach($query->result() as $rows)
            {
				//add all data to session
                $newdata = array(
                	   	'user_id' 		=> $rows->user_id,
						'user_type'		=> $rows->user_type,
		                'user_email'    => $rows->email,
						'fullname'		=> $rows->firstname." ".$rows->lastname,
	                    'logged_in' 	=> TRUE,
                   );
			}
            
			
				$this->session->set_userdata("validEntry",$newdata);
                return true;            
		}
		return false;
    }
	
}
?>