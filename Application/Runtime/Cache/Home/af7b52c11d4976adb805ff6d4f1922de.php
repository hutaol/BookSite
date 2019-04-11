<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
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
		<link rel="stylesheet" href="/book/Public/home/css/show.css?v1">
        <link rel="stylesheet" href="/book/Public/home/css/icostyle.css">
		<link href="/book/Public/home/css/myb-axc.css" rel="stylesheet" 0="projects\assets\AppAsset">
        <script type="text/jscript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <style>
		.tiaojian {
	display: -webkit-box;
	padding: 5px 10px;
	border-bottom: 1px solid #f3f3f3;
}

.tiaojian:last-child {
	border-bottom: none;
}

.tiaojian>li {
	display: block;
	min-height: 30px;
	line-height: 30px;
}

.tiaojian>li:nth-child(1) {
	width: 50px;
}

.tiaojian>li:nth-child(2) {
	-webkit-box-flex: 1;
}

.tiaojian>li>a {
	display: inline-block;
	height: 24px;
	line-height: 24px;
	padding: 0 5px;
	border-radius: 3px;
}

.tiaojian>li>a.curr {
	color: #fff;
	background: #ff6600;
}
		</style>
		<!-- <script>
			var BASE_URL = "/projects";
		</script> -->
	</head>

	<body class="project-fixed" >
			<!---->

			<div id="item_header">
				<a href="" class="datail-banner-head" onclick="javascript:history.go(-1);">
					<img src="/book/Public/home/img/back.png" style="float: left;margin-top: 5px;height: 18px;width: 18px;padding-bottom: 0;transform: rotate(180deg);">
					<div style="float: left;color:#fff;font-size:1em;margin-left:3px;padding-top: 1px;">返回</div>
				</a>
				<div style="margin: auto;width: 57%;margin-top: 12px;text-align: center;color: #fff;font-size:16px;"><?php if(!empty($typename['name'])): echo ($typename["name"]); else: ?>书库<?php endif; ?></div>
				<a href="" class="detail-banner-mine">
	       			<!--<img src="/book/Public/home/img/back.png" style="float: left;margin-top: 5px;height: 18px;width: 18px;padding-bottom: 0;">-->
				</a>
			</div>
            
              <ul class="tiaojian" style=" margin-top:60px;">
            <li>类型：</li>
            <li>
            <a href="/book/Home/Book/book_type.html" <?php if(($sex) == ""): ?>class="curr"<?php endif; ?>>全部</a>
             <a <?php if(($sex) == "1"): ?>class="curr"<?php endif; ?> href="/book/Home/Book/book_type?sex=1&state=<?php echo ($state); ?>&tid=<?php echo ($tid); ?>">男频</a> <a <?php if(($sex) == "2"): ?>class="curr"<?php endif; ?> href="/book/Home/Book/book_type?sex=2&state=<?php echo ($state); ?>&tid=<?php echo ($tid); ?>">女频</a>    
            </li>
        </ul>
          <ul class="tiaojian" style=" margin-top: 5px;">
            <li>进度：</li>
            <li>
            <a href="/book/Home/Book/book_type.html" <?php if(($state) == ""): ?>class="curr"<?php endif; ?>>全部</a>
              <a <?php if(($state) == "0"): ?>class="curr"<?php endif; ?> href="/book/Home/Book/book_type?state=0&sex=<?php echo ($sex); ?>&tid=<?php echo ($tid); ?>">连载中</a> <a <?php if(($state) == "1"): ?>class="curr"<?php endif; ?> href="/book/Home/Book/book_type?state=1&sex=<?php echo ($sex); ?>&tid=<?php echo ($tid); ?>">已完结</a>    
            </li>
        </ul>
            
            <ul class="tiaojian" style=" margin-top:5px;">
            <li>分类：</li>
            <li>
            <a href="/book/Home/Book/book_type.html" <?php if(($tid) == ""): ?>class="curr"<?php endif; ?>>全部</a>
             <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vt): $mod = ($i % 2 );++$i;?><a <?php if(($tid) == $vt['id']): ?>class="curr"<?php endif; ?> href="/book/Home/Book/book_type?tid=<?php echo ($vt["id"]); ?>&sex=<?php echo ($sex); ?>&state=<?php echo ($state); ?>"><?php echo ($vt["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </li>
        </ul>
           
      
			<div>
           
                <div class="user-lists" style="margin-top:10px;">
                    <div id="books" now="1" num="<?php echo ($total); ?>" class="user-lists-content" style="border:none;">
                        <?php if(is_array($booklist)): $i = 0; $__LIST__ = $booklist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vb): $mod = ($i % 2 );++$i;?><a href="/book/Home/Book/bookinfo?bid=<?php echo ($vb["id"]); ?>&number=1">
                                <div class="du">
                                    <img src="/book/Public/Uploads/book/<?php echo ($vb["img"]); ?>" style="width:30%;float:left;">
                                    <div class="du-div">
                                        <p style="font-size:16px;line-height:20px;"><?php echo ($vb["title"]); ?></p>
                                        <p style=" margin-top:5px;"><?php echo ($vb["typetitle"]); ?></p>
                                        <p style="margin-top:8px;line-height:20px;font-size:12px;color:#7c7b79;" class="du-p"><?php echo (msubstr($vb["content"],0,60,'utf-8',false)); ?></p>
                                    </div>
                                </div>
                            </a><?php endforeach; endif; else: echo "" ;endif; ?>
                         

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

<script type="text/javascript">
//记录状态
var state=true;
//滚动条滚动的时候
$(window).scroll(function(){
        //获取当前加载更多按钮距离顶部的距离
    var bottomsubmit = $('#books').offset().top;
    //获取当前页面底部距离顶部的高度距离
    var nowtop = $(document).scrollTop()+$(window).height();
    //获取当前页数，默认第一页
    var now = $('#books').attr('now');
    //获取总页数，PHP分页的总页数
    var num = $('#books').attr('num');
        //当当前页面的高度大于按钮的高度的时候开始触发加载更多数据
    if(nowtop>bottomsubmit){
    
            //如果为真继续执行，这个是用于防止滚动获取过多的数据情况
        if(state==true){
                //执行一次获取数据并停止再进来获取数据
            state=false;
            
            setTimeout(function(){
                  //当前页数++
                now++;
                //记录当前为第二页
                $('#books').attr('now',now);
                $.ajax({

                       //通过ajax传页数参数获取当前页数的数据
                    url:'/book/Home/Book/book_typeajax',
                    data: "tid=<?php echo ($tid); ?>&sex=<?php echo ($sex); ?>&state=<?php echo ($state); ?>&page="+now,
                    type:'GET',
                    cache:false,
                    dataType:"html",
                    success:function(data){
               
                     $('#books').append(data);
      
                        //如果当前页大于等于总页数就提示没有更多数据
                        if(now>=num){
                         
                            // $("#lnkMore").html("没有更多数据");
                            //并把状态设置为假，下次下滑滚动时不再通过ajax获取数据
                            state=false;
                        }else{
                              
                            state=true;
                        }
                    },
                    error:function(){
                     //$("#lnkMore").html("加载错误,请刷新页面");
                    }
                });
            },500);
        }
    }
});
</script>

	</body>
    

</html>