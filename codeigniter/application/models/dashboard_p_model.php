<?php
/**
 * User_Model extends codeigniters base CI_Model to inherit all codeigniter magic!
 * @author Leon Revill
 * @package codeigniter.application.models
 */
class Dashboard_P_Model extends CI_Model
{
	
    public function getProfessionalProjects($professional_id)
    {
	    $this->db->where("professional_id",$professional_id);
        $query=$this->db->get("professional_notification");
		$projectdataArr = array();
		
		if($query->num_rows()>0)
        { 
           foreach($query->result() as $rows)
            {
                $projectdataArr[] = $this->getProjectData($rows->project_id);
			}
        }
      return $projectdataArr;
    }
	
	private function getProjectData($project_id)
	{
	 	
		$sql_project = "select * from project where project_id=".$project_id;
		$query=$this->db->query($sql_project); 
		
		if($query->num_rows()>0)
        {
            foreach($query->result() as $rows)
            {
				 $projectdata = array(
                	   	'project_id' 		=> $rows->project_id,
						'customer_id'		=> $rows->customer_id,
		                'patient_details_id'    => $rows->patient_details_id,
						'service_id' 		=> $rows->service_id,
						'status'		=> $rows->status,
		                'creation_date'    => $rows->creation_date,
						'in_progress_date' 		=> $rows->in_progress_date,
						'closed_date'		=> $rows->cancellation_date,
		                'creation_date'    => $rows->creation_date,
		                'creation_date'    => $rows->creation_date,
		                'cancellation_reason'    => $rows->cancellation_reason,
	              
                   );
				   
			}
			
			return $projectdata;
		}

	}
	public function getCreditBal($professional_id)
	{
		$sql_credit_bal = "select * from professional_credit_bal where professional_id=".$professional_id;
		$query=$this->db->query($sql_credit_bal); 
		if($query->num_rows()>0)
        {
            foreach($query->result() as $rows)
            {
				 $creditBalance =  $rows->balance;
			}
			return $creditBalance;
		}
		return 0;
	}
	//This method will be used during sending quotation
	public function updateTransactionBalforProject($creditCount,$professional_id,$transaction_type,$project_id)
	{
		$now = date("Y-m-d H:i:s");
		$data = array(
				'professional_id' => $professional_id,
				'credit_count' => $creditCount,
				'project_id' => $project_id,
				'buy_use_date' => $now,
				'transaction_type' => $transaction_type,
			);
			$this->db->insert("professional_credit_transactions", $data); 
			$this->updateCreditBal($professional_id,$creditCount);
		
	}
	
	//This method is used during credit purchase
	public function updateTransactionBal($professional_id, $creditCount,$paidAmount,$date,$transaction_type, $paypaltransid)//updateTransactionBal($creditCount,$professional_id,$transaction_type,$amount)
	{
		$now = date("Y-m-d H:i:s");
		$data = array(
				'professional_id' => $professional_id,
				'credit_count' => $creditCount,
				'project_id' => "",
				'buy_use_date' => $now,
				'transaction_type' => $transaction_type,
				'amount' =>$paidAmount,
				'paypal_trans_id' =>$paypaltransid,

			);
			$this->db->insert("professional_credit_transactions", $data); 
			$this->updateCreditBal($professional_id,$creditCount);
		
	}
	
	private function updateCreditBal($professional_id,$creditCount)
	{
		
		$currentCreditBal = $this->getCreditBal($professional_id);
		if($currentCreditBal == 0) //First time credit purchase
		{
			$data = array(
					'balance' => $creditCount,
					'professional_id' => $professional_id
			);
			$this->db->insert('professional_credit_bal',$data);
		
		}else{
			$totalBal=$currentCreditBal+$creditCount;
			$data = array(
					'balance' => $totalBal
			);
			$this->db->where('professional_id',$professional_id);
			$this->db->update('professional_credit_bal',$data);
		
		}
		
	}
	
	public function submitQuote($workType,$bidamount,$days,$project_id,$professional_id,$message)
	{
		$now = date("Y-m-d H:i:s");
		$data_bid_detail = array(
				'project_id' => $project_id,
				'professional_id' => $professional_id,
				'bid_amount' => $bidamount,
				'completion_days' => $days,
				'status_datetime' => $now,
				'worktype' => $workType,
				'status' => "Submitted"
			);
			$this->db->insert("bid_detail", $data_bid_detail); 
	
			$data_msg = array(
				'project_id' => $project_id,
				'user_id' => $professional_id,
				'message' => $bidamount,
				'message_datetime' => $now,
			);
			$this->db->insert("messages", $data_msg); 
	
	}
	
	
	public function getBidDetail($projects,$professional_id)
	{
		$bidDetailArr = array();
		//echo "<pre>";
		//print_r($projects);
		//echo "<pre>";
		//die("hee");
		
		
		if(count($projects)>0)
		{
			foreach($projects as $proj)
			{
				$p_id = $proj['project_id'];
				$sql_bid_detail = "select * from bid_detail where project_id=".$p_id." and professional_id=".$professional_id;
				
				$query = $this->db->query($sql_bid_detail); 
				
				
				if($query->num_rows()>0)
				{
					foreach($query->result() as $rows)
					{
					 $data = array(
							'project_id' => $rows->project_id,
							'professional_id' => $rows->professional_id,
							'bidamount' => $rows->bid_amount,
							'completion_days' => $rows->completion_days,
							'status' => $rows->status,
							'status_datetime' => $rows->status_datetime,
						);
						
						$bidDetailArr[]=$data;

					}
					
				}
							

			}
			
			return $bidDetailArr; 
		}
		else
		return false;
	}
	
	public function formatResult($projects,$bid_details){
		
		$fomatResult = array();
		//print_r($bid_details);
		if(count($bid_details) > 0) {
			for($i=0;$i<count($projects);$i++){
				for($j=0;$j<count($bid_details);$j++){
					if($projects[$i]['project_id'] == $bid_details[$j]['project_id']){
						$displayArr = array(
							'project_id' => $projects[$i]['project_id'],
							'project_status' => $bid_details[$j]['status'],
						);
						$fomatResult[] = $displayArr;
					}
				}	
			}
		}
		return $fomatResult;
	}
     
	    //Paypal integration functions
        function paypalConfig(){
            if (session_status() == PHP_SESSION_NONE) { session_start(); } //PHP >= 5.4.0
            define('PayPalMode','sandbox'); // sandbox or live
            define('PayPalApiUsername','customerservice-facilitator_api1.mydochub.com'); //PayPal API Username
            define('PayPalApiPassword','D3T2DGSB5LT9HFWX'); //Paypal API password
            define('PayPalApiSignature','AFcWxV21C7fd0v3bYYYRCpSSRl31AniDBvBLkyiHtZOxdA9XGFYKpiGM'); //Paypal API Signature
            define('PayPalCurrencyCode','USD'); //Paypal Currency Code
            define('PayPalReturnURL',''.base_url().'paypal/paypalReturnResponse'); //Point to process.php page
			define('PayPalCancelURL',''.base_url().'paypal/cancelPaypalRequest');
			           /*$PayPalMode 			= 'sandbox'; // sandbox or live
            $PayPalApiUsername 		= 'neerajkumar.patel-facilitator_api1.gmail.com'; //PayPal API Username
            $PayPalApiPassword 		= 'WSJ7NVJT55VURD7H'; //Paypal API password
            $PayPalApiSignature 	= 'A8UhElu5T1P49IvvZYLyyhStfdl0ApErzf-WzMx5LZ8eKbjOHtorXXbh'; //Paypal API Signature
            $PayPalCurrencyCode 	= 'USD'; //Paypal Currency Code
            $PayPalReturnURL 		= 'http://localhost:84/paypal1/process.php'; //Point to process.php page
            $PayPalCancelURL 		= 'http://localhost:84/paypal1/cancel_url.php'; //Cancel URL if user clicks cancel
*/
        }
        
        function PPHttpPost($methodName_, $nvpStr_, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode) {
			
                      //  $this->paypalConfig();
                        // Set up your API credentials, PayPal end point, and API version.
			$API_UserName = urlencode($PayPalApiUsername);
			$API_Password = urlencode($PayPalApiPassword);
			$API_Signature = urlencode($PayPalApiSignature);
			
			$paypalmode = ($PayPalMode=='sandbox') ? '.sandbox' : '';
	
			$API_Endpoint = "https://api-3t".$paypalmode.".paypal.com/nvp";
			$version = urlencode('109.0');
		
			// Set the curl parameters.
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
			curl_setopt($ch, CURLOPT_VERBOSE, 1);
		
			// Turn off the server and peer verification (TrustManager Concept).
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
		
			// Set the API operation, version, and API signature in the request.
			$nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";
		
			// Set the request as a POST FIELD for curl.
			curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
		
			// Get response from the server.
			$httpResponse = curl_exec($ch);
		
			if(!$httpResponse) {
				exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
			}
		
			// Extract the response details.
			$httpResponseAr = explode("&", $httpResponse);
		
			$httpParsedResponseAr = array();
			foreach ($httpResponseAr as $i => $value) {
				$tmpAr = explode("=", $value);
				if(sizeof($tmpAr) > 1) {
					$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
				}
			}
		
			if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
				exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
			}
		
		return $httpParsedResponseAr;
	}
	
	
	function savePaypalTransaction($buyerName,$buyerEmail,$transactionID,$ItemName,$ItemNumber, $ItemTotalPrice,$ItemQTY,$ItemDesc)							
	{
		$now = date('Y-m-d H:i:s');
		$professional_id = $this->session->userdata['validEntry']['user_id'];

		$insert_row = $this->db->query("INSERT INTO paypal_buyer 
							(BuyerName,BuyerEmail,TransactionID,ItemName,ItemNumber, ItemAmount,ItemQTY,TransactionDatetime,ItemDesc)
							VALUES ('".$buyerName."','".$buyerEmail."','".$transactionID."','".$ItemName."','".$ItemNumber."', '".$ItemTotalPrice."','".$ItemQTY."','".$now."','".$ItemDesc."')");
		$paypal_ref_id = $this->db->insert_id(); 
	
		
		if($insert_row){
		
				
					$professional_id = $this->session->userdata['validEntry']['user_id'];
					$creditCount = $ItemNumber;
					$paidAmount = $ItemTotalPrice;
					$date = date('Y-m-d H:i:s');
					$paypaltransid =$paypal_ref_id;
					$transaction_type = 'buy';
					
					$this->updateTransactionBal($professional_id, $creditCount,$paidAmount,$date,$transaction_type, $paypaltransid);
					
				
		
				return true;//print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
		}else{
				return false;
		}
	}
}


?>