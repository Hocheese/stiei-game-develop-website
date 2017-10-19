<?php
class InviteCode{
	private $str="qQwW0eE0r1Rt1Ty1Y2uU2iI2o3Op3Pa3A4sS4dD4f5Fg5Gh5H6jJ6kK6l7Lz7Zx7X8cC8vV8b9Bn9NmM";
	private $seed=5201314;
	private $studentCode=2016131321;
	function __construct(int $stdCode=2016131321){
		$this->studentCode=$stdCode;
	}
	/*创建邀请码*/
	function inviteCode_create(){
		$rel="";
		$a=$this->studentCode%strlen($this->str);
		$rel.=$this->str[$a];
		$b=$this->studentCode%$this->seed%strlen($this->str);
		$rel.=$this->str[$b];
		$c=$this->studentCode%100;
		$rel.=$this->str[$b];
		$d=($this->studentCode%100000-$this->studentCode%100)/100%strlen($this->str);
		$rel.=$this->str[$d];
		$e=($this->studentCode-$this->studentCode%100000)/100000*$c%strlen($this->str);
		$rel.=$this->str[$e];
		$f=$a+$b+$c+$d+$e;
		$f=$f<strlen($this->str)?$f:$f%strlen($this->str);
		$rel.=$this->str[$f];
		return $rel;
	}
	/*检验邀请码*/
	function inviteCode_check(String $inviteCode){
		return $inviteCode==$this->inviteCode_create();
	}
}
?>