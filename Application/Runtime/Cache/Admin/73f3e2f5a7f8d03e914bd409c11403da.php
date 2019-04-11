<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <title>公告列表</title>

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

    <!-- <script>
      var __BASEURL = "http://novel.818tu.com/";
    </script> -->

<link media="all" href="/book/Public/admin/css/index04.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/book/Public/admin/css/glyphicons-halflings-regular.css">

<link href="/book/Public/admin/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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

     <!--                <div id="invalid-mp-settings-hint" style="border-top: 0px none; border-left: 0px none; border-right: 0px none; margin: 0px;" class="alert alert-warning">
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
              <a    href="/book/Home/Index/index.html">Home</a>
            </li>
            <li class="active">公告列表</li>
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




<div class="actions-bar clearfix" style="margin-top: 15px;">
    <!-- <form class="form-inline search-form" action="http://novel.818tu.com/backend/novels/index?order_by=rank%20desc">
        <div class="input-group pull-right">
            <input name="q" value="" placeholder="小说名称" type="text">
            <input name="is_online" value="1" type="hidden">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form> -->


    <ul class="nav nav-pills nav-pills-sm pull-left" style="margin-top: 3px;">
        <li class="active"><a    href="/book/Admin/Index/add_news.html">添加公告</a></li>
    </ul>
</div>

<table class="table table-striped table-bordered responsive table-hover" id="dataTables-example">
    <thead>
        <tr >
            <td class="text-center">发布时间</td>
            <td class="text-center">公告标题</td>
            <!-- <td class="text-center">状态</td>
            <td class="text-center">性别频度</td> -->
            <!-- <td class="text-center">
                <a data-ui="table-sort" data-field="rank" data-start-dir="desc" style="cursor: pointer;" title="点击排序">
                派单指数
                <i class="fa table-sort-icon fa-caret-down" style=""></i></a>
            </td> -->

            <td class="text-center">操作</td>

        </tr>
    </thead>
    <tbody>
        <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vb): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">
            <td class="text-center">
                <?php echo (date("Y-m-d",$vb["time"])); ?>
            </td>
            <td>
                <?php echo ($vb["title"]); ?>
            </td>
            <td class="text-center">
                    <a href="/book/Admin/Index/edit_news?id=<?php echo ($vb["id"]); ?>" class="btn">编辑公告</a>&nbsp;&nbsp;
                    <a href="/book/Admin/Index/del_news?id=<?php echo ($vb["id"]); ?>" class="btn">删除</a>&nbsp;&nbsp;
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>


            </tbody>
</table>

<!-- <div class="pager"><span class="pager-summary">共 <em>246</em> 条记录, 每页 <em>20</em> 条, 共 <em>13</em> 页</span><ul class="pagination"><li class="active"><a    href="#">1</a></li><li class="page"><a    href="#">2</a></li><li class="page"><a    href="#">3</a></li><li class="page"><a    href="#">4</a></li><li class="page"><a    href="#">5</a></li><li class="page"><a    href="#">6</a></li><li class="next page"><a    href="#"> ›</a></li><li class="next page"><a    href="#">末页 »</a></li></ul></div> -->

<div class="modal fade" id="edit-price-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">设置价格</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="edit-price-form" action="">
                    <div class="form-group">
                        <div class="form-control-static col-sm-10" style="font-size: 16px;">
                            《<span class="novel-name"></span>》
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">章节数量:</label>
                        <div class="form-control-static col-sm-10">
                            <span class="novel-chapter-count"></span> 章节
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">免费章节:</label>
                        <div class="col-sm-10">
                            <input class="free-chapter-count" required="" name="free_chapter_count" type="number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">小说价格:</label>
                        <div class="col-sm-10">
                            <input class="novel-price" required="" name="novel_price" type="number"> 书币
                            <p class="help-block">
                                1 元人民币 = 100 书币
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-submit-edit-price-form" class="btn btn-primary">提交</button>
            </div>
        </div>
    </div>
</div>


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


        <!-- <script type="text/javascript"> ace.vars['base'] = 'http://novel.818tu.com/static'; </script> -->
        <script src="elements.onpage-help.js"></script>
        <script src="ace.onpage-help.js"></script>

        <script src="/book/Public/admin/dataTables/jquery.dataTables.js"></script>
        <script src="/book/Public/admin/dataTables/dataTables.bootstrap.js"></script>
            <script>
                $(document).ready(function () {
                    $('#dataTables-example').dataTable();
                });
        </script>

</body>
</html>