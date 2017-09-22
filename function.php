<?php
//令牌检测
if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
}
//include("config.php");
function output_log($logtype,$info){
	global $_CONFIG;
	if(!is_dir("logs")){
		mkdir("logs");
	}
	$logfile=fopen("logs/".date("Y_m_d_").md5($_CONFIG['sys']["log_name_seed"]).".log.txt","ab");
	fwrite($logfile,"[".date("H:i:s")."][".$logtype."]".$info."\r\n");
}

?>