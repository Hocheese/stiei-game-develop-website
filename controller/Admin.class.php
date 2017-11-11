<?php
include("model/image.php");
class Admin extends Controller{
	private $opt;
	function __construct(){
		if(!isset($_SESSION['userData'])){
			//可以输出错误页面或者登录页面
			header('HTTP/1.1 404 Not Found，(#huaji)'); 
			exit;
		}elseif($_SESSION['userData']["admin"]<=0){
			//错误页面
			header('HTTP/1.1 404 Not Found，(#huaji)');
			exit;
		}else{
			$this->opt=isset($_GET['opt'])?$_GET['opt']:"display";
			if(!isset($_GET['act'])){
				$tpl=new Tpl("admin/frame");
				$tpl->display();
			}
			
		}
	}
	function basic(){
		switch ($this->opt){
			case "display":
				$tpl=new Tpl("admin/basic");
				$tpl->display();
				break;
			case "clear":
				$filelist=null;
				try{
					$filelist=scandir("cache");
				}catch(Exception $e){
					$error="读取文件列表失败。".$e->getMessage();
					$this->error($error);
				}
				
				if(!$filelist){
					$error="缓存目录不存在或被占用";
					$this->error($error);
				}else{
					$file;
					foreach($filelist as $key =>$value){
						$file[$key]["path"]="cache/".$value;
						if(is_file("cache/".$value)){
							$rel=false;
							try{
								$rel=unlink("cache/".$value);
								
							}catch(Exception $e){
								output_log("管理模块错误","文件删除失败".$e->getMessage());
							}
							$file[$key]["rel"]=$rel?"成功":"失败";
							
						}else{
							$file[$key]["rel"]="失败";
						}
					}
					//
					$tpl=new Tpl("admin/basic_clear");
					$tpl->assign("info",$file);
					$tpl->display();
					
				}
				break;
			case "del":
		}
	}
	
	function tips(){
		switch ($this->opt){
			case "display":
			case "add":
			case "del":
		}
	}
	
	function user(){
		switch ($this->opt){
			case "display":
			case "add":
			case "del":
		}
	}
	
	function article(){
		switch ($this->opt){
			case "display":
			case "add":
			case "del":
		}
	}
	
	function team(){
		switch ($this->opt){
			case "display":
			case "add":
			case "del":
		}
	}
	function image(){
		switch ($this->opt){
			case "display":
				$tpl=new Tpl("admin/image");
				$tpl->display();
				break;
			case "add":
				$save=isset($_GET["safe"])?$_GET["safe"]:5;
				$rel=image_save($save);
				if($rel["error"]==0){
					$tpl=new Tpl("admin/image_upload_success");
					$tpl->display();
				}else{
					$tpl=new Tpl("admin/image_upload_failed");
					$tpl->assign("error",$rel['data']);
					$tpl->display();
				}
				break;
			case "del":
			case "classadd":
			case "classdel":
		}
	}
	private function error(String $info){
		output_log("管理模块错误",$info);
		$tpl=new Tpl("admin/failed");
		$tpl->assign("error",$info);
		$tpl->display();
		exit;
	}
	
}
?>