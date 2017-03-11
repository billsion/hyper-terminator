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

//ini_set("display_errors", "On");
//error_reporting(E_ALL | E_STRICT);

	$link = mysql_connect('localhost:3306','root','root');
	mysql_select_db("runjus",$link);

// 1、找到排队最前的一个图片的id
    $queryna = "SELECT theID,url0,hadbc FROM runipfs WHERE url1='' AND hadbc IS NULL ORDER BY theID ASC LIMIT 1";
    mysql_query("set names utf8 "); 
    mysql_query("set character_set_client=utf8"); 
    mysql_query("set character_set_results=utf8");  
    $resulta = mysql_query($queryna);
    $recordsa = mysql_fetch_object($resulta);
    $theID = $recordsa->theID;
	$url0 = $recordsa->url0;
	//$hadbc = $recordsa->hadbc;

if($theID!=NULL)
{
	
$url0 = str_replace("http://www.ddaayy.com/darknet/","",$url0);
	
// 2、进行识别 生产图片 均发布到IPFS 取得IPFS地址 

$timex = time();

$x = "1";
$getarr = shell_exec("cd /var/www/html/darknet/");
$getarr = shell_exec("/var/www/html/darknet/darknet detector test /var/www/html/darknet/cfg/voc.data /var/www/html/darknet/cfg/tiny-yolo-voc.cfg /var/www/html/darknet/cfg/tiny-yolo-voc.weights /var/www/html/darknet/".$url0." -thresh 0.".$x."");
$getarr = shell_exec("cp -r predictions.png /var/www/html/darknet/okpic/");
//$timex = time();
$timen = $timex."_".$x."";
$getarr = shell_exec("mv /var/www/html/darknet/okpic/predictions.png /var/www/html/darknet/okpic/".$timen.".png");
// 压缩图片 开始
//$pictime = $timen.".png";
//$picurl = "http://ddaayy.com/darknet/okpic/yasuopic.php?src=".$pictime."";
//$e = file_get_contents($picurl);
// 压缩图片 结束
//usleep(2000000); // wait for 2 seconds
$getarr = shell_exec("ipfs add /var/www/html/darknet/okpic/".$timen.".png 2>&1 | tee /var/www/html/darknet/ipfs".$x.".log");
//usleep(2000000); // wait for 2 seconds
$llog = file_get_contents("http://www.ddaayy.com/darknet/ipfs".$x.".log");
//echo $llog;
/*
256.00 KB / 551.54 KB [====================>-----------------------] 46.42% 0s 512.00 KB / 551.54 KB [========================================>---] 92.83% 0s 551.54 KB / 551.54 KB [============================================] 100.00% 0s[2K added QmVrZhaaczESk8erAQBga6ZqUwqtR6e8gKbGYcZDY2mCtL 1488788585.png
*/
$thelogarr = explode("added ",$getarr);
$filename_s = $thelogarr[1];
$filename = substr($filename_s,0,46);
echo "<a href=\"http://ipfs.io/ipfs/".$filename."\">查看".$filename."</a><br>";
$url1= "http://ipfs.io/ipfs/".$filename."";
//$getarr = shell_exec("rm /var/www/html/darknet/ipfs".$x.".log");

$x = "2";
$getarr = shell_exec("cd /var/www/html/darknet/");
$getarr = shell_exec("/var/www/html/darknet/darknet detector test /var/www/html/darknet/cfg/voc.data /var/www/html/darknet/cfg/tiny-yolo-voc.cfg /var/www/html/darknet/cfg/tiny-yolo-voc.weights /var/www/html/darknet/".$url0." -thresh 0.".$x."");
$getarr = shell_exec("cp -r predictions.png /var/www/html/darknet/okpic/");
//$timex = time();
$timen = $timex."_".$x."";
$getarr = shell_exec("mv /var/www/html/darknet/okpic/predictions.png /var/www/html/darknet/okpic/".$timen.".png");
//usleep(2000000); // wait for 2 seconds
$getarr = shell_exec("ipfs add /var/www/html/darknet/okpic/".$timen.".png 2>&1 | tee /var/www/html/darknet/ipfs".$x.".log");
//usleep(2000000); // wait for 2 seconds
$llog = file_get_contents("http://www.ddaayy.com/darknet/ipfs".$x.".log");
//echo $llog;
$thelogarr = explode("added ",$getarr);
$filename_s = $thelogarr[1];
$filename = substr($filename_s,0,46);
echo "<a href=\"http://ipfs.io/ipfs/".$filename."\">查看".$filename."</a><br>";
$url2= "http://ipfs.io/ipfs/".$filename."";
//$getarr = shell_exec("rm /var/www/html/darknet/ipfs".$x.".log");

$x = "3";
$getarr = shell_exec("cd /var/www/html/darknet/");
$getarr = shell_exec("/var/www/html/darknet/darknet detector test /var/www/html/darknet/cfg/voc.data /var/www/html/darknet/cfg/tiny-yolo-voc.cfg /var/www/html/darknet/cfg/tiny-yolo-voc.weights /var/www/html/darknet/".$url0." -thresh 0.".$x."");
$getarr = shell_exec("cp -r predictions.png /var/www/html/darknet/okpic/");
//$timex = time();
$timen = $timex."_".$x."";
$getarr = shell_exec("mv /var/www/html/darknet/okpic/predictions.png /var/www/html/darknet/okpic/".$timen.".png");
//usleep(2000000); // wait for 2 seconds
$getarr = shell_exec("ipfs add /var/www/html/darknet/okpic/".$timen.".png 2>&1 | tee /var/www/html/darknet/ipfs".$x.".log");
//usleep(2000000); // wait for 2 seconds
$llog = file_get_contents("http://www.ddaayy.com/darknet/ipfs".$x.".log");
//echo $llog;
$thelogarr = explode("added ",$getarr);
$filename_s = $thelogarr[1];
$filename = substr($filename_s,0,46);
echo "<a href=\"http://ipfs.io/ipfs/".$filename."\">查看".$filename."</a><br>";
$url3= "http://ipfs.io/ipfs/".$filename."";
//$getarr = shell_exec("rm /var/www/html/darknet/ipfs".$x.".log");

if($filename!=NULL)
{
// 3、将IPFS的地址 存入数据库
$query = "UPDATE runipfs SET url1='".$url1."', url2='".$url2."', url3='".$url3."', times='".$timex."' WHERE theID='".$theID."' LIMIT 1";		
mysql_query("set names utf8 "); 
mysql_query("set character_set_client=utf8"); 
mysql_query("set character_set_results=utf8"); 
$result = mysql_query($query); 	


// 4、将IPFS的地址存入 区块链 用id与区块链关联

$myfile1 = fopen("/var/www/html/darknet/1.txt", "w") or die("Unable to open file 1 !");
fwrite($myfile1, $url1);
fclose($myfile1);

$myfile2 = fopen("/var/www/html/darknet/2.txt", "w") or die("Unable to open file 2 !");
fwrite($myfile2, $url2);
fclose($myfile2);

$myfile3 = fopen("/var/www/html/darknet/3.txt", "w") or die("Unable to open file 3 !");
fwrite($myfile3, $url3);
fclose($myfile3);

}



// 已经进行过的 就放入区块链

    $queryna = "SELECT theID,url1,hadbc FROM runipfs WHERE url1!='' AND hadbc IS NULL ORDER BY theID ASC LIMIT 1";
    mysql_query("set names utf8 "); 
    mysql_query("set character_set_client=utf8"); 
    mysql_query("set character_set_results=utf8");  
    $resulta = mysql_query($queryna);
    $recordsa = mysql_fetch_object($resulta);
    $theID = $recordsa->theID;
	$url1 = $recordsa->url1;
	//$hadbc = $recordsa->hadbc;

if($theID!=NULL)
{
$chaincurl = "http://139.196.219.42:8088/hyperledger/2write_darknet.php?theID=".$theID."";
$chainstr = file_get_contents($chaincurl);
echo $chainstr;


$query = "UPDATE runipfs SET hadbc='OK' WHERE theID='".$theID."' LIMIT 1";		
mysql_query("set names utf8 "); 
mysql_query("set character_set_client=utf8"); 
mysql_query("set character_set_results=utf8"); 
$result = mysql_query($query); 	

}



// 把这条加入ubuntu的自动运行 corntab
// corntab -e  
// corntab -l
// */1 * * * * php /var/www/html/darknet/run3.php 2>&1 | tee /var/www/html/darknet/ipfs.log
// 事实上 我把它放到creen里面 然后用looop文件循环跑 

}

?>



