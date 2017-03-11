<?php
header("Content-Type: text/html;charset=utf-8");

error_reporting(0);

session_start(); 
//提取页面和浏览器提交的变量
@extract($_SERVER, EXTR_SKIP); 
@extract($_SESSION, EXTR_SKIP); 
@extract($_POST, EXTR_SKIP); 
@extract($_FILES, EXTR_SKIP); 
@extract($_GET, EXTR_SKIP); 
@extract($_ENV, EXTR_SKIP); 
//提取完成  

if(isset($_SESSION['views']))
{
  $_SESSION['views']=$_SESSION['views']+1;
}
else
{
  $_SESSION['views']=2;
}



	$link = mysql_connect('localhost:3306','root','root');
	mysql_select_db("runjus",$link);


    $queryna = "SELECT theID FROM runjus WHERE panjueruxia='' ORDER BY theID ASC LIMIT 1";
    mysql_query("set names utf8 "); 
    mysql_query("set character_set_client=utf8"); 
    mysql_query("set character_set_results=utf8");  
    $resulta = mysql_query($queryna);
    $recordsa = mysql_fetch_object($resulta);
    $theIDe = $recordsa->theID;
	// $theIDe 最远一个	
	
	
echo "[";

//$_SESSION['views']
$fromx = ($_SESSION['views']-1)*10;
$x = 0;        

//echo $fromx;

  $resultt = mysql_query( "SELECT theID,benyuanrenwei,panjueruxia FROM runjus ORDER BY times DESC LIMIT  ".$fromx.", 10"  );  
  
  $ts = mysql_num_rows($resultt); //有多少结果
  
  while($data = mysql_fetch_row($resultt))
  {

$data[1] = htmlspecialchars($data[1]);

$data[1] = str_replace(array("\r\n", "\r", "\n"), "", $data[1]); 

$data[1] = strip_tags($data[1]);
$data[1] = str_replace("&nbsp;","",$data[1]);
$data[1] = str_replace("<br>","",$data[1]);
$data[1] = str_replace("<hr>","",$data[1]);
$data[1] = str_replace("\n","",$data[1]);
$data[1] = str_replace("	","",$data[1]);
$data[1] = str_replace(" ","",$data[1]);
$data[1] = str_replace("(","",$data[1]);              
//$data[1] = str_replace(".","",$data[1]); 
$data[1] = str_replace("-","",$data[1]);  
$data[1] = str_replace("+","",$data[1]);        
$data[1] = str_replace(")","",$data[1]);              
$data[1] = str_replace(";","",$data[1]);        
$data[1] = rtrim($data[1]);
$data[1] = str_replace("\'","\\\'",$data[1]);
$data[1] = str_replace("\"","\\\"",$data[1]);
$data[1] = str_replace("/","\\/",$data[1]);

//$data[1] = str_replace(PHP_EOL, '', $data[1]);


/*
$data[2] = strip_tags($data[2]);
$data[2] = rtrim($data[2]);
$data[2] = htmlspecialchars($data[2]);
*/

	if($data[2]=="")
	{
		
		$juliID = 1+$data[0]-$theIDe;
		
		$data[3]="排队中！".$juliID."分钟后算出结果"; 
		
	}
	else{ $data[3]="→点击查看详情←"; }

if( ($ts-1)>=$x )
{
//echo "{\"html\":\"<li data-highlight=\\\"ui-list-hover\\\">\\n <a target=_blank href=\\\"".$data[3]."\\\">\\n <dl>\\n <dt>".$data[1]."<\\/dt>\\n <dd class=\\\"content\\\">".$data[2]."<\\/dd>\\n <dd class=\\\"source\\\">".$data[0]." - ".$data[6]." - ".$data[4]."阅读 - ".$data[5]."赞<\\/dd>\\n <\\/dl>\\n <\\/a>\\n <\\/li>\"}";

//echo "{\"html\":\"<li><a href=\\\"view.php?theID=".$data[0]."\\\"><dl><dt>编号：".$data[0]."<\\/dt><dd class=\\\"content\\\">输入内容：".$data[1]."<\\/dd><dd class=\\\"source\\\">计算结果：".$data[3]."<\\/dd><\\/dl><\\/a><\\/li>\"}";

echo "{\"html\":\"<li><a target=_blank href=\\\"view.php?theID=".$data[0]."\\\"><dl><dt>编号：".$data[0]."<\\/dt><dd class=\\\"content\\\">输入内容：".$data[1]."<\\/dd><dd class=\\\"source\\\">计算结果：".$data[3]."<\\/dd><\\/dl><\\/a><\\/li>\"}";

}
$x++; //最后一个逗号 第10个不要逗号
if($x < $ts)
{
echo ",";
}

  }      

echo "]";


/*
echo "[";
echo "{\"html\":\"<li data-highlight=\\\"ui-list-hover\\\">\\n <a href=\\\"http:\\/\\/www.baidu.com\\\">\\n <dl>\\n <dt>标题".$_SESSION['views']."<\\/dt>\\n <dd class=\\\"content\\\">摘要<\\/dd>\\n <dd class=\\\"source\\\">来源<\\/dd>\\n <\\/dl>\\n <\\/a>\\n <\\/li>\"}";
echo ",";
echo "{\"html\":\"<li data-highlight=\\\"ui-list-hover\\\">\\n <a href=\\\"http:\\/\\/www.baidu.com\\\">\\n <dl>\\n <dt>标题".$_SESSION['views']."<\\/dt>\\n <dd class=\\\"content\\\">摘要<\\/dd>\\n <dd class=\\\"source\\\">来源<\\/dd>\\n <\\/dl>\\n <\\/a>\\n <\\/li>\"}";
echo ",";
echo "{\"html\":\"<li data-highlight=\\\"ui-list-hover\\\">\\n <a href=\\\"http:\\/\\/www.baidu.com\\\">\\n <dl>\\n <dt>标题".$_SESSION['views']."<\\/dt>\\n <dd class=\\\"content\\\">摘要<\\/dd>\\n <dd class=\\\"source\\\">来源<\\/dd>\\n <\\/dl>\\n <\\/a>\\n <\\/li>\"}";
echo "]";
*/

?>

