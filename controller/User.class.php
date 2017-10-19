<?php
include("model/user.php");
class User extends Controller{
	public static function index(){
		if(!isset($_SESSION["userData"])){
			include("tpl/crew_login.html");
		}
	}
	public function vcode(){
		header("Content-Type:image/png");
		$i=0;
		$vcode=array();
		while($i<4){
		
			if(rand(1,2)%2==0){
				if(rand(1,2)%2==0){
					$vcode[$i]=chr(rand(65,90));
				}else{
					$vcode[$i]=chr(rand(97,122));
				}
			}else{
				$vcode[$i]=chr(rand(48,57));
			}
			$i++;
		}
	
		$codeImage=imagecreate(100,40);
		imagecolorallocate($codeImage,255,255,255);
		$i=0;
		while($i<4){
			$font=rand(0,2);
			if($font==1)
			{
				$fontFamily="fonts/HoboStd.otf";
			}elseif($font==2){
				$fontFamily="fonts/GiddyupStd.otf";
			}else{
				$fontFamily="fonts/BrushScriptStd.otf";
			}
			$color=imagecolorallocate($codeImage,rand(0,255),rand(0,255),rand(0,255));
			imagefttext($codeImage,32.0,15-rand(0,30),rand(0,10)+$i*25,rand(30,40),$color,$fontFamily,$vcode[$i]);
			$i++;
		}
		$_SESSION['verCode']="".$vcode[0].$vcode[1].$vcode[2].$vcode[3];
		imagepng($codeImage);
		imagedestroy($codeImage);
	}
	
	private function confirm_verCode(String $str){
		return strtolower($str)==strtolower($_SESSION['verCode']);
	}
	
	public function reg(){
		
		if(!isset($_POST["password"])){
			$rel["error"]=4;
			$rel["data"]="未接收到必须的password参数。你是……信安专业的同学？？";
		}else{
			$regData["password"]=$_POST["password"];
			$regData["email"]=isset($_POST["email"])?$_POST["email"]:"";
			$regData["realname"]=isset($_POST["realname"])?$_POST["realname"]:"佚名";
			$regData["sex"]=isset($_POST["sex"])?$_POST["sex"]:0;
			$regData["study_code"]=isset($_POST["study_code"])?$_POST["study_code"]:0;
			$regData["profession"]=isset($_POST["profession"])?$_POST["profession"]:0;
			
			$rel=reg($regData);
			//累了，歇一歇
		}
		echo json_encode($rel);
		
	}
	
	public function login(){
		//echo $_POST['usercode'];
		if(!isset($_POST['usercode'])||!isset($_POST['password'])){
			$rel["error"]=4;
			$rel["data"]="未接收到提交的参数。你是……信安专业的同学？？";
		}else{
			if(isset($_SESSION['verCode']) ){
				if(!isset($_POST['verCode'])){
					$rel["error"]=4;
					$rel["data"]="未接收到验证码。你是……信安专业的同学？？";
				}else{
					if(!$this->confirm_verCode($_POST['verCode'])){
						$rel["error"]=5;
						$rel["data"]="验证码错误！你是……服务器的同类？";
					}else{
						unset($_SESSION['verCode']);
						$rel=login((int)$_POST['usercode'],$_POST['password']);
						
					}
				}
				
			}else{
				$rel=login((int)$_POST['usercode'],$_POST['password']);
			}
			
		}
		echo json_encode($rel);
	}
	
	
	
	public function prolist(){
		$prolist=get_col_list();
		if($prolist['error']!=0){
			$rel=$prolist;
		}else{
			$rel['error']=0;
			foreach($prolist['data'] as $v){
				$cid=$v['college'];
				$id=$v['id'];
				if($cid==0){
					;
					$rel['college'][$id]['name']=$v["name"];
					
				}else{
					if(isset($rel['college'][$cid])){
						$rel['college'][$cid]['pro']=array();
						$i=count($rel['college'][$cid]['pro']);
						$rel['college'][$cid]['pro'][$i]['id']=$id;
						$rel['college'][$cid]['pro'][$i]['name']=$v["name"];
					}else{
						$rel['college'][0]['name']="学院直辖专业";
						$i=count($rel['college'][0]['pro']);
						$rel['college'][0]['pro'][$i]['id']=$id;
						$rel['college'][0]['pro'][$i]['name']=$v["name"];
					}
				}
			}

		}
		echo json_encode($rel);
	}
	
	public function punchin(){
		if(!isset($_SESSION["userData"])){
			$rel['error']=4;
			$rel["data"]="用户未登录";
		}else{
			$rel=punchin($_SESSION["userData"]["account_code"]);
		}
		echo json_encode($rel);
	}
	
	public function punchinfo(){
		$class=isset($_GET["class"])?$_GET["class"]:"month";
	}
	
	public function userinfo(){
		if(!isset($_GET['acode'])){
			if(!isset($_SESSION["userData"])){
				$rel["error"]=3;
				$rel["data"]="用户未登录时缺乏访问参数。你是……信安专业的同学？？";
			}else{
				$rel=get_user_info($_SESSION["userData"]);
			}
		}else{
			$rel=get_user_info($_GET['acode']);
		}
		echo json_encode($rel);
	}
	
	
}
?>