<?php
//队伍创建
function team_create(String $name,int $ucode){
	$db=new Database();
	$time=time();
	$rel=$db->query("INSERT INTO `teams_info`(`tname`,`tcreator`,`timeline`)VALUES('$name',$ucode,$time)");
	return $rel;
}

//队伍添加成员
function team_add(int $tid,int $ucode){
	$db=new Database();
	$rel=$db->query("INSERT INTO `teams_user`(`tid`,`uid`)VALUES('$name',$ucode)");
	return $rel;
}
//获取队伍列表
function team_list(){
	$db=new Database();
	$rel=$db->query("SELECT `teams_info`.*,`user`.`realname` FROM `teams_info` LEFT JOIN `user` ON `teams_info`.`tcreator`=`user`.`account_code`");
	return $rel;
}
//队伍删除
?>