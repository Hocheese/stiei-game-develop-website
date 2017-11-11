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
}
?>