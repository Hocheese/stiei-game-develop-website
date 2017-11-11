<?php
function image_save(int $safe=0){
	define("IMAGE_UPLOAD_DIR","source/images");
	is_dir("source")?"":mkdir("source");
	is_dir(IMAGE_UPLOAD_DIR)?"":mkdir(IMAGE_UPLOAD_DIR);
	$time=time();
	if($_FILES["file"]["error"]==0){
		$type=image_type();
		$dirname=IMAGE_UPLOAD_DIR."/$time.".$type;
		move_uploaded_file($_FILES["file"]["tmp_name"],$dirname);
		$db=new Database();
		$title=isset($_GET['title'])?$_GET['title']:"无标题";
		$rel=$db->query("INSERT INTO `image`(`title`, `type`, `src`, `safe`, `timeline`) VALUES ('$title', '$type' ,'$dirname',$safe,$time)");
		if($rel["error"]==0){
			$rel["data"]=$time;
		}
		
	}else{
		
		$rel["error"]=$_FILES["file"]["error"]+10;
		switch($_FILES["file"]["error"]){
			case 1:
				$rel["data"]="图片过大。（".$_FILES['file']['size']."字节）";
				break;
			case 2:
				$rel["data"]="图片过大。（".$_FILES['file']['size']."字节）";
				break;
			case 3:
				$rel["data"]="文件上传中断";
				break;
			case 4:
				$rel["data"]="未接收到图片";
				break;
			case 6:
				$rel["data"]="系统错误。请向组织报告这个错误。";
				output_log("文件接收错误","找不到临时文件夹");
				break;
			case 7:
				$rel["data"]="系统错误。请向组织报告这个错误。";
				output_log("文件接收错误","文件写入失败");
				break;
			default:
				$rel["data"]="未知错误";
				output_log("文件接收错误","未知错误。PHP错误代码：".$_FILES["file"]['error']);
		}
		
	}
	return $rel;
	
}

function image_type(){
	if(isset($_FILES['userfile']['type'])&& $_FILES['userfile']['type']!=""){
		$type=preg_match("/[A-z]*$/",$_FILES['file']['name'],$match);
	}else{
		$times=preg_match("/[A-z]{3,4}$/",$_FILES['file']['name'],$match);
		$type=$times?$match[0]:"jpg";
	}
	return $type;
}

function image_get(int $id){
	$db=new Database();
	$rel=$db->query("SELECT * FROM `image` WHERE `id`=$id");
	return $rel;
}
function image_getByTime(int $time){
	$db=new Database();
	$rel=$db->query("SELECT * FROM `image` WHERE `timeline`=$time");
	return $rel;
}
function image_count(){
	$db=new Database();
	$rel=$db->query("SELECT MAX(`id`) AS `total` FROM `image`");
	$rel['data']=$rel['data'][0];
	return $rel;
}

?>