<?php
/**
 * User_Model extends codeigniters base CI_Model to inherit all codeigniter magic!
 * @author Leon Revill
 * @package codeigniter.application.models
 */
class Register_Model extends CI_Model
{

	/*
	* Class Methods
	*/

	public function addUser($data_user)
	{
	
			$data = array(
				'firstname' => $data_user[0],
				'lastname' => $data_user[1],
				'email' => $data_user[2],
				'newsletter_sub' => $data_user[3],
				'password' => $data_user[4],
				'user_type' => $data_user[5]
			);


			if ($this->db->insert("user", $data)) {
				$id = $this->db->insert_id();
				
				
				//add all data to session
                $newdata = array(
                	   	'user_id' 		=> $id,
						'user_type'		=> $data_user[5],
		                'user_email'    => $data_user[2],
						'fullname'		=> $data_user[0]." ".$data_user[1],
	                    'logged_in' 	=> TRUE,
                   );
				 
				 
				 $this->session->set_userdata("validEntry",$newdata);

				   
				   
				return $id;
			}
		
		return false;
	}
	
	public function check_email_exist($email)
    {
		
        $this->db->where("email",$email);
        $query=$this->db->get("user");
        if($query->num_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

?>