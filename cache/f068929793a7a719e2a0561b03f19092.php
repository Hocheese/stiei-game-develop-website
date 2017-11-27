<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?>
            </div>
            <div class = "_list">
              <?php if(!empty($_SESSION['userData'])){ ?>
               <p><?php echo $_SESSION["userData"]["realname"]; ?>，你好，你的账号是<?php echo $_SESSION["userData"]["account_code"]; ?>，请牢记你的账号。</p>
               <?php } ?>
                <ul><?php if(!empty($_SESSION['userData']["admin"])){ ?>
                    <a href = "/?ctrl=admin" class = "butt_list">
                        <li class = "li_list">
                            <span style = "font-size : 24px;">管理中心</span>
                        </li>
                    </a>
                    <?php } ?>
                    <!--a href = "#" class = "butt_list">
                        <li class = "li_list">
                            <span style = "font-size : 24px;">个人中心</span>
                        </li>
                    </a>
                    <!--a href = "#" class = "butt_list">
                        <li class = "li_list">
                            <span class=" msg_new" style = "font-size : 24px;">消息中心</span>
                        </li>
                    </a-->
                    <a href = "?ctrl=team" class = "butt_list">
                        <li class = "li_list">
                            <span style = "font-size : 24px;">开发组队</span>
                        </li>
                    </a>
                    <a href = "?ctrl=user<?php if(!empty($_SESSION['userData']["id"])){ ?>&act=logout<?php } ?>#" class = "butt_list">
                        <li class = "li_list">
                            <span style = "font-size : 24px;"><?php if(!empty($_SESSION['userData']["id"])){ ?>注销<?php } ?>登录</span>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
<style>
	@keyframes newmsg{
		from{
			color: red;
		}
		to{
			color: white;
		}
	}
	.msg_new{
		
		animation-name: newmsg;
		animation-duration: 1s;
		animation-timing-function: ease-out;
		animation-iteration-count: infinite;
	}
</style>
    </body>
</html>