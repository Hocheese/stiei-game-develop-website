<?php
//令牌检测
if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
}
include("model/image.php");
class Controller{
	function __construct(){
		
	}
	static function index(){
		if(!isset($_SESSION["userData"])){
			include("tpl/index.html");
		}else{
			$ids=image_getNewFour();
			$tpl=new Tpl("main");
			$tpl->assign("ids",$ids);
			$tpl->display();
		}
	}
	function __call($name,$arguments){
		
	}
	static function __callStatic($name,$arguments){
		if(!file_exists("controller/".$name.".class.php")){
			global $_CONFIG;
			if($_CONFIG["sys"]["debug"]&&$_CONFIG["sys"]["visit_log"]){
				output_log("模块错误",$name."不存在，路径："."controller/".$name.".class.php");
			}
			header("HTTP/1.1 404 No Found");
			exit("404 No Found");
		}else{
			include("controller/".$name.".class.php");
			$actClass=new $name();
			$act=isset($_GET["act"])?$_GET["act"]:"index";
			$actClass->$act();
		}
	}
	
	function info(array $info){
		$tpl=new Tpl("info");
		$tpl->assign("info",$info);
		$tpl->display();
	}
}
?>
