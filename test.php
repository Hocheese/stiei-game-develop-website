<?php
//Asia/Shanghai
define("TOKEN",true);
include("config.php");
include("function.php");
include("Tpl.class.php");
output_log("通知","访问了测试文件");
//test start
$test[0]=5;
$test[2]=10;
echo json_encode($test);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<p><?php
	echo "PHP版本：".PHP_VERSION."。为了系统能够正常运行，请使用PHP7。";
	echo 1-true;
?></p>

<form method="post" action="/?ctrl=user&act=login">
	<input type="text" name="usercode">
	<input type="password" name="password">
	<button>0.0</button>
</form>
</body>
</html>
