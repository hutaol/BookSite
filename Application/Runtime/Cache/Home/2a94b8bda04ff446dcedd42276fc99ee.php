<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <title>首页</title>
        <meta property="qc:admins" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="format-detection" content="telephone=no" />
        <link rel="stylesheet" href="/book/Public/home/css/amazeui.min.css">
        <link rel="stylesheet" href="/book/Public/home/css/show.css?v1">
        <link rel="stylesheet" href="/book/Public/home/css/icostyle.css">
        <link href="/book/Public/home/css/myb-axc.css" rel="stylesheet" 0="projects\assets\AppAsset">
        <!-- <script>
            var BASE_URL = "/projects";
        </script> -->
    </head>

    <body class="project-fixed" style="background: #fff;">
            <!---->

            <div id="item_header" style="height:50px;">
                <div style="width:94%;margin:0 auto;">
                    <a href="/book/Home/User/center.html" class="datail-banner-head" style="float:left;margin-top: 5px;padding-left:0;width:auto;">
                        <img src="<?php echo ($img); ?>" alt="" style="width:40px;height:40px;border-radius: 50%;">
                    </a>
                    <div style="margin-top: 12px;color: #fff;font-size:16px;float:left;margin-left:10px;width:160px;overflow:hidden;height:25px;">
                        <span> <?php echo ($nickname); ?> </span>
                    </div >
                    <!-- <div style="margin-top: 12px;color: #fff;float:left;">
                        <a href="/book/Home/User/center.html" style="font-size:14px;line-height:27px;">/个人中心</a>
                    </div> -->
                    <div style="float:right;margin-top: 12px;color: #fff;font-size:16px;">
                        <a href="/book/Home/Index/recharge.html" style="font-size:16px;width:auto;">充值</a>
                    </div>
                </div>

            </div>
            <div style="margin-top: 65px;">
                <div class="shou">
                <form action="/book/Home/Book/book_search" method="post" >
                    <li style="padding-bottom:15px;position: relative;list-style:none;">
                        <input type="text" name="keywords" placeholder="请输入关键字进行查询" style="width:100%;height:29px;font-family:'微软雅黑';color:#9f9e9e;text-indent:8px;border-radius: 16px 16px 16px 16px;border:none;border:1px solid #bfbfbf;">
                        <input type="submit" name="" value="搜索" style="    background: #02c88d url(/book/Public/home/img/xx.png) no-repeat;background-size: 42px auto;height: 29px;width: 45px;vertical-align: top;border: none;text-indent: -9999px;-moz-border-radius: 0 16px 16px 0;-webkit-border-radius: 0 16px 16px 0;border-radius: 0 16px 16px 0;position: absolute;top:0; right:-4px;color:#fff;" id="op">
                    </li>
                </form>
                </div>
                <?php if(!empty($history)): if(is_array($history)): $i = 0; $__LIST__ = $history;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$his): $mod = ($i % 2 );++$i;?><a href="/book/Home/Book/bookinfo?bid=<?php echo ($his["biid"]); ?>&number=<?php echo ($his["number"]); ?>">
                <div class="ss">
                    <div class="ss-div">
                        <img src="/book/Public/home/img/ss.png" alt="" >
                        上次阅读：<?php echo ($his["btitle"]); ?> 第<?php echo ($his["number"]); ?>章
                    </div>
                </div>
                </a><?php endforeach; endif; else: echo "" ;endif; endif; ?>


                <div data-role="page" style="width:100%;">
                    <div data-role = "content-floud" style="width:94%;margin:0 auto;">
                        <div style="font-family: '微软雅黑';">
                            <ul id="hear" style="height:60px;">
                                <li style="border-bottom: 2px solid #02c88d;">
                                    <a href="">推荐</a>
                                </li>
                                <li><a href="/book/Home/Book/book_type.html">书库</a></li>
                                <li><a href="/book/Home/Book/book_list2.html">排行</a></li>
                                <li><a href="/book/Home/Book/book_hot.html">热门</a></li>
                            </ul>

                            <ul id="contentop">

                                <li class="action" id="li">

                                    <div class="user-lists" style="width:94%;margin:0 auto;padding-top:25px;">
                                    <div class="nv-q">

                                    <p style="float:left;margin:0;font-size:18px;color:#FC2D7E">主编推荐</p>
                                                    <!-- <p style="float:right;margin:0;font-size:14px;color:#FC2D7E;border-bottom:1px solid #FC2D7E;display:inline-block;">火热推荐</p> -->
                                </div>
                                        <div class="pp">
                                        <?php if(!empty($book1)): ?><div class="zhu" style="width:33%;padding:10px">
                                                <!-- <h6 style="font-size:14px;margin:0 0 0 0">EIC主编推荐</h6> -->
                                                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($book1["id"]); ?>&number=1">

                                                    <img src="/book/Public/Uploads/book/<?php echo ($book1["img"]); ?>" alt="" style="width:100%;border-radius:8px;border:2px solid #bfbfbf;">
                                                    <p style="margin-top:8px;margin-bottom:8px;width:100%;text-align:center;"><?php echo ($book1["title"]); ?></p>
                                                </a>
                                            </div><?php endif; ?>
                                             <?php if(!empty($book2)): ?><div class="zhu" style="width:33%;padding:10px">
                                                <!-- <h6 style="font-size:14px;margin:0 0 0 0">EIC主编推荐</h6> -->
                                                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($book2["id"]); ?>&number=1">

                                                    <img src="/book/Public/Uploads/book/<?php echo ($book2["img"]); ?>" alt="" style="width:100%;border-radius:8px;border:2px solid #bfbfbf;">
                                                    <p style="margin-top:8px;margin-bottom:8px;width:100%;text-align:center;"><?php echo ($book2["title"]); ?></p>
                                                </a>
                                            </div><?php endif; ?>
                                            <?php if(!empty($book3)): ?><div class="zhu" style="width:33%;padding:10px">
                                                <!-- <h6 style="font-size:14px;margin:0 0 0 0">EIC主编推荐</h6> -->
                                                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($book3["id"]); ?>&number=1">

                                                    <img src="/book/Public/Uploads/book/<?php echo ($book3["img"]); ?>" alt="" style="width:100%;border-radius:8px;border:2px solid #bfbfbf;">
                                                    <p style="margin-top:8px;margin-bottom:8px;width:100%;text-align:center;"><?php echo ($book3["title"]); ?></p>
                                                </a>
                                            </div><?php endif; ?>
                                            <!--<div class="zhu2">
                                            <?php if(!empty($book2)): ?><div class="zhu2-div">
                                                    <div style="float:left;height:30%;margin-top:9%;">
                                                        <h6 style="font-size:14px;margin:0 0 0 0;display: inline-block;color:#02c88d">ROW排行首榜</h6>
                                                        <a href="/book/Home/Book/bookinfo?bid=<?php echo ($book2["id"]); ?>&number=1">
                                                        <p style="margin-top:8px;width:100%;text-align:center;font-size:.9rem;">《<?php echo ($book2["title"]); ?>》</p>
                                                        </a>
                                                    </div>
                                                    <a href="/book/Home/Book/bookinfo?bid=<?php echo ($book2["id"]); ?>&number=1">
                                                    <img src="/book/Public/Uploads/book/<?php echo ($book2["img"]); ?>" alt="" style="width:34%;border-radius:8px;border:2px solid #bfbfbf;float:right;">
                                                    </a>
                                                </div><?php endif; ?>
                                            <?php if(!empty($book3)): ?><div class="zhu2-div">
                                                    <div style="float:left;height:30%;margin-top:9%;">
                                                        <h6 style="font-size:14px;margin:0 0 0 0;display: inline-block;color:#02c88d">ROW排行首榜</h6>
                                                        <a href="/book/Home/Book/bookinfo?bid=<?php echo ($book3["id"]); ?>&number=1">
                                                        <p style="margin-top:8px;width:100%;text-align:center;font-size:.9rem;">《<?php echo ($book3["title"]); ?>》</p>
                                                        </a>
                                                    </div>
                                                    <a href="/book/Home/Book/bookinfo?bid=<?php echo ($book3["id"]); ?>&number=1">
                                                    <img src="/book/Public/Uploads/book/<?php echo ($book3["img"]); ?>" alt="" style="width:34%;border-radius:8px;border:2px solid #bfbfbf;float:right;">
                                                    </a>
                                                </div><?php endif; ?>
                                            </div> -->
                                        </div>

 <!-- 女生 -->
                                        <div class="nv">
                                            <!-- 火热推荐 -->
                                            <div class="big">
                                                <div class="nv-q">
                                                    <img src="/book/Public/home/img/nv.png" alt="" style="width:28px;height:28px;float:left;">
                                                    <p style="float:left;margin:0;font-size:18px;color:#FC2D7E">女生</p>
                                                    <!-- <p style="float:right;margin:0;font-size:14px;color:#FC2D7E;border-bottom:1px solid #FC2D7E;display:inline-block;">火热推荐</p> -->
                                                </div>
                                                <div class="vv">
                                                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookwoman["id"]); ?>&number=1">
                                                    <img src="/book/Public/Uploads/book/<?php echo ($bookwoman["img"]); ?>" alt="" / style="width:30%;border-radius:8px;border:2px solid #bfbfbf;float:left;">
                                                    <div style="width:65%;float:right;height:110px;">
                                                        <p style="margin-top:0px;font-size:16px;color:#646262;">
                                                            <?php echo ($bookwoman["title"]); ?>
                                                        </p>
                                                        <p style="margin-top:0px;font-size:13px;height:87px;overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;overflow: hidden;color:#646262;">
                                                            <?php echo ($bookwoman["content"]); ?>
                                                        </p>
                                                    </div>
                                                </a>
                                                </div>
                                                <p style="clear:both;"></p>
                                                <div style="padding-top:30px;width:100%;overflow:hidden;">
                                                    <ul >
                                                        <li class="uu" >
                                                        <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookwoman1["id"]); ?>&number=1">
                                                            <img src="/book/Public/Uploads/book/<?php echo ($bookwoman1["img"]); ?>" alt="" style="width:80%;border-radius:8px;border:2px solid #bfbfbf;">
                                                            <p style="margin-top:0;" class="rr"><?php echo ($bookwoman1["title"]); ?></p>
                                                        </a>
                                                        </li>
                                                        <li class="uu">
                                                        <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookwoman2["id"]); ?>&number=1">
                                                            <img src="/book/Public/Uploads/book/<?php echo ($bookwoman2["img"]); ?>" alt="" style="width:80%;border-radius:8px;border:2px solid #bfbfbf;margin-left:10%;">
                                                            <p style="margin-top:0;margin-left:10%;" class="rr"><?php echo ($bookwoman2["title"]); ?></p>
                                                        </a>
                                                        </li>
                                                        <li class="uu-right">
                                                        <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookwoman3["id"]); ?>&number=1">
                                                            <img src="/book/Public/Uploads/book/<?php echo ($bookwoman3["img"]); ?>" alt="" style="width:80%;border-radius:8px;border:2px solid #bfbfbf;margin-left:20%;">
                                                            <p style="margin-top:0;margin-left:20%;" class="rr"><?php echo ($bookwoman3["title"]); ?></p>
                                                        </a>
                                                        </li>
                                                        <li class="uu" >
                                                        <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookwoman4["id"]); ?>&number=1">
                                                            <img src="/book/Public/Uploads/book/<?php echo ($bookwoman4["img"]); ?>" alt="" style="width:80%;border-radius:8px;border:2px solid #bfbfbf;">
                                                            <p style="margin-top:0;" class="rr"><?php echo ($bookwoman4["title"]); ?></p>
                                                        </a>
                                                        </li>
                                                        <li class="uu">
                                                        <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookwoman5["id"]); ?>&number=1">
                                                            <img src="/book/Public/Uploads/book/<?php echo ($bookwoman5["img"]); ?>" alt="" style="width:80%;border-radius:8px;border:2px solid #bfbfbf;margin-left:10%;">
                                                            <p style="margin-top:0;margin-left:10%;" class="rr"><?php echo ($bookwoman5["title"]); ?></p>
                                                        </a>
                                                        </li>
                                                        <li class="uu-right">
                                                        <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookwoman6["id"]); ?>&number=1">
                                                            <img src="/book/Public/Uploads/book/<?php echo ($bookwoman6["img"]); ?>" alt="" style="width:80%;border-radius:8px;border:2px solid #bfbfbf;margin-left:20%;">
                                                            <p style="margin-top:0;margin-left:20%;" class="rr"><?php echo ($bookwoman6["title"]); ?></p>
                                                        </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>

                                    
                                        <!-- 男生 -->
                                        <div class="nv">
                                            <!-- 致命诱惑 -->
                                            <div class="big">
                                                <div class="nv-q">
                                                    <img src="/book/Public/home/img/nn.png" alt="" style="width:28px;height:28px;float:left;">
                                                    <p style="float:left;margin:0;font-size:18px;color:#0AA3D2">男生</p>
                                                    <!-- <p style="float:right;margin:0;font-size:14px;color:#0AA3D2;border-bottom:1px solid #0AA3D2;display:inline-block;">致命诱惑</p> -->
                                                </div>
                                                <div class="vv">
                                                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman["id"]); ?>&number=1">
                                                    <img src="/book/Public/Uploads/book/<?php echo ($bookman["img"]); ?>" alt="" / style="width:30%;border-radius:8px;border:2px solid #bfbfbf;float:left;">
                                                    <div style="width:65%;float:right;height:110px;">
                                                        <p style="margin-top:0px;font-size:16px;color:#646262;">
                                                            <?php echo ($bookman["title"]); ?>
                                                        </p>
                                                        <p style="margin-top:0px;font-size:13px;height:87px;overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;overflow: hidden;color:#646262;">
                                                            <?php echo ($bookman["content"]); ?>
                                                        </p>
                                                    </div>
                                                </a>
                                                </div>
                                                <div style="padding-top:30px;">
                                                    <ul >
                                                        <li class="uu" >
                                                        <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman1["id"]); ?>&number=1">
                                                            <img src="/book/Public/Uploads/book/<?php echo ($bookman1["img"]); ?>" alt="" style="width:80%;border-radius:8px;border:2px solid #bfbfbf;">
                                                            <p style="margin-top:0;" class="rr"><?php echo ($bookman1["title"]); ?></p>
                                                        </a>
                                                        </li>
                                                        <li class="uu">
                                                        <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman2["id"]); ?>&number=1">
                                                            <img src="/book/Public/Uploads/book/<?php echo ($bookman2["img"]); ?>" alt="" style="width:80%;border-radius:8px;border:2px solid #bfbfbf;margin-left:10%;">
                                                            <p style="margin-top:0;margin-left:10%;" class="rr"><?php echo ($bookman2["title"]); ?></p>
                                                        </a>
                                                        </li>
                                                        <li class="uu-right">
                                                        <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman3["id"]); ?>&number=1">
                                                            <img src="/book/Public/Uploads/book/<?php echo ($bookman3["img"]); ?>" alt="" style="width:80%;border-radius:8px;border:2px solid #bfbfbf;margin-left:20%;">
                                                            <p style="margin-top:0;margin-left:20%;" class="rr"><?php echo ($bookman3["title"]); ?></p>
                                                        </a>
                                                        </li>
                                                        <li class="uu" >
                                                        <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman4["id"]); ?>&number=1">
                                                            <img src="/book/Public/Uploads/book/<?php echo ($bookman4["img"]); ?>" alt="" style="width:80%;border-radius:8px;border:2px solid #bfbfbf;">
                                                            <p style="margin-top:0;" class="rr"><?php echo ($bookman4["title"]); ?></p>
                                                        </a>
                                                        </li>
                                                        <li class="uu">
                                                        <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman5["id"]); ?>&number=1">
                                                            <img src="/book/Public/Uploads/book/<?php echo ($bookman5["img"]); ?>" alt="" style="width:80%;border-radius:8px;border:2px solid #bfbfbf;margin-left:10%;">
                                                            <p style="margin-top:0;margin-left:10%;" class="rr"><?php echo ($bookman5["title"]); ?></p>
                                                        </a>
                                                        </li>
                                                        <li class="uu-right">
                                                        <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman6["id"]); ?>&number=1">
                                                            <img src="/book/Public/Uploads/book/<?php echo ($bookman6["img"]); ?>" alt="" style="width:80%;border-radius:8px;border:2px solid #bfbfbf;margin-left:20%;">
                                                            <p style="margin-top:0;margin-left:20%;" class="rr"><?php echo ($bookman6["title"]); ?></p>
                                                        </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>

                                                    </ul>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="ff">
                        <div class="ff-img">
                            <img src="<?php echo ($imgurl); ?>" alt="" style="width:100%;">
                        </div>
                        <div class="tt">2017.All Rights Reserved.AJY</div>
                        <div class="tt"></div>
                        <!-- <div class="tt">湘ICP备16001688号-2</div> -->
                </div>
            </div>

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
<!-- <script src="./js/jquery-1.8.3.min.js"></script>
<script>
        $(function(){
            $("#hear li").click(function(){
                $(this).css({
                    borderBottom: "2px solid #02c88d",
                    height:"60px"
                }).siblings().css({
                    borderBottom: "none",
                    height:"60px"
                });
            });

            $("#hear li").click(function(){
                $(this).addClass("action").siblings().removeClass("action");
                var index = $(this).index();
                $("#contentop #li").eq(index).css("display","block").siblings().css("display","none");
            });
        });
</script> -->

    </body>

</html>