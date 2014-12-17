<?php
//start session in all pages
if (session_status() == PHP_SESSION_NONE) { session_start(); } //PHP >= 5.4.0
//if(session_id() == '') { session_start(); } //uncomment this line if PHP < 5.4.0 and comment out line above

$PayPalMode 			= 'sandbox'; // sandbox or live
$PayPalApiUsername 		= 'customerservice-facilitator_api1.mydochub.com'; //PayPal API Username
$PayPalApiPassword 		= 'D3T2DGSB5LT9HFWX'; //Paypal API password
$PayPalApiSignature 	= 'AFcWxV21C7fd0v3bYYYRCpSSRl31AniDBvBLkyiHtZOxdA9XGFYKpiGM'; //Paypal API Signature
$PayPalCurrencyCode 	= 'USD'; //Paypal Currency Code
$PayPalReturnURL 		= 'http://localhost:84/mydochub/process.php'; //Point to process.php page
$PayPalCancelURL 		= 'http://localhost:84/mydochub/cancel_url.php'; //Cancel URL if user clicks cancel
?>