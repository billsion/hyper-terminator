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
	
    <style>
#container { 
  padding-top:0px; 
  padding-left:20px; 
  padding-right:20px; 
  padding-bottom:0px; 
  border: 1px solid 000000; 
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

<ul class="search-top"><li>目标检测-证据存储-法律定责方案<br>
Object Detection- Evidence Storage- Legal Responsibility Cognizance
</li></ul>
 
<div class="ui-refresh">
    <ul class="data-list">
<p align="center">
<!--<a href="index.php">换一个图片</a>-->
<br>
<?php
    $mytime = time();  
    echo "
	<form method=\"post\" action=\"http://www.ddaayy.com/darknet/tolist.php?thecode=".$thecode."&pictime=".$mytime.".jpg\" enctype=\"multipart/form-data\"  data-ajax=\"false\">
    <center>
       <input type=\"hidden\" value=\"".$mytime."\" name=\"pictimeb\"/>
       <input type=\"file\" name=\"file\" accept=\"image/x-png,image/gif,image/jpeg\" /><br>
       <input type=\"submit\" value=\"上传图片\" name=\"submitbtn\">
    </center>
    </form>";
?>
<br>
<div id="container"> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
提示：这只是Object Detection的DEMO，目前仅能识别出20种物体：飞机、自行车、鸟类、船、瓶子、巴士、汽车、猫咪、椅子、母牛、餐桌、狗、马、摩托车、人类、盆栽、绵羊、沙发、火车、显示器
</div>
</p> 

<?php

$pp = 3; //这里定义 每一页显示多少条

if($p==NULL)
{
	$p=1;
}

$from = ($p-1)*$pp; //起始点
$pagex = "LIMIT ".$from.", ".$pp."";


    $queryna = "SELECT theID FROM runipfs WHERE url1='' AND url2='' AND url3='' ORDER BY theID ASC LIMIT 1";
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
$resultt = mysql_query( "SELECT theID,times,url0,url1,url2,url3 FROM runipfs ORDER BY times DESC ".$pagex."" );
$x=0;
while($data = mysql_fetch_row($resultt))
{
	//if(($data[3]=="")&&($data[4]=="")&&($data[5]==""))
	if($data[3]=="")
	{
		$juliID = 1+$data[0]-$theIDe;
		$data[3]="排队中！".$juliID."分钟后算出结果"; 
		
	}
	else{ $data[3]="→点击查看详情←"; }
  
echo "
        <li>
            <a href=\"view.php?theID=".$data[0]."\">
                <dl>
                    <dt>编号：".$data[0]."</dt>
                    <dd class=\"content\"><img src=\"".$data[2]."\" width=\"90%\"></dd>
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



