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

if($theID==NULL)
{
	exit();
}


$curl1 = "http://www.ddaayy.com/seqToseq/1.txt";
$txt1 = file_get_contents($curl1);
$txt1 = str_replace("	"," ",$txt1);

$curl2 = "http://www.ddaayy.com/seqToseq/2.txt";
$txt2 = file_get_contents($curl2);
$txt2 = str_replace("	"," ",$txt2);


if($txt1==NULL)
{
	exit();
}

if($txt2==NULL)
{
	exit();
}

include('./httpful.phar');

$theID_1 = "HT".$theID."_1";
$theID_2 = "HT".$theID."_2";
$theID_3 = "HT".$theID."_3";
$theID_0 = "HT".$theID."_0";

$code = '
{
  "jsonrpc": "2.0",
  "method": "invoke",
  "params": {
    "type": 1,
    "chaincodeID": {
      "name": "bd1945f6777e026c19754793de4806c27b34a874befc4419f7bae93fe27b89403c7015a69276f04eaa33f7b5079cab96e2c1fb6f29678efcde342887e44fae06"
    },
    "ctorMsg": {
      "function": "write",
      "args": [
        "'.$theID_1.'", "'.$txt1.'",
        "'.$theID_2.'", "'.$txt1.'",
        "'.$theID_3.'", "'.$txt2.'",
        "'.$theID_0.'"
      ]
    },
    "secureContext": "admin"
  },
  "id": 3
}
';

$url = "https://efcb01765756483ab9ccc7dd9538a0c5-vp0.us.blockchain.ibm.com:5002/chaincode";
$response = \Httpful\Request::post($url)
	->body(''.$code.'')
    ->expectsJson()
	->sendsJson()
    ->send();
	
echo 'start'.$response->raw_body.'end';






?>

