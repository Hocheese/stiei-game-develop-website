<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><!DOCTYPE html>
<html>
    <head>
        <title>游戏开发社</title>
        <meta charset = "utf-8">
        <!-- <link rel = "stylesheet" type = "text/css" href = "./css/kan_Ban.css" /> -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"><!--ie使用edge渲染模式-->
        <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" id="viewport" name="viewport">
        <meta name="renderer" content="webkit"><!--360渲染模式-->
        <meta name="format-detection" content="telephone=notelphone=no, email=no" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="apple-touch-fullscreen" content="yes"><!-- 是否启用 WebApp 全屏模式，删除苹果默认的工具栏和菜单栏 -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black"><!-- 设置苹果工具栏颜色:默认值为 default，可以定为 black和 black-translucent-->
        <meta http-equiv="Cache-Control" content="no-siteapp" /><!-- 不让百度转码 -->
        <meta name="HandheldFriendly" content="true"><!-- 针对手持设备优化，主要是针对一些老的不识别viewport的浏览器，比如黑莓 -->
        <meta name="MobileOptimized" content="320"><!-- 微软的老式浏览器 -->
        <meta name="screen-orientation" content="portrait"><!-- uc强制竖屏 -->
        <meta name="x5-orientation" content="portrait"><!-- QQ强制竖屏 -->
        <meta name="browsermode" content="application"><!-- UC应用模式 -->
        <meta name="x5-page-mode" content="app"><!-- QQ应用模式 -->
        <meta name="msapplication-tap-highlight" content="no"><!-- windows phone 点击无高光 -->
        <link rel="stylesheet" href="../css/carou.css" />
        <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
        <link rel = "shortcut icon" type = "image/x-icon" href = "../img/dimension.ico" />
        <style>
            body {
                background-color : ;
                /* background : url(../img/bj4.jpg); */
                /* background-size : cover; */
            }
        </style>
        <script src="../jq/jquery-1.11.3.min.js" type="text/javascript"></script>
        <script src="../js/main.js"></script>
    </head>
    <body id = "bac">
        <nav>
            <ul>
                <a href = "/" class = "nav_a" id = "nav_home">
                    <li class = "nav_li">
                        <span class = "nav_font">首页</span>
                    </li>
                </a>
                <a href = "?ctrl=article&act=active" class = "nav_a" id = "nav_active">
                    <li class = "nav_li">
                        <span class = "nav_font">活动</span>
                    </li>
                </a>
                <a href = "#" class = "nav_a" id = "nav_grllery">
                    <li class = "nav_li">
                        <span class = "nav_font">展廊</span>
                    </li>
                </a>
                <a href = "#" class = "nav_a" id = "nav_tutorial">
                    <li class = "nav_li">
                        <span class = "nav_font">教程</span>
                    </li>
                </a>
            </ul>
        </nav>