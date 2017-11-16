<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/2e360e17b9ee2f87c044df5ba00c6dfd.php"); ?>
<div>
	<h1>清空缓存</h1>
	<p>本站采用了模板缓存技术。如果对任何含有非异步加载动态内容的html文件做了修改，则需要更新缓存才能显示更改。</p>
	<a class="a_art" href="?ctrl=admin&act=basic&opt=clear">清空缓存</a>
</div>
<div>
	<h1>学院与专业列表<small>（进行操作需要root权限）</small></h1>
	<ul id="pro_list">
		
	</ul>
	<form action="" method="post">
	<h2>添加二级学院/专业<small>（进行操作需要root权限）</small></h2>
		<input name="name" type="text" placeholder="二级学院/专业名称">
		二级学院：<select name="college" id="pro_slt">
			<option value="0">自身</option>
		</select>
		<button>添加</button>
	</form>
</div>
<script>
/*whq_ajax_undata("/?ctrl=user&act=prolist","college",function(k,v){
	$("#pro_slt").append('<option value="'+v.id+'">'+v.name+'</option>');
	console.log(v.name);
});*/
$.getJSON("/?ctrl=user&act=prolist").done(function(data){
	if(data.error==0){
		$.each(data.college,function(k,v){
			$("#pro_slt").append('<option value="'+v.id+'">'+v.name+'</option>');
			$("#pro_list").append('<li  id="c'+v.id+'">'+v.name+'<a class="a_art" href="#">删除</a><ul class="flexcol"  id="p'+v.id+'"></ul></li>');
			$.each(v.pro,function(ke,va){
				$("#p"+v.id).append('<li>'+va.name+'<a class="a_art" href="#">删除</a></li>');
			})
		});
	}else if(data.error==2){
		alert("没东西啦！！");
	}else{
		alert("发生错误！错误代码："+data.error+"\n 错误原因："+data.data+"\n您可以向网站技术负责人王贺青（QQ：2653591247）报告这个错误，感谢！");
	}			
})
</script>
<?php include("cache/1866e64f8c3a4cc675d5ad41c133aca5.php"); ?>