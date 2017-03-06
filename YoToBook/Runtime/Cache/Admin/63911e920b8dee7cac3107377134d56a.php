<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
   
   
          <!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>后台管理中心</title>
    <link rel="stylesheet" href="/YoToBook/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/YoToBook/Public/Admin/css/admin.css">
    <script src="/YoToBook/Public/Admin/js/jquery.js"></script>   
    <script src="/YoToBook/Public/Admin/js/pintuer.js"></script>
</head>


         
         

<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="/YoToBook/Public/Admin/<?php echo ($_SESSION['adminInfo']['headimage']); ?>" class="radius-circle rotate-hover" height="50" alt="" />YoToBook后台管理中心</h1>
  </div>
  <div class="head-l">
        <a class="button button-little bg-green" href="<?php echo U('Index/index');?>"><span class="icon-home"></span> 首页</a> &nbsp;&nbsp;
        <a class="button button-little bg-blue" href="/YoToBook/Home/Index/index"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;
        <a class="button button-little bg-red" href="<?php echo U('Administrator/logout');?>"><span class="icon-power-off"></span> 退出登录</a> 
  </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本管理</h2>
  <ul style="display:block">
   
    <li><a href="<?php echo U('Administrator/changePwd');?>" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
    <li><a href="<?php echo U('Administrator/changeImg');?>" target="right"><span class="icon-caret-right"></span>修改头像</a></li>   
    <li><a href="<?php echo U('Books/booksTable');?>" target="right"><span class="icon-caret-right"></span>书籍管理</a></li>  
    <li><a href="<?php echo U('Comments/commentsTable');?>" target="right"><span class="icon-caret-right"></span>书评管理</a></li>     
    <li><a href="<?php echo U('Users/usersTable');?>" target="right"><span class="icon-caret-right"></span>用户管理</a></li>
    <li><a href="<?php echo U('OrderItems/ordersTable');?>" target="right"><span class="icon-caret-right"></span>订单管理</a></li>
   <li><a href="<?php echo U('Contact/contactTable');?>" target="right"><span class="icon-caret-right"></span>联系表管理</a></li>
  </ul>   
<!--  <h2><span class="icon-pencil-square-o"></span>栏目管理</h2>
  <ul>
    <li><a href="list.html" target="right"><span class="icon-caret-right"></span>内容管理</a></li>
    <li><a href="add.html" target="right"><span class="icon-caret-right"></span>添加内容</a></li>
    <li><a href="cate.html" target="right"><span class="icon-caret-right"></span>分类管理</a></li>        
  </ul>  -->
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="<?php echo U('Index/info');?>" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="info.html" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>
   
</html>