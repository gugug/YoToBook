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


         
         
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-key"></span> 修改头像</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Administrator/uploadImg');?>" enctype='multipart/form-data'>


                    <div class="form-group">

                        <h4>当前头像：</h4>
                        <img src="/YoToBook/Public/Admin/<?php echo ($_SESSION['adminInfo']['headimage']); ?>" class='img-rounded' width='150' height="150">
                        <img src="/YoToBook/Public/Admin/<?php echo ($_SESSION['adminInfo']['headimage']); ?>" class='img-rounded' width='100' height="100">

                          <div class="formuitem">
                              <input type="file" name="file" class="inputfile" value="选择图片">
                          </div>
                      </div>
                        <div class="form-group">
                          <div class="label">
                            <label></label>
                          </div>
                          <div class="field">
                            <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>   
                          </div>
                        </div>      
        
    </form>
          </div>
</div>
</body></html>
   
</html>