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
?>



<html>
<head>
    <title>智能法官-多人工智能共识机制</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <!--demo展示所用css，不用关心 begin-->
    <link rel="stylesheet" type="text/css" href="GMU/assets/reset.css" />

    <style>
      .search-top {
            width: 100%;
            text-align: center;
        }
        .search-top li a {
            text-decoration: none;
        }        
        .search-top li {
            color: #333;
            border-bottom: 1px solid #e7e7e7;
            background-color: #fafafa;
            font-size: 16px;
            font-weight: bold;
            padding: 15px 15px 15px 15px;
            display: block;
            position: relative;
        }        
        .search-top li.ui-list-hover {
            background: #ededed;		
        }
        
      .data-list {
            width: 100%;
            text-align: left;
        }

        .data-list li {
            color: #333;
            border-bottom: 1px solid #e7e7e7;
            background-color: #fafafa;
            font-size: 13px;
            #font-weight: bold;
            padding: 15px 15px 15px 15px;
            display: block;
            position: relative;		
        }

        .data-list li.ui-list-hover {
            background: #ededed;
        }

        .data-list li a {
            text-decoration: none;
        }

        .data-list li dt {
            font-size: 16px;
            font-weight: bold;
            line-height: 16px;
            padding-top: 10px;
            color: #333;
        }

        .data-list li dt:first-child {
            padding-top: 0;
        }

        .data-list li dd.content {
            font-size: 14px;
            color: #969696;
            line-height: 16px;
            margin-top: 8px;
        }

        .data-list li dd.source {
            font-size: 14px;
            color: #545454;
            margin-top: 8px;
        }


        
        }
    </style>
    <!--demo展示所用css end-->

    <!--组件依赖css begin-->
    <link rel="stylesheet" type="text/css" href="GMU/assets/loading.default.css" />
    <link rel="stylesheet" type="text/css" href="GMU/assets/widget/refresh/refresh.default.css" />    <!--皮肤文件，若不使用该皮肤，可以不加载-->
    <!--组件依赖css end-->
    <!--组件依赖js begin-->
    <script type="text/javascript" src="GMU/js/zepto.js"></script>
    <script type="text/javascript" src="GMU/js/core/gmu.js"></script>
    <script type="text/javascript" src="GMU/js/core/event.js"></script>
    <script type="text/javascript" src="GMU/js/core/widget.js"></script>
    <script type="text/javascript" src="GMU/js/widget/refresh/refresh.js"></script>
    <!--组件依赖js end-->
  
</head>

<body>

<ul class="search-top"><li><a href="index.php">智能法官-多人工智能共识机制<br>
Artificial Intelligence Arbiter-Consensus Among Multiple Machines</a></li></ul>
 
<div class="ui-refresh">
    <ul class="data-list">

<?php
	$link = mysql_connect('localhost:3306','root','root');
	mysql_select_db("runjus",$link);

error_reporting(0);

    $queryna = "SELECT theID FROM runjus WHERE panjueruxia='' ORDER BY theID ASC LIMIT 1";
    mysql_query("set names utf8 "); 
    mysql_query("set character_set_client=utf8"); 
    mysql_query("set character_set_results=utf8");  
    $resulta = mysql_query($queryna);
    $recordsa = mysql_fetch_object($resulta);
    $theIDe = $recordsa->theID;
	// $theIDe 最远一个
	
    $queryna = "SELECT theID,benyuanrenwei,panjueruxia,hadbc FROM runjus WHERE theID='".$theID."' LIMIT 1";
    mysql_query("set names utf8 "); 
    mysql_query("set character_set_client=utf8"); 
    mysql_query("set character_set_results=utf8");  
    $resulta = mysql_query($queryna);
    $recordsa = mysql_fetch_object($resulta);
    $theID = $recordsa->theID;
	$benyuanrenwei = $recordsa->benyuanrenwei;
	$panjueruxia   = $recordsa->panjueruxia;
	$hadbc   = $recordsa->hadbc;

  echo "<li><b>编号：</b>".$theID."</li>";  
  echo "<li><b>输入内容：</b>".$benyuanrenwei."</li>";  
  echo "<li><b>计算结果</b>";  
	
if(($theIDe!=NULL)&&($theIDe<=$theID))
{
$juliID = 1+$theID-$theIDe;
echo " ".$juliID."分钟后算出结果";

$ssf = $juliID*60000;

echo "<script type=\"text/javascript\">function fresh_page(){window.location.reload();}setTimeout('fresh_page()',".$ssf.");</script>";

}
else
{
//echo $panjueruxia;
echo "（多数AI计算结果）：";

$panjueruxia = str_replace('x','某',$panjueruxia);
$panjueruxia = str_replace('X','某',$panjueruxia);
$panjueruxia = str_replace('×','某',$panjueruxia);

$panjueruxia = preg_replace('/被告人(.*?)某/','被告人某',$panjueruxia);

$pjarr = explode("<e>",$panjueruxia);

//echo $pjarr[0]; // 那就是个0
$pjarr[0] = trim($pjarr[0]);
$pjarr[0] = substr($pjarr[0],6);
echo $pjarr[0]."<br><br>"; 

if(strlen($pjarr[1])>10)
{
echo "备选结果（少数AI计算结果）：";
$pjarr[1] = trim($pjarr[1]);
$pjarr[1] = substr($pjarr[1],6);
echo $pjarr[1]."<br><br>"; 
}


echo "</li>";

if($hadbc=="OK")
{

echo "<li><b>区块链验证：</b><br><br>";

echo "链代码：<a href=\"https://github.com/lawup/example02/blob/v2.0/chaincode/chaincode_example02.go\" target=_blank>ChainCode@GitHub</a>";
echo "<br>";

echo "部署编号：<input type=\"text\" style=\"width:400px;\" value=\"bd1945f6777e026c19754793de4806c27b34a874befc4419f7bae93fe27b89403c7015a69276f04eaa33f7b5079cab96e2c1fb6f29678efcde342887e44fae06\">";
echo "<br>";

echo "用户凭证： af2be8f007";
echo "<br>";


echo "<br>将JSON代码POST到如下任意URL即可验证：<br>";
echo "<input type=\"text\" style=\"width:560px;\" value=\"https://efcb01765756483ab9ccc7dd9538a0c5-vp0.us.blockchain.ibm.com:5002/chaincode\"><br>";
echo "<input type=\"text\" style=\"width:560px;\" value=\"https://efcb01765756483ab9ccc7dd9538a0c5-vp1.us.blockchain.ibm.com:5002/chaincode\"><br>";
echo "<input type=\"text\" style=\"width:560px;\" value=\"https://efcb01765756483ab9ccc7dd9538a0c5-vp2.us.blockchain.ibm.com:5002/chaincode\"><br>";
echo "<input type=\"text\" style=\"width:560px;\" value=\"https://efcb01765756483ab9ccc7dd9538a0c5-vp3.us.blockchain.ibm.com:5002/chaincode\"><br>";

$theID_1 = "HT".$theID."_1";
$theID_2 = "HT".$theID."_2";
$theID_3 = "HT".$theID."_3";
$theID_0 = "HT".$theID."_0";

$chain = "bd1945f6777e026c19754793de4806c27b34a874befc4419f7bae93fe27b89403c7015a69276f04eaa33f7b5079cab96e2c1fb6f29678efcde342887e44fae06";

echo "<br>验证1号AI计算结果【<a href=\"http://139.196.219.42:8088/hyperledger/3read.php?theID=".$theID."&mye=1\" target=_blank>在线验证</a>】：<br>";
echo '
<textarea rows="6" name="benyuanrenwei" cols="50" >
{
  "jsonrpc": "2.0",
  "method": "query",
  "params": {
    "type": 1,
    "chaincodeID": {
      "name": "'.$chain.'"
    },
    "ctorMsg": {
      "function": "read",
      "args": [
        "'.$theID_1.'"
      ]
    },
    "secureContext": "admin"
  },
  "id": 2
}
</textarea>
';

echo "<br>验证2号AI计算结果【<a href=\"http://139.196.219.42:8088/hyperledger/3read.php?theID=".$theID."&mye=2\" target=_blank>在线验证</a>】：<br>";
echo '
<textarea rows="6" name="benyuanrenwei" cols="50" >
{
  "jsonrpc": "2.0",
  "method": "query",
  "params": {
    "type": 1,
    "chaincodeID": {
      "name": "'.$chain.'"
    },
    "ctorMsg": {
      "function": "read",
      "args": [
        "'.$theID_2.'"
      ]
    },
    "secureContext": "admin"
  },
  "id": 2
}
</textarea>
';

echo "<br>验证3号AI计算结果【<a href=\"http://139.196.219.42:8088/hyperledger/3read.php?theID=".$theID."&mye=3\" target=_blank>在线验证</a>】：<br>";
echo '
<textarea rows="6" name="benyuanrenwei" cols="50" >
{
  "jsonrpc": "2.0",
  "method": "query",
  "params": {
    "type": 1,
    "chaincodeID": {
      "name": "'.$chain.'"
    },
    "ctorMsg": {
      "function": "read",
      "args": [
        "'.$theID_3.'"
      ]
    },
    "secureContext": "admin"
  },
  "id": 2
}
</textarea>
';


echo "<br>查验多AI计算的共识结果（采纳多数意见）
<br>【<a href=\"http://139.196.219.42:8088/hyperledger/3read.php?theID=".$theID."&mye=0\" target=_blank>在线查验</a>】：<br>";
echo '
<textarea rows="6" name="benyuanrenwei" cols="50" >
{
  "jsonrpc": "2.0",
  "method": "query",
  "params": {
    "type": 1,
    "chaincodeID": {
      "name": "'.$chain.'"
    },
    "ctorMsg": {
      "function": "read",
      "args": [
        "'.$theID_0.'"
      ]
    },
    "secureContext": "admin"
  },
  "id": 2
}
</textarea>
';

echo "</li>";

}
else
{
echo "与区块链通讯故障，请稍后...";
$ssfx = 60000;
echo "<script type=\"text/javascript\">function fresh_page(){window.location.reload();}setTimeout('fresh_page()',".$ssfx.");</script>";
}


}



//echo "<br><a href=\"javascript :;\" onClick=\"javascript :history.back(-1);\">返回</a>";

//echo "<input type=button value=\" 返 回 \" onclick=\"window.history.back()\">";

//echo "<a href=\"javascript:window.opener=null;window.open('','_self');window.close();\">关闭本页<<返回</a>";

if($theID>1)
{
$theIDjian = " <a href=\"view.php?theID=".($theID-1)."\"><<上一条</a> ";
}

    $queryna = "SELECT theID FROM runjus ORDER BY theID DESC LIMIT 1";
    mysql_query("set names utf8 "); 
    mysql_query("set character_set_client=utf8"); 
    mysql_query("set character_set_results=utf8");  
    $resulta = mysql_query($queryna);
    $recordsa = mysql_fetch_object($resulta);
    $theIDs = $recordsa->theID;

if($theID<$theIDs)
{
$theIDjia  = " <a href=\"view.php?theID=".($theID+1)."\">下一条>></a> ";
}

echo "<li><p align=\"center\">".$theIDjian."| <a href=\"index.php\">返回列表页</a> |".$theIDjia."</p></li>";


  echo "<br><br>"; 	


?>


 
    </ul>
</div>

<p align="center"><a href="http://www.ddaayy.com/201703.php">Back to index</a></p>
  
</body>
</html>

