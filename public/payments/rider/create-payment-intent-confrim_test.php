<?php
	ini_set('display_errors', '1');
	error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT ^ E_DEPRECATED);
	/*use Stripe\Stripe;
	require 'vendor/autoload.php';*/
	//require('stripe/init.php');
	use Stripe\Stripe;
	use Stripe\Customer;
	use Stripe\EphemeralKey;
	use Stripe\PaymentIntent;
	require '../vendor/autoload.php';

	\Stripe\Stripe::setApiKey('sk_test_FL1m5UCGUBAjwGWQZEyeYPv300Zt9lKY0T');
	$content = trim(file_get_contents("php://input"));
   $decoded = json_decode($content, true);
   
	try {	
	  $stripe = new \Stripe\StripeClient(
	  'sk_test_FL1m5UCGUBAjwGWQZEyeYPv300Zt9lKY0T'
	  );
	  
	  $res = $stripe->paymentIntents->confirm(
		  $decoded['pitoken'],
		   ['payment_method' => 'pm_card_visa']
		);
		
	} catch (\Stripe\Exception\InvalidRequestException $e) {
  		//$body = $e->getJsonBody();
  		//$err  = $body['error']; 
  		$res['id'] = '';
  		$res['error'] = $e->getError()->message;
  		/*echo 'Status is:' . $e->getHttpStatus() . '\n';
	  echo 'Type is:' . $e->getError()->type . '\n';
	  echo 'Code is:' . $e->getError()->code . '\n';
	  echo 'Param is:' . $e->getError()->param . '\n';
	  echo 'Message is:' . $e->getError()->message . '\n';
  		//$value['error'] = 'cdd:'.$err['message'];  
  		*/
	} 
	$val = json_encode($res);
	echo $val;

	//$var = \Stripe\Charge::retrieve($payId);

	//echo "<pre>";print_r($payment_intent);exit;
?>