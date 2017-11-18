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
				//$tpl=new Tpl("admin/frame");
				$tpl->display();
				exit;
			}
			
		}
	}
	
	function lists(){
		$reldata=team_list();
		$rel=$reldata["error"]==0?$reldata["data"]:array();
	}
}
?>