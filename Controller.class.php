<?php
//令牌检测
if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
}

class Controller{
	static function index(){
		
	}
	function __call($name,$arguments){
		
	}
	static function __callStatic($name,$arguments){
		if(!file_exists("controller/".$name."class.php")){
			header("HTTP/1.1 404 No Found");
			exit("404 No Found");
		}else{
			include($name."class.php");
			$actClass=new $name();
			$act=isset($_GET["act"])?$_GET["act"]:"index";
			$actClass->$act();
		}
	}
}
?>