<?php
//include_once("config.php");
//include_once("function.php");
class Database{
	private $dbresource;
	
	function __construct(){
		global $_CONFIG;
		$this->dbresource=new MySQLi($_CONFIG["db"]["host"],$_CONFIG["db"]["username"],$_CONFIG["db"]["password"],$_CONFIG["db"]["dbname"]);
		
	}
	/*
	参数：String $sql——一段SQL语句
	返回：array  $relData
		int $relData["error"]:错误代码
			int 0：无错误
			int 1：数据库查询出错
			int 2：没有查询到任何信息
		array/bool $relData["data"]
			bool true：成功执行了不返回信息的查询
			bool false：没有查询到任何信息
			String：数据库查询出错
			array：查询的结果集
	*/
	
	function query(String $sql){
		global $_CONFIG;
		if($_CONFIG["sys"]["debug"]&&$_CONFIG["sys"]["SQL_log"]){
			output_log("SQL","执行SQL语句：".$sql);
		}
		$this->dbresource->query("set names utf8");
		$dbrel=$this->dbresource->query($sql);
		$relData;
		$relData["error"]=0;
		if(!$dbrel){
			output_log("SQL错误",$this->dbresource->error);
			$relData["error"]=1;
			$relData["data"]=$_CONFIG["sys"]["debug"]?$this->dbresource->error:"数据库查询出错";
		}elseif($dbrel===true){
			$relData["data"]=true;
		}else{
			if($dbrel->num_rows==0){
				$relData["error"]=2;
				$relData["data"]=false;
			}else{
				$i=0;
			
				while($row=$dbrel->fetch_assoc()){
					$relData["data"][$i]=$row;
					$i++;
				}
			}
			
			
		}
		return $relData;
	}
}
?>