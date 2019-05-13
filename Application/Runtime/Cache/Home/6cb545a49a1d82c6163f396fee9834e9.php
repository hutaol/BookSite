<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <title>充值</title>
        <meta property="qc:admins" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="format-detection" content="telephone=no" />
        <link rel="stylesheet" href="/book/Public/home/css/amazeui.min.css">
        <link rel="stylesheet" href="/book/Public/home/css/show.css">
        <link href="/book/Public/home/css/myb-axc.css" rel="stylesheet" 0="projects\assets\AppAsset">
        <!-- <script>
            var BASE_URL = "/projects";
        </script> -->
    </head>

    <body class="project-fixed" style="background:#fff;">
            <!---->

            <div id="item_header">
                <a href="/book/Home/Index/index.html" class="datail-banner-head" >
                    <img src="/book/Public/home/img/back.png" style="float: left;margin-top: 5px;height: 18px;width: 18px;padding-bottom: 0;transform: rotate(180deg);">
                    <div style="float: left;color:#fff;font-size:1em;margin-left:3px;padding-top: 1px;">返回</div>
                </a>
                <div style="margin: auto;width: 57%;margin-top: 12px;text-align: center;color: #fff;"></div>
                <a href="" class="detail-banner-mine">
                    <!--<img src="/book/Public/home/img/back.png" style="float: left;margin-top: 5px;height: 18px;width: 18px;padding-bottom: 0;">-->
                </a>
            </div>
            <div style="margin-top: 43px;">
                <div class="axc-console axc-error" id="axc-error">
                    <i class="axc-base axc-infor-base"></i>
                    <span></span>
                </div>
                <div class="biao" style="height:30px;">充值</div>
                <div class="user-lists" >
                    <div class="chong">
                        <div class="yu">
                            您的余额：<span style="color:#fe8a01;"><?php echo ($user["gold"]); ?></span>  书币
                        </div>
                        <div class="yu2">
                            选择充值的金额<a style="color:red;">（1元 = <?php echo ($buys["ratio"]); ?> 金币）</a>
                            <ul>
                                <li class="yu2-li">
                                    <a href="/book/Home/Index/jumprecharge?pay=30">
                                        <div class="yy1">
                                            30元
                                        </div>
                                        <div class="yy4"><?php echo ($buys['ratio'] * 30); ?>书币</div>
                                        <div  class="yy4">多送0元</div>
                                    </a>
                                </li>
                                <li class="yu2-li2">
                                    <a href="/book/Home/Index/jumprecharge?pay=50">
                                        <div class="yy1">

                                            50元
                                        </div>
                                        <div class="yy4"><?php echo ($buys['ratio'] * 50); ?>+<?php echo ($buys['ratio'] * 30); ?>书币</div>
                                        <div  class="yy4">多送30元</div>
                                    </a>
                                </li>
                                <li class="yu2-li">
                                    <a href="/book/Home/Index/jumprecharge?pay=100">
                                        <div class="yy1">
                                            100元
                                        </div>
                                        <div class="yy4"><?php echo ($buys['ratio'] * 100); ?>+<?php echo ($buys['ratio'] * 80); ?>书币</div>
                                        <div  class="yy4">多送80元</div>
                                    </a>
                                </li>
                                <li class="yu2-li2">
                                    <a href="/book/Home/Index/jumprecharge?pay=200">
                                        <div class="yy1">
                                            200元
                                        </div>
                                        <div class="yy4"><?php echo ($buys['ratio'] * 200); ?>+<?php echo ($buys['ratio'] * 200); ?>书币</div>
                                        <div  class="yy4">多送200元</div>
                                    </a>
                                </li>
                         <li class="yu2-li" >
                                    <a href="/book/Home/Index/jumprecharge?pay=vipjd">
                                        <div class="yy1">
                                            <img src="/book/Public/home/img/nian.png" alt="" / style="width:20px;height:20px;">
                                            季度VIP会员
                                        </div>
                                        <div  class="yy2">（<?php echo ($buys["vipjd"]); ?>元）</div>
                                        <div  class="yy3">3个月免费看</div>
                                    </a>
                                </li>

                                <li class="yu2-li2" >
                                    <a href="/book/Home/Index/jumprecharge?pay=vip">
                                        <div class="yy1">
                                            <img src="/book/Public/home/img/nian.png" alt="" / style="width:20px;height:20px;">
                                            年费VIP会员
                                        </div>
                                        <div  class="yy2">（<?php echo ($buys["vipratio"]); ?>元）</div>
                                        <div  class="yy3">全年免费看</div>
                                    </a>
                                </li>
                                <!-- <?php if($prom['st'] === '2'): ?><li class="yu2-li2" >
                                        <a href="/book/Home/Index/recharge_promotion.html">
                                            <div class="yy1" style="color:red;">
                                                <img src="/book/Public/home/img/nian.png" alt="" / style="width:20px;height:20px;">
                                                促销活动(限时)
                                            </div>
                                            <div  class="yy2" style="color:red;">已开启</div>
                                            <div  class="yy3">点击查看详情</div>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li class="yu2-li2" >
                                        <a >
                                            <div class="yy1" >
                                                <img src="/book/Public/home/img/nian.png" alt="" / style="width:20px;height:20px;">
                                                促销活动
                                            </div>
                                            <div  class="yy2" style="color:blue;">暂未开始</div>
                                            <div  class="yy3">点击查看详情</div>
                                        </a>
                                    </li><?php endif; ?> -->
                            </ul>
                            <!-- <a class="queren">
                                确认充值
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>




    </body>

</html>