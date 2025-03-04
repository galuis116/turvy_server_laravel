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

	\Stripe\Stripe::setApiKey('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');
	  $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);
	try {	
	
		$stripe = new \Stripe\StripeClient(
		  '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'
		);
		/*$decoded['number'] = '6011111111111117';
		$decoded['expiry'] ='12/26';
		$decoded['cvc'] ='123';
		*/
		$expirydarr = explode("/",$decoded['expiry']);
		$reposne = $stripe->tokens->create([
		  'card' => [
		    'number' => $decoded['number'],
		    'exp_month' => $expirydarr[0],
		    'exp_year' => $expirydarr[1],
		    'cvc' => $decoded['cvc'],
		  ],
		]);


		$reposne['card']['brand'] = str_replace(' ', '',$reposne['card']['brand']);


		$reposnepayment_method = $stripe->paymentMethods->create([
		  'type' => 'card',
		  'card' => [
		  	 'number' => $decoded['number'],
		    'exp_month' => $expirydarr[0],
		    'exp_year' => $expirydarr[1],
		    'cvc' => $decoded['cvc'],
		  ],
		]);

		$reposne['payment_method'] = $reposnepayment_method['id'];
		
		// Create customer 

		$customer = \Stripe\Customer::create([
		  'name' => $decoded['name'],
		  'email' => $decoded['email'],
		  'source' => $reposne['id']
		]);
		$reposne['customer_id'] =$customer->id;

		$stripe->paymentMethods->attach(
		  $reposne['payment_method'],
		  ['customer' => $customer->id]
		);
	
	} catch(\Stripe\Error\CardException $e) {
  		$body = $e->getJsonBody();
  		$err  = $body['error']; 
  		$reposne['id']='';
  		$reposne['error'] = $err['message'];
  		//$value['error'] = 'cdd:'.$err['message'];  
	} catch (\Stripe\Exception\InvalidRequestException $e) {
    //error_log("An invalid request occurred.");
		
		$err  = $body['error']; 
  		$reposne['id']='';
  		$reposne['error'] = "A payment error occurred: {$e->getError()->message}";
  		
  } catch (Exception $e) {
  		
  		$err  = $body['error']; 
  		$reposne['id']='';
  		$reposne['error'] = "A payment error occurred: {$e->getError()->message}";;
  		
    //error_log("Another problem occurred, maybe unrelated to Stripe.");
  }
	
	//$val = json_encode($res);
	$val = json_encode($reposne);
	echo $val;

	//$var = \Stripe\Charge::retrieve($payId);

	//echo "<pre>";print_r($payment_intent);exit;
?>