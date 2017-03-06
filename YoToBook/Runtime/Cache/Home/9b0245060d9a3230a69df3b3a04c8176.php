<?php if (!defined('THINK_PATH')) exit();?>
 <!--图书类别列表页面-->
<?php if(is_array($typeResult)): $i = 0; $__LIST__ = $typeResult;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><div class="crumb_nav"> <a href="/YoToBook/Books/specialType/<?php echo ($vo['type']); ?>"><?php echo ($vo['type']); ?></a><br />
        </div></li><?php endforeach; endif; else: echo "" ;endif; ?>