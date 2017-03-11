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

	$link = mysql_connect('localhost:3306','root','root');
	mysql_select_db("runjus",$link);

error_reporting(0);

// 1、将最新一条的panjueruxia从文件中读取 去掉字与字直接的空格 写入数据库

$file_path = "http://www.ddaayy.com/seqToseq/translation/gen_result_cpu";
$str = file_get_contents($file_path);
//$str = fread($fp,filesize($file_path));//指定读取大小，这里把整个文件内容读取出来

$str = str_replace("\r","<br>",$str);
$str = str_replace("\n","<br>",$str);
//$str = str_replace("<e>","<br>",$str);
$str = str_replace(" ","",$str);

//echo $str;

$query = "UPDATE runjus SET panjueruxia='".$str."' WHERE panjueruxia='' ORDER BY theID ASC LIMIT 1";		

mysql_query("set names utf8 "); 
mysql_query("set character_set_client=utf8"); 
mysql_query("set character_set_results=utf8"); 
$result = mysql_query($query); 	

//echo $query;


// 1附、将最新一条的panjueruxia内容写入区块链 

    $queryna = "SELECT theID,panjueruxia,hadbc FROM runjus WHERE panjueruxia!='' AND hadbc IS NULL ORDER BY theID ASC LIMIT 1";
    mysql_query("set names utf8 "); 
    mysql_query("set character_set_client=utf8"); 
    mysql_query("set character_set_results=utf8");  
    $resulta = mysql_query($queryna);
    $recordsa = mysql_fetch_object($resulta);
    $theID = $recordsa->theID;
	$panjueruxia = $recordsa->panjueruxia;
	$hadbc = $recordsa->hadbc;
	
if($hadbc==NULL)  //如果为NULL 说明需要write到区块链中
{

$panjueruxia = str_replace('x','某',$panjueruxia);
$panjueruxia = str_replace('X','某',$panjueruxia);
$panjueruxia = str_replace('×','某',$panjueruxia);
$panjueruxia = preg_replace('/被告人(.*?)某/','被告人某',$panjueruxia);
$pjarr = explode("<e>",$panjueruxia);

//echo $pjarr[0]; // 那就是个0
$pjarr[0] = trim($pjarr[0]);
$pjarr[0] = substr($pjarr[0],6);
echo $pjarr[0]."<br><br>";  // 1号 2号 
$myfile1 = fopen("/var/www/html/seqToseq/1.txt", "w") or die("Unable to open file 1 !");
fwrite($myfile1, $pjarr[0]);
fclose($myfile1);


if(strlen($pjarr[1])>10)
{
echo "备选结果（少数AI计算结果）：";
$pjarr[1] = trim($pjarr[1]);
$pjarr[1] = substr($pjarr[1],6);
echo $pjarr[1]."<br><br>";   //3号
$myfile2 = fopen("/var/www/html/seqToseq/2.txt", "w") or die("Unable to open file 2 !");
fwrite($myfile2, $pjarr[1]);
fclose($myfile2);
}

$chaincurl = "http://139.196.219.42:8088/hyperledger/2write.php?theID=".$theID."";
$chainstr = file_get_contents($chaincurl);

echo $chainstr;

// 写入区块链 开始
/*
include('httpful.phar');

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
        "'.$theID_1.'", "'.$pjarr[0].'",
        "'.$theID_2.'", "'.$pjarr[0].'",
        "'.$theID_3.'", "'.$pjarr[1].'",
        "'.$theID_0.'"
      ]
    },
    "secureContext": "dashboarduser_type1_2"
  },
  "id": 3
}
';

$url = "https://b3c5b4418cdd4580b10db90dd3c4c89e-vp2.us.blockchain.ibm.com:5004/chaincode";
$response = \Httpful\Request::post($url)
	->body(''.$code.'')
    ->expectsJson()
	->sendsJson()
    ->send();
	
echo 's'.$response->raw_body.'e';
*/
// 写入区块链 结束

$query = "UPDATE runjus SET hadbc='OK' WHERE theID='".$theID."' LIMIT 1";		
mysql_query("set names utf8 "); 
mysql_query("set character_set_client=utf8"); 
mysql_query("set character_set_results=utf8"); 
$result = mysql_query($query); 	

}







// 2、将最新一条benyuanrenwei从数据库中读取 在字与字直接添加空格 写入文件 覆盖写入

$myfile = fopen("/var/www/html/seqToseq/data/pre-wmt14/gen/gen", "w") or die("Unable to open file!");

    $queryna = "SELECT benyuanrenwei FROM runjus WHERE panjueruxia='' ORDER BY theID ASC LIMIT 1";
    mysql_query("set names utf8 "); 
    mysql_query("set character_set_client=utf8"); 
    mysql_query("set character_set_results=utf8");  
    $resulta = mysql_query($queryna);
    $recordsa = mysql_fetch_object($resulta);
    $benyuanrenwei = $recordsa->benyuanrenwei;

$str=$benyuanrenwei;
$xxx = mb_strlen($str,'utf8');
$result=explode(' ',$str);
$xinrow=array();
foreach($result as $k=>$v)
{
for($x=0;$x<$xxx;$x++)
{
$xinrow[]=mb_substr($v, $x, 1, 'utf-8');
}
}
foreach($xinrow as $kk=>$vv){
//echo $vv.' ';
$benyuanrenwei_x = $benyuanrenwei_x." ".$vv;
}
echo $benyuanrenwei_x;

$txt = $benyuanrenwei_x;
fwrite($myfile, $txt);
fclose($myfile);


// 3、等待paddle每分钟的执行
 
?>


