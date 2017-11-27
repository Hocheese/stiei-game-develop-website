<?php
include("model/team.php");
class Team extends Controller{
	private $opt;
	function __construct(){
		if(!isset($_SESSION['userData'])){
			//可以输出错误页面或者登录页面
			header('Location:/?ctrl=user'); 
			exit;
		}else{
			$this->opt=isset($_GET['opt'])?$_GET['opt']:"display";
			if(!isset($_GET['act'])){
				$this->lists();
				exit;
			}
			
		}
	}
	
	function lists(){
		$reldata=team_list();
		$rel=$reldata["error"]==0?$reldata["data"]:array();
		foreach($rel as &$v){
			$v["time"]=date("Y年m月d日 H:i:s",$v["timeline"]);
		}
		$tpl=new Tpl("team_list");
		$tpl->assign("team",$rel);
		$tpl->assign("title","队伍");
		$tpl->display();
	}
	
	function create(){
		header("Content-type: application/json");
		if(empty($_POST["name"])){
			$r["error"]=3;
			$r["data"]="队伍名为空";
			echo json_encode($r);
		}else{
			$b=team_check($_SESSION['userData']["account_code"]);
			if($b){
				$rel["error"]=4;
				$rel["text"]="你已经加入或创建一个队伍";
			}else{
				$text=empty($_POST["text"])?"该队伍还没有freestyle":$_POST["text"];
				$allowjoin=empty($_POST["allowjoin"])?0:(int)$_POST["allowjoin"];
				$r=team_create($_POST["name"],$_SESSION['userData']["account_code"],$text,$allowjoin);
			}
			
			echo json_encode($r);
		}
		
	}
	function join(){
		if(empty($_GET["id"])){
			$rel["title"]="加入队伍失败";
			$rel["text"]="未接收到队伍id";
			$this->info($rel);
		}else{
			$id=(int)$_GET["id"];
			$b=team_check($_SESSION['userData']["account_code"]);
			if($b){
				$rel["title"]="加入队伍失败";
				$rel["text"]="你已经加入或创建一个队伍";
				$this->info($rel);
			}else{
				$rel=team_add($id,$_SESSION['userData']["account_code"]);
				$rel["title"]="加入队伍";
				$rel["text"]=$rel["data"];
				$this->info($rel);
			}
		}
	}
}
?>