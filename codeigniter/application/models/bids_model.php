<?php
/**
 * User_Model extends codeigniters base CI_Model to inherit all codeigniter magic!
 * @author Leon Revill
 * @package codeigniter.application.models
 */
class Bids_Model extends CI_Model
{

	/*
	* Class Methods
	*/

	public function getBiddersBids($project_id,$professional_id)
	{
	 //echo 'called';
		$project_id = base64_decode($project_id);
		$professional_id = base64_decode($professional_id);
	
		$where = array(
	   'project_id' => $project_id,
		 );

        $this->db->where($where);
        $query=$this->db->get("bid_detail");
		
		//echo $this->db->last_query();
		
				
        if($query->num_rows()>0)
        {
		   $flg = "0";
           foreach($query->result() as $row)
            {
               	//$reviews = $this->getAvgRate($rows->professional_id);
				
				//$selected_professional = $this->getSelected($rows->professional_id,$project_id);
				//if($selected_professional == "selected")
				//s$flg = 1;	
				
				$user_in_session = $this->session->userdata['validEntry']['user_id'];
				// check if user in session is creator of the project
				$check_user = $this->check_creator($user_in_session,$project_id);
				
				$professional_details = $this->professional_details($row->professional_id);
				
				$messages = $this->getMessages($project_id,$row->professional_id);
				
			    $bidders[] = array('project_id' => $project_id,
					 'first_name' => $professional_details['first_name'],
					 'last_name' => $professional_details['last_name'],
					 'newsletter' => $professional_details['newsletter'],
					 'email' => $professional_details['email'],
					 'timezone' =>$professional_details['timezone'],
					 'street_address' => $professional_details['street_address'],
					 'suite_apt' => $professional_details['suite_apt'],
					 'city' => $professional_details['city'],
					 'state' => $professional_details['state'],
					 'zipcode' => $professional_details['zipcode'],
					 'work_location' => $professional_details['work_location'], 
					 'service_radius_miles' => $professional_details['service_radius_miles'], 
					 'contact_no' => $professional_details['contact_no'],
					 'rate_per_hr' => $professional_details['rate_per_hr'],
					 'business_name' => $professional_details['business_name'],
					 'website' => $professional_details['website'],
					 'business_desc' => $professional_details['business_desc'],
					 'notification_type'  =>$professional_details['notification_type'],
					 'address_privacy' => $professional_details['address_privacy'],  
					 'service_id' => $professional_details['service_id'],
					 'bid_amount'=> $row->bid_amount,
					 'completion_days' => $row->completion_days,
					 'status_datetime' => $row->status_datetime,
					 'worktype' => $row->worktype,
					 'professional_id' => $row->professional_id,
					 'status' => $row->status,
					 'msgs' => $messages,
					 'is_owner' => $check_user
					 );
				
			}
			
			/*echo "<pre>";
			print_r($bidders);
			echo "</pre>";
			die("here");*/
			return $bidders;
		}
		return false;
	}
	
	public function professional_details($prof_id)
	{
		$sql_professional = "select professional_profile.*,professional_service_map.*,user.* from professional_profile,professional_service_map,user where professional_profile.professional_id = user.user_id and professional_profile.professional_id = professional_service_map.professional_id and professional_service_map.professional_id ='".$prof_id."' ";
		$query = $this->db->query($sql_professional); 
		//echo $sql_professional;
		if($query->num_rows()>0)
        {
            foreach($query->result() as $rows)
            {
				 $profdata = array('first_name' => $rows->firstname,
					 'last_name' => $rows->lastname,
					 'newsletter' => $rows->newsletter_sub,
					 'email' => $rows->email,
					 'timezone' =>$rows->timezone,
				 	 'street_address' => $rows->street_address,
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
			
			return $profdata;
		}

	return false;
	}
	
	
	public function getMessages($project_id,$prof_id)
	{		
	
		$user_in_session = $this->session->userdata['validEntry']['user_id'];
	
		$sql_msg = "select * from messages where project_id='".$project_id."' and (from_user_id ='".$user_in_session."' and  to_user_id = '".$prof_id."')  or (to_user_id ='".$user_in_session."' and  from_user_id = '".$prof_id."')  order by id asc";
		$query = $this->db->query($sql_msg); 
		
		//echo $sql_msg;
		if($query->num_rows()>0)
        {
            foreach($query->result() as $rows)
            {
				 $msgdata[] = array('user_id' => $rows->from_user_id,
					 'message' => $rows->message,
					 'message_datetime' => $rows->message_datetime,	
				 );
				 
			}
			
			return $msgdata;
		}

	return false;
	}

	
	public function updateHired($project_id,$professional_id)
	{
		$project_id = base64_decode($project_id);
		$professional_id = base64_decode($professional_id);
		$now = date("Y-m-d H:i:s");
		
		$qry_hired = "update bid_detail set status='Hired',status_datetime='".$now."' where project_id='".$project_id."' and  professional_id='".$professional_id."'";
		$query_hired = $this->db->query($qry_hired); 
		
		$qry_declined = "update bid_detail set status='Declined',status_datetime='".$now."' where project_id='".$project_id."' and  professional_id!='".$professional_id."'";
		$query_declined = $this->db->query($qry_declined); 
			
		// status project set in progresss
		$qry_in_progress_project = "update project set status='In Progress',in_progress_date='".$now."' where project_id='".$project_id."'";
		$query_in_progress_project = $this->db->query($qry_in_progress_project); 


		return true;
	}
	
	
	public function check_creator($user_in_session,$project_id)
	{
	
		$project_id = base64_decode($project_id);
	
		$where = array(
	   'project_id' => $project_id,
	   'customer_id' => $user_in_session,
		 );

        $this->db->where($where);
        $query=$this->db->get("project");
		
		//echo $this->db->last_query();
		
				
        if($query->num_rows()>0)
			return 'is_owner';
		else
			return 'not_owner';
		

	}
	
	public function updateDeclined($post)
	{
	
		$project_id = base64_decode($post['get_project_id']);
		$professional_id = base64_decode($post['get_prof_id']);
		$now = date("Y-m-d H:i:s");
		$declined_reason = serialize($post['decline_reason'])."|".$post['comments'];
		
		
		if(is_array($post['decline_reason']) && in_array("close_project",$post['decline_reason']))
		{
		
		// close project and decline all bids
			$qry_close_project = "update project set status='closed',closed_date='".$now."' where project_id='".$project_id."'";
			$query_close_project = $this->db->query($qry_close_project); 
			
			$qry_decline_all = "update bid_detail set status='Declined',status_datetime='".$now."',declined_reason='Project closed by Client' where project_id='".$project_id."'";
			$query_decline_all = $this->db->query($qry_decline_all); 
		}
		else
		{
			$qry_declined = "update bid_detail set status='Declined',status_datetime='".$now."',declined_reason='".$declined_reason."' where project_id='".$project_id."' and  professional_id='".$professional_id."'";
			$query_declined = $this->db->query($qry_declined);
		} 
	 return true;
	}
}

?>