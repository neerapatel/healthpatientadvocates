<?php
/**
 * User_Model extends codeigniters base CI_Model to inherit all codeigniter magic!
 * @author Leon Revill
 * @package codeigniter.application.models
 */
class Account_Edit_Model extends CI_Model
{
	/*
	* Class Methods
	*/

	/**
	*	Commit method, this will comment the entire object to the database
	*/
	public function updateUser($data)
	{
	
		$datapost = array(
			'firstname' => $data[0],
			'lastname' => $data[1],
			'timezone' => $data[2],
			);
			if ($data[3] > 0) {
			
			//We have an ID so we need to update this object because it is not new
			if ($this->db->update("user", $datapost, array("user_id" => $data[3]))) {
				
				//echo $this->db->last_query();
				
				$newdata = array(
                	   	'user_id' 		=> $this->session->userdata['validEntry']['user_id'],
						'user_type'		=> $this->session->userdata['validEntry']['user_type'],
		                'user_email'    => $this->session->userdata['validEntry']['user_email'],
						'fullname'		=> $data[0]." ".$data[1],
	                    'logged_in' 	=> TRUE,
                   );
				   
				$this->session->set_userdata("validEntry",$newdata);

				return true;
			}
		}
	}
	
}

?>