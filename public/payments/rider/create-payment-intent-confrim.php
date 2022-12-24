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
	
	/* \Stripe\Stripe::setApiKey('sk_test_51HBNgpBC4tCVxgIFjbWTdMLVNZ1P2RgyksCWwV1JMilLwEyin6emtYYwZlvCydBxKlf1Cr8AmIgr9ttvmnkF9ayP00Bsms85bG');
	*/
	
	$content = trim(file_get_contents("php://input"));
   	$decoded = json_decode($content, true);
   
	try {	
	  $stripe = new \Stripe\StripeClient(
	  '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'
	  );
	 /*
	  $stripe = new \Stripe\StripeClient(
	  'sk_test_51HBNgpBC4tCVxgIFjbWTdMLVNZ1P2RgyksCWwV1JMilLwEyin6emtYYwZlvCydBxKlf1Cr8AmIgr9ttvmnkF9ayP00Bsms85bG'
	  );
	  */
	  //'pm_card_visa'
	  	 $res = $stripe->paymentIntents->confirm(
		  $decoded['pitoken'],
		  ['payment_method' => $decoded['payment_method']]
		);
		
		
		/*$res = $stripe->paymentIntents->confirm(
		 	'pi_3MFVZ1BC4tCVxgIF16jMEZmE',
		 	 ['payment_method'=>'pm_1MFVYyBC4tCVxgIFQeryKmOJ']
		 	
		);
		*/
		/*$res = $stripe->paymentIntents->confirm(
		  $decoded['pitoken'],
		);
		*/
		
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