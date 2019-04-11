<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <title>订单管理--全部</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

 <!--    <script>
      (function () {
        if (window !== window.top) {
          window.top.location.href = 'http://www.818tu.com';
        }
      })();
    </script> -->

    <!-- bootstrap & fontawesome -->








    <!-- page specific plugin styles -->
    <script src="/book/Public/admin/js/jquery.min.js"></script>
    <script src="/book/Public/admin/js/lodash.min.js"></script>
    <script src="/book/Public/admin/js/moment.min.js"></script>
    <script src="/book/Public/admin/js/zh-cn.js"></script>
    <script src="/book/Public/admin/js/numeral.min.js"></script>
    <script src="/book/Public/admin/js/toastr.min.js"></script>
    <script src="/book/Public/admin/js/cookies.js"></script>
    <script src="/book/Public/admin/js/knockout-min.js"></script>
    <script src="/book/Public/admin/js/knockout.mapping.min.js"></script>
    <script src="/book/Public/admin/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/book/Public/admin/js/jquery.validate.min.js"></script>
    <script src="/book/Public/admin/js/jquery.validate.unobtrusive.min.js"></script>
    <script src="/book/Public/admin/js/clipboard.min.js"></script>
    <script src="/book/Public/admin/js/select2.min.js"></script>
    <script src="/book/Public/admin/js/admin.js"></script>
    <script src="/book/Public/admin/js/K.js"></script>
    <script>
      moment.locale('zh-cn');
      toastr.options.positionClass = 'toast-bottom-right';
    </script>

    <!-- text fonts -->


    <!-- ace styles -->


    <!--[if lte IE 9]>
        <link rel="stylesheet" href="http://novel.818tu.com/static/assets/css/ace-part2.min.css" />
    <![endif]-->




    <!--[if lte IE 9]>
        <link rel="stylesheet" href="http://novel.818tu.com/static/css/ace-ie.min.css" />
    <![endif]-->



    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="/book/Public/admin/js/ace-extra.min.js"></script>

   <!--  <script>
      var __BASEURL = "http://novel.818tu.com/";
    </script> -->
<link href="/book/Public/admin/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
<link media="all" href="/book/Public/admin/css/index04.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/book/Public/admin/css/glyphicons-halflings-regular.css">
</head>
<body class="no-skin">

    <!-- #section:basics/navbar.layout -->
    <div id="navbar" class="navbar navbar-default">
      <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
      </script>

      <div class="navbar-container" id="navbar-container">
        <!-- #section:basics/sidebar.mobile.toggle -->
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
          <span class="sr-only">Toggle sidebar</span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
          <a    href="#" class="navbar-brand">
            <small>
              <i class="fa fa-cloud"></i> 小说分销平台
            </small>
          </a>
        </div>

        <!-- #section:basics/navbar.dropdown -->
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
          <ul class="nav ace-nav">
            <li class="light-blue">
              <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <!-- <img class="nav-user-photo" src="/book/Public/admin/images/user.jpg" alt="Jason's Photo"> -->
                <span class="user-info">
                  <small>你好,</small>
                  <?php echo ($admin["nickname"]); ?>               </span>

                <i class="ace-icon fa fa-caret-down"></i>
              </a>

              <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                <!-- <li>
                  <a    href="#"><i class="fa fa-fw fa-user-circle"></i> 个人资料</a>
                </li>
                <li>
                  <a    href="#"><i class="fa fa-fw fa-key"></i> 修改密码</a>
                </li>
                                    <li class="divider"></li>
                    <li>
                      <a    href="#"><i class="fa fa-fw fa-video-camera"></i> 视频教程</a>
                    </li> -->
                             <!--    <li class="divider"></li> -->
                <li>
                  <a    href="/book/Admin/Login/logout">
                    <i class="fa fa-fw fa-power-off"></i> 安全退出
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="main-container" id="main-container">
      <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
      </script>

      <div id="sidebar" class="sidebar responsive">
          <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
          </script>

 <ul class="nav nav-list">

    <li>
        <a    href="/book/Admin/Index/index.html">
            <i class="menu-icon fa fa-fw fa-bullhorn"></i>
            <span class="menu-text">通知公告</span>
        </a>
        <b class="arrow"></b>
    </li>
<?php if($admin['level'] === '0'): ?><li>
        <a    href="/book/Admin/Index/news_list.html">
            <i class="menu-icon fa fa-fw fa-bullhorn"></i>
            <span class="menu-text">公告管理</span>
        </a>
        <b class="arrow"></b>
    </li><?php endif; ?>
    <li>
        <a    href="/book/Admin/Static/chanrge_static.html">
            <i class="menu-icon fa fa-fw fa-bar-chart"></i>
            <span class="menu-text">数据统计</span>
        </a>
        <b class="arrow"></b>
    </li>
    <li>
        <a    href="/book/Admin/Static/order_static.html">
            <i class="menu-icon menu-icon fa fa-fw fa-list-alt"></i>
            <span class="menu-text"> 订单管理 </span>
        </a>
        <b class="arrow"></b>
    </li>
<?php if($admin['level'] === '0'): ?><li>
        <a    href="/book/Admin/Book/add_book.html">
            <i class="menu-icon fa fa-fw fa-tasks"></i>
            <span class="menu-text">发布小说</span>
        </a>
        <b class="arrow"></b>
    </li><?php endif; ?>
    <li>
        <a    href="/book/Admin/Book/book_list.html">
            <i class="menu-icon fa fa-fw fa-tasks"></i>
            <span class="menu-text">小说列表</span>
        </a>
        <b class="arrow"></b>
    </li>
<?php if($admin['level'] === '0'): ?><li>
        <a    href="/book/Admin/Static/book_static.html">
            <i class="menu-icon fa fa-fw fa-tasks"></i>
            <span class="menu-text">小说收入</span>
        </a>
        <b class="arrow"></b>
    </li><?php endif; ?>
    <li>
        <a    href="/book/Admin/Static/link_static.html">
            <i class="menu-icon fa fa-fw fa-link"></i>
            <span class="menu-text">推广链接</span>
        </a>
        <b class="arrow"></b>
    </li>
    <?php if($admin['level'] === '0'): ?><li>
        <a    href="/book/Admin/Static/activity_list.html">
            <i class="menu-icon fa fa-fw fa-shopping-cart"></i>
            <span class="menu-text">促销活动</span>
        </a>
        <b class="arrow"></b>
    </li>
    <li>
        <a    href="/book/Admin/Static/activity_list_static.html">
            <i class="menu-icon fa fa-fw fa-shopping-cart"></i>
            <span class="menu-text">促销活动统计</span>
        </a>
        <b class="arrow"></b>
    </li><?php endif; ?>  
<?php if($admin['level'] === '0'): ?><li>
        <a    href="/book/Admin/Wechat/reply_keywords.html">
            <i class="menu-icon fa fa-fw fa-commenting"></i>
            <span class="menu-text">关键字回复</span>
        </a>
        <b class="arrow"></b>
    </li><?php endif; ?>

<?php if($admin['level'] === '0'): ?><li>
        <a    href="/book/Admin/User/manage_admin.html">
            <i class="menu-icon fa fa-fw fa-user-plus"></i>
            <span class="menu-text">代理管理</span>
        </a>
        <b class="arrow"></b>
    </li><?php endif; ?>
<?php if($admin['level'] === '0'): ?><li>
        <a    href="/book/Admin/User/admin_change_list.html">
            <i class="menu-icon fa fa-fw fa-user-plus"></i>
            <span class="menu-text">代理充值</span>
        </a>
        <b class="arrow"></b>
    </li><?php endif; ?>
<?php if($admin['level'] === '0'): ?><li>
        <a    href="/book/Admin/User/admin_fenchange.html">
            <i class="menu-icon fa fa-fw fa-user-plus"></i>
            <span class="menu-text">利润分成</span>
        </a>
        <b class="arrow"></b>
    </li><?php endif; ?>
    <li>
        <a    href="/book/Admin/User/mydeposit.html">
            <i class="menu-icon fa fa-fw fa-sticky-note-o"></i>
            <span class="menu-text">我的结算单</span>
        </a>
        <b class="arrow"></b>
    </li>
<?php if($admin['level'] === '0'): ?><li>
        <a    href="/book/Admin/User/deposit_list.html">
            <i class="menu-icon fa fa-fw fa-sticky-note-o"></i>
            <span class="menu-text">代理结算单</span>
        </a>
        <b class="arrow"></b>
    </li><?php endif; ?>
    <!-- <li>
        <a    href="#">
            <i class="menu-icon fa fa-fw fa-sticky-note-o"></i>
            <span class="menu-text">代理打款</span>
        </a>
        <b class="arrow"></b>
    </li> -->
    <!-- <li>
        <a    href="#">
            <i class="menu-icon fa fa-fw fa-envelope-o"></i>
            <span class="menu-text">邀请列表</span>
        </a>
        <b class="arrow"></b>
    </li> -->
    <!-- <li>
        <a    href="#">
            <i class="menu-icon fa fa-fw fa-credit-card"></i>
            <span class="menu-text">收款信息</span>
        </a>
        <b class="arrow"></b>
    </li> -->
<?php if($admin['level'] === '0'): ?><li>
        <a    href="/book/Admin/Wechat/set_signal.html">
            <i class="menu-icon fa fa-fw fa-gears"></i>
            <span class="menu-text">网站设置</span>
        </a>
        <b class="arrow"></b>
    </li><?php endif; ?>
<?php if($admin['level'] === '0'): ?><li>
        <a    href="/book/Admin/User/do_all_deposit">
            <i class="menu-icon fa fa-fw fa-user-plus"></i>
            <span class="menu-text">一键提现</span>
        </a>
        <b class="arrow"></b>
    </li><?php endif; ?>
<?php if($admin['level'] === '0'): ?><li>
        <a href="/book/Admin/Wechat/add_web.html">
            <i class="menu-icon fa fa-fw fa-user-plus"></i>
            <span class="menu-text">添加域名</span>
        </a>
        <b class="arrow"></b>
    </li>
    <li>
        <a href="/book/Admin/Wechat/edit_cut.html">
            <i class="menu-icon fa fa-fw fa-user-plus"></i>
            <span class="menu-text">设置订单数</span>
        </a>
        <b class="arrow"></b>
    </li>
    <li>
        <a href="/book/Admin/Wechat/cut_list.html">
            <i class="menu-icon fa fa-fw fa-user-plus"></i>
            <span class="menu-text">砍单记录</span>
        </a>
        <b class="arrow"></b>
    </li>
    <li>
        <a href="/book/Admin/Wechat/repassword.html">
            <i class="menu-icon fa fa-fw fa-user-plus"></i>
            <span class="menu-text">修改密码</span>
        </a>
        <b class="arrow"></b>
    </li><?php endif; ?>
</ul>
          <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
          </div>

          <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
          </script>
      </div>

      <!-- /section:basics/sidebar -->
      <div class="main-content">

      <!--               <div id="invalid-mp-settings-hint" style="border-top: 0px none; border-left: 0px none; border-right: 0px none; margin: 0px;" class="alert alert-warning">
    <i class="fa fa-warning"></i> 您的公众号配置不完整，推广前请务必配置好公众号信息。<a    href="#">立即配置</a>
</div> -->

<!-- <script>
    $.get('/backend/settings/api_check_mp_settings?t' + new Date().getTime(), function (result) {
        if (!result.valid) {
            $('#invalid-mp-settings-hint').slideDown();
        }
    });
</script> -->
        <div class="breadcrumbs" id="breadcrumbs">
          <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
          </script>

          <ul class="breadcrumb">
            <li>
              <i class="ace-icon fa fa-home home-icon"></i>
              <a    href="#">Home</a>
            </li>
            <li class="active">订单管理</li>
          </ul><!-- /.breadcrumb -->

          <!-- /section:basics/content.searchbox -->
        </div>

        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">
          <div class="page-content-area">
            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <!--/span-->
                <!-- left menu ends -->



<form style="margin-bottom: 10px;" class="form-inline" action="/book/Admin/Static/order_static" method="GET">
    <div class="form-group">
        <div class="input-group date" id="from-date-picker">
            <input class="form-control" value="" placeholder="开始日期" type="text" onClick="laydate()" name="time1">
            <!-- <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span> -->
        </div>
    </div>
    <div class="form-group">
        <div class="input-group date" id="to-date-picker">
            <input class="form-control" value="" placeholder="结束日期" type="text" id="demo" name="time2">
            <!-- <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span> -->
        </div>
    </div>
    <button type="submit" class="btn btn-primary" id="btn-search">查询</button>
</form>

<!-- <nav>
    <form class="form-inline search-form" action="http://novel.818tu.com/backend/orders/index">
        <div class="input-group pull-right">
            <input name="q" value="" placeholder="商户单号, 微信交易号" type="text">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
    <ul class="nav nav-tabs pull-left">
        <li class="active"><a    href="index03.html">全部</a></li>
        <li class=""><a    href="index03-2.html">待支付</a> </li>
        <li class=""><a    href="index03-3.html">已支付</a></li>
        <li class=""><a    href="index03-4.html">已取消</a>
        </li><li class=""><a    href="index03-5.html">已关闭</a></li>
    </ul>
</nav> -->

<table class="table table-striped table-bordered table-hover responsive" id="dataTables-example">
    <thead>
        <tr>
            <td>
                商户单号
            </td>
            <td>订单类型</td>
            <td>
                用户
            </td>
            <td class="text-right">
                总额
            </td>
            <td class="text-center">
                支付方式
            </td>
            <td class="text-center">
                订单状态
            </td>
            <td class="text-center">
                创建日期
            </td>
             <td>
                    代理
                </td>
                                </tr>
    </thead>
    <tbody>
        <?php if(is_array($chanrge)): $i = 0; $__LIST__ = $chanrge;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vc): $mod = ($i % 2 );++$i;?><tr>
                <td class="text-center" ><?php echo ($vc["onum"]); ?></td>
                <td class="text-center" ><?php echo ($vc["type"]); ?></td>
                <td class="text-center" ><?php echo ($vc["usernickname"]); ?></td>
                <td class="text-center" ><?php echo ($vc["moneyall"]); ?></td>
                <td class="text-center" >微信支付</td>
                <td class="text-center" >已支付</td>
                <td class="text-center" ><?php echo ($vc["time2"]); ?></td>
                <td class="text-center" ><?php echo ($vc["nickname"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>





                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content-area -->
                </div><!-- /.page-content -->
            </div><!-- /.main-content -->

        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!-- <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='http://novel.818tu.com/static/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script> -->
        <script src="/book/Public/admin/js/bootstrap.min.js"></script>
        <script src="/book/Public/admin/js/jquery.webui-popover.min.js"></script>
        <script src="/book/Public/admin/jquery.ui.widget.min.js"></script>
        <script src="/book/Public/admin/js/jquery.fileupload.min.js"></script>

        <!-- page specific plugin scripts -->

        <!-- ace scripts -->
        <script src="/book/Public/admin/js/ace-elements.min.js"></script>
        <script src="/book/Public/admin/js/ace.min.js"></script>

        <!-- inline scripts related to this page -->

        <!-- the following scripts are used in demo only for onpage help and you don't need them -->


        <!-- <script type="text/javascript"> ace.vars['base'] = 'http://novel.818tu.com/static'; </script> -->
        <script src="/book/Public/admin/js/elements.onpage-help.js"></script>
        <script src="/book/Public/admin/js/ace.onpage-help.js"></script>
        <script src="/book/Public/admin/laydate/laydate.js"></script>
        <script src="/book/Public/admin/dataTables/jquery.dataTables.js"></script>
        <script src="/book/Public/admin/dataTables/dataTables.bootstrap.js"></script>
            <script>
                $(document).ready(function () {
                    $('#dataTables-example').dataTable();
                });
        </script>
        <script>
        ;!function(){
        laydate({
           elem: '#demo'
        })
        }();
        </script>

</body>
</html>