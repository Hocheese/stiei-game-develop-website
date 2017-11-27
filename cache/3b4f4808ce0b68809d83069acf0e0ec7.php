<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/e0e10ea2f5e61d625f8a51960fb3de15.php"); ?>
        <div class = "main_cent">
            <div class="js-silder">
                <div class="silder-scroll">
                    <div class="silder-main"><?php foreach($ids as $v){ ?>
                        <div class="silder-main-img">
                            <img src="?ctrl=image&act=get&id=<?php echo $v["id"]; ?>" alt="图片">
						</div><?php } ?>
                    </div>
                </div>
            </div>
            <div class = "main_li_div" style = "border-right : 1px solid #DCDCDC;">
                <ul id="left">
                    
                </ul>
            </div>
            <div class = "main_li_div">
                <ul id="right">
                    
                </ul>
            </div>
        </div>
        
        <script src="../jq/wySilder.min.js" type="text/javascript"></script>
        <script>
            $(function (){
                $(".js-silder").silder({
                    auto: true,//自动播放，传入任何可以转化为true的值都会自动轮播
                    speed: 20,//轮播图运动速度
                    sideCtrl: true,//是否需要侧边控制按钮
                    bottomCtrl: true,//是否需要底部控制按钮
                    defaultView: 0,//默认显示的索引
                    interval: 3000,//自动轮播的时间，以毫秒为单位，默认3000毫秒
                    activeClass: "active",//小的控制按钮激活的样式，不包括作用两边，默认active
                });
            });
				
whq_ajax("?ctrl=article&act=active&opt=list&start="+0+"&num="+5,function(k,v){
	$("#left").before('<a href = "?ctrl=article&act=read&id='+v.id+'" ><li class = "main_li">['+v.name+']'+v.title+'</li></a>');
})
whq_ajax("?ctrl=article&act=active&opt=list&start="+5+"&num="+10,function(k,v){
	$("#right").before('<a href = "?ctrl=article&act=read&id='+v.id+'" ><li class = "main_li">['+v.name+']'+v.title+'</li></a>');
})
setTimeout(function(){$(".silder-main").attr("style","height: 419px;")},1000);

        </script>
    </body>
</html>