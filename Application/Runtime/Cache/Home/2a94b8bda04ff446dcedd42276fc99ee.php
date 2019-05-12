<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>首页</title>
    <meta property="qc:admins" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="format-detection" content="telephone=no"/>
    <link rel="stylesheet" href="/book/Public/home/css/amazeui.min.css">
    <link rel="stylesheet" href="/book/Public/home/css/show.css?v1">
    <link rel="stylesheet" href="/book/Public/home/css/icostyle.css">
    <link href="/book/Public/home/css/myb-axc.css" rel="stylesheet" 0="projects\assets\AppAsset">
    <link rel="stylesheet" href="/book/Public/home/css/index1.css">

    <!-- <script>
        var BASE_URL = "/projects";
    </script> -->
</head>

<body class="project-fixed" style="background: #F5F5F5;">
<!---->

<div id="item_header" style="height:83px;">

    <div class="header_search">
        <img class="header_search_img" src="/book/Public/home/img/header_search.png">
        <span>请输入书名搜索</span>
    </div>

    <div class="header_title">
        <div class="header_title_em">
            男生
        </div>
        <div class="header_title_em">
            女生
        </div>

    </div>

</div>

<div style="margin-top: 65px;">

    <!--   阅读历史 -->
    <?php if(!empty($history)): if(is_array($history)): $i = 0; $__LIST__ = $history;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$his): $mod = ($i % 2 );++$i;?><a href="/book/Home/Book/bookinfo?bid=<?php echo ($his["biid"]); ?>&number=<?php echo ($his["number"]); ?>">
                <div class="ss">
                    <div class="ss-div">
                        <img src="/book/Public/home/img/ss.png" alt="">
                        上次阅读：<?php echo ($his["btitle"]); ?> 第<?php echo ($his["number"]); ?>章
                    </div>
                </div>
            </a><?php endforeach; endif; else: echo "" ;endif; endif; ?>

    <!--轮播图-->
    <div id="html_1">
        <iframe align="center" width="200" height="170" src="./swiper.html" frameborder="no" border="0" marginwidth="0"
                marginheight="0" scrolling="no"></iframe>
    </div>

    <!--icon title-->
    <div class="items_div">
        <a class="item_a" href="">
            <img class="item_img" src="/book/Public/home/img/icon_button_sk.png">
            <span>书库</span>
        </a>
        <a class="item_a" href="">
            <img class="item_img" src="/book/Public/home/img/icon_button_bd.png">
            <span>榜单</span>
        </a>
        <a class="item_a" href="">
            <img class="item_img" src="/book/Public/home/img/icon_button_wb.png">
            <span>完本</span>
        </a>
        <a class="item_a" href="">
            <img class="item_img" src="/book/Public/home/img/icon_button_hd.png">
            <span>活动</span>
        </a>
        <a class="item_a" href="">
            <img class="item_img" src="/book/Public/home/img/icon_button_xm.png">
            <span>限免</span>
        </a>
    </div>

    <!--空白-->
    <div class="whitespace"></div>

    <!--热门-->
    <div>
        <a class="section_header" href="/book/Home/Book/book_list_v1/weekly.male">
            <div class="section_flag_column_line"></div>
            <div class="section_title">
                <div class="section_left">本周热门</div>
                <div class="section_right">
                    <span>查看更多</span>
                </div>
            </div>
        </a>

        <div class="section_content1">

                <div class="uu">
                    <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman1["id"]); ?>&number=1">
                        <img src="/book/Public/Uploads/book/<?php echo ($bookman1["img"]); ?>" alt=""
                             style="width:80%;border-radius:8px;">
                        <p style="margin-top:0;margin-left:10%;" class="rr"><?php echo ($bookman1["title"]); ?></p>
                    </a>
                </div>
                <div class="uu">
                    <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman2["id"]); ?>&number=1">
                        <img src="/book/Public/Uploads/book/<?php echo ($bookman2["img"]); ?>" alt=""
                             style="width:80%;border-radius:8px;">
                        <p style="margin-top:0;margin-left:10%;" class="rr">
                            <?php echo ($bookman2["title"]); ?></p>
                    </a>
                </div>

                <div class="uu">
                    <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman3["id"]); ?>&number=1">
                        <img src="/book/Public/Uploads/book/<?php echo ($bookman3["img"]); ?>" alt=""
                             style="width:80%;border-radius:8px;">
                        <p style="margin-top:0;margin-left:10%;" class="rr">
                            <?php echo ($bookman3["title"]); ?></p>
                    </a>
                </div>

                <div class="uu">
                    <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman4["id"]); ?>&number=1">
                        <img src="/book/Public/Uploads/book/<?php echo ($bookman4["img"]); ?>" alt=""
                             style="width:80%;border-radius:8px;">
                        <p style="margin-top:0;margin-left:10%;" class="rr">
                            <?php echo ($bookman4["title"]); ?></p>
                    </a>
                </div>

                <div class="uu">
                    <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman5["id"]); ?>&number=1">
                        <img src="/book/Public/Uploads/book/<?php echo ($bookman5["img"]); ?>" alt=""
                             style="width:80%;border-radius:8px;">
                        <p style="margin-top:0;margin-left:10%;" class="rr">
                            <?php echo ($bookman5["title"]); ?></p>
                    </a>
                </div>

                <div class="uu">
                    <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman6["id"]); ?>&number=1">
                        <img src="/book/Public/Uploads/book/<?php echo ($bookman6["img"]); ?>" alt=""
                             style="width:80%;border-radius:8px;">
                        <p style="margin-top:0;margin-left:10%;" class="rr">
                            <?php echo ($bookman6["title"]); ?></p>
                    </a>
                </div>

        </div>
    </div>

    <!--空白-->
    <div class="whitespace"></div>

    <!--主编力荐-->
    <div>
        <a class="section_header" href="/book/Home/Book/book_list_v1/recomm.male">
            <div class="section_flag_column_line"></div>
            <div class="section_title">
                <div class="section_left">主编力荐</div>
                <div class="section_right">
                    <span>查看更多</span>
                </div>
            </div>
        </a>

        <div class="section_content1">

            <div class="uu">
                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman1["id"]); ?>&number=1">
                    <img src="/book/Public/Uploads/book/<?php echo ($bookman1["img"]); ?>" alt=""
                         style="width:80%;border-radius:8px;">
                    <p style="margin-top:0;margin-left:10%;" class="rr"><?php echo ($bookman1["title"]); ?></p>
                </a>
            </div>
            <div class="uu">
                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman2["id"]); ?>&number=1">
                    <img src="/book/Public/Uploads/book/<?php echo ($bookman2["img"]); ?>" alt=""
                         style="width:80%;border-radius:8px;">
                    <p style="margin-top:0;margin-left:10%;" class="rr">
                        <?php echo ($bookman2["title"]); ?></p>
                </a>
            </div>

            <div class="uu">
                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman2["id"]); ?>&number=1">
                    <img src="/book/Public/Uploads/book/<?php echo ($bookman2["img"]); ?>" alt=""
                         style="width:80%;border-radius:8px;">
                    <p style="margin-top:0;margin-left:10%;" class="rr">
                        <?php echo ($bookman2["title"]); ?></p>
                </a>
            </div>

            <div class="uu">
                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman1["id"]); ?>&number=1">
                    <img src="/book/Public/Uploads/book/<?php echo ($bookman1["img"]); ?>" alt=""
                         style="width:80%;border-radius:8px;">
                    <p style="margin-top:0;margin-left:10%;" class="rr">
                        <?php echo ($bookman2["title"]); ?></p>
                </a>
            </div>

            <div class="uu">
                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman1["id"]); ?>&number=1">
                    <img src="/book/Public/Uploads/book/<?php echo ($bookman1["img"]); ?>" alt=""
                         style="width:80%;border-radius:8px;">
                    <p style="margin-top:0;margin-left:10%;" class="rr">
                        <?php echo ($bookman2["title"]); ?></p>
                </a>
            </div>

            <div class="uu">
                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman2["id"]); ?>&number=1">
                    <img src="/book/Public/Uploads/book/<?php echo ($bookman2["img"]); ?>" alt=""
                         style="width:80%;border-radius:8px;">
                    <p style="margin-top:0;margin-left:10%;" class="rr">
                        <?php echo ($bookman2["title"]); ?></p>
                </a>
            </div>

        </div>
    </div>

    <!--空白-->
    <div class="whitespace"></div>

    <!--本周新书-->
    <div>
        <a class="section_header" href="/book/Home/Book/book_list_v1/news.male">
            <div class="section_flag_column_line"></div>
            <div class="section_title">
                <div class="section_left">本周新书</div>
                <div class="section_right">
                    <span>查看更多</span>
                </div>
            </div>
        </a>

        <div class="section_content1">

            <div class="uu">
                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman1["id"]); ?>&number=1">
                    <img src="/book/Public/Uploads/book/<?php echo ($bookman1["img"]); ?>" alt=""
                         style="width:80%;border-radius:8px;">
                    <p style="margin-top:0;margin-left:10%;" class="rr"><?php echo ($bookman1["title"]); ?></p>
                </a>
            </div>
            <div class="uu">
                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman2["id"]); ?>&number=1">
                    <img src="/book/Public/Uploads/book/<?php echo ($bookman2["img"]); ?>" alt=""
                         style="width:80%;border-radius:8px;">
                    <p style="margin-top:0;margin-left:10%;" class="rr">
                        <?php echo ($bookman2["title"]); ?></p>
                </a>
            </div>

            <div class="uu">
                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman2["id"]); ?>&number=1">
                    <img src="/book/Public/Uploads/book/<?php echo ($bookman2["img"]); ?>" alt=""
                         style="width:80%;border-radius:8px;">
                    <p style="margin-top:0;margin-left:10%;" class="rr">
                        <?php echo ($bookman2["title"]); ?></p>
                </a>
            </div>

            <div class="uu">
                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman1["id"]); ?>&number=1">
                    <img src="/book/Public/Uploads/book/<?php echo ($bookman1["img"]); ?>" alt=""
                         style="width:80%;border-radius:8px;">
                    <p style="margin-top:0;margin-left:10%;" class="rr">
                        <?php echo ($bookman2["title"]); ?></p>
                </a>
            </div>

            <div class="uu">
                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman1["id"]); ?>&number=1">
                    <img src="/book/Public/Uploads/book/<?php echo ($bookman1["img"]); ?>" alt=""
                         style="width:80%;border-radius:8px;">
                    <p style="margin-top:0;margin-left:10%;" class="rr">
                        <?php echo ($bookman2["title"]); ?></p>
                </a>
            </div>

            <div class="uu">
                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman2["id"]); ?>&number=1">
                    <img src="/book/Public/Uploads/book/<?php echo ($bookman2["img"]); ?>" alt=""
                         style="width:80%;border-radius:8px;">
                    <p style="margin-top:0;margin-left:10%;" class="rr">
                        <?php echo ($bookman2["title"]); ?></p>
                </a>
            </div>

        </div>
    </div>

    <!--空白-->
    <div class="whitespace"></div>

    <!--精选-->
    <div>
        <a class="section_header" href="">
            <div class="section_flag_column_line"></div>
            <div class="section_title">
                <div class="section_left">精选</div>
                <div class="section_right">
                    <span>查看更多</span>
                </div>
            </div>
        </a>

        <div class="section_content3">
            <div class="section_content_item">
                <a href="/book/Home/Book/bookinfo?bid=<?php echo ($bookman["id"]); ?>&number=1">
                    <img src="/book/Public/Uploads/book/<?php echo ($bookman["img"]); ?>" alt="" style="width:30%;border-radius:8px;border:2px solid #bfbfbf;float:left;">
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

        </div>

    </div>

    <!---->
    <div>

    </div>

    <!--空白-->
    <div class="whitespace"></div>

    <div class="ff">
        <div class="ff-img">
            <img src="<?php echo ($imgurl); ?>" alt="" style="width:100%;">
        </div>
        <div class="tt">@2019.All Rights Reserved.莫名看书</div>
        <div class="tt"></div>
        <!-- <div class="tt">湘ICP备16001688号-2</div> -->
    </div>

</div>

<div style="width:100%; height:60px; line-height:60px;"></div>

<div class="info_bottom">
    <div class="tab_bar">
        <div class="tab_item">
            <i class="icono-home"></i>
            <span class="tab_title">首页</span>
        </div>
        <div class="tab_item">
            <i class="icono-folder"></i>
            <span class="tab_title">书库</span>
        </div>
        <div class="tab_item">
            <i class="icono-heart"></i>
            <span class="tab_title">充值</span>
        </div>
        <div class="tab_item">
            <i class="icono-smile"></i>
            <span class="tab_title">我的</span>
        </div>
<!--        <ul>-->
<!--            <li ><a class="tab_item" href="/"><i class="icono-home"></i>首页</a></li>-->
<!--            <li ><a class="tab_item" href="/book/Home/Book/book_type.html"><i class="icono-folder"></i>书库</a></li>-->
<!--            <li><a class="tab_item" href="/book/Home/Index/recharge.html"><i class="icono-heart"></i>充值</a></li>-->
<!--            <li><a class="tab_item" href="/book/Home/User/center.html"><i class="icono-smile"></i>我</a></li>-->
<!--        </ul>-->
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