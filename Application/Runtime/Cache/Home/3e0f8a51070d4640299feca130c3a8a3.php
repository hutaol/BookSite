<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <title>个人中心</title>
        <meta property="qc:admins" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="format-detection" content="telephone=no" />
        <link rel="stylesheet" href="/book/Public/home/css/amazeui.min.css">
        <link rel="stylesheet" href="/book/Public/home/css/show.css">
        <link href="/book/Public/home/css/myb-axc.css" rel="stylesheet" 0="projects\assets\AppAsset">
       <!--  <script>
            var BASE_URL = "/projects";
        </script> -->
    </head>

    <body class="project-fixed" style="background:#fff;">
            <!---->

            <div id="item_header">
                <a class="datail-banner-head"   href="/book/Home/Index/index.html" >
                    <img src="/book/Public/home/img/back.png" style="float: left;margin-top: 5px;height: 18px;width: 18px;padding-bottom: 0;transform: rotate(180deg);">
                    <div style="float: left;color:#fff;font-size:1em;margin-left:3px;padding-top: 1px;">返回</div>
                </a>
                <div style="margin: auto;width: 57%;margin-top: 12px;text-align: center;color: #fff;">个人中心</div>
                <a href="" class="detail-banner-mine">
                    <!--<img src="/book/Public/home/img/back.png" style="float: left;margin-top: 5px;height: 18px;width: 18px;padding-bottom: 0;">-->
                </a>
            </div>
            <div style="margin-top: 43px;">
                <div class="axc-console axc-error" id="axc-error">
                    <i class="axc-base axc-infor-base"></i>
                    <span></span>
                </div>
                <div class="user-lists" >
                    <div class="user-lists-content">
                        <div>
                            <div class="gg" style="text-align:center;">
                                <img src="<?php echo ($user["img"]); ?>" alt="" style="width:80px;height:80px;border-radius:50%;">
                            </div>
                            <p style="margin-top:0;text-align:center;line-height:25px;color:#333;"><?php echo ($user["nickname"]); ?></p>
                            <p style="margin-top:0;text-align:center;line-height:25px;color:#333;">

                                <span style="width:100%;display: inline-block">书币:<?php echo ($user["gold"]); ?></span>
                                <?php if($user['vip'] === '2'): ?><span style="width:100%;display: inline-block;color:red;">会员有效期:<?php echo (date("Y-m-d",$user["viptime"])); ?></span><?php endif; ?>
                            </p>
                        </div>
                        <div class="gg-g">
                            <ul>
                                <div style="width:100%;overflow:hidden;border-bottom:1px solid #bfbfbf;">
                                    <!-- <a href="" style="width:33%;float:left;border-bottom:none;">
                                        <li class="gg-li" >
                                            <div style="width:25%;margin:0 auto;">
                                                <img src="/book/Public/home/img/cc.png" alt="" style="width:40px;height:40px;margin:0 auto;vertical-align: middle;">
                                            </div>
                                            微信授权登录
                                        </li>
                                    </a> -->
                                    <a href="/book/Home/Book/book_hot.html" style="width:33%;float:left;border-bottom:none;">
                                        <li class="gg-li" >
                                            <div style="width:33%;margin:0 auto;">
                                                <img src="/book/Public/home/img/cc1.png" alt="" style="width:30px;height:30px;margin:0 auto;vertical-align: middle;margin-top:10px;">
                                            </div>
                                            热门
                                        </li>
                                    </a>
                                    <a href="/book/Home/User/bookmark.html" style="width:33%;float:left;border-bottom:none;">
                                        <li class="gg-li" >
                                            <div style="width:33%;margin:0 auto;">
                                                <img src="/book/Public/home/img/cc2.png" alt="" style="width:30px;height:30px;margin:0 auto;vertical-align: middle;margin-top:10px;">
                                            </div>
                                            书签
                                        </li>
                                    </a>
                                    <a href="/book/Home/Index/recharge.html" style="width:33%;float:left;border-bottom:none;">
                                        <li class="gg-li2" >
                                            <div style="width:33%;margin:0 auto;">
                                                <img src="/book/Public/home/img/cc3.png" alt="" style="width:30px;height:30px;margin:0 auto;vertical-align: middle;margin-top:10px;">
                                            </div>
                                            充值
                                        </li>
                                    </a>
                                </div>
                                <div style="width:100%;overflow:hidden;border-bottom:1px solid #bfbfbf;">

                                    <a href="/book/Home/Book/book_type.html" style="width:33%;float:left;border-bottom:none;">
                                        <li class="gg-li" >
                                            <div style="width:33%;margin:0 auto;">
                                                <img src="/book/Public/home/img/cc4.png" alt="" style="width:30px;height:30px;margin:0 auto;vertical-align: middle;margin-top:10px;">
                                            </div>
                                            书架
                                        </li>
                                    </a>
                                    <a href="/book/Home/User/search.html" style="width:33%;float:left;border-bottom:none;">
                                        <li class="gg-li" >
                                            <div style="width:33%;margin:0 auto;">
                                                <img src="/book/Public/home/img/cc5.png" alt="" style="width:30px;height:30px;margin:0 auto;vertical-align: middle;margin-top:10px;">
                                            </div>
                                            搜索
                                        </li>
                                    </a>
                                    <a href="/book/Home/User/history.html" style="width:33%;float:left;border-bottom:none;">
                                        <li class="gg-li2" >
                                            <div style="width:33%;margin:0 auto;">
                                                <img src="/book/Public/home/img/cc6.png" alt="" style="width:30px;height:30px;margin:0 auto;vertical-align: middle;margin-top:10px;">
                                            </div>
                                            阅读历史
                                        </li>
                                    </a>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>





    </body>

</html>