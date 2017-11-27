<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/e0e10ea2f5e61d625f8a51960fb3de15.php"); ?>
       
       <?php $title=isset($title)?$title:(isset($info)?$info["title"]:"活动")  ?>
        <div class = "main_cent">
            <div class = "_active">
                <span id = "tit_active"><?php echo $title; ?></span>
                <hr>
                