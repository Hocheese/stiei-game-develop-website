<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/c1dd617e8d07d7e94cdd553247ee1f69.php"); ?>
<style>
	table{
		border:none;
	}
	td{
		border: none;
		border-bottom-color: #222222;
		border-bottom: solid 1px;
		text-align: center;
	}
	th{
		border: none;
		border-bottom-color: #222222;
		border-bottom: solid 3px;
		text-align: center;
	}

</style>
<p><strong>警告！你只能创建或加入一个队伍！创建或加入后不可退出！请谨慎操作！！！</strong></p>
<h2>我的队伍</h2>
<form onSubmit="return false;">
	<p><input id="tname" name="tname" type="text" placeholder="队伍名"></p>
	<p><input id="text" name="text" type="text" placeholder="一句话简介"></p>
	<!--p><select id="allowjoin" name="allowjoin">
		<option value="0">不允许任何人加入（只能邀请）</option>
		<option value="1">允许任何人加入</option>
		<option value="2">允许任何人加入，但是需要验证</option>
	</select></p-->
	<p><button id="create">创建队伍</button></p>
</form>
<script>
	$("#create").click(function(){
		var name=$("#tname").val();
		var text=$("#text").val();
		var allowjoin=$("allowjoin").val();
		$.post("?ctrl=team&act=create",{name:name,text:text,allowjoin:allowjoin}).done(function(data){
			if(data.error==0){
				alert("队伍创建成功！请刷新页面！");
			}else{
				alert("队伍创建失败！");
			}
			
		})
	})
</script>
<h2>队伍列表</h2>
<table width="100%" border="1" cellpadding="0" cellspacing="0">
  <tbody>
    <tr id="t_hd">
      <th scope="col">id</th>
      <th scope="col">队名</th>
      <th scope="col">创建者</th>
      <th scope="col">创建时间</th>
      <th scope="col">操作</th>
    </tr>
    <?php foreach($team as $v){ ?>
    <tr>
      <td><?php echo $v["id"]; ?></td>
      <td title="<?php echo $v["text"]; ?>"><?php echo $v["tname"]; ?></td>
      <td><?php echo $v["realname"]; ?></td>
      <td><?php echo $v["time"]; ?></td>
      <td><a href="?ctrl=team&act=join&id=<?php echo $v["id"]; ?>">加入</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php include("cache/f068929793a7a719e2a0561b03f19092.php"); ?>