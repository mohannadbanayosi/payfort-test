<?php


ini_set("soap.wsdl_cache_enabled", "0");
ini_set('user_agent', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');

$client = new SoapClient('https://sandbox.payfort.com/payment/payat/merchants/payments.wsdl', array("trace" => 1));

$header = array(
        'msgType' => 'PAYatSTORE',
        'msgDate' => '2014-09-17T12:10:10'
) ;

$payAtStore = array(
        'merchantID'    => 'elproff' ,//4homesFZCO
        'orderID'       => 'elprofforder3',
        'amount'        => '50',
        'currency'      => 'EGP' ,
        'itemName'      => 'iPad Mini' ,
        'expiryDate'    => '2015-06-14T10:10:48+04:00' , 
        'clientName'    => 'Mohannad Banayosi',
        'clientEmail'   => 'm.banayosi@gmail.com',
        'clientMobile'  => '00201061174755',
        'ticketNumber'  => 'ticket',
        'serviceName'   => 'FirstConnection' //MerchantDisplayNameGoesHere
) ;

uksort($payAtStore , "cmp");
$signature="";
foreach ($payAtStore as $key => $value) {
    $signature=$signature.$value;
}

global $EncryptionKey;
$EncryptionKey='deaf555cab';
$signature=strtoupper(sha1($signature.$EncryptionKey));

$messageBody = array(
        'header' => $header ,
        'PAYatSTORE' => $payAtStore ,
        'signature' => $signature         
); 

$params = array( 'message'=> $messageBody );

$result = $client->__SoapCall('PAYMENT_METHOD', array($params));
echo "<pre>"; print_r($client->__last_request) . "<hr>";
echo "<pre>"; print_r($client->__last_response) . "<hr>";
echo "<pre>"; print_r($result) . "<hr>"; 

function cmp($a, $b)
{
    $a = preg_replace('@^(a|an|the) @', '', $a);
    $b = preg_replace('@^(a|an|the) @', '', $b);
    return strcasecmp($a, $b);
}
?> 