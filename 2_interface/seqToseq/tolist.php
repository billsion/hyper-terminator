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

// $benyuanrenwei

$benyuanrenwei = trim($benyuanrenwei);

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

	<li>

<?php


if(strlen($benyuanrenwei)<20)
{
	echo "<br><br>字太少了，提交不成功！<br><input type=button value=\" 请返回 \" onclick=\"window.history.back()\">";
	exit();
}
elseif(strlen($benyuanrenwei)>2048)
{
	echo "<br><br>字太多了，算不了！<br><input type=button value=\" 请返回 \" onclick=\"window.history.back()\">";
	exit();
}
else
{
	$times = time();

	$query = "INSERT INTO runjus ( `times`, `benyuanrenwei` )
                          VALUES ( '$times','$benyuanrenwei')";
mysql_query("set names utf8 "); 
mysql_query("set character_set_client=utf8"); 
mysql_query("set character_set_results=utf8"); 
$result = mysql_query($query); 

if($result)
{

    $queryna = "SELECT theID FROM runjus WHERE times='".$times."' LIMIT 1";
    mysql_query("set names utf8 "); 
    mysql_query("set character_set_client=utf8"); 
    mysql_query("set character_set_results=utf8");  
    $resulta = mysql_query($queryna);
    $recordsa = mysql_fetch_object($resulta);
    $theID = $recordsa->theID;

	echo "<br><br>您的计算请求已提交！<br>由于机器性能有限，我们采用排队机制（1分钟计算一个请求），您是".$theID."号，<a href=\"index.php\">请点此至列表页面等候查看结果</a>";
	
}


}


?>

</li>
 
    </ul>
</div>

<p align="center"><a href="http://www.ddaayy.com/201703.php">Back to index</a></p>
  
</body>
</html>

