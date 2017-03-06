<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>YOTOBOOK</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Book Store</title>
        <link rel="stylesheet" type="text/css" href="/YoToBook/Public/css/style.css" />
        <Style type="text/css">
            <!--显示登录或退出-->
            #pic{
                display: block;
            }
            #pic2{
                display: block;
            }
            #header1{
                padding:0;
                margin:0;
            }
            <!--菜单悬浮-->
            #box{float:left;position:relative;width:100%;}  
            .div1{}  
            .div2{position:fixed;_position:absolute;top:0px;z-index:295;width:100%;}  
        </style>
        <!--使用bootstrap-->
        <!-- Le styles -->
        <link href="/YoToBook/Public/css1/bootstrap.css" rel="stylesheet">
            <style type="text/css">
                body {
                    background:url('/YoToBook/Public/img/bg.gif');
                    /*padding-bottom: 40px;*/
                }
            </style>
            <link href="/YoToBook/Public/css1/bootstrap-responsive.css" rel="stylesheet">
                <link href="/YoToBook/Public/css1/global.css" rel="stylesheet">

                    <LINK rel=stylesheet type=text/css href="/YoToBook/Public/css/lrtk.css">
                        <SCRIPT type=text/javascript src="/YoToBook/Public/js/jquery.js"></SCRIPT>
                        <SCRIPT type=text/javascript src="/YoToBook/Public/js/slide.js"></SCRIPT>
                        <Script LANGUAGE="JavaScript">
//                             <!--菜单悬浮-->
                            $(function () {
                                var oDiv = document.getElementById("float1");
                                var H = 0, iE6;
                                var Y = oDiv;
                                while (Y) {
                                    H += Y.offsetTop;
                                    Y = Y.offsetParent;
                                }
                                ;
                                iE6 = window.ActiveXObject && !window.XMLHttpRequest;
                                if (!iE6) {
                                    window.onscroll = function ()
                                    {
                                        var s = document.body.scrollTop || document.documentElement.scrollTop;
                                        if (s > H) {
                                            oDiv.className = "div1 div2";
                                            if (iE6) {
                                                oDiv.style.top = (s - H) + "px";
                                            }
                                        } else {
                                            oDiv.className = "div1";
                                        }
                                    };
                                }
                            });
                            function hide()
                            {
                                document.getElementById("pic").style.display = "none";

                            }
                            function hide2()
                            {
                                document.getElementById("pic2").style.display = "none";

                            }
                        </Script>

                        </head>



                        <body>
                            <div id="float1" class="div1">
                                <div id="box">  
                                    <div class="navbar navbar-inverse" id="header1">
                                        <div class="navbar-inner">
                                            <div class="container">

                                                <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                                                <button class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                </button>

                                                <!-- Be sure to leave the brand out there if you want it shown -->
                                                <a class="navbar-brand" href="<?php echo U('Index/index');?>">YO TO BOOK</a>


                                                <!-- Everything you want hidden at 940px or less, place within here -->
                                                <div class="nav-collapse collapse">
                                                    <!-- .nav, .navbar-search, .navbar-form, etc -->
                                                    <ul class="nav">

                                                        <li><a href="<?php echo U('Index/index');?>">首页</a></li> 
                                                        <li><a href="<?php echo U('Books/category');?>">书籍</a></li>
                                                        <li><a href="<?php echo U('Books/newreleases');?>">新出版</a></li>
                                                        <li><a href="<?php echo U('Users/contact_us');?>">联系我们</a></li>    
                                                        <li><a href="<?php echo U('Users/register');?>">注册</a></li>
                                                        <li><a href="<?php echo U('Books/upload');?>">上传新书</a></li>
                                                        <li>
                                                            <form class="navbar-form pull-left" method='post' action="<?php echo U('Books/search');?>">
                                                                <input class="span2" type="text" name='search' placeholder="请输入关键字">
                                                                    <button type="submit" value="搜索" class="btn btn-info">搜索</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <div id="pic" >
                                                                <a class="btn" href="<?php echo U('Users/login');?>">登录</a>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div id="pic2">
                                                                <a class="btn" href="<?php echo U('Users/logout');?>">退出</a>
                                                                <a class="btn" href="#">欢迎您, <?php echo (session('username')); ?></a>
                                                            </div>
                                                        </li>
                                                        <a class="btn btn-info" sytle="text-align right;" href="/YoToBook/Admin/Index/index"><span class="icon-home"></span> 管理员首页</a> &nbsp;&nbsp;

                                                    </ul>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div></div>
                            <div class="picture">
                                <DIV><!--大图轮换区-->
                                    <DIV style="MARGIN: 0px auto; WIDTH: 100%;  height: 368px; OVERFLOW: hidden">
                                        <DIV style="MARGIN: 0px auto; WIDTH: 100%; height: 368px; OVERFLOW: hidden" id=bigpicarea>
                                            <P class=bigbtnPrev><SPAN id=big_play_prev></SPAN></P>
                                            <DIV id=image_xixi-01 class=image><A href="" target=_blank><IMG alt=""
                                                                                                            src="/YoToBook/Public/images/1.jpg"
                                                                                                            width=100%></A>

                                                <DIV class=word>
                                                    <br/><br/>
                                                </DIV>
                                            </DIV>
                                            <DIV id=image_xixi-02 class=image><A href="" target=_blank><IMG alt=""
                                                                                                            src="/YoToBook/Public/images/2.jpg"
                                                                                                            width=100%></A>

                                                <DIV class=word>
                                                    <br/><br/>
                                                </DIV>
                                            </DIV>


                                            <DIV id=image_xixi-03 class=image><A href="" target=_blank><IMG alt=""
                                                                                                            src="/YoToBook/Public/images/3.jpg"
                                                                                                            width=100%></A>

                                                <DIV class=word>
                                                    <br/><br/>
                                                </DIV>
                                            </DIV>


                                            <DIV id=image_xixi-04 class=image><A href="" target=_blank><IMG alt=""
                                                                                                            src="/YoToBook/Public/images/4.jpg"
                                                                                                            width=100%></A>
                                                <DIV class=word>
                                                    <br/><br/>
                                                </DIV>
                                            </DIV>



                                            <P class=bigbtnNext><SPAN id=big_play_next></SPAN></DIV>
                                    </DIV>

                                    <SCRIPT>
                                        var target = ["xixi-01", "xixi-02", "xixi-03", "xixi-04", "xixi-05", "xixi-06"];
                                    </SCRIPT>
                                </DIV>  
                            </div>
                            <div id="wrap">
                                <!--end of menu--> 

                                <!--end of header-->  
                                <?php  if(isset($_SESSION['username'])) { echo "<script>hide();</script>"; } else { echo "<script>hide2();</script>"; } ?>

    <!--购物车-->
<script>
    function addCount(username, b_id, b_num) {
        b_num = parseInt(b_num) + 1;
        var url = "/YoToBook/Books/changeCount/" + username + "/" + b_id + "/" + b_num;
        window.location.href = url;
    }
    function subCount(username, b_id, b_num) {
        b_num = parseInt(b_num) - 1;
        var url = "/YoToBook/Books/changeCount/" + username + "/" + b_id + "/" + b_num;
        window.location.href = url;
    }
</script>



<div class="center_content">
    <div class="left_content">
        <div class="sub_left_content">
            <div class="title"><span class="title_icon"><img src="/YoToBook/Public/images/bullet1.gif" alt="" title="" /></span>我的购物车</div>
            <div class="feat_prod_box_details">
                <table class="cart_table" id="tab">
                    <tr class="cart_title">
                        <td>图片</td>
                        <td>书名</td>
                        <td>单价</td>
                        <td>数量</td>
                        <td>总价</td>
                        <td>操作</td>
                    </tr>


                    <?php if(is_array($blist)): $i = 0; $__LIST__ = $blist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="ss">
                            <td><a href="/YoToBook/Books/details/<?php echo ($vo['b_id']); ?>"><img src="/YoToBook/Public/<?php echo ($vo['b_pic_src']); ?>" alt="" title="" border="0" class="cart_thumb" /></a></td>
                            <td><?php echo ($vo['b_name']); ?></td>
                            <td>
                                <span class="price"><?php echo ($vo['price']); ?></span>
                            </td>
                            <td class="count">
                                <input class="min" name="" type="button" value="-" onclick="subCount('1', '<?php echo ($vo[b_id]); ?>', '<?php echo ($order_result[$i-1]["s_num"]); ?>')" /> 
                                <?php echo ($order_result[$i-1]["s_num"]); ?>
                                <input class="add" name="" type="button" value="+" onclick="addCount('1', '<?php echo ($vo[b_id]); ?>', '<?php echo ($order_result[$i-1]["s_num"]); ?>')" />
                            </td>
                            <td>￥<?php echo ($pricelist[$i-1]); ?></td>
                            <td><a href="/YoToBook/Users/delete/<?php echo ($vo['b_id']); ?>" class="view_cart "><input type="button" id='return' class="btn btn-info" value="删除"></a></a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    <tr>
<!--                    <td colspan="5" class="cart_total"><span class="red">共<span id="count"></span>件商品&nbsp;&nbsp;&nbsp;&nbsp;| </td>
                        <td><span class="red">总额：￥<span class="total"></span></td>-->
                    <tr class="cart_table">
                        <td colspan="5" class="cart_total"><span class="red">总价：￥<?php echo ($totalMoney); ?></span></td>
                        <td></td>
                    </tr>


                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td><div class="left_button"><a href="<?php echo U('Index/index');?>"><input type="button" id='return' class="btn btn-info" value="&lt; 继续购物"></a></div></td><td colspan="3"> </td><td><div class="right_button"><a href="<?php echo U('Books/order');?>"><input type="button" id='return' class="btn btn-info" value="结算 &gt;"></a></div></td> 
                    </tr>
                </table>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <!--end of left content-->

            
<div class="right_content">
    <div class="cart">
        <div class="title"><span class="title_icon"><img src="/YoToBook/Public/images/cart.gif" alt="" title="" /></span>购物车&nbsp;&nbsp;|</div>
        <a href="<?php echo U('Users/cart');?>" class="view_cart">去我购物车</a> </div>
    <div class="title"><span class="title_icon"><img src="/YoToBook/Public/images/bullet3.gif" alt="" title="" /></span>关于本站</div>
    <div class="about">
        <div class="title_icon">
            <p> <img src="/YoToBook/Public/images/about.gif" alt="" title="" class="right"/>我们是独立自主开发的项目组，YoToBook的名字由来是因为youtube,我们以此为出发点进行了新名字，Yo （你） to （到） Book （书），表明的是你和书之间的距离希望广大读者可以多阅读，阅读读书是一种生活方式，而不单单是一种习惯。YoToBook版权归广东外语外贸大学思科信息学院古才良和陈戈共同所有。</p>
        </div>
    </div>
    <div class="right_box">
        <div class="title"><span class="title_icon"><img src="/YoToBook/Public/images/bullet4.gif" alt="" title="" /></span>优惠产品</div>
        <div class="new_prod_box"> <a href="#">书名</a>
            <div class="new_prod_bg"> <span class="new_icon"><img src="/YoToBook/Public/images/promo_icon.gif" alt="" title="" /></span> <a href="#"><img src="/YoToBook/Public/images/thumb1.gif" alt="" title="" class="thumb" border="0" /></a> </div>
        </div>
        <div class="new_prod_box"> <a href="#">书名</a>
            <div class="new_prod_bg"> <span class="new_icon"><img src="/YoToBook/Public/images/promo_icon.gif" alt="" title="" /></span> <a href="#"><img src="/YoToBook/Public/images/thumb2.gif" alt="" title="" class="thumb" border="0" /></a> </div>
        </div>

    </div>
    <div class="right_box">
        <!--<?php echo ($typeResult); ?>-->
        <div class="title"><span class="title_icon"><img src="/YoToBook/Public/images/bullet5.gif" alt="" title="" /></span>书的种类</div>
        <ul class="list">
            <?php echo W('Type/category');?>;
        </ul>
    </div>
</div>
<!--end of right content-->
<div class="clear"></div>
</div>
<!--end of center content-->
<div class="footer">
    <div class="left_footer"><img src="/YoToBook/Public/images/footer_logo.gif" alt="" title="" /><br />
    </div>
    <div class="right_footer"> <a href="<?php echo U('Index/index');?>">首页</a> <a href="<?php echo U('Index/aboutus');?>">关于我们</a> <a href="<?php echo U('Index/privacy_policy');?>">隐私政策</a> <a href="<?php echo U('Users/contact_us');?>">联系我们</a> </div>
</div>
</div>

<script src="/YoToBook/Public/js1/jquery.js"></script>
<script src="/YoToBook/Public/js1/bootstrap.js"></script>

</body>
</html>


</body>
</html>