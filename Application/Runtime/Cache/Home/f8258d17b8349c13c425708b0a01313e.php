<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <title>书库--<?php echo ($type["name"]); ?></title>
        <meta property="qc:admins" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="format-detection" content="telephone=no" />
        <link rel="stylesheet" href="/book/Public/home/css/amazeui.min.css">
        <link rel="stylesheet" href="/book/Public/home/css/show.css">
        <link href="/book/Public/home/css/myb-axc.css" rel="stylesheet" 0="projects\assets\AppAsset">
           <link rel="stylesheet" href="/book/Public/home/css/icostyle.css">
        <!-- <script>
            var BASE_URL = "/projects";
        </script> -->
    </head>

    <body class="project-fixed" style="background:#fff;">
            <!---->
        <form action="" method="post" name="" id="" onsubmit="return checkForm()">
            <div id="item_header">
                <a href="" class="datail-banner-head" href="javascript:void(0)" onclick="javascript:history.go(-1);">
                    <img src="/book/Public/home/img/back.png" style="float: left;margin-top: 5px;height: 18px;width: 18px;padding-bottom: 0;transform: rotate(180deg);">
                    <div style="float: left;color:#fff;font-size:1em;margin-left:3px;padding-top: 1px;">返回</div>
                </a>
                <div style="margin: auto;width: 57%;margin-top: 12px;text-align: center;color: #fff;font-size:18px;"><?php echo ($type["name"]); ?></div>
                <a href="" class="detail-banner-mine">
                    <!--<img src="/book/Public/home/img/back.png" style="float: left;margin-top: 5px;height: 18px;width: 18px;padding-bottom: 0;">-->
                </a>
            </div>
            <div style="margin-top: 43px;">
                <div class="axc-console axc-error" id="axc-error">
                    <i class="axc-base axc-infor-base"></i>
                    <span></span>
                </div>
                <div class="user-lists" style="margin-top:53px;">
                    <div class="user-lists-content" style="border:none;">
                        <?php if(is_array($books)): $i = 0; $__LIST__ = $books;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vb): $mod = ($i % 2 );++$i;?><a href="/book/Home/Book/bookinfo?bid=<?php echo ($vb["id"]); ?>&number=1" style="" >
                                <div class="du">
                                    <img src="/book/Public/Uploads/book/<?php echo ($vb["img"]); ?>" alt="" style="width:30%;float:left;height:100%;">
                                    <div class="du-div">
                                        <p style="font-size:16px;line-height:30px;"><?php echo ($vb["title"]); ?></p>
                                        <p style="margin-top:0;line-height:20px;font-size:12px;color:#7c7b79;" class="du-p"><?php echo ($vb["content"]); ?></p>
                                    </div>
                                </div>
                            </a><?php endforeach; endif; else: echo "" ;endif; ?>
                           <!--  <a href="" style="" >
                                <div class="du">
                                    <img src="/book/Public/home/img/46.jpg" alt="" style="width:30%;float:left;height:100%;">
                                    <div class="du-div">
                                        <p style="font-size:16px;line-height:30px;">十八岁那年</p>
                                        <p style="margin-top:0;line-height:20px;font-size:12px;color:#7c7b79;" class="du-p">十六岁那年，我被卷入皮条客的行业。为了从嫖客手上救走一个女孩，我失去了很多东西。她卑微的祈求我要...</p>
                                    </div>
                                </div>
                            </a> -->


                    </div>
                </div>

            </div>
        </form>
<div style="width:100%; height:60px; line-height:60px;"></div>
     <div class="infobottom">
<div class="bnav">
<ul>
<li><a href="/"><i class="icono-home"></i>首页</a></li>
<li><a href="/book/Home/Book/book_type.html"><i class="icono-folder"></i>书库</a></li>
<li><a href="/book/Home/Index/recharge.html"><i class="icono-heart"></i>充值</a></li>
<li><a href="/book/Home/User/center.html"><i class="icono-smile"></i>我</a></li>
</ul>
</div>
</div>



    </body>

</html>