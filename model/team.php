<?php
//队伍创建
function team_create(String $name,int $ucode){
	$db=new Database();
	$rel=$db->query("INSERT INTO `teams_info`(`tname`,`tcreator`)VALUES('$name',$ucode)");
	return $rel;
}

//队伍添加成员
function team_add(int $tid,int $ucode){
	$db=new Database();
	$rel=$db->query("INSERT INTO `teams_user`(`tid`,`uid`)VALUES('$name',$ucode)");
	return $rel;
}
//队伍删除
?>