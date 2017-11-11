<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/2e360e17b9ee2f87c044df5ba00c6dfd.php"); ?>
<div>
	<h1>清空缓存</h1>
	<p>本站采用了模板缓存技术。如果对任何含有非异步加载动态内容的html文件做了修改，则需要更新缓存才能显示更改。</p>
	<a class="a_art" href="?ctrl=admin&act=basic&opt=clear">清空缓存</a>
</div>
<?php include("cache/1866e64f8c3a4cc675d5ad41c133aca5.php"); ?>