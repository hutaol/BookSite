<?php
namespace Admin\Controller;

use Think\Controller;
class StaticController extends Controller
{
    public function chanrge_static()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        $c = M('chanrge');
        $now = date("Y-m-d");
        $type1 = '充值金币';
        $type2 = '充值会员';
        if ($admin['level'] > 0) {
            $condition['aid'] = $_SESSION['aid'];
            $condition['lid'] = $_SESSION['aid'];
            $condition['_logic'] = 'OR';
        } else {
            $condition['id'] = array('neq', 0);
        }
        $today_static1 = $c->where(array('time2' => $now, 'type' => $type1, $condition))->sum('moneyall');
        if (empty($today_static1)) {
            $today_static1 = 0;
        }
        $today_static2 = $c->where(array('time2' => $now, 'type' => $type2, $condition))->sum('moneyall');
        if (empty($today_static2)) {
            $today_static2 = 0;
        }
        $today_static3 = $today_static1 + $today_static2;
        $this->assign('today_static1', $today_static1);
        $this->assign('today_static2', $today_static2);
        $this->assign('today_static3', $today_static3);
        $yestime = date("Y-m-d", time() - 86400);
        $yes_static1 = $c->where(array('time2' => $yestime, 'type' => $type1, $condition))->sum('moneyall');
        if (empty($yes_static1)) {
            $yes_static1 = 0;
        }
        $yes_static2 = $c->where(array('time2' => $yestime, 'type' => $type2, $condition))->sum('moneyall');
        if (empty($yes_static2)) {
            $yes_static2 = 0;
        }
        $yes_static3 = $yes_static1 + $yes_static2;
        $this->assign('yes_static1', $yes_static1);
        $this->assign('yes_static2', $yes_static2);
        $this->assign('yes_static3', $yes_static3);
        $month = strtotime(date("Y-m") . '-1');
        $timenow = time();
        $condition2['time'] = array('between', array($month, $timenow));
        $month_static1 = $c->where(array($condition2, 'type' => $type1, $condition))->sum('moneyall');
        if (empty($month_static1)) {
            $month_static1 = 0;
        }
        $month_static2 = $c->where(array($condition2, 'type' => $type2, $condition))->sum('moneyall');
        if (empty($month_static2)) {
            $month_static2 = 0;
        }
        $month_static3 = $month_static1 + $month_static2;
        $this->assign('month_static1', $month_static1);
        $this->assign('month_static2', $month_static2);
        $this->assign('month_static3', $month_static3);
        $all_static1 = $c->where(array('type' => $type1, $condition))->sum('moneyall');
        if (empty($all_static1)) {
            $all_static1 = 0;
        }
        $all_static2 = $c->where(array('type' => $type2, $condition))->sum('moneyall');
        if (empty($all_static2)) {
            $all_static2 = 0;
        }
        $all_static3 = $all_static1 + $all_static2;
        $this->assign('all_static1', $all_static1);
        $this->assign('all_static2', $all_static2);
        $this->assign('all_static3', $all_static3);
        $timestart = $timenow - 86400 * 30;
        $timestart = strtotime(date("Y-m-d", $timestart));
        $wheretime['time'] = array('between', array($timestart, $timenow));
        $wtime = time();
        for ($i = 0; $i < 30; $i++) {
            $stime = date("Y-m-d", $wtime);
            $arr[$i]['time'] = $stime;
            $arr[$i]['paygold'] = $c->where(array('type' => $type1, 'time2' => $stime, $condition))->sum('moneyall');
            if (empty($arr[$i]['paygold'])) {
                $arr[$i]['paygold'] = 0;
            }
            $arr[$i]['goldcount'] = $c->where(array('type' => $type1, 'time2' => $stime, $condition))->count();
            if (empty($arr[$i]['goldcount'])) {
                $arr[$i]['goldcount'] = 0;
            }
            $arr[$i]['payvip'] = $c->where(array('type' => $type2, 'time2' => $stime, $condition))->sum('moneyall');
            if (empty($arr[$i]['payvip'])) {
                $arr[$i]['payvip'] = 0;
            }
            $arr[$i]['vipcount'] = $c->where(array('type' => $type2, 'time2' => $stime, $condition))->count();
            if (empty($arr[$i]['vipcount'])) {
                $arr[$i]['vipcount'] = 0;
            }
            $wtime = $wtime - 86400;
        }
        $this->assign('arr', $arr);
        $this->display();
    }
    public function people_static()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        $pc = M('peoplecount');
        $now = date("Y-m-d");
        if ($admin['level'] > 0) {
            $condition['aid'] = $_SESSION['aid'];
            $condition['lid'] = $_SESSION['aid'];
            $condition['_logic'] = 'OR';
        } else {
            $condition['n_peoplecount.id'] = array('neq', 0);
        }
        $today_people1 = $pc->where(array('time2' => $now, 'sex1' => 1, $condition))->count();
        if (empty($today_people1)) {
            $today_people1 = 0;
        }
        $today_people2 = $pc->where(array('time2' => $now, 'sex2' => 1, $condition))->count();
        if (empty($today_people2)) {
            $today_people2 = 0;
        }
        $today_people3 = $today_people1 + $today_people2;
        $this->assign('today_people1', $today_people1);
        $this->assign('today_people2', $today_people2);
        $this->assign('today_people3', $today_people3);
        $today_people_gz = $pc->join('n_user ON n_user.id = n_peoplecount.uid', 'LEFT')->where(array('time2' => $now, $condition, 'subscribe' => 2))->field('n_peoplecount.*,n_user.subscribe')->count();
        $today_people_ps = $pc->join('n_user ON n_user.id = n_peoplecount.uid', 'LEFT')->where(array('time2' => $now, $condition, 'paystatic' => 2))->field('n_peoplecount.*,n_user.paystatic')->count();
        $this->assign('today_people_gz', $today_people_gz);
        $this->assign('today_people_ps', $today_people_ps);
        $yestime = date("Y-m-d", time() - 86400);
        $yes_people1 = $pc->where(array('time2' => $yestime, 'sex1' => 1, $condition))->count();
        if (empty($yes_people1)) {
            $yes_people1 = 0;
        }
        $yes_people2 = $pc->where(array('time2' => $yestime, 'sex2' => 1, $condition))->count();
        if (empty($yes_people2)) {
            $yes_people2 = 0;
        }
        $yes_people3 = $yes_people1 + $yes_people2;
        $this->assign('yes_people1', $yes_people1);
        $this->assign('yes_people2', $yes_people2);
        $this->assign('yes_people3', $yes_people3);
        $yes_people_gz = $pc->join('n_user ON n_user.id = n_peoplecount.uid', 'LEFT')->where(array('time2' => $yestime, $condition, 'subscribe' => 2))->field('n_peoplecount.*,n_user.subscribe')->count();
        $yes_people_ps = $pc->join('n_user ON n_user.id = n_peoplecount.uid', 'LEFT')->where(array('time2' => $yestime, $condition, 'paystatic' => 2))->field('n_peoplecount.*,n_user.paystatic')->count();
        $this->assign('yes_people_gz', $yes_people_gz);
        $this->assign('yes_people_ps', $yes_people_ps);
        $month = strtotime(date("Y-m") . '-1');
        $timenow = time();
        $condition2['time'] = array('between', array($month, $timenow));
        $month_people1 = $pc->where(array($condition2, 'sex1' => 1, $condition))->count();
        if (empty($month_people1)) {
            $month_people1 = 0;
        }
        $month_people2 = $pc->where(array($condition2, 'sex2' => 1, $condition))->count();
        if (empty($month_people2)) {
            $month_people2 = 0;
        }
        $month_people3 = $month_people1 + $month_people2;
        $this->assign('month_people1', $month_people1);
        $this->assign('month_people2', $month_people2);
        $this->assign('month_people3', $month_people3);
        $month_people_gz = $pc->join('n_user ON n_user.id = n_peoplecount.uid', 'LEFT')->where(array($condition2, $condition, 'subscribe' => 2))->field('n_peoplecount.uid,n_user.subscribe')->count();
        $month_people_ps = $pc->join('n_user ON n_user.id = n_peoplecount.uid', 'LEFT')->where(array($condition2, $condition, 'paystatic' => 2))->field('n_peoplecount.uid,n_user.paystatic')->count();
        $this->assign('month_people_gz', $month_people_gz);
        $this->assign('month_people_ps', $month_people_ps);
        $all_people1 = $pc->where(array('sex1' => 1, $condition))->count();
        if (empty($all_people1)) {
            $all_people1 = 0;
        }
        $all_people2 = $pc->where(array('sex2' => 1, $condition))->count();
        if (empty($all_people2)) {
            $all_people2 = 0;
        }
        $all_people3 = $all_people1 + $all_people2;
        $this->assign('all_people1', $all_people1);
        $this->assign('all_people2', $all_people2);
        $this->assign('all_people3', $all_people3);
        $all_people_gz = $pc->join('n_user ON n_user.id = n_peoplecount.uid', 'LEFT')->where(array($condition, 'subscribe' => 2))->field('n_peoplecount.uid,n_user.subscribe')->count();
        if (empty($all_people_gz)) {
            $all_people_gz = 0;
        }
        $all_people_ps = $pc->join('n_user ON n_user.id = n_peoplecount.uid', 'LEFT')->where(array($condition, 'paystatic' => 2))->field('n_peoplecount.uid,n_user.paystatic')->count();
        if (empty($all_people_ps)) {
            $all_people_ps = 0;
        }
        $this->assign('all_people_gz', $all_people_gz);
        $this->assign('all_people_ps', $all_people_ps);
        $wtime = time();
        for ($i = 0; $i < 30; $i++) {
            $stime = date("Y-m-d", $wtime);
            $arr[$i]['time'] = $stime;
            $arr[$i]['join_man'] = $pc->where(array('time2' => $stime, 'sex1' => 1, $condition))->count();
            $arr[$i]['join_woman'] = $pc->where(array('time2' => $stime, 'sex2' => 1, $condition))->count();
            $arr[$i]['join_people'] = $arr[$i]['join_woman'] + $arr[$i]['join_man'];
            $arr[$i]['join_gz'] = $pc->join('n_user ON n_user.id = n_peoplecount.uid', 'LEFT')->where(array('time2' => $stime, $condition, 'subscribe' => 2))->field('n_peoplecount.uid,n_user.subscribe')->count();
            $arr[$i]['join_ps'] = $pc->join('n_user ON n_user.id = n_peoplecount.uid', 'LEFT')->where(array('time2' => $stime, $condition, 'paystatic' => 2))->field('n_peoplecount.uid,n_user.paystatic')->count();
            $wtime = $wtime - 86400;
        }
        $this->assign('arr', $arr);
        $this->display();
    }
    public function link_static()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        $l = M('links');
        if ($admin['level'] > 0) {
            $w['aid'] = $_SESSION['aid'];
        } else {
            $w['n_links.id'] = array('neq', 0);
        }
        $link = $l->join('n_book ON n_book.id = n_links.bid', 'LEFT')->join('n_bookinfo ON n_bookinfo.id = n_links.biid', 'LEFT')->join('n_admin ON n_links.aid = n_admin.id', 'LEFT')->where($w)->field('n_links.*,n_book.title,n_bookinfo.title2,n_bookinfo.number,n_admin.username')->select();
        $this->assign('link', $link);
        $this->display();
    }
    public function order_static()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $condition['n_chanrge.aid'] = $_SESSION['aid'];
            $condition['n_chanrge.lid'] = $_SESSION['aid'];
            $condition['_logic'] = 'OR';
        } else {
            $condition['n_chanrge.id'] = array('neq', 0);
        }
        $c = M('chanrge');
        if (!empty($_GET['time1']) && !empty($_GET['time2'])) {
            $time1 = strtotime($_GET['time1']);
            $time2 = strtotime($_GET['time2']);
            $map['_complex'] = $condition;
            $map['n_chanrge.time'] = array('between', array($time1, $time2));
            $chanrge = $c->join('n_admin ON n_chanrge.aid = n_admin.id', 'LEFT')->join('n_user ON n_chanrge.uid = n_user.id')->where($map)->field('n_chanrge.*,n_admin.nickname,n_user.nickname AS usernickname')->select();
        } else {
            $chanrge = $c->join('n_admin ON n_chanrge.aid = n_admin.id', 'LEFT')->join('n_user ON n_chanrge.uid = n_user.id')->where($condition)->field('n_chanrge.*,n_admin.nickname,n_user.nickname AS usernickname')->order('n_chanrge.time DESC')->select();
        }
        $this->assign('chanrge', $chanrge);
        $this->display();
    }
    public function book_static()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法使用此功能');
        }
        $b = M('book');
        $books = $b->where($w)->select();
        $now1 = strtotime(date("Y-m-d"));
        $now2 = time();
        $condition1['time'] = array('between', array($now1, $now2));
        $month = strtotime(date("Y-m") . '-1');
        $condition3['time'] = array('between', array($month, $now2));
        $l = M('links');
        foreach ($books as $k => $v) {
            $arr[$k]['id'] = $v['id'];
            $arr[$k]['img'] = $v['img'];
            $arr[$k]['title'] = $v['title'];
            $arr[$k]['name'] = $v['name'];
            $arr[$k]['num'] = $v['num'];
            $arr[$k]['today_pay'] = $l->where(array($condition1, 'bid' => $v['id']))->sum('pay') * 1;
            $arr[$k]['month_pay'] = $l->where(array($condition3, 'bid' => $v['id']))->sum('pay') * 1;
            $arr[$k]['all_pay'] = $l->where(array('bid' => $v['id']))->sum('pay') * 1;
        }
        $this->assign('arr', $arr);
        $this->display();
    }
    public function book_static_links()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法使用此功能');
        }
        $l = M('links');
        $link = $l->join('n_book ON n_book.id = n_links.bid', 'LEFT')->join('n_bookinfo ON n_bookinfo.id = n_links.biid', 'LEFT')->join('n_admin ON n_links.aid = n_admin.id', 'LEFT')->where(array('n_links.bid' => $_GET['bid']))->field('n_links.*,n_book.title,n_bookinfo.title2,n_bookinfo.number,n_admin.username')->select();
        $this->assign('link', $link);
        $this->display();
    }
    public function activity_list()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] < 2) {
            $wechat = $this->checkwechat();
            if (!$wechat) {
                $this->error('请先配置公众号设置');
            }
        }
        $po = M('promotion');
        $pro = $po->order('time2 DESC')->select();
        $this->assign('pro', $pro);
        $this->display();
    }
    public function add_activity_list()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法使用此功能');
        }
        $this->display();
    }
    public function do_add_activity_list()
    {
        $po = M('promotion');
        $pro = $po->where(array('st' => 2))->find();
        if ($pro) {
            $this->error('当前有在执行中的活动，请关闭后再试');
        } else {
            $w['time1'] = time();
            $w['time2'] = strtotime($_POST['time2']) + 85399;
            $w['p30'] = $_POST['p30'];
            $w['p50'] = $_POST['p50'];
            $w['p100'] = $_POST['p100'];
            $w['p200'] = $_POST['p200'];
            $w['pvip'] = $_POST['pvip'];
            $w['st'] = 2;
            $w['hname'] = $_POST['hname'];
            $i = $po->add($w);
            if ($i > 0) {
                $this->success('发起促销活动成功', U('Static/activity_list'));
            } else {
                $this->error('发起促销活动失败，请重试');
            }
        }
    }
    public function edit_reply_keywords()
    {
        $pr = M('promotion');
        $w['st'] = 1;
        $i = $pr->where(array('id' => $_GET['id']))->save($w);
        if ($i > 0) {
            $this->success('活动关闭成功');
        } else {
            $this->error('活动关闭失败，请重试');
        }
    }
    public function creatpaylinks()
    {
        $pr = M('promotion');
        $wt['time2'] = array('gt', time());
        $pro = $pr->where(array('st' => 2, 'id' => $_GET['id'], $wt))->find();
        if ($pro) {
            $pl = M('paylinks');
            $paylink = $pl->where(array('aid' => $_SESSION['aid'], 'pid' => $_GET['id']))->find();
            if ($paylink) {
                $this->ajaxReturn($paylink['url']);
            } else {
                $ad = M('admin');
                $admin = $ad->where(array('id' => $_SESSION['aid']))->find();
                $wc = M('wechat');
                if ($admin['level'] == '1') {
                    $wechat = $wc->where(array('aid' => $admin['id']))->find();
                } else {
                    $leaderadmin = $ad->where(array('id' => $admin['lid']))->find();
                    $wechat = $wc->where(array('aid' => $leaderadmin['id']))->find();
                }
                $w['url'] = 'http://' . $wechat['businessurl'] . '/Home/Index/recharge_promotion?pid=' . $_GET['id'] . '&share=' . $_SESSION['aid'];
                $w['aid'] = $_SESSION['aid'];
                $w['pid'] = $_GET['id'];
                $w['time'] = time();
                $i = $pl->add($w);
                if ($i > 0) {
                    $this->ajaxReturn($w['url']);
                } else {
                    $this->ajaxReturn(false);
                }
            }
        } else {
            $this->ajaxReturn(false);
        }
    }
    public function activity_list_static()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        $pl = M('paylinks');
        if ($admin['level'] == '0') {
            $paylinks = $pl->join('n_promotion ON n_paylinks.pid = n_promotion.id', 'LEFT')->group('n_paylinks.pid')->field('SUM(n_paylinks.pay) AS payme,SUM(n_paylinks.paynum) AS paynum,n_promotion.*')->select();
        } else {
            $paylinks = $pl->join('n_promotion ON n_paylinks.pid = n_promotion.id', 'LEFT')->where(array('aid' => $_SESSION['aid']))->field('n_paylinks.payme,n_paylinks.paynum,n_promotion.*')->order('n_promotion.time2 DESC')->select();
        }
        $this->assign('paylinks', $paylinks);
        $this->display();
    }
    public function checklogin()
    {
        if (empty($_SESSION['aid'])) {
            $this->redirect('Login/login');
        }
    }
    public function checkadmin()
    {
        $ad = M('admin');
        $admin = $ad->where(array('id' => $_SESSION['aid']))->find();
        return $admin;
    }
    public function checkwechat()
    {
        $wc = M('wechat');
        $wechat = $wc->where(array('aid' => $_SESSION['aid']))->find();
        return $wechat;
    }
}