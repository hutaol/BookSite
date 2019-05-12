<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta property="qc:admins" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="format-detection" content="telephone=no"/>

    <script type="text/javascript" src="/book/Public/home/js/list.js"></script>

    <link rel="stylesheet" href="/book/Public/home/css/normalize.css">
    <link rel="stylesheet" href="/book/Public/home/css/app.css">


</head>
<body>
<div class="navbar">
    <a class="navbar_left" href="javascript:void(0)" onclick="javascript:history.go(-1);">
        <img class="navbar_left_img" src="/book/Public/home/img/back.png">
        <div class="navbar_left_title">返回</div>
    </a>
    <div class="navbar_title">Title</div>

    <div class="navbar_right">
        <a class="navbar_right_a" href="/book/Home/Index/index.html">首页</a>
    </div>
</div>

<div class="list_body">

    <!--PHP volist-->
    <?php if(is_array($books)): $i = 0; $__LIST__ = $books;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vb): $mod = ($i % 2 );++$i;?><a href="/book/Home/Book/bookinfo?bid=<?php echo ($vb["id"]); ?>&number=1">
            <div class="list_item">
                <img class="list_item_img" src="/book/Public/Uploads/book/<?php echo ($vb["img"]); ?>">
                <div class="list_item_right">
                    <div class="list_item_right_title"><?php echo ($vb["title"]); ?></div>
                    <div class="list_item_right_text">
                        <?php echo (msubstr($vb["content"],0,60,'utf-8',false)); ?></div>

                    <div class="list_item_right_tag">
                        <div class="list_item_right_tag_item">玄幻</div>
                        <div class="list_item_right_tag_item">玄幻</div>

                    </div>
                </div>
            </div>
        </a><?php endforeach; endif; else: echo "" ;endif; ?>

</div>

<script>
    document.title = list_title();
    document.getElementsByClassName('navbar_title')[0].innerHTML = list_title();
</script>

</body>
</html>