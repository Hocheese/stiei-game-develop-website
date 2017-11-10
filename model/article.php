<?php
function article_class_add(String $name){
	$db=new Database();
	$rel=$db->query("INSERT INTO `article`(`name`)VALUES('$name')");
	return $rel;
}
function article_add(String $title,String $text,int $class,int $imgid=0){
	$timeline=time();
	$ucode=$_SESSION["userData"]["account_code"];
	$db=new Database();
	$rel=$db->query("INSERT INTO `article`( `title`, `timeline`, `ucode`, `cid`, `imageid`, `text`) VALUES ($title,$timeline,$ucode,$class,$imgid,$text)");
	
}
?>