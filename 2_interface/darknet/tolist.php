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

	<li>

<?php


if($submitbtn!=NULL)
{
	
$file = $_FILES['file'];//得到传输的数据
//得到文件名称
$name = $file['name'];
$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
$allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
if(!in_array($type, $allow_type)){
  //如果不被允许，则直接停止程序运行
  return ;
}
//判断是否是通过HTTP POST上传的
if(!is_uploaded_file($file['tmp_name'])){
  //如果不是通过HTTP POST上传的
  return ;
}
$upload_path = "/var/www/html/darknet/okpic/"; //上传文件的存放路径
//开始移动文件到相应的文件夹
    if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name']))
    {
    //echo "Successfully!";
    $oldPath = $upload_path.$file['name']; 
    $newPath = $upload_path.$pictimeb.".jpg";
    rename($oldPath,$newPath); 
    
    //echo "<p align=\"center\"><img src=\"".$pictimeb.".jpg\" width=\"280\"></p>";
    
    }
	else
	{
     //echo "上传失败，请重新上传<br>";
    $mytime = time();  
    echo "
	<form method=\"post\" action=\"http://www.ddaayy.com/darknet/tolist.php?thecode=".$thecode."&pictime=".$mytime.".jpg\" enctype=\"multipart/form-data\"  data-ajax=\"false\">
    <center>
       <input type=\"hidden\" value=\"".$mytime."\" name=\"pictimeb\"/>
       <input type=\"file\" name=\"file\" accept=\"image/x-png,image/gif,image/jpeg\" /><br>
       <input type=\"submit\" value=\"上传图片\" name=\"submitbtn\">
    </center>
    </form>";
    }

}
else
{

$mytime = time();  

if($pictime==NULL)
{	
echo "
<form method=\"post\" action=\"http://www.ddaayy.com/darknet/tolist.php?thecode=".$thecode."&pictime=".$mytime.".jpg\" enctype=\"multipart/form-data\"  data-ajax=\"false\">
<center>
  <input type=\"hidden\" value=\"".$mytime."\" name=\"pictimeb\"/>
  <input type=\"file\" name=\"file\" accept=\"image/x-png,image/gif,image/jpeg\" /><br>
  <input type=\"submit\" value=\"上传图片\" name=\"submitbtn\">
</center>
</form>";
}


}

if($pictime!=NULL)
{
echo "<p align=\"center\"><img src=\"okpic/".$pictime."\" width=\"90%\"></p>";

$url0 = "http://www.ddaayy.com/darknet/okpic/".$pictime."";

$times = time();

	$query = "INSERT INTO runipfs ( `times`, `url0` )
                          VALUES ( '$times','$url0')";
mysql_query("set names utf8 "); 
mysql_query("set character_set_client=utf8"); 
mysql_query("set character_set_results=utf8"); 
$result = mysql_query($query); 

if($result)
{

// 压缩图片 开始

$picurl = "http://ddaayy.com/darknet/okpic/yasuopic.php?src=".$pictime."";
$e = file_get_contents($picurl);

// 压缩图片 结束


    $queryna = "SELECT theID FROM runipfs WHERE times='".$times."' LIMIT 1";
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

