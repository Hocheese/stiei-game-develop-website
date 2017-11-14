<?php
include("model/article.php");
class Article extends Controller{
	function home(){
		$ids=image_getNewFour();
		$tpl=new Tpl("main");
		$tpl->assign("ids",$ids);
		$tpl->display();
	}
	function active(){
		$opt=isset($_GET["opt"])?$_GET["opt"]:"display";
		switch($opt){
			case "":
			default:
				
				$tpl=new Tpl("active");
				
				$tpl->display();
				
		}
	}
	function read(){
		if(!isset($_GET["id"])){
			$rel["data"][0]["title"]="你好像迷路了诶";
			$rel["data"][0]["text"]="文章？不存在的";
		}else{
			
			$id=(int)$_GET["id"];
			$rel=article_get($id);
			if($rel["error"]!=0){
				$rel["data"][0]["title"]="你好像迷路了诶";
				$rel["data"][0]["text"]="文章？不存在的";
			}
		}
		$tpl=new Tpl("main");
		$tpl->assign("info",$rel["data"][0]);
		$tpl->display();
	}
}
?>