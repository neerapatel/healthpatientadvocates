<?php
/**
 * User_Model extends codeigniters base CI_Model to inherit all codeigniter magic!
 * @author Leon Revill
 * @package codeigniter.application.models
 */
class Welcome_Model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
	public function getAllServices(){
		$this->db->select('service_id,service_name');
		$q = $this->db->get('advocate_services');
	
		if ($q->num_rows() > 0){
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}

	public function	add_records($data_user, $data_professional_profile, $data_professional_service_map) {
	
		$this->db->trans_start();
		
		// insering data into user
		
			$data_user = array($data_user[2],$data_user[3],$data_user[0],'N',md5($data_user[1]),$data_user[4]);


			$login = new Register_Model();
			$ins_user_id = $login->addUser($data_user);
		
		//inserting into professional_profile
		
	
	
		$sql_professional_profile = "INSERT INTO `professional_profile` (`id`, `professional_id`, `street_address`, `suite_apt`, `city`, `state`, `zipcode`, `work_location`, `service_radius_miles`, `contact_no`, `rate_per_hr`, `business_name`, `website`, `business_desc`, `notification_type`, `address_privacy`) VALUES (NULL, '".$ins_user_id."', '".$data_professional_profile[0]."', '".$data_professional_profile[1]."', '".$data_professional_profile[2]."', '".$data_professional_profile[3]."', '".$data_professional_profile[4]."', '".$data_professional_profile[5]."', '".$data_professional_profile[6]."', '".$data_professional_profile[7]."', '".$data_professional_profile[8]."', '".$data_professional_profile[9]."', '".$data_professional_profile[10]."', '".$data_professional_profile[11]."', '".$data_professional_profile[12]."', '".$data_professional_profile[13]."');";
	
		$this->db->query($sql_professional_profile); 
	
	
	//print_r($data_professional_service_map);
		if(count($data_professional_service_map[0])>1)
		$service_ids = implode(",",$data_professional_service_map[0]);
		else
		$service_ids = $data_professional_service_map[0];
		
		$sql_professional_services_map = "INSERT INTO `professional_service_map` (`Id`, `professional_id`, `service_id`) VALUES (NULL, '".$ins_user_id."', '".$service_ids."')"; 
		
		$this->db->query($sql_professional_services_map);
		
		$this->db->trans_complete(); 
	
	
		/*$this->session->set_userdata("postdata","");
		$this->session->set_userdata("location","");
		$this->session->set_userdata("business","");
		$this->session->set_userdata("business_desc","");
		$this->session->set_userdata("contact_business","");
		 
		*/
		return $this->db->insert_id();
	
	}

}

?>