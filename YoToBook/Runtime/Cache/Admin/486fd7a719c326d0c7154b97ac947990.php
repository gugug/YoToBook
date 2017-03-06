<?php if (!defined('THINK_PATH')) exit();?>
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
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 网站信息</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">
      <div class="form-group">
        <div class="label">
          <label>网站标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="stitle" value="YoToBook" />
          <div class="tips"></div>
        </div>
      </div>
     
      <div class="form-group">
        <div class="label">
          <label>网站域名：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="surl" value="后端管理页面：http://localhost:82/YoToBook/Admin/Index/index.html / 前台界面：http://localhost:82/YoToBook/Index/index" />
        </div>
      </div>
 
      <div class="form-group">
        <div class="label">
          <label>网站描述：</label>
        </div>
        <div class="field">
          <textarea class="input" name="sdescription">此网站由古才良 陈戈 共同开发，网站的类型是电子商务的书店平台</textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>联系人-手机：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_name" value="古才良-18826103742 / 陈戈-18826103516" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>学号：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_phone" value="古才良-20141002516 / 陈戈-20141002406" />
          <div class="tips"></div>
        </div>
      </div>
     
      <div class="form-group">
        <div class="label">
          <label>邮箱：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_qq" value="古才良-734093894@qq.com / 陈戈-451650276@qq.com" />
          <div class="tips"></div>
        </div>
      </div>


    </form>
  </div>
</div>
</body></html>