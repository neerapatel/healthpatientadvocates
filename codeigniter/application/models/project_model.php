<?php
/**
 * User_Model extends codeigniters base CI_Model to inherit all codeigniter magic!
 * @author Leon Revill
 * @package codeigniter.application.models
 */
class Project_Model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function add_project($data_patient, $data_project,$data_user) {
	
	//print_r($data_user);
	//die("123");
		$now = date("Y-m-d H:i:s");
		
		if($data_project[1]=='')// customer not in session
		{
		
			$data_user = array($data_user[0],$data_user[1],$data_user[2],$data_user[3],$data_user[4],$data_user[5]);

			$login = new Register_Model();
			$data_project[1] = $login->addUser($data_user);
		
		}
		
		$this->db->trans_start();
	
	
		$sql_patient = "INSERT INTO `project_patient_details` (`patient_id`, `gender`, `age`, `problem_desc`, `advocate_help_desc`, `timings`, `notification_mode`, `call_directly`, `zipcode`, `full_name`,`email`,`phone`) VALUES ('', '".$data_patient[0]."', '".$data_patient[1]."', '".$data_patient[2]."', '".$data_patient[3]."', '".$data_patient[4]."', '".$data_patient[5]."', '".$data_patient[6]."', '".$data_patient[7]."', '".$data_patient[8]."', '".$data_patient[9]."', '".$data_patient[10]."')";
	
		$this->db->query($sql_patient); 
		$id_patient = $this->db->insert_id(); 
	
		$sql_project = "INSERT INTO `project` (`project_id`, `customer_id`, `patient_details_id`, `service_id`, `status`, `creation_date`) VALUES (NULL, '".$data_project[1]."', '".$id_patient."', '".$data_project[0]."', 'Open', '".$now."')"; 
		
		$this->db->query($sql_project);
		$this->db->trans_complete(); 
	
	
		$this->session->set_userdata("postdata","");
		return $this->db->insert_id(); 
	
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

	
}

?>