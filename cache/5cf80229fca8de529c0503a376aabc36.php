<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/2e360e17b9ee2f87c044df5ba00c6dfd.php"); ?>
<script charset="utf-8" src="/editor/kindeditor.js"></script>
<script charset="utf-8" src="/editor/lang/zh-CN.js"></script>
<script>
function change(){
	var id=document.getElementById("img_id").value;
	id=Number(id);
	document.getElementById("img_view").src="?ctrl=image&act=get&id="+id;
	document.getElementById("img_view").style.display="block";
}
</script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id',{uploadJson :"?ctrl=admin&act=image&opt=highadd",
													  height:600});
        });
</script>
<form action="?ctrl=admin&act=article&opt=add" method="post">
		<input type="title" name="title" placeholder="标题">
		<select name="class">
		<?php foreach($class as $v){ ?>
			<option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
			<?php } ?>
		</select>
		<textarea id="editor_id" name="text" placeholder="内容"></textarea>
		<img id="img_view" src="?ctrl=image&act=get&id=0" width="300" height="300" alt="当前图片" style="display: none;">
		封面图片id:<input id="img_id" type="number" name="imgid" value="0" onChange="change();">
		<button>提交</button>
	</form>
<?php include("cache/1866e64f8c3a4cc675d5ad41c133aca5.php"); ?>