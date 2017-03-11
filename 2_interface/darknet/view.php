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
    <title>目标检测-证据存储-法律定责方案</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <!--demo展示所用css，不用关心 begin-->
    <link rel="stylesheet" type="text/css" href="../seqToseq/GMU/assets/reset.css" />

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
    <link rel="stylesheet" type="text/css" href="../seqToseq/GMU/assets/loading.default.css" />
    <link rel="stylesheet" type="text/css" href="../seqToseq/GMU/assets/widget/refresh/refresh.default.css" />    <!--皮肤文件，若不使用该皮肤，可以不加载-->
    <!--组件依赖css end-->
    <!--组件依赖js begin-->
    <script type="text/javascript" src="../seqToseq/GMU/js/zepto.js"></script>
    <script type="text/javascript" src="../seqToseq/GMU/js/core/gmu.js"></script>
    <script type="text/javascript" src="../seqToseq/GMU/js/core/event.js"></script>
    <script type="text/javascript" src="../seqToseq/GMU/js/core/widget.js"></script>
    <script type="text/javascript" src="../seqToseq/GMU/js/widget/refresh/refresh.js"></script>
    <!--组件依赖js end-->
  
</head>

<body>

<ul class="search-top"><li><a href="index.php">目标检测-证据存储-法律定责方案<br>
Object Detection- Evidence Storage- Legal Responsibility Cognizance</a>
</li></ul>
 
<div class="ui-refresh">
    <ul class="data-list">

<?php
	$link = mysql_connect('localhost:3306','root','root');
	mysql_select_db("runjus",$link);

error_reporting(0);

    $queryna = "SELECT theID FROM runipfs WHERE url1='' AND url2='' AND url3='' ORDER BY theID ASC LIMIT 1";
    mysql_query("set names utf8 "); 
    mysql_query("set character_set_client=utf8"); 
    mysql_query("set character_set_results=utf8");  
    $resulta = mysql_query($queryna);
    $recordsa = mysql_fetch_object($resulta);
    $theIDe = $recordsa->theID;
	// $theIDe 最远一个
	
    $queryna = "SELECT theID,times,url0,url1,url2,url3,hadbc,times FROM runipfs WHERE theID='".$theID."' LIMIT 1";
    mysql_query("set names utf8 "); 
    mysql_query("set character_set_client=utf8"); 
    mysql_query("set character_set_results=utf8");  
    $resulta = mysql_query($queryna);
    $recordsa = mysql_fetch_object($resulta);
    $theID = $recordsa->theID;
	$url0 = $recordsa->url0;
	$url1 = $recordsa->url1;
	$url2 = $recordsa->url2;
	$url3 = $recordsa->url3;
	$hadbc   = $recordsa->hadbc;
	$times   = $recordsa->times;

  echo "<li><b>编号：</b>".$theID."</li>";  
  echo "<li><img src=\"".$url0."\" width=\"90%\"></li>";  
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
/*
echo "<br>当threshold=0.1时的计算结果：<img src=\"".$url1."\" width=\"90%\"><br>";
echo "<br>当threshold=0.2时的计算结果：<img src=\"".$url2."\" width=\"90%\"><br>";
echo "<br>当threshold=0.3时的计算结果：<img src=\"".$url3."\" width=\"90%\"><br>";
*/

echo "<br>当threshold=0.1时的计算结果：<img src=\"http://ddaayy.com/darknet/okpic/".$times."_1.png\" width=\"90%\"><br>";
echo "<br>当threshold=0.2时的计算结果：<img src=\"http://ddaayy.com/darknet/okpic/".$times."_2.png\" width=\"90%\"><br>";
echo "<br>当threshold=0.3时的计算结果：<img src=\"http://ddaayy.com/darknet/okpic/".$times."_3.png\" width=\"90%\"><br>";

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

$theID_1 = "DN".$theID."_1";
$theID_2 = "DN".$theID."_2";
$theID_3 = "DN".$theID."_3";

$chain = "bd1945f6777e026c19754793de4806c27b34a874befc4419f7bae93fe27b89403c7015a69276f04eaa33f7b5079cab96e2c1fb6f29678efcde342887e44fae06";

echo "<br>查验当threshold=0.1时计算结果的存储情况【<a href=\"http://139.196.219.42:8088/hyperledger/3read_darknet.php?theID=".$theID."&mye=1\" target=_blank>在线查验</a>】：<br>";
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

echo "<br>查验当threshold=0.2时计算结果的存储情况【<a href=\"http://139.196.219.42:8088/hyperledger/3read_darknet.php?theID=".$theID."&mye=2\" target=_blank>在线查验</a>】：<br>";
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

echo "<br>查验当threshold=0.3时计算结果的存储情况【<a href=\"http://139.196.219.42:8088/hyperledger/3read_darknet.php?theID=".$theID."&mye=3\" target=_blank>在线查验</a>】：<br>";
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

echo "</li>";

}
else
{
echo "<br>与区块链通讯故障，请稍后...";
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

    $queryna = "SELECT theID FROM runipfs ORDER BY theID DESC LIMIT 1";
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

