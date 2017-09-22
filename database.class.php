<?php
//include_once("config.php");
//include_once("function.php");
class database{
	var $dbresource;
	
	function __construct(){
		global $_CONFIG;
		$this->dbresource=new MySQLi($_CONFIG["db"]["host"],$_CONFIG["db"]["username"],$_CONFIG["db"]["password"],$_CONFIG["db"]["dbname"]);
		
	}
	
	function query($sql){
		if($_CONFIG["sys"]["debug"]&&$_CONFIG["sys"]["SQL_log"]){
			output_log("SQL","执行SQL语句：".$sql);
		}
		$dbrel=$this->dbresource->query($sql);
		$relData;
		$relData["error"]=0;
		if(!$dbrel){
			output_log("SQL错误",$dbrel->connect_error);
			$relData["error"]=$_CONFIG["sys"]["debug"]?$dbrel->connect_error:1;
			$relData["data"]="数据库连接出错";
		}elseif($dbrel===true){
			$relData["error"]=0;
			$relData["data"]=true;
		}else{
			$relData["error"]=0;
			$i=0;
			while($row=$dbrel->fetch_assoc()){
				$relData["data"][$i]=$row;
				$i++;
			}
		}
		return $relData;
	}
}
?>