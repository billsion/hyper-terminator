<?php
include('./httpful.phar');

$url = "https://efcb01765756483ab9ccc7dd9538a0c5-vp0.us.blockchain.ibm.com:5002/registrar";
$response = \Httpful\Request::post($url)
	->body('{"enrollId": "admin","enrollSecret": "af2be8f007"}')
    ->expectsJson()
	->sendsJson()
    ->send();
	
echo 'start'.$response->raw_body.'end';

// https://23243849d2e747e384490629e9e93183-vp3.us.blockchain.ibm.com:5003/registrar/admin


?>

