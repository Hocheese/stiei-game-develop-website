<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/2e360e17b9ee2f87c044df5ba00c6dfd.php"); ?>

<div>
	<h1>添加图片</h1>
	<form enctype="multipart/form-data" action="?ctrl=admin&act=image&opt=add" method="POST">
    	<input name="file" type="file" />
    	水印位置：
    	<select name="safe">
    		<option value="0">无水印</option>
    		<option value="1">左上角</option>
    		<option value="2">顶部 水平居中</option>
    		<option value="3">右上角</option>
    		<option value="4">右侧 垂直居中</option>
    		<option value="5">右下角</option>
    		<option value="6">底部 水平居中</option>
    		<option value="7">左下角</option>
    		<option value="8">左侧 垂直居中</option>
    	</select>
    	<input type="submit" value="Send File" />
	</form>
</div>
<div>
	<h1>图片列表</h1>
</div>
<?php include("cache/1866e64f8c3a4cc675d5ad41c133aca5.php"); ?>