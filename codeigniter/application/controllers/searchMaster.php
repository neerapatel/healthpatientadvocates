<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SearchMaster extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$query = $this->db->query("SELECT count(professional_id) pid_count,professional_id p_id,AVG(reviews) rating_avg FROM project_review group by professional_id order by pid_count desc limit 3"); //This query returns the top 3 professionals.             
		foreach($query->result() as $rows)
		{
			 echo($rows->pid_count."  ".$rows->p_id."   ".$rows->rating_avg."   <br/>");
			 //get the 
			 
			 $query1 = $this->db->query("select * from user where user_id=".$p_id);
			 foreach($query->result() as $rows)
			 {
				 $emailid = $rows->email;
				 echo $emailid."<br/>";
				 //call email function from here
			 }	
		}
		
	}
	
	function getLnt($zip){
		$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&sensor=false";
		$result_string = file_get_contents($url);
		$result = json_decode($result_string, true);
		$result1[]=$result['results'][0];
		$result2[]=$result1[0]['geometry'];
		$result3[]=$result2[0]['location'];
		return $result3[0];
   }
   
   function getPositionFromZip($zipcode=0)
   {
		$val = $this->getLnt($zipcode);
		echo "Latitude: ".$val['lat']."<br>";
		echo "Longitude: ".$val['lng']."<br>";
   }   
		
	
	
	

}
?>