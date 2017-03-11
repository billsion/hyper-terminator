<?php
header("Content-type: text/html; charset=utf-8"); 

session_start(); 
//提取页面和浏览器提交的变量
@extract($_SERVER, EXTR_SKIP); 
@extract($_SESSION, EXTR_SKIP); 
@extract($_POST, EXTR_SKIP); 
@extract($_FILES, EXTR_SKIP); 
@extract($_GET, EXTR_SKIP); 
@extract($_ENV, EXTR_SKIP); 
//提取完成   

$_SESSION['views']=1;

	$link = mysql_connect('localhost:3306','root','root');
	mysql_select_db("runjus",$link);

error_reporting(0);

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

<ul class="search-top"><li>智能法官-多人工智能共识机制<br>
Artificial Intelligence Arbiter-Consensus Among Multiple Machines</li></ul>
 
<div class="ui-refresh">
    <ul class="data-list">
<form method="POST" action="tolist.php">
<p align="center">
<a href="index.php">换一个案例</a>
<br>
<textarea rows="8" name="benyuanrenwei" cols="50" >
<?php
$randID = rand(1,10000);
    $queryna = "SELECT benyuanrenwei FROM jusdata2017_input WHERE theID='".$randID."' LIMIT 1";
    mysql_query("set names utf8 "); 
    mysql_query("set character_set_client=utf8"); 
    mysql_query("set character_set_results=utf8");     
	$resulta = mysql_query($queryna);
	$recordsa = mysql_fetch_object($resulta);
	$benyuanrenwei = $recordsa->benyuanrenwei;
	echo $benyuanrenwei;
?>
</textarea>
<br>
<input type="submit" value="   确 定   " name="ok">
</p>
</form> 

<hr>
	

<?php

$pp = 10; //这里定义 每一页显示多少条

if($p==NULL)
{
	$p=1;
}

$from = ($p-1)*$pp; //起始点
$pagex = "LIMIT ".$from.", ".$pp."";


    $queryna = "SELECT theID FROM runjus WHERE panjueruxia='' ORDER BY theID ASC LIMIT 1";
    mysql_query("set names utf8 "); 
    mysql_query("set character_set_client=utf8"); 
    mysql_query("set character_set_results=utf8");  
    $resulta = mysql_query($queryna);
    $recordsa = mysql_fetch_object($resulta);
    $theIDe = $recordsa->theID;
	// $theIDe 最远一个



    mysql_query("set names utf8 "); 
    mysql_query("set character_set_client=utf8"); 
    mysql_query("set character_set_results=utf8");    
$resultt = mysql_query( "SELECT theID,benyuanrenwei,panjueruxia FROM runjus ORDER BY times DESC ".$pagex."" );
$x=0;
while($data = mysql_fetch_row($resultt))
{
	if($data[2]=="")
	{
		
		$juliID = 1+$data[0]-$theIDe;
		
		$data[3]="排队中！".$juliID."分钟后算出结果"; 
		
	}
	else{ $data[3]="→点击查看详情←"; }
	
/*
  echo "<b>编号：</b>".$data[0]."<br>";  
  echo "<b>输入内容：</b>".$data[1]."<br>";  
  echo "<b>计算结果：</b>".$data[3]."<br>";  
  echo "<hr>"; 
*/  
  
echo "
        <li>
            <a href=\"view.php?theID=".$data[0]."\">
                <dl>
                    <dt>编号：".$data[0]."</dt>
                    <dd class=\"content\">输入内容：".$data[1]."</dd>
                    <dd class=\"source\">计算结果：".$data[3]."</dd>					
                </dl>
            </a>
        </li>
";  
  
  
  
$x++;  
}


?>
 
    </ul>
    <div class="ui-refresh-down"></div>      <!--setup方式带有class为ui-refresh-down或ui-refresh-up的元素必须加上，用于放refresh按钮-->
</div>

<br>
<p align="center"><a href="http://www.ddaayy.com/201703.php">Back to index</a></p>

<script type="text/javascript">
    (function () {
        /*组件初始化js begin*/
        $('.ui-refresh').refresh({
            load: function (dir, type) {
                var me = this;
                $.getJSON('x.php', function (data) {
                    var $list = $('.data-list'),
                            html = (function (data) {      //数据渲染
                                var liArr = [];
                                $.each(data, function () {
                                    liArr.push(this.html);
                                });
                                return liArr.join('');
                            })(data);

                    $list[dir == 'up' ? 'prepend' : 'append'](html);
                    me.afterDataLoading();    //数据加载完成后改变状态
                });
            }
        });
        /*组件初始化js end*/
    })();
</script>
  
</body>
</html>
