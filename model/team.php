<?php
//队伍创建
function team_create(String $name,int $ucode,String $text="",int $allowjoin=0){
	$db=new Database();
	$time=time();
	$rel=$db->query("INSERT INTO `teams_info`(`tname`,`tcreator`,`timeline`,`text`,`allowjoin`)VALUES('$name',$ucode,$time,'$text',$allowjoin)");
	$id=$db->query("SELECT `id` FROM `teams_info` WHERE `tcreator`=$ucode AND `timeline`=$time");
	$id=$id["data"][0]['id'];
	team_add($id,$ucode);
	return $rel;
}
//检测是否已经加入队伍
function team_check(int $uid){
	$db=new Database();
	$rel=$db->query("SELECT * FROM `teams_user` WHERE `uid` = $uid");
	return $rel["error"]==0;
}
//队伍添加成员
function team_add(int $tid,int $ucode){
	$db=new Database();
	$rel=$db->query("INSERT INTO `teams_user`(`tid`,`uid`)VALUES($tid,$ucode)");
	return $rel;
}
//获取队伍列表
function team_list(){
	$db=new Database();
	$rel=$db->query("SELECT `teams_info`.*,`user`.`realname` FROM `teams_info` LEFT JOIN `user` ON `teams_info`.`tcreator`=`user`.`account_code`");
	return $rel;
}
//队伍删除
function team_del(int $id){
	$db=new Database();
	$rel=$db->query("DELETE FROM `teams_user` WHERE `tid`=$id");
	$rel=$db->query("DELETE FROM `teams_info` WHERE `id`=$id");
	return $rel;
}
//获取成员列表
function team_ulist(int $id){
	$db=new Database();
	$rel=$db->query("SELECT `teams_user`.*,`user`.`realname` FROM `teams_user` LEFT JOIN `user` ON `teams_user`.`uid`=`user`.`account_code` WHERE `teams_user`.`tid`=$id");
	return $rel;
}
?>