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
    /*print"<pre>";
   print_r($decoded);
   exit;
   */
	try {	
		//print_r($_POST);
		//exit;
		$stripe = new \Stripe\StripeClient(
		  'sk_test_FL1m5UCGUBAjwGWQZEyeYPv300Zt9lKY0T'
		);
		$expirydarr = explode("/",$decoded['expiry']);
		$reposne = $stripe->tokens->create([
		  'card' => [
		    'number' => $decoded['number'],
		    'exp_month' => $expirydarr[0],
		    'exp_year' => $expirydarr[1],
		    'cvc' => $decoded['cvc'],
		  ],
		]);
		
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
 
	

	
	} catch(\Stripe\Exception\CardException  $e) {
  		/*$body = $e->getJsonBody();
  		$err  = $body['error']; 
  		$reposne['id']='';
  		$reposne['error'] = $err['message'];
  		//$value['error'] = 'cdd:'.$err['message'];  
  		*/
  		
  		// Since it's a decline, \Stripe\Exception\CardException will be caught
	 /* echo 'Status is:' . $e->getHttpStatus() . '\n';
	  echo 'Type is:' . $e->getError()->type . '\n';
	  echo 'Code is:' . $e->getError()->code . '\n';
	  echo 'Param is:' . $e->getError()->param . '\n';
	  echo 'Message is:' . $e->getError()->message . '\n';
	  */
  		//$err  = $e->getError()->message; 
  		$reposne['id']='';
  		$reposne['error'] = $e->getError()->message;
	}  catch (\Stripe\Exception\RateLimitException $e) {
	  // Too many requests made to the API too quickly
	   $reposne['id']='';
  		$reposne['error'] = $e->getError()->message;
	} catch (\Stripe\Exception\InvalidRequestException $e) {
	  // Invalid parameters were supplied to Stripe's API
	   $reposne['id']='';
  		$reposne['error'] = $e->getError()->message;
  		
	} catch (\Stripe\Exception\AuthenticationException $e) {
		$reposne['id']='';
  		$reposne['error'] = $e->getError()->message;
	  // Authentication with Stripe's API failed
	  // (maybe you changed API keys recently)
	} catch (\Stripe\Exception\ApiConnectionException $e) {
	  // Network communication with Stripe failed
   	$reposne['id']='';
  		$reposne['error'] = $e->getError()->message;
	} catch (\Stripe\Exception\ApiErrorException $e) {
		$reposne['id']='';
  		$reposne['error'] = $e->getError()->message;
	  // Display a very generic error to the user, and maybe send
	  // yourself an email
	} catch (Exception $e) {
		//$reposne['id']='';
  		//$reposne['error'] = $e->getError()->message;
	  // Something else happened, completely unrelated to Stripe
	}
	
	
	//$val = json_encode($res);
	$val = json_encode($reposne);
	echo $val;

	//$var = \Stripe\Charge::retrieve($payId);

	//echo "<pre>";print_r($payment_intent);exit;
?>