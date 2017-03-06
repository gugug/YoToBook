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

     <!--隐私政策页面-->
<div class="center_content">
    <div class="left_content">
        <div  class="sub_left_content">
      <div class="title"><span class="title_icon"><img src="/YoToBook/Public/images/bullet1.gif" alt="" title="" /></span>隐私版权</div>

            <div class="clear"></div>

            <div>
            <p>YO TO BOOK提醒您：在使用网站各项服务前，请您务必仔细阅读并透彻理解本声明。您可以选择不使用YO TO BOOK，但如果您使用YO TO BOOK，您的使用行为将被视为对本声明全部内容的认可。</p>
            <div class="line_xu"></div>
            <div class="tit"><strong>免责声明</strong></div>
            <p class="m_t5">鉴于YO TO BOOK提供的是互联网信息平台服务，网上关于YO TO BOOK会员或其发布的相关商品（包括但不限于店铺名称、公司名称、联系人及联络信息，产品的描述和说明，相关图片、视讯等）的信息均由会员自行提供，会员依法应对其提供的任何信息承担全部责任。YO TO BOOK对此等信息的准确性、完整性、合法性或真实性均不承担任何责任。此外，YO TO BOOK对任何使用或提供本网站信息的商业活动及其风险不承担任何责任。</p>
            <p class="m_t20">您应该对使用YO TO BOOK提供的服务结果自行承担风险。YO TO BOOK不做任何形式的保证：不保证服务一定满足您的要求，不保证服务不中断，不保证交易结果的安全性、正确性、及时性、合法性（但上述情况可以通过YO TO BOOK相关规则进行相应处理）。因网络状况、通讯线路、第三方网站等任何原因而导致您不能正常使用YO TO BOOK服务，YO TO BOOK不承担任何法律责任。</p>
            <p class="m_t20">YO TO BOOK尊重并保护所有使用YO TO BOOK用户的个人隐私权，您注册的用户名、电子邮件地址等个人资料，非经您亲自许可或根据相关法律、法规的强制性规定，YO TO BOOK不会主动地泄露给第三方（因政府执法部门、国家司法部门要求除外）。YO TO BOOK提醒您：您在使用YO TO BOOK提供的搜索服务时输入的关键字将不被认为是您的个人隐私资料。</p>
            <p class="m_t20">任何单位或个人认为YO TO BOOK网页内容（包括但不限于YO TO BOOK会员发布的商品信息）可能涉嫌侵犯其信息网络传播权，应该及时向YO TO BOOK提出书面权利通知，并提供身份证明、权属证明、具体链接（URL）及详细侵权情况证明。YO TO BOOK在收到上述法律文件后，将会依法尽快移除相关涉嫌侵权的内容。在此情况下，YO TO BOOK依法不承担任何责任。</p>
            <p class="m_t20">YO TO BOOK转载作品（包括论坛内容）出于传递更多信息之目的，并不意味YO TO BOOK赞同其观点或证实其内容的真实性。</p>
            <div class="line_xu"></div>
            <div class="tit"><strong>知识产权声明</strong></div>
            <p class="m_t5">YO TO BOOK拥有本网站内所有信息内容（除YO TO BOOK会员发布的商品信息外，包括但不限于文字、图片、软件、音频、视频）的版权。</p>
            <p class="m_t20">任何被授权的浏览、复制、打印和传播属于本网站内信息内容都不得用于商业目的且所有信息内容及其任何部分的使用都必须包括此版权声明；</p>
            <div class="line_xu"></div>
            <div class="tit"><strong>隐私权声明</strong> </div>
            <p class="m_t5">YO TO BOOK非常重视对您隐私的保护，在您使用YO TO BOOK提供的服务前，请您仔细阅读以下声明。为了给您提供更准确、更有个性化的服务，YO TO BOOK可能会以如下方式，使用您提交的个人信息。但YO TO BOOK会以高度的勤勉、审慎义务对待这些信息，在未征得您许可的情况下，不会将这些信息对外披露或向第三方提供。</p>
            <p class="m_t20"><strong>保有您提供的信息</strong></p>
            <p>YO TO BOOK会在您自愿选择服务或提供信息的情况下收集您的个人信息，并将这些信息进行整合，以便向您提供更好的用户服务。请您在注册时及时、详尽及准确的提供个人资料，并不断更新注册资料，符合及时、详尽准确的要求。如果因注册信息不真实而导致的问题，由您自行承担相应的后果。请您不要将您的帐号、密码转让或出借予他人使用。如您发现您的帐号遭他人非法使用，应立即通知YO TO BOOK。因黑客行为或用户的保管疏忽导致帐号、密码遭他人非法使用，YO TO BOOK不承担责任。</p>
            <p class="m_t20"><strong>保有您的使用记录</strong></p>
            <p>当您使用YO TO BOOK提供的服务时，服务器会自动记录一些信息，包括URL、IP地址、浏览器的类型和使用的语言以及访问日期和时间等。</p>
            <p class="m_t20">在如下情况下，YO TO BOOK会根据您的意愿或法律的规定披露您的个人信息，由此引发的问题将由您个人承担： </p>
            <ul>
                    <li class="f_left">（1）事先获得您的授权；</li>
            </ul>
            <ul>
                    <li class="f_left">（2）只有透露您的个人资料，才能提供您所要求的产品和服务；</li>
            </ul>
            <ul>
                    <li class="f_left">（3）根据有关的法律法规要求；</li>
            </ul>
            <ul>
                    <li class="f_left">（4）按照相关政府主管部门的要求；</li>
            </ul>
            <ul>
                    <li class="f_left">（5）为维护YO TO BOOK的合法权益。</li>
            </ul>
            <ul>
                    <li class="f_left">（6）您同意让第三方共享资料。</li>
            </ul>
            <ul>
                    <li class="f_left">（7）我们发现您违反了YO TO BOOK服务协议或相关规则，根据协议约定或相关规则规定应当披露您的个人信息。</li>
            </ul>
            <ul>
                    <li class="f_left">（8）我们需要向代表我们提供产品或服务的公司提供资料（除非我们另行通知你，否则这些公司无权使用你的身份识别资料）。</li>
            </ul>
            <div class="tit m_t30">YO TO BOOK会始终致力于在充分保护您隐私的前提下，为您提供更优质的体验和服务。</div>
        </div>
      <div class="clear"></div>
        </div>
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