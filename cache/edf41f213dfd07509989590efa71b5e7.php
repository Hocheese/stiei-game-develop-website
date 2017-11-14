<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?> <?php include("cache/c1dd617e8d07d7e94cdd553247ee1f69.php"); ?>
               
                <ul id="art_list">
                    <a href = "#" class = "a_active" id = "load">
                        <li class = "li_active">点击加载更多</li>
                    </a>
                    
                </ul>
<script>
	var basenum=0
	$(document).ready(function(){
		$("#load").click(function(){
			load();
			/*$.get("?ctrl=article&act=active&opt=list&start="+basenum+"&num="+(basenum+10),function(data){
				$("#usercode").text(data);
			})*/
		})
	})
function load(){
$.getJSON("?ctrl=article&act=active&opt=list&start="+basenum+"&num="+(basenum+10)).done(function(data){
				if(data.error==0){
					$.each(data.data,function(k,v){
						   $("#load").before('<a href = "?ctrl=article&act=read&id='+v.id+'" class = "a_active"><li class = "li_active">['+v.name+']'+v.title+'</li></a>');
						   })
				}else{
					alert("发生错误！错误代码："+data.error+"\n 错误原因："+data.data+"\n您可以向网站技术负责人王贺青（QQ：2653591247）报告这个错误，感谢！");
				}
				
			})
basenum+=10;
}
	load();
</script>
 <?php include("cache/f068929793a7a719e2a0561b03f19092.php"); ?>