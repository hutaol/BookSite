<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <title>订单统计</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- <script>
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
    <script src="/book/Public/admin/js//book/Public/admin/js/cookies.js"></script>
    <script src="/book/Public/admin/js/knockout-min.js"></script>
    <script src="/book/Public/admin/js/knockout.mapping.min.js"></script>
    <script src="/book/Public/admin/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/book/Public/admin/js/jquery.validate.min.js"></script>
    <script src="/book/Public/admin/js/jquery.validate.unobtrusive.min.js"></script>
    <script src="/book/Public/admin/js/clipboard.min.js"></script>
    <script src="/book/Public/admin/js/select2.min.js"></script>
    <script src="/book/Public/admin/js/admin.js"></script>
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

<link media="all" href="/book/Public/admin/css/index02.css" type="text/css" rel="stylesheet">
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

              <!--       <div id="invalid-mp-settings-hint" style="border-top: 0px none; border-left: 0px none; border-right: 0px none; margin: 0px;" class="alert alert-warning">
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
            <li class="active">订单统计</li>
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



<div style="margin-bottom: 10px;">
    <ul class="nav nav-tabs">
        <li class="active"><a    href="/book/Admin/Static/chanrge_static.html">订单统计</a></li>
        <li class=""><a    href="/book/Admin/Static/people_static.html">用户统计</a></li>
        <li style="display: none;" class=""><a    href="/book/Admin/Static/people_static.html">小说统计</a></li>
    </ul>
</div>
<script>
    var uid = null;
</script>

<div class="row" id="order-summary-stats-panel">
    <div class="col-md-3">
        <div class="well">
            <b>
                今日充值 <i class="fa fa-question-circle" title="非实时, 延迟 5 分钟左右"></i>
                <!-- <span style="font-weight: normal; font-size: 13px; color: rgb(0, 153, 0);" class="pull-right">
                    <span data-bind="text: refresh_seconds_left">52</span> 秒后刷新
                </span> -->
            </b>
            <div class="text-primary" style="font-size: 32px; margin: 5px 0px;">
                ¥<span data-bind="price: stats_today.paid_amount"><?php echo ($today_static3); ?></span>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6" style="padding: 0px;">
                        <strong>普通充值</strong>
                        <div><b class="text-primary" data-bind="price: stats_today.welth_order_paid_amount">￥<?php echo ($today_static1); ?></b></div>
                        <!-- <div>已支付: <b class="text-warning" data-bind="text: stats_today.welth_order_paid_count">0</b> 笔</div>
                        <div>未支付: <b class="text-warning" data-bind="text: stats_today.welth_order_unpaid_count">0</b> 笔</div>
                        <div>
                            完成率: <b class="text-warning"><span data-bind="text: Math.round(stats_today.welth_order_completion_rate() * 100)">0</span> %</b>
                        </div> -->
                    </div>
                    <div class="col-sm-6" style="padding: 0px;">
                        <strong>年费VIP会员</strong>
                        <div><b class="text-primary" data-bind="price: stats_today.vip_order_paid_amount">￥<?php echo ($today_static2); ?></b></div>
                        <!-- <div>已支付: <b class="text-warning" data-bind="text: stats_today.vip_order_paid_count">0</b> 笔</div>
                        <div>未支付: <b class="text-warning" data-bind="text: stats_today.vip_order_unpaid_count">0</b> 笔</div>
                        <div>
                            完成率: <b class="text-warning"><span data-bind="text: Math.round(stats_today.vip_order_completion_rate() * 100)">0</span> %</b>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="well">
            <b>昨日充值</b>
            <div class="text-primary" style="font-size: 32px; margin: 5px 0px;">
                ¥<span data-bind="price: stats_yesterday.paid_amount"><?php echo ($yes_static3); ?></span>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6" style="padding: 0px;">
                        <strong>普通充值</strong>
                        <div><b class="text-primary" data-bind="price: stats_yesterday.welth_order_paid_amount">￥<?php echo ($yes_static1); ?></b></div>
                        <!-- <div>已支付: <b class="text-warning" data-bind="text: stats_yesterday.welth_order_paid_count">0</b> 笔</div>
                        <div>未支付: <b class="text-warning" data-bind="text: stats_yesterday.welth_order_unpaid_count">0</b> 笔</div>
                        <div>
                            完成率: <b class="text-warning"><span data-bind="text: Math.round(stats_yesterday.welth_order_completion_rate() * 100)">0</span> %</b>
                        </div> -->
                    </div>
                    <div class="col-sm-6" style="padding: 0px;">
                        <strong>年费VIP会员</strong>
                        <div><b class="text-primary" data-bind="price: stats_yesterday.vip_order_paid_amount">￥<?php echo ($yes_static2); ?></b></div>
                        <!-- <div>已支付: <b class="text-warning" data-bind="text: stats_yesterday.vip_order_paid_count">0</b> 笔</div>
                        <div>未支付: <b class="text-warning" data-bind="text: stats_yesterday.vip_order_unpaid_count">0</b> 笔</div>
                        <div>
                            完成率: <b class="text-warning"><span data-bind="text: Math.round(stats_yesterday.vip_order_completion_rate() * 100)">0</span> %</b>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="well">
            <b>本月充值   </b>
            <div class="text-primary" style="font-size: 32px; margin: 5px 0px;">
                ¥<span data-bind="price: stats_this_month.paid_amount"><?php echo ($month_static3); ?></span>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6" style="padding: 0px;">
                        <strong>普通充值</strong>
                        <div><b class="text-primary" data-bind="price: stats_this_month.welth_order_paid_amount">￥<?php echo ($month_static1); ?></b></div>
                        <!-- <div>已支付: <b class="text-warning" data-bind="text: stats_this_month.welth_order_paid_count">0</b> 笔</div>
                        <div>未支付: <b class="text-warning" data-bind="text: stats_this_month.welth_order_unpaid_count">0</b> 笔</div>
                        <div>
                            完成率: <b class="text-warning"><span data-bind="text: Math.round(stats_this_month.welth_order_completion_rate() * 100)">0</span> %</b>
                        </div> -->
                    </div>
                    <div class="col-sm-6" style="padding: 0px;">
                        <strong>年费VIP会员</strong>
                        <div><b class="text-primary" data-bind="price: stats_this_month.vip_order_paid_amount">￥<?php echo ($month_static2); ?></b></div>
                        <!-- <div>已支付: <b class="text-warning" data-bind="text: stats_this_month.vip_order_paid_count">0</b> 笔</div>
                        <div>未支付: <b class="text-warning" data-bind="text: stats_this_month.vip_order_unpaid_count">0</b> 笔</div>
                        <div>
                            完成率: <b class="text-warning"><span data-bind="text: Math.round(stats_this_month.vip_order_completion_rate() * 100)">0</span> %</b>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="well">
            <b>累计充值  <!-- <i class="fa fa-question-circle" title="不含当日，非实时，每天凌晨2:30左右更新"></i>  --></b>
            <div class="text-primary" style="font-size: 32px; margin: 5px 0px;">
                ¥<span data-bind="price: stats_all_time.paid_amount"><?php echo ($all_static3); ?></span>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6" style="padding: 0px;">
                        <strong>普通充值</strong>
                        <div><b class="text-primary" data-bind="price: stats_all_time.welth_order_paid_amount">￥<?php echo ($all_static1); ?></b></div>
                        <!-- <div>已支付: <b class="text-warning" data-bind="text: stats_all_time.welth_order_paid_count">0</b> 笔</div>
                        <div>未支付: <b class="text-warning" data-bind="text: stats_all_time.welth_order_unpaid_count">0</b> 笔</div>
                        <div>
                            完成率: <b class="text-warning"><span data-bind="text: Math.round(stats_all_time.welth_order_completion_rate() * 100)">0</span> %</b>
                        </div> -->
                    </div>
                    <div class="col-sm-6" style="padding: 0px;">
                        <strong>年费VIP会员</strong>
                        <div><b class="text-primary" data-bind="price: stats_all_time.vip_order_paid_amount">￥<?php echo ($all_static2); ?></b></div>
                        <!-- <div>已支付: <b class="text-warning" data-bind="text: stats_all_time.vip_order_paid_count">0</b> 笔</div>
                        <div>未支付: <b class="text-warning" data-bind="text: stats_all_time.vip_order_unpaid_count">0</b> 笔</div>
                        <div>
                            完成率: <b class="text-warning"><span data-bind="text: Math.round(stats_all_time.vip_order_completion_rate() * 100)">0</span> %</b>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
<script>
    var OrderSummaryStatsPanel = function () {
        var self = this;
        var inited = false;
        var uid = null;
        var countdownIntervalId = null;
        var refreshIntervalSeconds = 60;
        var model = {
            refresh_seconds_left: ko.observable(refreshIntervalSeconds),
            stats_today: createStats(),
            stats_this_month: createStats(),
            stats_yesterday: createStats(),
            stats_all_time: createStats()
        };

        this.init = function () {
            if (!inited) {
                ko.applyBindings(model, document.getElementById('order-summary-stats-panel'));
                inited = false;
            }
        };

        this.load = function (options) {
            self.init();

            uid = options && options.uid ? options.uid : null;

            $.when(
                self.loadStatsToday(),
                self.loadStatsYesterday(),
                self.loadStatsThisMonth(),
                self.loadStatsAllTime()
            )
            .then(function () {
                self.startRefreshTimer();
            });
        };

        this.startRefreshTimer = function () {
            countdownIntervalId = setInterval(function () {
                model.refresh_seconds_left(model.refresh_seconds_left() - 1);

                if (model.refresh_seconds_left() === 0) {
                    clearInterval(countdownIntervalId);
                    self.loadStatsToday().then(function () {
                        model.refresh_seconds_left(refreshIntervalSeconds);
                        self.startRefreshTimer();
                    });
                }
            }, 1000);
        };

        this.loadStatsToday = function () {
            return $.get('/backend/order_stats/api_get_stats_today/' + (uid || ''), function (data) {
               ko.mapping.fromJS(data, {}, model.stats_today);
            });
        };

        this.loadStatsYesterday = function () {
            return $.get('/backend/order_stats/api_get_stats_yesterday/' + (uid || ''), function (data) {
               ko.mapping.fromJS(data, {}, model.stats_yesterday);
            });
        };

        this.loadStatsThisMonth = function () {
            return $.get('/backend/order_stats/api_get_stats_this_month/' + (uid || ''), function (data) {
               ko.mapping.fromJS(data, {}, model.stats_this_month);
            });
        };

        this.loadStatsAllTime = function () {
            return $.get('/backend/order_stats/api_get_stats_all_time/' + (uid || ''), function (data) {
               ko.mapping.fromJS(data, {}, model.stats_all_time);
            });
        };

        function createStats() {
            return {
                paid_amount: ko.observable(),
                paid_order_count: ko.observable(),
                unpaid_order_count: ko.observable(),
                vip_order_paid_amount: ko.observable(),
                vip_order_paid_count: ko.observable(),
                vip_order_unpaid_count: ko.observable(),
                vip_order_completion_rate: ko.observable(),
                welth_order_paid_amount: ko.observable(),
                welth_order_paid_count: ko.observable(),
                welth_order_unpaid_count: ko.observable(),
                welth_order_completion_rate: ko.observable()
            }
        }
    };

    OrderSummaryStatsPanel.instance = new OrderSummaryStatsPanel();
</script> -->

<div class="panel panel-default" id="order-daily-stats-panel">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-calendar"></i> 近30天充值统计</h3>
    </div>
    <!-- <div class="loading-panel" data-bind="visible: loading" style="display: block;">
        <i class="fa fa-spinner fa-spin"></i>
    </div> -->
    <table class="table table-bordered table-striped"  style="">
        <thead>
            <tr>
                <th>日期</th>
                <!-- <th class="text-right">充值金额</th> -->
                <th class="text-right">普通充值</th>
                <th class="text-right">普通充值支付订单数</th>
                <th class="text-right">年费VIP会员</th>
                <th class="text-right">年费VIP会员支付订单数</th>
            </tr>
        </thead>
        <tbody data-bind="foreach: stats">
            <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vr): $mod = ($i % 2 );++$i;?><tr>
                <td><span data-bind="date: date"><?php echo ($vr["time"]); ?></span></td>
                <!-- <td class="text-right">
                    <b>¥ <span data-bind="price: paid_amount">0.00</span></b>
                </td> -->
                <td class="text-right">
                    <b>¥ <span data-bind="price: welth_order_paid_amount"><?php echo ($vr["paygold"]); ?></span></b>
                    <!-- <div class="text-muted" style="font-size: 13px; margin-top: 5px;">
                        充值人数: <span data-bind="text: welth_order_paid_user_count">0</span>,
                        人均: ¥ <span data-bind="price: welth_order_avg_user_paid_amount">0.00</span>
                    </div> -->
                </td>
                <td class="text-right">
                    <b><span data-bind="text: welth_order_paid_count"><?php echo ($vr["goldcount"]); ?></span> 笔</b>
                    <!-- <div class="text-muted" style="font-size: 13px; margin-top: 5px;">
                        <span data-bind="text: welth_order_unpaid_count">0</span> 笔未支付,
                        完成率: <span data-bind="text: Math.round(welth_order_completion_rate * 100)">0</span> %
                    </div> -->
                </td>
                <td class="text-right">
                    <b>¥ <span data-bind="price: vip_order_paid_amount"><?php echo ($vr["payvip"]); ?></span></b>
                    <!-- <div class="text-muted" style="font-size: 13px; margin-top: 5px;">
                        充值人数: <span data-bind="text: vip_order_paid_user_count">0</span>,
                        人均: ¥ <span data-bind="price: vip_order_avg_user_paid_amount">0.00</span>
                    </div> -->
                </td>
                <td class="text-right">
                    <b><span data-bind="text: vip_order_paid_count"><?php echo ($vr["vipcount"]); ?></span> 笔</b>
                    <!-- <div class="text-muted" style="font-size: 13px; margin-top: 5px;">
                        <span data-bind="text: vip_order_unpaid_count">0</span> 笔未支付,
                        完成率: <span data-bind="text: Math.round(vip_order_completion_rate * 100)">0</span> %
                    </div> -->
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>
</div>

<!-- <script>
    var OrderDailyStatsPanel = function () {
        var self = this;
        var inited = false;
        var model = {
            loading: ko.observable(true),
            stats: ko.observableArray()
        };

        this.init = function () {
            if (!inited) {
                ko.applyBindings(model, document.getElementById('order-daily-stats-panel'));
                inited = true;
            }
        };

        this.load = function (options) {
            self.init();

            model.loading(true);

            var uid = options && options.uid ? options.uid : null;

            $.get('/backend/order_stats/api_get_daily_stats/' + (uid || ''), function (stats) {
                model.stats(stats);
                model.loading(false);
            });
        }
    };

    OrderDailyStatsPanel.instance = new OrderDailyStatsPanel();
</script>
<script>
    OrderSummaryStatsPanel.instance.load({
        uid: uid
    });

    OrderDailyStatsPanel.instance.load({
        uid: uid
    });
</script> -->


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
        <script src="/book/Public/admin/js/jquery.ui.widget.min.js"></script>
        <script src="/book/Public/admin/js/jquery.fileupload.min.js"></script>

        <!-- page specific plugin scripts -->

        <!-- ace scripts -->
        <script src="/book/Public/admin/js/ace-elements.min.js"></script>
        <script src="/book/Public/admin/js/ace.min.js"></script>

        <!-- inline scripts related to this page -->

        <!-- the following scripts are used in demo only for onpage help and you don't need them -->


      <!--   <script type="text/javascript"> ace.vars['base'] = 'http://novel.818tu.com/static'; </script> -->
        <script src="/book/Public/admin/js/elements.onpage-help.js"></script>
        <script src="/book/Public/admin/js/ace.onpage-help.js"></script>


</body>
</html>