<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>标题</title>
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
        <link rel="stylesheet" type="text/css" href="/YoToBook2/Public/css/style.css" />
        <Style type="text/css"> 
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

        </style>

        <!--使用bootstrap-->
        <!-- Le styles -->
        <link href="/YoToBook2/Public/css1/bootstrap.css" rel="stylesheet">
            <style type="text/css">
                body {
                    background:url('/YoToBook2/Public/img/bg.gif');

                    /*padding-bottom: 40px;*/
                }
            </style>
            <link href="/YoToBook2/Public/css1/bootstrap-responsive.css" rel="stylesheet">
                <link href="/YoToBook2/Public/css1/global.css" rel="stylesheet">



                    </head>
                    <LINK rel=stylesheet type=text/css href="/YoToBook2/Public/css/lrtk.css">
                        <SCRIPT type=text/javascript src="/YoToBook2/Public/js/jquery.js"></SCRIPT>
                        <SCRIPT type=text/javascript src="/YoToBook2/Public/js/slide.js"></SCRIPT>
                        <Script LANGUAGE="JavaScript">

                            function hide()
                            {
                                document.getElementById("pic").style.display = "none";

                            }
                            function hide2()
                            {
                                document.getElementById("pic2").style.display = "none";

                            }

                        </Script>


                        <body>



                            <!--                <div id="templatemo_menu" class="navbar-header">
                                                <ul class="nav nav-tabs">
                            
                                                    <li><a href="<?php echo U('Index/index');?>">首页</a></li> 
                                                    <li><a href="<?php echo U('Books/category');?>">书籍</a></li>
                                                    <li><a href="<?php echo U('Books/newreleases');?>">新出版</a></li>
                                                    <li><a href="<?php echo U('Users/contact_us');?>">联系我们</a></li>    
                                                    <li><a href="<?php echo U('Users/register');?>">注册</a></li>
                                                    <li><a href="<?php echo U('Books/upload');?>">上传新书</a></li>
                            
                                                    <div id="pic" >
                                                        <li><a href="<?php echo U('Users/login');?>">登录</a></li>
                                                    </div>
                                                    <div id="pic2">
                                                        <li><a href="<?php echo U('Users/logout');?>">退出</a></li>
                                                        <li><a class="btn" href="#">欢迎您, <?php echo (session('username')); ?></a></li>
                                                    </div>
                            
                                                    <li>
                                                        <form class="navbar-form pull-left" method='post' action="<?php echo U('Books/search');?>">
                                                          <input class="span2" type="text" name='search' placeholder="请输入关键字">
                                                          <button type="submit" value="搜索" class="btn btn-info">搜索</button>
                                                        </form>
                            
                                                        <form method='post' action="<?php echo U('Books/search');?>">
                                                            <input type="text" name='search' />
                                                            <input type="submit" value="搜索"/> 
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>-->


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
                                        <a class="navbar-brand" href="#">YO TO BOOK</a>


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
                                            </ul>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div id="wrap">
                                <!--end of menu--> 
                                <div class="picture">
                                    <DIV style="HEIGHT: 368px;"><!--大图轮换区-->
                                        <DIV style="MARGIN: 0px auto; WIDTH: 100%;  height: 368px; OVERFLOW: hidden">
                                            <DIV style="MARGIN: 0px auto; WIDTH: 100%; height: 368px; OVERFLOW: hidden" id=bigpicarea>
                                                <P class=bigbtnPrev><SPAN id=big_play_prev></SPAN></P>
                                                <DIV id=image_xixi-01 class=image><A href="" target=_blank><IMG alt=""
                                                                                                                src="/YoToBook2/Public/images/1.jpg"
                                                                                                                width=100%></A>

                                                    <DIV class=word>
                                                        <br/><br/>
                                                    </DIV>
                                                </DIV>
                                                <DIV id=image_xixi-02 class=image><A href="" target=_blank><IMG alt=""
                                                                                                                src="/YoToBook2/Public/images/2.jpg"
                                                                                                                width=100%></A>

                                                    <DIV class=word>
                                                        <br/><br/>
                                                    </DIV>
                                                </DIV>


                                                <DIV id=image_xixi-03 class=image><A href="" target=_blank><IMG alt=""
                                                                                                                src="/YoToBook2/Public/images/3.jpg"
                                                                                                                width=100%></A>

                                                    <DIV class=word>
                                                        <br/><br/>
                                                    </DIV>
                                                </DIV>


                                                <DIV id=image_xixi-04 class=image><A href="" target=_blank><IMG alt=""
                                                                                                                src="/YoToBook2/Public/images/4.jpg"
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
                                <!--end of header-->  
                                <?php  if(isset($_SESSION['username'])) { echo "<script>hide();</script>"; } else { echo "<script>hide2();</script>"; } ?>

         <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <Script LANGUAGE="JavaScript">
        function check() {
            alert("cc");
            if (confirm("你确信要转去 天轰穿的博客？"))
             else
            
        }
    </Script>

    <body>
        <div>TODO write content</div>
    </body>
</html>

           <div class="right_content">
    <div class="cart">
        <div class="title"><span class="title_icon"><img src="/YoToBook2/Public/images/cart.gif" alt="" title="" /></span>购物车</div>
        <div class="home_cart_content"> <?php echo (count(session('order'))); ?>个项目 | <span class="red">总额：￥<?php echo (session('total')); ?></span> </div>
        <a href="<?php echo U('Users/cart');?>" class="view_cart">去我购物车</a> </div>
    <div class="title"><span class="title_icon"><img src="/YoToBook2/Public/images/bullet3.gif" alt="" title="" /></span>关于本站</div>
    <div class="about">
        <div class="title_icon">
        <p> <img src="/YoToBook2/Public/images/about.gif" alt="" title="" class="right"/>我们是独立自主开发的项目组，YoToBook的名字由来是因为youtube,我们以此为出发点进行了新名字，Yo （你） to （到） Book （书），表明的是你和书之间的距离希望广大读者可以多阅读，阅读读书是一种生活方式，而不单单是一种习惯。YoToBook版权归广东外语外贸大学思科信息学院古才良和陈戈共同所有。</p>
        </div>
    </div>
    <div class="right_box">
        <div class="title"><span class="title_icon"><img src="/YoToBook2/Public/images/bullet4.gif" alt="" title="" /></span>优惠产品</div>
        <div class="new_prod_box"> <a href="details.html">书名</a>
            <div class="new_prod_bg"> <span class="new_icon"><img src="/YoToBook2/Public/images/promo_icon.gif" alt="" title="" /></span> <a href="details.html"><img src="/YoToBook2/Public/images/thumb1.gif" alt="" title="" class="thumb" border="0" /></a> </div>
        </div>
        <div class="new_prod_box"> <a href="details.html">书名</a>
            <div class="new_prod_bg"> <span class="new_icon"><img src="/YoToBook2/Public/images/promo_icon.gif" alt="" title="" /></span> <a href="details.html"><img src="/YoToBook2/Public/images/thumb2.gif" alt="" title="" class="thumb" border="0" /></a> </div>
        </div>

    </div>
    <div class="right_box">
        <div class="title"><span class="title_icon"><img src="/YoToBook2/Public/images/bullet5.gif" alt="" title="" /></span>书的种类</div>
        <ul class="list">

            <li><a href="#">计算机专业</a></li>
            <li><a href="#">经济学</a></li>

        </ul>
        <!--        <div class="title"><span class="title_icon"><img src="/YoToBook2/Public/images/bullet6.gif" alt="" title="" /></span>匹配种类</div>
                <ul class="list">
                    
                  <li><a href="#">accesories</a></li>
                  
                  <li><a href="#">accesories</a></li>
                </ul>-->
    </div>
</div>
<!--end of right content-->
<div class="clear"></div>
</div>
<!--end of center content-->
<div class="footer">
    <div class="left_footer"><img src="/YoToBook2/Public/images/footer_logo.gif" alt="" title="" /><br />
    </div>
    <div class="right_footer"> <a href="<?php echo U('Index/index');?>">首页</a> <a href="<?php echo U('Index/aboutus');?>">关于我们</a> <a href="<?php echo U('Index/services');?>">服务</a> <a href="<?php echo U('Index/privacy_policy');?>">隐私政策</a> <a href="<?php echo U('Users/contact_us');?>">联系我们</a> </div>
</div>
</div>

<script src="/YoToBook2/Public/js1/jquery.js"></script>

<script src="/YoToBook2/Public/js1/bootstrap.js"></script>



</body>
</html>

    </body>
</html>