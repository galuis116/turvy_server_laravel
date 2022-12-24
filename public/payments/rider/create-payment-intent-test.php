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
   
   /*print"<pre>";
   print_r($decoded);
   exit;
   */
   /*
   'address' => [
		    'line1' => '510 Townsend St',
		    'postal_code' => '98140',
		    'city' => 'San Francisco',
		    'state' => 'CA',
		    'country' => 'US',
		    
		  ],
   */
	try {	
	//'source' => 'tok_1JTLmUJ1cMlbfDnjbGlksaj0',
		$customer = \Stripe\Customer::create([
		  'name' => $decoded['name'],
		  'email' => $decoded['email'],
		  
		]);
		/*
		$stripe = new \Stripe\StripeClient(
		  'sk_test_4eC39HqLyjWDarjtT1zdp7dc'
		);
		$stripe->customers->createSource(
		  'cus_91fz3aebyTniMk',
		  ['source' => 'tok_mastercard']
		);
		*/	
		/*'
			"card" => [
		  	 	"name" => 'Krunal K',
				"number" => '4242424242424242',
				"exp_month" => '05',
				"exp_year" => '26',
				"cvc" => '123'
		  	]

		  */
		$ephemeralKey = \Stripe\EphemeralKey::create(
		    ['customer' => $customer->id],
		    ['stripe_version' => '2020-08-27']
		  );
	
		$res = $payment_intent = \Stripe\PaymentIntent::create([
		  'amount' => $decoded['amount'], //300 = 3.00 aud
		  'currency' => 'aud',
		  'description' => $decoded['description'],
		  'customer' => $customer->id,		  
		]);
		
		//$res['clientSecret'] = $payment_intent->client_secret;
		//$res['id'] = $payment_intent->id;
		
	
	} catch(\Stripe\Exception\CardException  $e) {
		$res['id']='';
  		$res['error'] = $e->getError()->message;
   
  		//$value['error'] = 'cdd:'.$err['message'];  
	} catch (\Stripe\Exception\InvalidRequestException $e) {
		//print"<pre>";
		//print_r($e);
		/*echo 'Status is:' . $e->getHttpStatus() . '\n';
	  echo 'Type is:' . $e->getError()->type . '\n';
	  echo 'Code is:' . $e->getError()->code . '\n';
	  echo 'Param is:' . $e->getError()->param . '\n';
	  echo 'Message is:' . $e->getError()->message . '\n';
		exit;
		*/
		$res['id']='';
  		$res['error'] = $e->getError()->param. ' ' .$e->getError()->message;
	}
	$val = json_encode($res);
	echo $val;

	//$var = \Stripe\Charge::retrieve($payId);

	//echo "<pre>";print_r($payment_intent);exit;
?>