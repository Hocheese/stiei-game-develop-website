<?php
//include("../Database.class.php");
/*
参数：int $accountCode：账号
	String $passowrd：密码
返回：array $rel
	int $rel["error"]错误代码
		0：无错误
		1：数据库连接出错
		2：账号不存在
		3：密码错误
	String/array $rel["data"]
		String :错误信息
		array：用户信息
*/
function login(int $accountCode,String $passowrd){
	$db=new Database();
	$rel=$db->query("SELECT * FROM `user` WHERE `account_code`=".$accountCode);
	if($rel["error"]==0){
		$rel["data"]=$rel["data"][0];
		if(password_verify(md5(md5($passowrd).$rel["data"]["timeline"]),$rel["data"]["password"])){
			unset($rel["data"]["password"]);
		}else{
			$rel["error"]=3;
			$rel["data"]="密码错误";
		}
	}elseif($rel["error"]==2){
		$rel["data"]="账号不存在";
	}
	return $rel;
	
}
?>