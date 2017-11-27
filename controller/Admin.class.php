<?php
include("model/article.php");
//include("model/image.php");
include("model/team.php");
include("model/user.php");
include("InviteCode.class.php");
class Admin extends Controller{
	private $opt;
	function __construct(){
		if(!isset($_SESSION['userData'])){
			//可以输出错误页面或者登录页面
			header('HTTP/1.1 404 Not Found，(#huaji)'); 
			exit;
		}elseif($_SESSION['userData']["admin"]<=0){
			//错误页面
			header('HTTP/1.1 404 Not Found，(#huaji)');
			exit;
		}else{
			$this->opt=isset($_GET['opt'])?$_GET['opt']:"display";
			if(!isset($_GET['act'])){
				$tpl=new Tpl("admin/frame");
				$tpl->display();
				exit;
			}
			
		}
	}
	function basic(){
		switch ($this->opt){
			case "display":
				$tpl=new Tpl("admin/basic");
				$tpl->display();
				break;
			case "clear":
				$filelist=null;
				try{
					$filelist=scandir("cache");
				}catch(Exception $e){
					$error="读取文件列表失败。".$e->getMessage();
					$this->error($error);
				}
				
				if(!$filelist){
					$error="缓存目录不存在或被占用";
					$this->error($error);
				}else{
					$file;
					foreach($filelist as $key =>$value){
						$file[$key]["path"]="cache/".$value;
						if(is_file("cache/".$value)){
							$rel=false;
							try{
								$rel=unlink("cache/".$value);
								
							}catch(Exception $e){
								output_log("管理模块错误","文件删除失败".$e->getMessage());
							}
							$file[$key]["rel"]=$rel?"成功":"失败";
							
						}else{
							$file[$key]["rel"]="忽略";
						}
					}
					//
					$tpl=new Tpl("admin/basic_clear");
					$tpl->assign("info",$file);
					$tpl->display();
					
				}
				break;
			case "del":
				$this->root("删除专业或二级学院");
				if(empty($_GET["id"])){
					$this->error("未获取id");
				}else{
					$r=del_pro((int)$_GET["id"]);
					$r["error"]==0?$this->success("删除成功"):$this->error($r["data"]);
				}
				break;
			case "add":
				$this->root("添加专业或二级学院");
				if(empty($_POST["name"])){
					$this->error("未接收到参数");
				}else{
					$cid=empty($_POST["college"])?0:(int)$_POST["college"];
					add_pro($_POST["name"],$cid);
					$this->success("添加专业成功");
				}
				
				
				break;
		}
	}
	
	function tips(){
		switch ($this->opt){
			case "display":
			case "add":
			case "del":
		}
	}
	
	function user(){
		switch ($this->opt){
			case "display":
				$tpl=new Tpl("admin/user");
				$tpl->display();
				break;
			case "code":
				$code=empty($_GET["code"])?0:(int)$_GET["code"];
				$code=new InviteCode($code);
				echo $code->inviteCode_create();
				break;
			case "add":
				$data=array();
				foreach($_POST as $k =>$v){
					$data[$k]=$v;
				}
				$data["profession"]=empty($_POST["pro"])?$_POST["col"]:$_POST["pro"];
				$rel=reg($data);
				if($rel["error"]==0){
					$this->success("用户添加成功");
				}else{
					$this->error("用户添加失败。错误信息：".$rel["data"]);
				}
				break;
			case "del":
			case "check":
				$id=empty($_GET["id"])?0:(int)$_GET["id"];
				echo json_encode(account_code_available($id)) ;
				break;
		}
	}
	
	function article(){
		switch ($this->opt){
			case "display":
				$class=article_getClassList();
				if($class["error"]!=0){
					$class["data"][0]["id"]=0;
					$class["data"][0]["name"]="无分类";
				}
				$tpl=new Tpl("admin/article");
				$tpl->assign("class",$class["data"]);
				$tpl->display();
				break;
			case "add":
				if(!isset($_POST["text"])||$_POST["text"]==""){
					$this->error("请输入文章内容！");
					exit;
				}else{
					$text=$_POST["text"];
					$title=isset($_POST["title"])||$_POST["title"]==""?$_POST["title"]:"无题";
					$class=isset($_POST["class"])?$_POST["class"]:0;
					$imgid=isset($_POST["imgid"])?$_POST["imgid"]:0;
					$rel=article_add($title,$text,$class,$imgid);
					if($rel["error"]!=0){
						$this->error($rel["data"]);
					}else{
						$this->success("文章发表成功");
					}
				}
				break;
			case "kindeditor":
				$class=article_getClassList();
				if($class["error"]!=0){
					$class["data"][0]["id"]=0;
					$class["data"][0]["name"]="无分类";
				}
				$tpl=new Tpl("admin/kindeditor");
				$tpl->assign("class",$class["data"]);
				$tpl->display();
				break;
			case "list":
				header("Content-type: application/json");
				$start=isset($_GET["start"])?$_GET["start"]:0;
				$list=isset($_GET["list"])?$_GET["list"]:10;
				$rel=article_list($start,$list);
				echo json_encode($rel);
				break;
			case "del":
			case "delclass":
				$id=isset($_GET["id"])?(int)$_GET["id"]:0;
				article_class_del($id);
				$this->success("分类已删除");
				break;
			case "addclass":
				if(!isset($_POST["name"])||$_POST["name"]==""){
					$rel["error"]=3;
					$rel["data"]="请输入分类名称";
				}else{
					$rel=article_class_add($_POST["name"]);
				}
				if($rel["error"]==0){
					$this->success("分类添加成功");
				}else{
					$this->error($rel["data"]);
				}
				break;
		}
	}
	
	function team(){
		switch ($this->opt){
			case "display":
				$reldata=team_list();
				$rel=$reldata["error"]==0?$reldata["data"]:array();
				$tpl=new Tpl("admin/team");
				$tpl->assign("teams",$rel);
				$tpl->display();
				break;
			case "add":
				if(empty($_POST["name"])||empty($_POST["ucode"])){
					$this->error("请输入内容！");
				}
				$name=$_POST["name"];
				$uc=$_POST["ucode"];
				$rel=team_create($name,$uc);
				$this->success("队伍创建成功");
				break;
			case "del":
				$id=empty($_GET["id"])?"0":$_GET["id"];
				team_del($id);
				$this->success("队伍删除成功");
				break;
			case "lst":
				echo json_encode(team_ulist((int)$_GET["id"]));
				break;
		}
	}
	function image(){
		switch ($this->opt){
			case "display":
				$tpl=new Tpl("admin/image");
				$tpl->display();
				break;
			case "add":
				$save=isset($_GET["safe"])?$_GET["safe"]:5;
				$rel=image_save($save);
				if($rel["error"]==0){
					$tpl=new Tpl("admin/image_upload_success");
					$tpl->display();
				}else{
					$tpl=new Tpl("admin/image_upload_failed");
					$tpl->assign("error",$rel['data']);
					$tpl->display();
				}
				break;
			
			//为KindEditor提供的图片上传
			case "highadd":
				if(!isset($_FILES['imgFile'])){
					$this->error("高级上传模块_非法访问");
				}
				$_FILES['file']=$_FILES['imgFile'];
				$rel=image_save(5);
				if($rel["error"]==0){
					$rel=image_getByTime($rel["data"]);
					$r["error"]=0;
					$r["url"]="?ctrl=image&act=get&id=".$rel["data"][0]["id"];
				}else{
					$r["error"]=1;
					$r["message"]=$rel["data"];
				}
				echo json_encode($r);
				break;
			case "del":
			case "classadd":
			case "classdel":
		}
	}
	private function error(String $info){
		output_log("管理模块错误",$info);
		$tpl=new Tpl("admin/failed");
		$tpl->assign("error",$info);
		$tpl->display();
		exit;
	}
	private function success(String $info){
		
		$tpl=new Tpl("admin/success");
		$tpl->assign("info",$info);
		$tpl->display();
		exit;
	}
	
	private function root(String $name){
		if($_SESSION['userData']["admin"]!=1){
			$this->error($_SESSION['userData']["realname"]."同志正在尝试“".$name."”，但他没有这么做的权力。");
		}else{
			output_log("敏感操作",$name);
		}
	}
	
}
?>