<?php
	ini_set('display_errors', '1');
	error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT ^ E_DEPRECATED);

	
	require 'vendor/autoload.php';
	use PayPalCheckoutSdk\Core\PayPalHttpClient;
	use PayPalCheckoutSdk\Core\ProductionEnvironment;
	
	// Creating an environment
	//$clientId = "AVq5TV0raq2KupD2QFlAVEiwETSYUgKB6Xh15V-d3OorLD9FmV2Z_qM4TtiOG7y9_kQHSynblg47Odb5";
	//$clientSecret = "EOnI9cPF8lpaStYVKxBUD6qGMfKzJ8PLYCR5KgUTZkuzaN9RLtnznOJyw5M9gaVMtaWIE5uKNIsIKTZg";
	// sand box
	//$clientId = "AceTU9Wh5TlG4be2yg__YeVj5vM2N5HuSfWr8LOZfA4C1R115sFmNrAQJv6ni-5l7O-JNtziS0g-zO6f";
	//$clientSecret = "EF5fLcoWpOowJMOhyDLnL51w-69lsplOpHCVQKKQr7RtPbxOgNiDO0LBf8KX2nRKkr8zXPE314znJGCO";

	// LIVE DETAILS 
	
	$clientId = "ATMEPYRJEk_ddD2E_yFq-J9nhP-u6dAUnD9T5UjjGR47-dmavzoTIu7ySamzYkrCuex5HfBQFltZZHjG";
	$clientSecret = "EPz_hXHvS-7KTBdRUJFmnbzBPU-CC6pdfyaIR9dm5KE2Yq-5RF6eM3x9JowlcZnx3O8y63ZaAoQoro_C";

	$environment = new ProductionEnvironment($clientId, $clientSecret);
	$client = new PayPalHttpClient($environment);

	$amt = number_format(trim($_GET['amt']),2);


	// Construct a request object and set desired parameters
	// Here, OrdersCreateRequest() creates a POST request to /v2/checkout/orders
	use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
	$request = new OrdersCreateRequest();
	$request->prefer('return=representation');
	$request->body = [
	                     "intent" => "CAPTURE",
	                     "payer" =>[
									          "payment_method" => "paypal"
									      ],
	                     "purchase_units" => [[
	                         "reference_id" => "test_ref_id3",
	                         "amount" => [
	                             "value" => $amt,
	                             "currency_code" => "USD"
	                         ]
	                     ]],
	                     "application_context" => [
	                          "cancel_url" => "https://www.turvy.net/payments/rider/paypal/cancel.php",
	                          "return_url" => "https://www.turvy.net/payments/rider/paypal/success.php"
	                     ] 
	                 ];
	try {
	    // Call API with your client and get a response for your call
	    $response = $client->execute($request);
	    //echo "<pre>";print_r($response);exit;
	    $arr = array();
	    // If call returns body in response, you can get the deserialized version from the result attribute of the response
	    //echo "<pre>";print_r($response);
	    $appUrl = $response->result->links;
	    //echo "<pre>";print_r($appUrl);exit;
	    foreach ($appUrl as $key => $value) {
	    	
	    	if($value->rel == 'approve'){
	    		$arr['rel'] = $value->rel;
	    		$arr['url'] = $value->href;
	    	}
	    }
	    //echo "<pre>";print_r($arr);
	    header("Location: ".$arr['url']);
		

	}catch (HttpException $ex) {
	    echo $ex->statusCode;
	    print_r($ex->getMessage());
	}

	/*use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
	// Here, OrdersCaptureRequest() creates a POST request to /v2/checkout/orders
	// $response->result->id gives the orderId of the order created above
	$request = new OrdersCaptureRequest("APPROVED-ORDER-ID");
	$request->prefer('return=representation');
	try {
	    // Call API with your client and get a response for your call
	    $response = $client->execute($request);
	    
	    // If call returns body in response, you can get the deserialized version from the result attribute of the response
	    print_r($response);
	}catch (HttpException $ex) {
	    echo $ex->statusCode;
	    print_r($ex->getMessage());
	}*/


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Go To Pay</title>
</head>
<body>
  <h1>Pay</h1>
  <form action="/" method="post">
    <input type="submit" value="Buy">
  </form>
</body>
</html>