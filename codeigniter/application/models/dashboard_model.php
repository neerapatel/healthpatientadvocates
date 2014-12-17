<?php
/**
 * User_Model extends codeigniters base CI_Model to inherit all codeigniter magic!
 * @author Leon Revill
 * @package codeigniter.application.models
 */
class Dashboard_Model extends CI_Model
{
	
	public function getProjects()
    {
		//if there is no session
		if (!$this->session->userdata('validEntry')) {
			//prompt users that there is no session
 			redirect(base_url());		
		}
		$this->load->library('encrypt');
		
		
		$user_id = $this->session->userdata["validEntry"]['user_id'];

		$where = array(
				   'customer_id' => $user_id,
				   "status"=>'open'
				  );

        $this->db->where($where);
        $query=$this->db->get("project");
		
        if($query->num_rows()>0)
        {
           foreach($query->result() as $rows)
            {
                $projectdata[] = array(
                	   	'services' 		=> $this->showService($rows->service_id),
						'creation_date'		=> $rows->creation_date,
						'project_id'		=> rtrim(base64_encode($rows->project_id),'='),//$this->encrypt->encrypt($rows->project_id),
                  		'bidders'  =>	$this->getBidders($rows->project_id),
				   );
			}
            return $projectdata;
        }
        else
        {
            return false;
        }
    }
	
	public function showService($service_ids)
	{
	   
		if(strstr($service_ids,","))
		$services = str_replace(",","','",$service_ids);
		else
		$services = $service_ids;
		
		$sql_services = "select service_name from advocate_services where service_id in ('".$services."')";
		$query=$this->db->query($sql_services); 
		if($query->num_rows()>0)
        {
           foreach($query->result() as $rows)
            {
				$servicedata[] = $rows->service_name;
			}
			
			return implode("<br/>",$servicedata);
		}

	}
	
	public function getBidders($project_id)
	{
		$where = array(
			   'project_id' => $project_id,
			     );

        $this->db->where($where);
        $query=$this->db->get("bid_detail");
		
		
        if($query->num_rows()>0)
        {
		$flg = "0";
           foreach($query->result() as $rows)
            {
               	$reviews = $this->getAvgRate($rows->professional_id);
				$professional_details = $this->professional_details($rows->professional_id,"business_name");
				
				$selected_professional = $this->getSelected($rows->professional_id,$project_id);
				if($selected_professional == "selected")
				$flg = 1;	
				
				$professional_details = $this->professional_details($rows->professional_id);
				//print_r($professional_details);
				//echo $professional_details['business_name'];
				
			    $bidders[] = rtrim(base64_encode($rows->project_id),'=')."*".rtrim(base64_encode($rows->professional_id),'=')."*".$rows->professional_id."*".$reviews."*".$selected_professional."*".$flg."*".$professional_details['business_name'];
				
				// encrypted project_id*ebcrypted professional_id*professional_id*reviews*selected professional*flag (1=ongoing,0=open)
			}
            return implode("|",$bidders);
        }
        else
        {
            return false;
        }

	
	}
	
	
	
	
	
	public function professional_details($prof_id)
	{
		$sql_professional = "select professional_profile.*,professional_service_map.* from professional_profile,professional_service_map where professional_profile.professional_id = professional_service_map.professional_id and professional_service_map.professional_id ='".$prof_id."' ";
		$query = $this->db->query($sql_professional); 
		
		if($query->num_rows()>0)
        {
            foreach($query->result() as $rows)
            {
				 $projectdata = array('street_address' => $rows->street_address,
					 'suite_apt' => $rows->suite_apt,
					 'city' => $rows->city,
					 'state' => $rows->state,
					 'zipcode' => $rows->zipcode,
					 'work_location' => $rows->work_location, 
					 'service_radius_miles' => $rows->service_radius_miles, 
					 'contact_no' => $rows->contact_no,
					 'rate_per_hr' => $rows->rate_per_hr,
					 'business_name' => $rows->business_name,
					 'website' => $rows->website,
					 'business_desc' => $rows->business_desc,
					 'notification_type'  =>$rows->notification_type,
					 'address_privacy' => $rows->address_privacy,  
					 'service_id' => $rows->service_id,				 
				 );
				 
			}
			
			return $projectdata;
		}

	return false;
	}
	
	
	public function getSelected($professional_id,$project_id)
	{
		
		$where = array(
			   'professional_id' => $professional_id,
			   'project_id' => $project_id,
			   'status' => 'Accepted',
			     );

        $this->db->where($where);
        $query=$this->db->get("bid_detail");
		
        if($query->num_rows()>0)
        {
            return "selected";
        }
        else
        {
            return "ok";
        }

	}
		public function getAvgRate($professional_id)
		{
		
		$where = array(
			   'professional_id' => $professional_id,
			     );

        $this->db->where($where);
        $query=$this->db->get("project_review");
		
		$reviews = 0;
        if($query->num_rows()>0)
        {
		
			$count_reviews = $query->num_rows();
            foreach($query->result() as $rows)
            {
               	$reviews += $rows->reviews;
			}
            return $reviews/$count_reviews;
        }
        else
        {
            return 0;
        }
	
	
	}
	
}

?>