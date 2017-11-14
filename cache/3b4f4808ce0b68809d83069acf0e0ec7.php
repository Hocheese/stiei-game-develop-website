<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/e0e10ea2f5e61d625f8a51960fb3de15.php"); ?>
        <div class = "main_cent">
            <div class="js-silder" style="height: 419px;">
                <div class="silder-scroll">
                    <div class="silder-main" style="height: 100%"><?php foreach($ids as $v){ ?>
                        <div class="silder-main-img">
                            <img src="?ctrl=image&act=get&id=<?php echo $v["id"]; ?>" alt="图片">
						</div><?php } ?>
                    </div>
                </div>
            </div>
            <div class = "main_li_div" style = "border-right : 1px solid #DCDCDC;">
                <ul>
                    <a href = "#">
                        <li class = "main_li">javascript</li>
                    </a>
                    <a href = "#">
                        <li class = "main_li">javascript</li>
                    </a>
                    <a href = "#">
                        <li class = "main_li">javascript</li>
                    </a>
                    <a href = "#">
                        <li class = "main_li">javascript</li>
                    </a>
                    <a href = "#">
                        <li class = "main_li">javascript</li>
                    </a>
                </ul>
            </div>
            <div class = "main_li_div">
                <ul>
                    <a href = "#">
                        <li class = "main_li">javascript</li>
                    </a>
                    <a href = "#">
                        <li class = "main_li">javascript</li>
                    </a>
                    <a href = "#">
                        <li class = "main_li">javascript</li>
                    </a>
                    <a href = "#">
                        <li class = "main_li">javascript</li>
                    </a>
                    <a href = "#">
                        <li class = "main_li">javascript</li>
                    </a>
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
        </script>
    </body>
</html>