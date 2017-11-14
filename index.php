<?php
/*
网站的入口
*/
//网站令牌，确保所有人是从这里进入的。

define("TOKEN",true);
session_start();
include("config.php");
include("function.php");
include("Controller.class.php");
include("Database.class.php");
include("Tpl.class.php");
try{
	$_CTRL=isset($_GET["ctrl"])?$_GET["ctrl"]:"index";
	Controller::$_CTRL();
	unset($_GET["ctrl"]);
}catch(Exception $e){
	output_log("系统错误",$e->getMessage());
}
?>