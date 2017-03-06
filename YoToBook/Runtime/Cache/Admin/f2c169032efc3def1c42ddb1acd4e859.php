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
<form method="post" action="<?php echo U('Comments/editCommentSubmit');?>?id=<?php echo ($id); ?>">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 修改书评</strong></div>
    <div class="padding border-bottom">

    </div>
    <table class="table table-hover text-center">
      <tr>
        
        <th width="120">评论ID</th>
        <th>姓名</th>       
        <th>书名ID</th>
        <th width="25%">评论内容</th>
        <th width="120">评价时间</th>
         
      </tr>    
        <?php if(is_array($commentResult)): $k = 0; $__LIST__ = $commentResult;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
        
          <td name="comment_id"><?php echo ($vo["comment_id"]); ?></td>
          <td><?php echo ($vo["user_account"]); ?></td>
          <td><?php echo ($vo["comment_bid"]); ?></td>
        
          <td><textarea style="width:200px;height:100px;" name="comment_content" value="intro"><?php echo ($vo["comment_content"]); ?></textarea></td>
        
          <td><input type="text" name='comment_time' class="contact_input" value="<?php echo ($vo["comment_time"]); ?>"/></td>
           </tr><?php endforeach; endif; else: echo "" ;endif; ?>
       </table>
  </div>
        <div> 
              <input type="submit" class='contact' value="确认修改" /> 
        </div>
              
</form>
</body></html>
   
</html>