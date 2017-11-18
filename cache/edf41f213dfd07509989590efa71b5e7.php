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
			whq_ajax("?ctrl=article&act=active&opt=list&start="+basenum+"&num="+(basenum+10),function(k,v){
	$("#load").before('<a href = "?ctrl=article&act=read&id='+v.id+'" class = "a_active"><li class = "li_active">['+v+']'+v.title+'</li></a>');
});
			
		})
	})


whq_ajax("?ctrl=article&act=active&opt=list&start="+basenum+"&num="+(basenum+10),function(k,v){
	$("#load").before('<a href = "?ctrl=article&act=read&id='+v.id+'" class = "a_active"><li class = "li_active">['+v.name+']'+v.title+'</li></a>');
});
</script>
 <?php include("cache/f068929793a7a719e2a0561b03f19092.php"); ?>