<?php 
	//echo phpinfo();
	//mail("ashwini.sisnolabs@gmail.com","NEW MESSGE FROM TURVY","NEW MESSGE FROM TURVY");
	/*  ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "admin@turvy.net";
    $to = "ashwini.sisnolabs@gmail.com";
    $subject = "PHP Mail Test script";
    $message = "This is a test to check the PHP Mail functionality";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "Test email sent";
    
    $mbox = imap_open("{65.108.140.35:25/SMTP/novalidate-cert}INBOX", "register@turvy.net", "RqDerkVgwEPW")
     or die("can't connect: " . imap_last_error());

	$MC = imap_check($mbox);

	echo "NO OF MSGS => ".$MC->Nmsgs."<br />";
	*/
	$f = fsockopen('smtp host', 465) ;
if ($f !== false) {
    $res = fread($f, 1024) ;
    if (strlen($res) > 0 && strpos($res, '220') === 0) {
        echo "Success!" ;
    }
    else {
        echo "Error: " . $res ;
    }
}
fclose($f) ;
?>