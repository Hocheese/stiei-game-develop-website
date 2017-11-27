<?php
//令牌检测
if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
}
//include("config.php");

/*
在数组中查找。主要用于查询结果
*/
function arr_search(array $arr,String $key,$value){
	foreach($arr as $v){
		if(isset($v[$key])&&$v[$key]==$value){
			return $v;
		}
	}
	return false;
}
/*
获取指定月份的天数。默认为本月。废弃。
*/
function day_of_month(int $month=0){
	if($month==0){
		return date("t");
	}elseif($month==2){
		return 28;
	}elseif($month<8){
		return $month%2==0?30:31;
	}else{
		return $month%2==0?31:30;
	}
}

/*
字符串是否是合法邮箱格式
参数：String $str 
返回：bool
*/
function is_email(String $str){
	$i=0;
	while(($a=substr($str,$i,1))!="@" && strlen($str)>=$i ){
		if(!is_num_letter($a)&&$a!="_"&&$a!="-"){
			return false;
		}
		$i++;
	}
	$i++;
	if(!is_num_letter(substr($str,$i,1))){
		return false;
	}
	$i++;
	while($a=substr($str,$i,1)){
		if(!is_num_letter($a)&&$a!="."&&$a!="-"){
			return false;
		}
		if($a=="."||$a=="-"){
			$a=substr($str,$i+1,1);
			if(!$a){
				return false;
			}
			if($a=="."||$a=="-"){
				return false;
			}
		}
		$i++;
	}
	return true;
}
/*
字符串是否全是大写字母
参数：String $str 
返回：bool
*/
function is_cap_cha(String $str){
	$i=0;
	while($a=substr($str,$i,1)){
		if(ord($a)<65||ord($a)>90){
			return false;
		}
	}
	return true;
}
/*
字符串是否全是小写字母
参数：String $str 
返回：bool
*/
function is_low_cha(String $str){
	$i=0;
	while($a=substr($str,$i,1)){
		if(ord($a)<48||ord($a)>57){
			return false;
		}
		$i++;
	}
	return true;
}
/*
字符串是否全是数字
参数：String $str 
返回：bool
*/
function is_num_cha(String $str){
	$i=0;
	while($a=substr($str,$i,1)){
		if(ord($a)<97||ord($a)>122){
			return false;
		}
		$i++;
	}
	return true;
}
/*
字符串是否全是数字、字母
参数：String $str 
返回：bool
*/
function is_num_letter(String $str){
	$i=0;
	while($a=substr($str,$i,1)){
		if(!is_num_cha($a)&&!is_low_cha($a)&&!is_cap_cha($a)){
			return false;
		}
		$i++;
	}
	return true;
}
/*
输出日志
参数：String $logtype 日志类型
	 String $info    日志内容
返回：void
*/
function output_log(String $logtype,String $info){
	global $_CONFIG;
	if(!is_dir("logs")){
		mkdir("logs");
	}
	$logfile=fopen("logs/".date("Y_m_d_").md5($_CONFIG['sys']["log_name_seed"]).".log.txt","ab");
	fwrite($logfile,"[".date("H:i:s")."][".$logtype."]".$info."\r\n");
}
/*
生成一定长度数字字符串
参数：int $len 号码长度
返回：int
*/
function rand_num_code(int $len){
	$num="";
	while(strlen($num)<$len){
		$i=rand(0,9);
		//开头不为0
		if(strlen($num)==0&&$i==0){
			continue;
		}
		if(strlen($num)>=2){
			if(($i-(int)substr($num,-1,1))!=((int)substr($num,-1,1)-(int)substr($num,-2,1))){
				$num.=$i;
			}
		}else{
			$num.=$i;
		}
		
	}
	return (int)$num;
}
/*
生成指定长度的随机字符串（原邀请码）
*/
function randStr(int $len){
	$str="";
	while(strlen($str)<$len){
		$a=rand();
		switch($a%3){
			case 0:
				$str.=rand(0,9);
				break;
			case 1:
				$str.=chr(rand(65,90));
				break;
			case 2:
				$str.=chr(rand(97,122));
				break;
		}
	}
	return $str;
	
}
?>