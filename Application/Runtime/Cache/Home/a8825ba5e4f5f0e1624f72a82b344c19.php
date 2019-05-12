<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en-US">

	<head>
		<meta charset="utf-8">
		<title>章节列表</title>
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

	<body class="project-fixed" >
			<!---->

			<div id="item_header">
				<a href="javascript:history.go(-1);" class="datail-banner-head">
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
                <div class="biao"><?php echo ($book["title"]); ?></div>
				<div class="user-lists" >
					<div class="user-lists-content">
                    <?php if(is_array($bookinfo)): $i = 0; $__LIST__ = $bookinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><a href="/book/Home/Book/bookinfo?bid=<?php echo ($vi["bid"]); ?>&number=<?php echo ($vi["number"]); ?>" class="mine-add">
                            <li style="width:90%;margin:0 auto;list-style:none;height:40px;border-bottom:1px solid #e5e5e5;">

                                <p class="ku"><!-- 第<?php echo ($vi["number"]); ?>章 &nbsp;&nbsp; --><?php echo ($vi["title2"]); ?>
                                <?php if($vi['pay'] === '2'): ?><span style="font-size:12px;color:red;padding-left:10px;">
                                        <img src="/book/Public/home/img/jin.png" alt="" / style="width:18px;height:18px;"><?php echo ($vi["gold"]); ?>金币
                                    </span><?php endif; ?>
                                </p>
                                <img src="/book/Public/home/img/vv.png" alt="" style="margin-top:13.5px;">
                            </li>
    					</a><?php endforeach; endif; else: echo "" ;endif; ?>
						<!-- <li style="width:90%;margin:0 auto;list-style:none;">
                            <a href="17supportMine.html" class="mine-add">
                                第一章 两次喝醉
                            </a>
                        </li> -->

					</div>
				</div>

			</div>

	</body>

</html>