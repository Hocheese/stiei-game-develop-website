<?php
include("model/image.php");
class Image extends Controller{
	//获取图片
	function get(){
		//header("Content-type:image/png");
		if(isset($_GET['id'])){
			$rel=image_get((int)$_GET['id']);
			if($rel["error"]!=0){
				header("Content-type:image/png");
				$errorImage=imagecreate(220,60);
				imagecolorallocate($errorImage,255,255,255);
				$color=imagecolorallocate($errorImage,rand(0,255),rand(0,255),rand(0,255));
				$str=$rel["error"]==2?"图片不存在":"数据库出错";
				imagefttext($errorImage,32.0,0,0,45,$color,"fonts/mzd.ttf",$str);
				imagepng($errorImage);
				imagedestroy($errorImage);
			}else{
				$rel["data"]=$rel["data"][0];
				switch($rel["data"]["type"]){
					case "jpg":
						
					case "jpeg":
						header("Content-type:image/jpeg");
						$image=imagecreatefromjpeg($rel["data"]["src"]);
						break;
					case "png":
						header("Content-type:image/png");
						$image=imagecreatefrompng($rel["data"]["src"]);
						break;
					case "gif":
						header("Content-type:image/gif");
						$image=imagecreatefromgif($rel["data"]["src"]);
					default:
						header("Content-type:image/png");
						$errorImage=imagecreate(220,60);
						imagecolorallocate($errorImage,255,255,255);
						$color=imagecolorallocate($errorImage,rand(0,255),rand(0,255),rand(0,255));
						imagefttext($errorImage,32.0,0,0,45,$color,"fonts/mzd.ttf","系统出错");
						output_log("图片错误","不支持的图片类型 id:".$rel["data"]["id"]." 类型：".$rel["data"]["type"]." 路径：".$rel["data"]["src"]);
						imagepng($errorImage);
						imagedestroy($errorImage);
						exit;
				}
				if($rel["data"]["safe"]>0){
					$logo64="img/logo64.png";
					if(file_exists($logo64)){
						$fill=imagecreatefrompng($logo64);
						imagesettile($image,$fill);
						$info=getimagesize($rel["data"]["src"]);
						$width=$info[0];
						$height=$info[1];
						//output_log("测试","执行水印".$rel["data"]["safe"]);
						switch($rel["data"]["safe"]){
							case 1:
								imagecopy($image,$fill,5,5,0,0,64,64);
								//imagefilledrectangle($image,5,5,69,69,IMG_COLOR_TILED);
								//imagepng($image);
								output_log("测试","完成执行水印".$rel["data"]["safe"]);
								break;
							case 2:
								imagecopy($image,$fill,$width/2-32,5,0,0,64,64);
								//imagefilledrectangle($image,$width/2-32,5,$width/2+32,69,IMG_COLOR_TILED);
								break;
							case 3:
								imagecopy($image,$fill,$width-69,5,0,0,64,64);
								//imagefilledrectangle($image,$width-69,5,$width-5,69,IMG_COLOR_TILED);
								break;
							case 4:
								imagecopy($image,$fill,$width-69,$height/2-32,0,0,64,64);
								//imagefilledrectangle($image,$width-69,$height/2-32,$width-5,$height/2+32,IMG_COLOR_TILED);
								break;
							case 5:
								imagecopy($image,$fill,$width-69,$height-69,0,0,64,64);
								//imagefilledrectangle($image,$width-69,$height-69,$width-5,$height-5,IMG_COLOR_TILED);
								break;
							case 6:
								imagecopy($image,$fill,$width/2-32,$height-69,0,0,64,64);
								//imagefilledrectangle($image,$width/2-32,$height-69,$width/2+32,$height-5,IMG_COLOR_TILED);
								break;
							case 7:
								imagecopy($image,$fill,5,$height-69,0,0,64,64);
								//imagefilledrectangle($image,5,$height-69,$height/2-32,$height-$height/2+32,IMG_COLOR_TILED);
								break;
							case 8:
								imagecopy($image,$fill,5,$height/2-32,0,0,64,64);
								//imagefilledrectangle($image,5,$height-69,69,$height-5,IMG_COLOR_TILED);
								break;
						}
					}else{
						output_log("图片错误","找不到水印logo");
					}

				}
				imagepng($image);
				imagedestroy($image);
				
				
			}
		}else{
			header("Content-type:image/png");
			//彩蛋
			$errorInfo=array("江山如此多娇，引无数英雄竞折腰",
							 "帝国主义是纸老虎",
							 "天若有情天亦老，人间正道是沧桑",
							 "一切反动派都是纸老虎",
							 "宜将剩勇追穷寇，不可沽名学霸王",
							 "踏遍青山人未老，风景这边独好",
							 "星星之火，可以燎原"
							);
			$eid=rand(0,count($errorInfo)-1);
			$errorImage=imagecreate(680,60);
			imagecolorallocate($errorImage,255,255,255);
			$color=imagecolorallocate($errorImage,rand(0,255),rand(0,255),rand(0,255));
			imagefttext($errorImage,32.0,0,(500-strlen($errorInfo[$eid])/3*32)/2,45,$color,"fonts/mzd.ttf",$errorInfo[$eid]);
			imagepng($errorImage);
			imagedestroy($errorImage);
		}
		
		
	}
}
?>