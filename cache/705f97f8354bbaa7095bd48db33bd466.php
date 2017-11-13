<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/2e360e17b9ee2f87c044df5ba00c6dfd.php"); ?>
<div>
	<h1>队伍列表</h1>
	<table>
		<tr>
			<td>id</td>
			<td>队伍名</td>
			<td>队长账号</td>
			<td>队长姓名</td>
			<td>创建时间</td>
		</tr>
		<?php foreach($teams as $v){ ?>
		<tr>
			<td><?php echo $v['id']; ?></td>
			<td><?php echo $v['tname']; ?></td>
			<td><?php echo $v['tcreator']; ?></td>
			<td><?php echo $v['realname']; ?></td>
			<td><?php echo $v['timeline']; ?></td>
		</tr>
		<?php } ?>
		<form action="?ctrl=admin&act=team&opt=add" method="post">
			<tr>
				<td>添加：</td>
				<td><input name="name" type="text" placeholder="队伍名"></td>
				<td><input name="ucode" type="number" placeholder="队长账号"></td>
				<td></td>
				<td><button>添加新队伍</button></td>
			</tr>
		</form>
	</table>
</div>
<div>
	<h1>成员列表</h1>
</div>
<?php include("cache/1866e64f8c3a4cc675d5ad41c133aca5.php"); ?>