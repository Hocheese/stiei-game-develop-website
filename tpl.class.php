<?php
/*
包括文件：{tpl:header.html}(以tpl目录为根目录的相对路径)
输出变量：{$username}{$var['a']}
一般语法：{? echo "hello World!"; ?}


*/
class tpl{
	private $tplPath;
	private $error=0;
	private $tplData;
	public $var=array();
	public $value=array();
	function __construct($tpln){
		$tpl=file_exists("tpl/".$tpln."html")?"tpl/".$tpln."html":(file_exists("tpl/".$tpln)?"tpl/".$tpln:$tpln);
		if(!$tpl){
			output_log("模板错误","err1:不存在的模板：".$tpl);
			$this->error=1;
		}
		$this->tplPath=$tpl;
		$this->compile();
	}
	function compile(){
		if($this->error==0){
			if(!file_exists("cache/".md5($this->tplPath).".php")){
				if(!is_dir("cache")){
					mkdir("cache");
				}
				$handle=fopen($this->tplPath,"rb");
				$this->tplData=fread($handle,filesize($this->tplPath));
				while(($tplInclude=preg_match('/{tpl:([a-zA-Z.]+)}/',$this->tplData,$matches))!=0){
			
					$tplobj=new tpl($matches[1]);

					if($tplobj->error!=0){
						$this->tplData=preg_replace('/{tpl:([a-zA-Z.]+)}/',"<!--模板错误：-->\n<!--文件名：".'${1}'."-->\n<!--错误信息：".$tplobj->error.'-->',$this->tplData,1);
					}else{
						$this->tplData=preg_replace('/{tpl:([a-zA-Z.]+)}/','<?php include("cache/'.md5($tplobj->tplPath).'.php"); ?>',$this->tplData,1);
					}
				}
				$this->tplData="<?php if(!defined(\"TOKEN\")){\r\n	header(\"HTTP/1.1 403 Forbidden\");\r\n	exit(\"Access Forbidden\");\r\n} ?>".$this->tplData;
				$this->tplData=preg_replace('/{\$([a-zA-Z0-9_\[\$\]\'"]+)}/','<?php echo \$${1}; ?>',$this->tplData);
				$this->tplData=preg_replace('/{\?(\s(\S)+\s)+\?}/','<?php ${1} ?>',$this->tplData);
				$handle=fopen("cache/".md5($this->tplPath).".php","ab");
				fwrite($handle,$this->tplData);
			}
			
		}
		
	}
	public function assign($var,$value){
		if($this->error==0){
			$this->var[count($this->var)]=$var;
			$this->value[count($this->value)]=$value;
		}
		
		
	}
	
	public function display(){
		if($this->error==0){
			for($i=0;isset($this->var[$i]);$i++){
				$var=$this->var[$i];
				$$var=$this->value[$i];
			}
			//var_dump($this->var);
			//var_dump($this->value);
			include "cache/".md5($this->tplPath).".php";
		}
	}
	
}
?>

