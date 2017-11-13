<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/2e360e17b9ee2f87c044df5ba00c6dfd.php"); ?>
<script>
function change(){
	var id=document.getElementById("img_id").value;
	id=Number(id);
	document.getElementById("img_view").src="?ctrl=image&act=get&id="+id;
	document.getElementById("img_view").style.display="block";
}
</script>
<style>
	
</style>
<div>
	<h1>发表文章</h1>
	<a class="a_art" href="?ctrl=admin&act=article&opt=kindeditor">高级模式</a>
	<form action="?ctrl=admin&act=article&opt=add" method="post">
		<input type="title" name="title" placeholder="标题">
		<select name="class">
		<?php foreach($class as $v){ ?>
			<option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
			<?php } ?>
		</select>
		<textarea name="text" placeholder="内容"></textarea>
		<img id="img_view" src="?ctrl=image&act=get&id=0" width="300" height="300" alt="当前图片" style="display: none;">
		封面图片id:<input id="img_id" type="number" name="imgid" value="0" onChange="change();">
		<button>提交</button>
	</form>
</div>
<div>
	<h1>添加分类</h1>
	<table>
		
			<?php foreach($class as $v){ ?>
			<tr>
			<td><?php echo $v['name']; ?></td><td><a class="a_art" href="?ctrl=admin&act=article&opt=delclass&id=<?php echo $v['id']; ?>">删除</a></td>
			</tr>
			<?php } ?>
			
			
		
		<form action="?ctrl=admin&act=article&opt=addclass" method="post">
			<tr>
				<td><input type="text" name="name"></td>
				<td><button>添加</button></td>
			</tr>
		</form>
		
	</table>
</div>
<div>
	<h1>文章列表</h1>
	<script></script>
</div>

<?php include("cache/1866e64f8c3a4cc675d5ad41c133aca5.php"); ?>