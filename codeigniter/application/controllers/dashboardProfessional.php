<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DashboardProfessional extends CI_Controller {

    public $professional_id;
    public $projects;
    public $creditBal;

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('dashboard_p_model');
    }

    public function index() {
        //load the session library
       
        if (!$this->session->userdata('validEntry')) {
            redirect(base_url());
        } else {
            //get the session[user_input]
            $professional_id = $this->session->userdata['validEntry']['user_id'];
            $projects = $this->dashboard_p_model->getProfessionalProjects($professional_id);

            $userinput = $this->session->userdata('validEntry');

            $creditBal = $this->dashboard_p_model->getCreditBal($professional_id);
            $data["msg"] = $userinput;
            $data['professional_id'] = $professional_id;

            if (count($projects) > 0) { //todo some change here,condition should be >0()
                $data["projects"] = $projects;
                $data["creditBal"] = $creditBal;

                $bid_details = $this->dashboard_p_model->getBidDetail($projects, $professional_id);
                if ($bid_details) {
                    $data['bid_details'] = $bid_details;
                    $data['projects'] = $projects;

                    $fomatResult = $this->dashboard_p_model->formatResult($projects, $bid_details);
                    $data['fomatResult'] = $fomatResult;
                }
                $data['creditBal'] = $this->dashboard_p_model->getCreditBal($professional_id);
            } else {
                $data['errorMsg'] = "No Project found:::";
                $data["projects"] = array();
                $data["creditBal"] = $creditBal;
            }
            $this->load->template("dashboard_view_p", $data);
        }
    }

    public function creditPurchase() {

        if (!$this->session->userdata('validEntry')) {
            redirect(base_url());
        } else {
            //get the session[user_input]
            $userinput = $this->session->userdata('validEntry');
            $data["msg"] = $userinput;
            $professional_id = $this->session->userdata['validEntry']['user_id'];
            $data['creditBal'] = $this->dashboard_p_model->getCreditBal($professional_id);
            $this->load->template("credit_purchase_view", $data);
        }
    }

    public function paypalRequest() {
        /*echo 'inside paypalRequest';
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";*/
        $this->dashboard_p_model->paypalConfig();
        if ($_POST) {
            $ItemName = $_POST["itemname"]; //Item Name
            $ItemPrice = $_POST["itemprice"]; //Item Price
            $ItemNumber = $_POST["itemnumber"]; //Item Number
            $ItemDesc = $_POST["itemdesc"]; //Item Number
            //$ItemQty = $_POST["itemQty"]; // Item Quantity
            $ItemQty = 1;
            //$ItemTotalPrice = ($ItemPrice * $ItemQty); //(Item Price x Quantity = Total) Get total amount of product; 
            $ItemTotalPrice = $ItemPrice;
            //call the paypal API 

            $GrandTotal = $ItemTotalPrice;
            $TotalTaxAmount = 0;
            $ShippinCost = 0;
            $HandalingCost = 0;
            $ShippinDiscount = 0;
            $InsuranceCost = 0;

            //Parameters for SetExpressCheckout, which will be sent to PayPal
            $padata = '&METHOD=SetExpressCheckout' .
                    '&RETURNURL=' . urlencode(PayPalReturnURL) .
                    '&CANCELURL=' . urlencode(PayPalCancelURL) .
                    '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .
                    '&L_PAYMENTREQUEST_0_NAME0=' . urlencode($ItemName) .
                    '&L_PAYMENTREQUEST_0_NUMBER0=' . urlencode($ItemNumber) .
                    '&L_PAYMENTREQUEST_0_DESC0=' . urlencode($ItemDesc) .
                    '&L_PAYMENTREQUEST_0_AMT0=' . urlencode($ItemPrice) .
                    '&L_PAYMENTREQUEST_0_QTY0=' . urlencode($ItemQty) .
                    '&NOSHIPPING=0' . //set 1 to hide buyer's shipping address, in-case products that does not require shipping

                    '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) .
                    '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($TotalTaxAmount) .
                    '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($ShippinCost) .
                    '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode($HandalingCost) .
                    '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode($ShippinDiscount) .
                    '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode($InsuranceCost) .
                    '&PAYMENTREQUEST_0_AMT=' . urlencode($GrandTotal) .
                    '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode(PayPalCurrencyCode) .
                    '&LOCALECODE=GB' . //PayPal pages to match the language on your website.
                    '&LOGOIMG=http://www.sanwebe.com/wp-content/themes/sanwebe/img/logo.png' . //site logo
                    '&CARTBORDERCOLOR=FFFFFF' . //border color of cart
                    '&ALLOWNOTE=1';
            ############# set session variable we need later for "DoExpressCheckoutPayment" #######
            $_SESSION['ItemName'] = $ItemName; //Item Name
            $_SESSION['ItemPrice'] = $ItemPrice; //Item Price
            $_SESSION['ItemNumber'] = $ItemNumber; //Item Number
            $_SESSION['ItemDesc'] = $ItemDesc; //Item Number
            $_SESSION['ItemQty'] = $ItemQty; // Item Quantity
            $_SESSION['ItemTotalPrice'] = $ItemTotalPrice; //(Item Price x Quantity = Total) Get total amount of product; 
            $_SESSION['TotalTaxAmount'] = $TotalTaxAmount;  //Sum of tax for all items in this order. 
            $_SESSION['HandalingCost'] = $HandalingCost;  //Handling cost for this order.
            $_SESSION['InsuranceCost'] = $InsuranceCost;  //shipping insurance cost for this order.
            $_SESSION['ShippinDiscount'] = $ShippinDiscount; //Shipping discount for this order. Specify this as negative number.
            $_SESSION['ShippinCost'] = $ShippinCost; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
            $_SESSION['GrandTotal'] = $GrandTotal;

            //We need to execute the "SetExpressCheckOut" method to obtain paypal token

            $httpParsedResponseAr = $this->dashboard_p_model->PPHttpPost('SetExpressCheckout', $padata, PayPalApiUsername, PayPalApiPassword, PayPalApiSignature, PayPalMode);
           /* echo '-------------------------';
            echo("<pre>");
            print_r($httpParsedResponseAr);
            echo("</pre>");*/
            //Respond according to message we receive from Paypal
            if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
                //Redirect user to PayPal store with Token received.
                $paypalurl = 'https://www.'.PayPalMode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=' . $httpParsedResponseAr["TOKEN"] . '';
               // echo $paypalurl;
                header('Location: ' . $paypalurl);
                return true;
            } else {
                //Show error message
                $this->session->userdata["paypal_msg"] = ' <div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
                redirect(base_url().'dasboardProfessional');
			   /* echo '<pre>';
                print_r($httpParsedResponseAr);
                echo '</pre>';*/
               // return false;
            }
        }
        //***
        //Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
        if (isset($_GET["token"]) && isset($_GET["PayerID"])) {
            //we will be using these two variables to execute the "DoExpressCheckoutPayment"
            //Note: we haven't received any payment yet.
            $token = $_GET["token"];
            $payer_id = $_GET["PayerID"];
            //get session variables
            $ItemName = $_SESSION['ItemName']; //Item Name
            $ItemPrice = $_SESSION['ItemPrice']; //Item Price
            $ItemNumber = $_SESSION['ItemNumber']; //Item Number
            $ItemDesc = $_SESSION['ItemDesc']; //Item Number
            $ItemQty = $_SESSION['ItemQty']; // Item Quantity
            $ItemTotalPrice = $_SESSION['ItemTotalPrice']; //(Item Price x Quantity = Total) Get total amount of product; 
            $TotalTaxAmount = $_SESSION['TotalTaxAmount'];  //Sum of tax for all items in this order. 
            $HandalingCost = $_SESSION['HandalingCost'];  //Handling cost for this order.
            $InsuranceCost = $_SESSION['InsuranceCost'];  //shipping insurance cost for this order.
            $ShippinDiscount = $_SESSION['ShippinDiscount']; //Shipping discount for this order. Specify this as negative number.
            $ShippinCost = $_SESSION['ShippinCost']; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
            $GrandTotal = $_SESSION['GrandTotal'];

            $padata = '&TOKEN=' . urlencode($token) .
                    '&PAYERID=' . urlencode($payer_id) .
                    '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .
                    //set item info here, otherwise we won't see product details later	
                    '&L_PAYMENTREQUEST_0_NAME0=' . urlencode($ItemName) .
                    '&L_PAYMENTREQUEST_0_NUMBER0=' . urlencode($ItemNumber) .
                    '&L_PAYMENTREQUEST_0_DESC0=' . urlencode($ItemDesc) .
                    '&L_PAYMENTREQUEST_0_AMT0=' . urlencode($ItemPrice) .
                    '&L_PAYMENTREQUEST_0_QTY0=' . urlencode($ItemQty) .
                    /*
                      //Additional products (L_PAYMENTREQUEST_0_NAME0 becomes L_PAYMENTREQUEST_0_NAME1 and so on)
                      '&L_PAYMENTREQUEST_0_NAME1='.urlencode($ItemName2).
                      '&L_PAYMENTREQUEST_0_NUMBER1='.urlencode($ItemNumber2).
                      '&L_PAYMENTREQUEST_0_DESC1=Description text'.
                      '&L_PAYMENTREQUEST_0_AMT1='.urlencode($ItemPrice2).
                      '&L_PAYMENTREQUEST_0_QTY1='. urlencode($ItemQty2).
                     */

                    '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) .
                    '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($TotalTaxAmount) .
                    '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($ShippinCost) .
                    '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode($HandalingCost) .
                    '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode($ShippinDiscount) .
                    '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode($InsuranceCost) .
                    '&PAYMENTREQUEST_0_AMT=' . urlencode($GrandTotal) .
                    '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($PayPalCurrencyCode);

            //We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
            $httpParsedResponseAr = $this->dashboard_p_model->PPHttpPost('DoExpressCheckoutPayment', $padata, PayPalApiUsername, PayPalApiPassword, PayPalApiSignature, PayPalMode);

            //Check if everything went ok..
            if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

                //echo '<h2>Success</h2>';
               // echo 'Your Transaction ID : ' . urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);

                /*
                  //Sometimes Payment are kept pending even when transaction is complete.
                  //hence we need to notify user about it and ask him manually approve the transiction
                 */

                if ('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {
                    $this->session->userdata["paypal_msg"] =  '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
					// do data insertions here
                } elseif ('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {
                    $this->session->userdata["paypal_msg"] = '<div style="color:red">Transaction Complete, but payment is still pending! ' .
                    'You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></div>';
                }

                // we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
                // GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
                $padata = '&TOKEN=' . urlencode($token);

                $httpParsedResponseAr = $this->dashboard_p_model->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

                if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

                    					
					$buyerName = $httpParsedResponseAr["FIRSTNAME"].' '.$httpParsedResponseAr["LASTNAME"];
					$buyerEmail = urldecode($httpParsedResponseAr["EMAIL"]);
					$transactionID =urldecode($httpParsedResponseAr["PAYMENTREQUEST_0_TRANSACTIONID"]);
					
					
					$insert_row = $this->dashboard_p_model->savePaypalTransaction($buyerName,$buyerEmail,$transactionID,$ItemName,$ItemNumber, $ItemTotalPrice,$ItemQTY,$ItemDesc);		
					
					if($insert_row){
					 		
					 	redirect(base_url().'dasboardProfessional');
					}

                   // return true;
                } else {
                    $this->session->userdata["paypal_msg"] = '<div style="color:red"><b>GetTransactionDetails failed:</b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
					redirect(base_url().'dasboardProfessional');
                   
				   // echo '<pre>';
                   // print_r($httpParsedResponseAr);
                   // echo '</pre>';
                   // return false;
                }
                
            } else {
                $this->session->userdata["paypal_msg"] = '<div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
                redirect(base_url().'dasboardProfessional');
				//echo '<pre>';
                //print_r($httpParsedResponseAr);
                //echo '</pre>';
                //return false;
            }

            //*** 
        }
    }

    public function payAmount() {
	
        //$payAmout = $_REQUEST['amountPaid'];
        //$creditCount = $_REQUEST['creditCount'];
       // echo $payAmout . "<br/> next";
        //echo $creditCount;
        $transaction_type = "buy";
        $paypalSucessFlag = $this->paypalRequest();

       /* if ($paypalSucessFlag) {
            $professional_id = $this->session->userdata['validEntry']['user_id'];
            $this->dashboard_p_model->updateTransactionBal($creditCount, $professional_id, $transaction_type, $payAmout);
            redirect(base_url() . "dashboardProfessional");
        }else{
            $professional_id = $this->session->userdata['validEntry']['user_id'];
            $this->dashboard_p_model->updateTransactionBal($creditCount, $professional_id, $transaction_type, $payAmout);
            redirect(base_url() . "dashboardProfessional");
        }*/
    }

    public function sendQuoteView($project_id = 0) {
        $professional_id = $this->session->userdata['validEntry']['user_id'];
        $creditBal = $this->dashboard_p_model->getCreditBal($professional_id);
        $data["creditBal"] = $creditBal;

        $projects = $this->dashboard_p_model->getProfessionalProjects($professional_id);
        $data['projects'] = $projects;
        $data['project_id'] = $project_id;


        //check for sufficient balance
        if ($creditBal < 2) {
            $data['insufficientBal'] = "Please purchase credit";
            $this->load->template("dashboard_view_p", $data);
        } else {
            //two credit required for one quote

            $data["submitProposal"] = "Your proposal has beed submiited sucessfully!";
            $this->load->template("send_quote_view", $data);
        }
    }

    public function submitQuote() {
        $workType = $_REQUEST['workType'];
        $bidamount = $_REQUEST['bidamount'];
        $days = $_REQUEST['days'];
        $project_id = $_REQUEST['project_id'];
        $message = $_REQUEST['message'];
        $professional_id = $this->session->userdata['validEntry']['user_id'];

        $creditBal = $this->dashboard_p_model->getCreditBal($professional_id);
        $this->dashboard_p_model->submitQuote($workType, $bidamount, $days, $project_id, $professional_id, $message);
        $projects = $this->dashboard_p_model->getProfessionalProjects($professional_id);
        //two credit required for one quote
        $creditBal = $creditBal - 2;
        $data['creditBal'] = $creditBal;
        $data['projects'] = $projects;
        $transaction_type = "use";
        $this->dashboard_p_model->updateTransactionBalforProject($creditBal, $professional_id, $transaction_type, $project_id);
        redirect(base_url() . "dashboardProfessional");
    }

    public function processPaypal(){
	// insert into transaction db
	// and redirect to thransaction details page
	}

}

?>