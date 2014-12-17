<?php
class Password_Model extends CI_Model
{


	public function updatePass($data)
	{
		$datapost = array(
			'password' => md5($data[0]),
			);
			if ($data[1] > 0) {
				//We have an ID so we need to update this object because it is not new
				$update =  $this->db->update("user", $datapost, array("user_id" => $data[1]));
				//echo $this->db->last_query();

				if ($update) {
				
				return true;
				}
			}
	//return false;
	}
	
	public function validPass($email, $pass)
	{
	
			$this->db->where("email",$email);
			$this->db->where("password",$pass);
				
			$query=$this->db->get("user");
			if($query->num_rows()>0)
			{
			return true;
			
			}
			return false;

	}
	
	public function getPass($email)
	{
	
			$this->db->where("email",$email);
			$this->db->where("password","complex");
				
			$query=$this->db->get("user");
			if($query->num_rows()>0)
			{
			return true;
			
			}
			return false;

	}
	
}

?>