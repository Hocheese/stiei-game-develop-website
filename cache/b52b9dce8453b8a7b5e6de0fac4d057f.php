<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/2e360e17b9ee2f87c044df5ba00c6dfd.php"); ?>
<div>
<script>
	$(document).ready(function(){
		$("#code").click(function(){
			$.get("?ctrl=admin&act=user&opt=code&code="+$("input[name=code]").val(),function(data){
				$("#usercode").text(data);
			})
		})
	})
</script>
	<h1>生成邀请码</h1>
	<form onSubmit="return false">
		学号：<input type="number" name="code"><button id="code">生成</button>
		<p id="usercode"></p>
	</form>
</div>
<?php include("cache/1866e64f8c3a4cc675d5ad41c133aca5.php"); ?>