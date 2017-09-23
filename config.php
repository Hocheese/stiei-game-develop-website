<?php
global $_CONFIG;
$_CONFIG["db"]["host"]="127.0.0.1";
$_CONFIG["db"]["username"]="root";
$_CONFIG["db"]["password"]="";
$_CONFIG["db"]["dbname"]="gdg";

$_CONFIG["sys"]["timezone"]="Asia/Shanghai";
$_CONFIG["sys"]["debug"]=true;
$_CONFIG["sys"]["SQL_log"]=true;
$_CONFIG["sys"]["visit_log"]=true;
$_CONFIG["sys"]["log_name_seed"]=20000120;
$_CONFIG["sys"]["account_code_length"]=6;


date_default_timezone_set($_CONFIG["sys"]["timezone"]);
?>