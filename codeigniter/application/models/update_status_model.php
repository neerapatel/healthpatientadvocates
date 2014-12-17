<?php
/**
 * User_Model extends codeigniters base CI_Model to inherit all codeigniter magic!
 * @author Leon Revill
 * @package codeigniter.application.models
 */
class Update_Status_Model extends CI_Model
{
	

	public function update_status($data)
	{
	    	$project_id = $data[1];
			$data = array(
				'cancellation_reason' => $data[0],
				'cancellation_date' =>  date('Y-m-d h:i:s'),
			);
			if ($this->db->update("project", $data, array("project_id" => $project_id))) 
			{
				//echo $this->db->last_query();
				
				return true;
			}
		
		return false;
	}
	
	
	public function getReasons(){
		$this->db->select('id,reason');
		$q = $this->db->get('project_cancellation_reasons');
	
		if ($q->num_rows() > 0){
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}

}

?>