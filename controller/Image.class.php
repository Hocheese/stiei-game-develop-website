<?php
include("model/image.php");
class Image extends Controller{
	//获取图片
	function get(){
		header("Content-type:image/png");
		if(isset($_GET['id'])){
			$rel=image_get((int)$_GET['id']);
			if($rel["error"]!=0){
				$errorImage=imagecreate(220,60);
				imagecolorallocate($errorImage,255,255,255);
				$color=imagecolorallocate($errorImage,rand(0,255),rand(0,255),rand(0,255));
				$str=$rel["error"]==2"图片不存在":"数据库出错";
				imagefttext($errorImage,32.0,0,0,45,$color,"fonts/mzd.ttf",$str);
				imagepng($errorImage);
				imagedestroy($errorImage);
			}else{
				
			}
		}else{
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