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
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 联系表管理 </strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><a href="javascript:void(0)" onclick="return DelSelect()"><span class="icon-trash-o"></span> 批量删除</a></button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">

      <tr>
        <th width="120">联系ID</th>
        <th>名字</th>       
        <th>邮箱</th>
        <th>电话</th>
        <th>联系内容</th>
      </tr>   
        
          <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
        
          <td><input type="checkbox" name="id[]" value="<?php echo ($vo["contact_id"]); ?>" /><?php echo ($vo["contact_id"]); ?></td>
     
          <td width="70"><?php echo ($vo["name"]); ?></td>
          <td><?php echo ($vo["email"]); ?></td>  
          <td><?php echo ($vo["phone"]); ?></td>
          <td><?php echo ($vo["message"]); ?></td>
           <td>
               <div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo ($vo["contact_id"]); ?>)"><span class="icon-trash-o"></span> 删除</a>
           </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
        <td colspan="8"><div class="pagelist"> <?php echo ($page); ?> </div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

function del(id){
    if(confirm("您确定要删除吗?")){
        var url="<?php echo U('Contact/deleteContact');?>?id="+id;
        window.location.href=url;
    }
        
}


$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) {
                    return false;
                } 
                else{
//                    alert("确定");
                    var idList=[];
                    var a = document.getElementsByName("id[]");
                    for(var i = 0 ;i<a.length;i++)
                    {
                        if(a[i].checked)
                        {
                            idList.push(a[i].value);
                        }
                    }
                    var url="<?php echo U('Contact/deleteContact');?>?id="+idList;
                    window.location.href=url;
                }
                  
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body></html>
   
</html>