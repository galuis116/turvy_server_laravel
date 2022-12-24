<?php
   ini_set('display_errors', '1');
	error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT ^ E_DEPRECATED);
	//use Stripe\Stripe;
	//require 'vendor/autoload.php';
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
		//print_r($_POST);
		//exit;
		$stripe = new \Stripe\StripeClient(
		  'sk_test_FL1m5UCGUBAjwGWQZEyeYPv300Zt9lKY0T'
		);
		/*$expirydarr = explode("/",$decoded['expiry']);
		$reposne = $stripe->tokens->create([
		  'card' => [
		    'number' => $decoded['number'],
		    'exp_month' => $expirydarr[0],
		    'exp_year' => $expirydarr[1],
		    'cvc' => $decoded['cvc'],
		  ],
		]);
		*/
    $reposne= $stripe->tokens->create([
	  'card' => [
	    'number' => '4242424242424242',
	    'exp_month' => 8,
	    'exp_year' => 2026,
	    'cvc' => '314',
	  ],
	]);
	

	
	} catch(\Stripe\Error\Card $e) {
  		$body = $e->getJsonBody();
  		$err  = $body['error']; 
  		$reposne['id']='';
  		$reposne['error'] = $err['message'];
  		//$value['error'] = 'cdd:'.$err['message'];  
	} 
	
	//$val = json_encode($res);
	$val = json_encode($reposne);
	echo $val;

	//$var = \Stripe\Charge::retrieve($payId);

	//echo "<pre>";print_r($payment_intent);exit;
?>