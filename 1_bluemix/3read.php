<?php
header("Content-type: text/html; charset=utf-8"); 

//session_start(); 
//提取页面和浏览器提交的变量
@extract($_SERVER, EXTR_SKIP); 
@extract($_SESSION, EXTR_SKIP); 
@extract($_POST, EXTR_SKIP); 
@extract($_FILES, EXTR_SKIP); 
@extract($_GET, EXTR_SKIP); 
@extract($_ENV, EXTR_SKIP); 
//提取完成   

include('./httpful.phar');


$code = '
{
  "jsonrpc": "2.0",
  "method": "query",
  "params": {
    "type": 1,
    "chaincodeID": {
      "name": "bd1945f6777e026c19754793de4806c27b34a874befc4419f7bae93fe27b89403c7015a69276f04eaa33f7b5079cab96e2c1fb6f29678efcde342887e44fae06"
    },
    "ctorMsg": {
      "function": "read",
      "args": [
        "HT'.$theID.'_'.$mye.'"
      ]
    },
    "secureContext": "admin"
  },
  "id": 2
}
';

$url = "https://efcb01765756483ab9ccc7dd9538a0c5-vp0.us.blockchain.ibm.com:5002/chaincode";
$response = \Httpful\Request::post($url)
	->body(''.$code.'')
    ->expectsJson()
	->sendsJson()
    ->send();
	
echo ''.$response->raw_body.'';


/*


*/



?>

