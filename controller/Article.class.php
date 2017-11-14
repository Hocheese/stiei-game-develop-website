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
			case "list":
				header("Content-type: application/json");
				$start=empty($_GET["start"])?0:(int)$_GET["start"];
				$num=empty($_GET["num"])?10:(int)$_GET["num"];
				$rel=article_list($start,$num);
				echo json_encode($rel);
				break;
			default:
				
				$tpl=new Tpl("active");
				
				$tpl->display();
				
		}
	}
	function read(){
		if(!isset($_GET["id"])){
			$rel["data"][0]["title"]="你好像迷路了诶";
			$rel["data"][0]["text"]="<h1>文章？不存在的</h1>";
		}else{
			
			$id=(int)$_GET["id"];
			$rel=article_get($id);
			if($rel["error"]!=0){
				$rel["data"][0]["title"]="你好像迷路了诶";
				$rel["data"][0]["text"]="<h1>文章？不存在的</h1>";
			}
		}
		$tpl=new Tpl("article");
		$tpl->assign("info",$rel["data"][0]);
		$tpl->display();
	}
}
?>