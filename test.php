<?php
//Asia/Shanghai
define("TOKEN",true);
include("config.php");
include("function.php");
include("Tpl.class.php");
output_log("通知","访问了测试文件");
//test start

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<form method="post" action="/?ctrl=user&act=login">
	<input type="text" name="usercode">
	<input type="password" name="password">
	<button>0.0</button>
</form>
</body>
</html>
