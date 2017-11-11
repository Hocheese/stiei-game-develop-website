<?php
function article_class_add(String $name){
	$db=new Database();
	$rel=$db->query("INSERT INTO `article_class`(`name`)VALUES('$name')");
	return $rel;
}
function article_add(String $title,String $text,int $class=0,int $imgid=0){
	$timeline=time();
	$ucode=$_SESSION["userData"]["account_code"];
	$db=new Database();
	$rel=$db->query("INSERT INTO `article`( `title`, `timeline`, `ucode`, `cid`, `imageid`, `text`) VALUES ('$title',$timeline,$ucode,$class,$imgid,'$text')");
	return $rel;
}
function article_getClassList(){
	$db=new Database();
	$rel=$db->query("SELECT * FROM `article_class`");
	return $rel;
}
function article_class_del(int $id){
	$db=new Database();
	$rel=$db->query("DELETE FROM `article_class` WHERE `id`=$id");
}
?>