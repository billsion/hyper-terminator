<?php

error_reporting(0);

//session_start(); 
//提取页面和浏览器提交的变量
@extract($_SERVER, EXTR_SKIP); 
@extract($_SESSION, EXTR_SKIP); 
@extract($_POST, EXTR_SKIP); 
@extract($_FILES, EXTR_SKIP); 
@extract($_GET, EXTR_SKIP); 
@extract($_ENV, EXTR_SKIP); 
//提取完成
  
/** 
 图片压缩操作类 
 v1.0 
*/  
   class Image{  
         
       private $src;  
       private $imageinfo;  
       private $image;  
       public  $percent = 0.1;  
       public function __construct($src){  
             
           $this->src = $src;  
             
       }  
       /** 
       打开图片 
       */  
       public function openImage(){  
             
           list($width, $height, $type, $attr) = getimagesize($this->src);  
           $this->imageinfo = array(  
                  
                'width'=>$width,  
                'height'=>$height,  
                'type'=>image_type_to_extension($type,false),  
                'attr'=>$attr  
           );  
           $fun = "imagecreatefrom".$this->imageinfo['type'];  
           $this->image = $fun($this->src);  
       }  
       /** 
       操作图片 
       */  
       public function thumpImage(){  
             
            $new_width = $this->imageinfo['width'] * $this->percent;  
            $new_height = $this->imageinfo['height'] * $this->percent;  
            $image_thump = imagecreatetruecolor($new_width,$new_height);  
            //将原图复制带图片载体上面，并且按照一定比例压缩,极大的保持了清晰度  
            imagecopyresampled($image_thump,$this->image,0,0,0,0,$new_width,$new_height,$this->imageinfo['width'],$this->imageinfo['height']);  
            imagedestroy($this->image);    
            $this->image =   $image_thump;  
       }  
       /** 
       输出图片 
       */  
       public function showImage(){  
             
            header('Content-Type: image/'.$this->imageinfo['type']);  
            $funcs = "image".$this->imageinfo['type'];  
            $funcs($this->image);  
             
       }  
       /** 
       保存图片到硬盘 
       */  
       public function saveImage($name){  
             
            $funcs = "image".$this->imageinfo['type'];  
            $funcs($this->image,$name.'.'.$this->imageinfo['type']);  
             
       }  
       /** 
       销毁图片 
       */  
       public function __destruct(){  
             
           imagedestroy($this->image);  
       }  
         
   }  
   
    //require 'image.class.php';  
    //$src = "001.jpg";  

	
    $array = getimagesize($src);
    //print_r($array);

    $ws=$array[0]; //宽度
    $hs=$array[1]; //高度

    $ws_old=$ws; //宽度
    $hs_old=$hs; //高度
	
for($i=1;$i<20;$i++)
{
	if($ws>600)
	{
	$ws = $ws*0.9;
	}
	else //达到标准以下了
	{
	$bili = round(($ws/$ws_old),2);
	}
}

//echo $bili;

        $image = new Image($src);  
        $image->percent = $bili;  
        $image->openImage();  
        $image->thumpImage();  
        $image->showImage();  
        $image->saveImage($src);  

$src_n = $src.".jpeg";
rename($src_n,$src);		

?> 
