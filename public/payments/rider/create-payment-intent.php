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

	\Stripe\Stripe::setApiKey('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');
	$content = trim(file_get_contents("php://input"));
   	$decoded = json_decode($content, true);
   	
	try {	
		//'source' => 'tok_1JTLmUJ1cMlbfDnjbGlksaj0',
		/*$customer = \Stripe\Customer::create([
		  'name' => 'Krunal K',
		  'email' => 'krunal.sisnolabs@gmail.com',
		  'address' => [
		    'line1' => '510 Townsend St',
		    'postal_code' => '98140',
		    'city' => 'San Francisco',
		    'state' => 'CA',
		    'country' => 'US',
		  ],
		]);
		*/
		/*$customer = \Stripe\Customer::create([
		  'name' => $decoded['name'],
		  'email' => $decoded['email'],
		  'source' => $decoded['tokenId']
		]);
		*/

		/* $stripe->customers->createSource(
		  $customer->id,
		  ['source' => $decoded['tokenId']]
		);
		*/
		
		/*
		$stripe = new \Stripe\StripeClient(
		  'sk_test_4eC39HqLyjWDarjtT1zdp7dc'
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

		 /* $decoded['customer_id'] ='cus_MzWI6qX8fhpFRT';
		  $decoded['amount'] =300;
		  */
		$ephemeralKey = \Stripe\EphemeralKey::create(
		    ['customer' => $decoded['customer_id']],
		    ['stripe_version' => '2020-08-27']
		  );
		$amount = $decoded['amount'];
		$amount = $amount*100;
		$res = $payment_intent = \Stripe\PaymentIntent::create([
		  'amount' => $amount, //300 = 3.00 aud
		  'currency' => 'aud',
		  'description' => 'Turvy payment',
		  'customer' => $decoded['customer_id'],
		]);
		
		//$res['clientSecret'] = $payment_intent->client_secret;
		//$res['id'] = $payment_intent->id;
		
	
	} catch(\Stripe\Error\Card $e) {
  		$body = $e->getJsonBody();
  		$err  = $body['error']; 
  		$res['error'] = $err['message'];
   
  		//$value['error'] = 'cdd:'.$err['message'];  
	} catch (\Stripe\Exception\InvalidRequestException $e) {
    //error_log("An invalid request occurred.");
		
		$err  = $body['error']; 
  		$res['id']='';
  		$res['error'] = "A payment error occurred: {$e->getError()->message}";
  		
  } catch (Exception $e) {
  		
  		$err  = $body['error']; 
  		$res['id']='';
  		$res['error'] = "A payment error occurred: {$e->getError()->message}";;
  		
    //error_log("Another problem occurred, maybe unrelated to Stripe.");
  }
	$val = json_encode($res);
	echo $val;

	//$var = \Stripe\Charge::retrieve($payId);

	//echo "<pre>";print_r($payment_intent);exit;
?>