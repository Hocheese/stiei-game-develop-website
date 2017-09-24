<?php
include("model/user.php");
class User extends Controller{
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
}
?>