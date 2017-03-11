<?php
include('./httpful.phar');

$code = '
{
  "jsonrpc": "2.0",
  "method": "deploy",
  "params": {
    "type": 1,
    "chaincodeID": {
      "path": "http://gopkg.in/lawup/example02.v2/chaincode"
    },
    "ctorMsg": {
      "function": "init",
      "args": [
        "hi there1","hi there2","hi there3","什么都没有"
      ]
    },
    "secureContext": "admin"
  },
  "id": 1
}
';

$url = "https://efcb01765756483ab9ccc7dd9538a0c5-vp0.us.blockchain.ibm.com:5002/chaincode";
$response = \Httpful\Request::post($url)
	->body(''.$code.'')
    ->expectsJson()
	->sendsJson()
    ->send();
	
echo 'start'.$response->raw_body.'end';


/*

start{"jsonrpc":"2.0","result":{"status":"OK","message":"3aeb9793d67968f966f2b093c361c70cdbf7a2813a02f7a5da344386580d3b519899b73003b335c587e3d016d44b54eb7d8030bddddbc3e9abf05db81c20eaef"},"id":1}end

*/

?>
