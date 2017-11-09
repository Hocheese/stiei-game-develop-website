<?php
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
}
?>