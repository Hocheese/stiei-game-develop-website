<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/2e360e17b9ee2f87c044df5ba00c6dfd.php"); ?>
<style>
	@font-face{
		src: url(fonts/mzd.ttf);
		font-family: mao;
	}
	h1,article{
		
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.m,h1{
		font-family: mao;
		font-size: 72px;
	}
</style>
<h1><img src="img/logo.png" width="128" height="128" alt="logo"> <span> 上电游戏开发社</span></h1>
<p class="m">革命尚未成功，同志仍需努力</p>
<p>图片上传失败！错误信息：<?php echo $error; ?></p>
<?php include("cache/1866e64f8c3a4cc675d5ad41c133aca5.php"); ?>
