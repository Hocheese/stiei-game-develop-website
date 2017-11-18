<?php
//Asia/Shanghai
session_start();
define("TOKEN",true);
include("config.php");
include("database.class.php");
include("function.php");
include("Tpl.class.php");
include("InviteCode.class.php");
include("model/image.php");
//include("user.php")
output_log("通知","访问了测试文件");
//test start
$test[0]=5;
$test[2]=10;
echo json_encode($test);


function test(Array $a=null){
	return $a==null?"NULL":"ARRAY";
}
echo test();
if(isset($_FILES['file'])){
	var_dump(image_save()) ;
}
$time=time();
echo "<strong>time:$time</strong>,<strong>".password_hash(md5(md5("123456").$time),PASSWORD_DEFAULT)."</strong>";
unset($_SESSION['verCode']);

$str='sddsfsd {$_SESSION.UserData.account_sasasa} sdff {$a} dsdfs';
echo preg_match('/\{\$[\_a-zA-Z]([\.\_a-zA-Z0-9]*)\}/',$str,$a);
$b=preg_replace('/\.([\_a-zA-Z0-9]*)/','["$1"]',$a[0]);
$c=preg_replace('/\{\$([\_a-zA-Z][\_a-zA-Z0-9]*)(\.([\_a-zA-Z0-9]*))*\}/','<?php echo $1["$0"] ?>',$a[0]);
var_dump($a);
var_dump($b);
var_dump($c);
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
	echo "</br>";
	//echo inviteCode(6);
	$code=new InviteCode();
	echo $code->inviteCode_create();
	echo "</br>";
	$code=new InviteCode(2015126126);
	echo $code->inviteCode_create();
	echo "</br>";
	$code=new InviteCode(2017126126);
	echo $code->inviteCode_create();
	echo "</br>";
	$code=new InviteCode(2017126125);
	echo $code->inviteCode_create();
	echo "</br>";
	$code=new InviteCode(2017126115);
	echo $code->inviteCode_create();
	echo "</br>";
	$code=new InviteCode(5201314);
	echo $code->inviteCode_create();
?></p>

<form method="post" action="/?ctrl=user&act=login">
	<input type="text" name="usercode">
	<input type="password" name="password">
	<button>0.0</button>
</form>
<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="file" type="file" />
    <input type="submit" value="Send File" />
</form>
</body>
</html>
