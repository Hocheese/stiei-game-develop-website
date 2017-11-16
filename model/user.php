<?php
/*
检测账号是否可用
参数：int $accountCode：账号
返回：bool
*/
function account_code_available(int $num){
	$db=new Database();
	$rel=$db->query("SELECT * FROM `user` WHERE `account_code`=".$accountCode);
	return $rel["error"]==2;
}
//删除专业
function del_pro(int $id){
	$db=new Database();
	$rel=$db->query("SELECT * FROM `user` WHERE `account_code`=".$accountCode);
}
/*
获取二级学院列表
参数：无
返回：array $rel
	int $rel["error"]错误代码
		0：无错误
		1：数据库连接出错
		2：数据库为空
	String/array $rel["data"]
		String :错误信息
		array：二级学院列表
*/
function get_col_list(){
	$db=new Database();
	return $college=$db->query("SELECT * FROM `sys_profession` ORDER BY `college` ");
	
}
/*
获取专业列表
参数：无
返回：array $rel
	int $rel["error"]错误代码
		0：无错误
		1：数据库连接出错
		2：数据库为空
	String/array $rel["data"]
		String :错误信息
		array：专业列表
*/
function get_pro_list(){
	$db=new Database();
	return $db->query("SELECT * FROM `sys_profession` ORDER BY `college`");
}
/*
获取本月签到信息
*/
function get_punchin_mouth(int $accountCode){
	$db=new Database();
	$rel=$db->query("SELECT * FROM `user_punchin_month` WHERE `ucode`=".$accountCode." AND `date`<".date("t"));
	if($rel["error"]==0){
		foreach($rel["data"] as &$v){
			$v["ispunch"]=$v['date']%2==$v['ispunch']?true:false;
		}
		unset($v);
	}
	
	
	return $rel;
}
/*
获取各月签到次数
*/
function get_punchin_times(int $accountCode){
	$db=new Database();
	$rel=$db->query("SELECT * FROM `user_punchin_times` WHERE `ucode`=".$accountCode);
	return $rel;
}
/*
获取用户信息
参数：int $accountCode：账号
返回：array $rel
	int $rel["error"]错误代码
		0：无错误
		1：数据库连接出错
		2：账号不存在
	String/array $rel["data"]
		String :错误信息
		array：用户信息
*/
function get_user_info(int $accountCode){
	$db=new Database();
	$rel=$db->query("SELECT * FROM `user` WHERE `account_code`=".$accountCode);
	if($rel["error"]==0){
		$rel["data"]=$rel["data"][0];
		unset($rel["data"]["password"]);
		unset($rel["data"]["timeline"]);
	}elseif($rel["error"]==2){
		$rel["data"]="账号不存在";
	}
	return $rel;
}

/*
用户登录
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
			unset($rel["data"]["timeline"]);
			$_SESSION["userData"]=$rel["data"];
		}else{
			$rel["error"]=3;
			$rel["data"]="密码错误";
		}
	}elseif($rel["error"]==2){
		$rel["data"]="账号不存在";
	}
	return $rel;
	
}
/*
用户签到
参数：int $accountCode：账号
返回：array $rel
	int $rel["error"]错误代码
		0：无错误
		1：数据库连接出错
		3：已经签到过
	String $rel["data"]
		String :错误信息
*/
function punchin(int $accountCode){
	$today=date("j");
	$tomonth=date("n");
	$toyear=date("Y");
	$db=new Database();
	$dbrel=$db->query("SELECT * FROM `user_punchin_month` WHERE `ucode`=".$accountCode." AND `date`=".$today);
	if($dbrel["error"]==0){
		if($dbrel["data"][0]['date']%2==$dbrel["data"][0]['ispunch']){
			$rel["error"]=3;
			$rel["data"]="你已经签到过了";
		}else{
			$udtrel=$db->query("UPDATE `user_punchin_month` SET `ispunch`=".(1-$dbrel["data"][0]['ispunch'])." WHERE `ucode`=".$accountCode." AND `date`=".$today);
			if($udtrel["error"]==0){
				$timesRel=$db->query("SELECT * FROM `user_punchin_times` WHERE `ucode`=".$accountCode." AND `year`=".$toyear." AND `month`=".$tomonth);
				if($timesRel["error"]==0){
					$timesUrel=$db->query("UPDATE `user_punchin_times` SET `times`=".($timesRel["data"][0]["times"]+1)." WHERE `ucode`=".$accountCode." AND `year`=".$toyear." AND `month`=".$tomonth);
					if($timesUrel["error"]==0){
						$rel["error"]=0;
						$rel["data"]="签到成功";
					}else{
						$rel=$timesUrel;
					}
				}elseif($udtrel["error"]==2){
					$timeIsrtRel=$db->query("INSERT INTO `user_punchin_times`(`ucode`, `year`, `month`, `times`) VALUES (".$accountCode.",".$toyear.",".$tomonth.",1)");
					if($timeIsrtRel["error"]==0){
						$rel["error"]=0;
						$rel["data"]="签到成功";
					}else{
						$rel=$timeIsrtRel;
					}
				}else{
					$rel=$timesRel;
				}
					
				
			
			}else{
				$rel=$udtrel;
			}
			
			
		}
	}elseif($dbrel["error"]==2){
		$istrel=$db->query("INSERT INTO `user_punchin_month`(`ucode`, `date`, `ispunch`) VALUES ('".$accountCode."',".$today.",".($dbrel["data"][0]['date']%2).")");
		if($istrel["error"]==0){
			$timesRel=$db->query("SELECT * FROM `user_punchin_times` WHERE `ucode`=".$accountCode." AND `year`=".$toyear." AND `month`=".$tomonth);
				if($timesRel["error"]==0){
					$timesUrel=$db->query("UPDATE `user_punchin_times` SET `times`=".($timesRel["data"][0]["times"]+1)." WHERE `ucode`=".$accountCode." AND `year`=".$toyear." AND `month`=".$tomonth);
					if($timesUrel["error"]==0){
						$rel["error"]=0;
						$rel["data"]="签到成功";
					}else{
						$rel=$timesUrel;
					}
				}elseif($udtrel["error"]==2){
					$timeIsrtRel=$db->query("INSERT INTO `user_punchin_times`(`ucode`, `year`, `month`, `times`) VALUES (".$accountCode.",".$toyear.",".$tomonth.",1)");
					if($timeIsrtRel["error"]==0){
						$rel["error"]=0;
						$rel["data"]="签到成功";
					}else{
						$rel=$timeIsrtRel;
					}
				}else{
					$rel=$timesRel;
				}
		}else{
			$rel=$istrel;
		}
		
	}
	return $rel;
}
/*
用户注册
参数：arr $regData：账户信息
返回：array $rel
	int $rel["error"]错误代码
		0：无错误
		1：数据库连接出错
		3：未接收到password参数
	String/bool $rel["data"]
		String :错误信息
		bool（true）：注册成功
*/
function reg(array $regData){
	$regData["timeline"]=time();
	if(!isset($regData["password"])){
		$rel["error"]=3;
		$rel["data"]="未接收到password参数";
	}else{
		global $_CONFIG;
		$regData["password"]=password_hash(md5(md5($regData["password"]).$regData["timeline"]),PASSWORD_DEFAULT);
		$regData["email"]=isset($regData["email"])&&is_email($regData["email"])?$regData["email"]:"";
		$regData["realname"]=isset($regData["realname"])&&preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$regData["realname"])?$regData["realname"]:"佚名";
		$regData["sex"]=isset($regData["sex"])?(int)$regData["sex"]:0;
		$regData["study_code"]=isset($regData["study_code"])?(int)$regData["study_code"]:0;
		$regData["profession"]=isset($regData["profession"])?(int)$regData["profession"]:0;
		
		do{
			$num=rand_num_code($_CONFIG["sys"]["account_code_length"]);
		}while(!account_code_available($_CONFIG["sys"]["account_code_length"]));
		$regData["account_code"]=$num;
		$db=new Database();
		//累了，歇一歇
		$rel=$db->query("INSERT INTO `user`(`account_code`, `password`, `email`,  `realname`, `sex`, `study_code`, `profession`, `timeline`) VALUES ('".$regData["account_code"]."','".$regData["password"]."','".$regData["email"]."','".$regData["realname"]."','".$regData["sex"]."','".$regData["study_code"]."','".$regData["profession"]."','".$regData["timeline"]."')");
	}
	return $rel;
}
?>