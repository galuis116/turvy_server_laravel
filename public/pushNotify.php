<?php 
	//echo "jkjkj";
	/*$message = array();
    $message['data']['title'] = 'First Notification Title';
    $message['data']['message'] = 'First Notification Description';*/
    //$message['data']['image'] = $this->image;

    $data = array(
        'priority' => 1,
        'forceShow' => true, 
        'notification' => array(      
	        'title' => 'First Notification Title',
	        'body' => 'First Notification Body', 
	    ),
        'sound' => 'default', 
        'content-available' => '1',
        'style' => 'picture',        
        'picture' => 'https://www.turvy.net/uploads/logo/9c87b131c17f229fa75c56a1ab1cd76d9df89349.png',        
        'badge' => '1'
    );

	$fields = array(
        'registration_ids' => array('fd2fh8qpRgOhftJFAyDkL9:APA91bF61uKKyv5h7Uww4Iyw_dcyZFfh4VXHDTVspi7Nx-tNIerxko5h4TEUyEU8mVr_aynVgYOnC97A_gFtx8epPSuJsq5IT31wHAAskq9YUuNb990SfOU-g7NYb6FPPgIf47AxOlMW'),
        'data' => $data,
    );

     define('FIREBASE_SERVER_KEY', 'AAAAljjxk68:APA91bG7pN7o12_vzPglObOFi64smER2mm-HTj6LVgBQ149RCCpFAshSW-f24c2Iu8i6FEFDHiF80nzV8FMcIrGNbIEj4_Ngw6C3O48lpzRKlg419yUB1XgJLQuOIPC8V-kkEpmg2et2');


	//firebase server url to send the curl request
    $url = 'https://fcm.googleapis.com/fcm/send';

    //building headers for the request
    $headers = array(
        'Authorization: key=' . FIREBASE_SERVER_KEY,
        'Content-Type: application/json'
    );

    //Initializing curl to open a connection
    $ch = curl_init();

    //Setting the curl url
    curl_setopt($ch, CURLOPT_URL, $url);
    
    //setting the method as post
    curl_setopt($ch, CURLOPT_POST, true);

    //adding headers 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //disabling ssl support
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    //adding the fields in json format 
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    //finally executing the curl request 
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }

    //Now close the connection
    curl_close($ch);
    echo "<pre>";print_r(json_decode($result));exit;
?>