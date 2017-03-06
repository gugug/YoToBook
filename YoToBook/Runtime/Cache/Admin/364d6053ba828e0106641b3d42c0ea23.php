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
<form method="post" action="<?php echo U('Books/editBookSubmit');?>?id=<?php echo ($bookResult["b_id"]); ?>">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 修改书籍信息</strong></div>
    <div class="padding border-bottom">
    </div>
    <table class="table table-hover text-center">
          <tr>
            <th width="120">书籍ID</th>
            <th><?php echo ($bookResult["b_id"]); ?></th>
          </tr>
          <tr>       
            <th>书名</th>   
            <td><input type="text" name='b_name' class="contact_input" value="<?php echo ($bookResult["b_name"]); ?>"/></td>  
          </tr>
          <tr>
            <th>作者</th>
            <td><input type="text" name='author' class="contact_input" value="<?php echo ($bookResult["author"]); ?>"/></td>  
          </tr>
          <tr>
            <th width="25%">出版社</th>
            <td><input type="text" name='press' class="contact_input" value="<?php echo ($bookResult["press"]); ?>"/></td>  
          </tr>
          <tr>
             <th width="120">书籍类型</th>
             <td><input type="text" name='type' class="contact_input" value="<?php echo ($bookResult["type"]); ?>"/></td>  
          </tr>
          <tr>
             <th width="120" style="text-align:center;vertical-align:middle">书籍简介</th>
             <td><textarea style="width:200px;height:100px;" name="introduction" value="intro"><?php echo ($bookResult["introduction"]); ?></textarea></td>
          </tr>
        <tr>
            <th width="120">书籍价格</th>
            <td><input type="text" name='price' class="contact_input" value="<?php echo ($bookResult["price"]); ?>"/></td>
        </tr>    
       </table>
  </div>
        <div> 
              <input type="submit" class='contact' value="确认修改" /> 
        </div>
              
</form>
</body></html>
   
</html>