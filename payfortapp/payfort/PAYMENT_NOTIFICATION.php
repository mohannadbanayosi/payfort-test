<?php

ini_set('display_errors', '1');
ini_set('user_agent', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');
ini_set("soap.wsdl_cache_enabled", "0");

//get the XML notification
//$inputs=simplexml_load_string( $_POST['notification'] ); 

//start the PAYMENT_NOTIFICATION SOAP request 
$client = new SoapClient("https://sandbox.payfort.com/payment/payat/merchants/payments.wsdl",array(
                "trace"      => 1));
$header = array(
        'msgType' => 'PAYMENT_NOTIFICATION',
        'msgDate' => date('Y-m-d\TH:i:s') // example : 2014-06-14T10:10:48 
);

//fill the data of the order  
$requestArr = array(
        'merchantID' => 'elproff' ,
        'orderID' => 'elprofforder2' , //$inputs->orderID,
        'payment'=>'PAYatSTORE',
        'currency' => 'EGP',
        'status' => 'success',
        'serviceName' => 'FirstConnection',

) ;

$inputs=$requestArr; 
ksort($inputs);

$string="";
foreach ($inputs as $key => $input) {
  $string=$string.$input;
}
/////concat with Encryption Key
$encryptionKey = "deaf555cab";
$string = $string . $encryptionKey ; 
//// encryption with sha1
$signature=sha1($string);

$messageBody = array(
'header' => $header ,
'PAYMENT_NOTIFICATION' => $requestArr ,
'signature' => $signature
);

$params = array( 'message'=> $messageBody );
$result = $client->__SoapCall('PAYMENT_METHOD_SERVICES', array($params)); 

// check if the result returned is success

echo "<pre>";
var_dump($result); 

// merchant logic to give the service to the client 		


?>
