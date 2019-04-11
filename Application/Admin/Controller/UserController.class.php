<?php
namespace Admin\Controller;

use Think\Controller;
class UserController extends Controller
{
    public function manage_admin()
    {
        $this->checklogin();
        $ad = M('admin');
        $admin = $ad->where(array('id' => $_SESSION['aid']))->find();
        $this->assign('admin', $admin);
        if ($admin['level'] == '1') {
            $w['lid'] = $admin['id'];
        }
        if (!empty($_GET['st'])) {
            if ($_GET['st'] == '1') {
                $w['st'] = 1;
            } elseif ($_GET['st'] == '2') {
                $w['st'] = 2;
            }
        }
        $admins = $ad->where($w)->select();
        $this->assign('admins', $admins);
        $this->display();
    }
    public function add_admin()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 1) {
            $this->error('权限不足，无法访问');
        }
        $this->display();
    }
    public function do_add_admin()
    {
        if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['nickname']) || empty($_POST['email']) || empty($_POST['tel']) || empty($_POST['pro']) || empty($_POST['cardtype']) || empty($_POST['carduser']) || empty($_POST['cardnumber']) || empty($_POST['eva'])) {
            $this->error('提交数据不能为空');
        }
        $pro = $_POST['pro'] * 1;
        if ($pro > 1) {
            $this->error('分成比例不能大于1');
        }
        $ad = M('admin');
        $admin = $ad->where(array('id' => $_SESSION['aid']))->find();
        switch ($admin['level']) {
            case '0':
                $level = 1;
                break;
            case '1':
                $level = 2;
                break;
        }
        $w['level'] = $level;
        $w['username'] = $_POST['username'];
        $w['password'] = md5($_POST['password']);
        $w['nickname'] = $_POST['nickname'];
        $w['email'] = $_POST['email'];
        $w['tel'] = $_POST['tel'];
        $w['pro'] = $pro;
        $w['eva'] = $_POST['eva'];
        $w['remark'] = $_POST['remark'];
        $w['time'] = time();
        $w['cardbank'] = $_POST['cardbank'];
        $w['lid'] = $admin['id'];
        if ($_POST['cardtype'] == '银行卡') {
            $w['carduser'] = $_POST['carduser'][0];
            $w['cardnumber'] = $_POST['cardnumber'][0];
        } elseif ($_POST['cardtype'] == '支付宝') {
            $w['carduser'] = $_POST['carduser'][1];
            $w['cardnumber'] = $_POST['cardnumber'][1];
        } elseif ($_POST['cardtype'] == '微信') {
            $w['carduser'] = $_POST['carduser'][2];
            $w['cardnumber'] = $_POST['cardnumber'][2];
        }
        $w['cardtype'] = $_POST['cardtype'];
        $i = $ad->add($w);
        if ($i > 0) {
            $this->success('添加下级代理成功');
        } else {
            $this->error('添加下级代理失败，请重试');
        }
    }
    public function edit_admin()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 1) {
            $this->error('权限不足，无法访问');
        }
        $ad = M('admin');
        $admin = $ad->where(array('id' => $_SESSION['aid']))->find();
        if ($admin['level'] > 0) {
            $user = $ad->where(array('id' => $_GET['id']))->find();
            if ($user['lid'] != $admin['id']) {
                $this->error('权限不足，无法访问');
            }
        }
        $user = $ad->where(array('id' => $_GET['id']))->find();
        $this->assign('user', $user);
        $this->display();
    }
    public function do_edit_admin()
    {
        if (empty($_POST['nickname']) || empty($_POST['email']) || empty($_POST['tel']) || empty($_POST['pro']) || empty($_POST['cardtype']) || empty($_POST['carduser']) || empty($_POST['cardnumber']) || empty($_POST['eva'])) {
            $this->error('提交数据不能为空');
        }
        $pro = $_POST['pro'] * 1;
        if ($pro > 1) {
            $this->error('分成比例不能大于1');
        }
        $ad = M('admin');
        if (!empty($_POST['password'])) {
            $w['password'] = md5($_POST['password']);
        }
        $w['nickname'] = $_POST['nickname'];
        $w['email'] = $_POST['email'];
        $w['tel'] = $_POST['tel'];
        $w['pro'] = $pro;
        $w['eva'] = $_POST['eva'];
        $w['remark'] = $_POST['remark'];
        $w['cardbank'] = $_POST['cardbank'];
        if ($_POST['cardtype'] == '银行卡') {
            $w['carduser'] = $_POST['carduser'][0];
            $w['cardnumber'] = $_POST['cardnumber'][0];
        } elseif ($_POST['cardtype'] == '支付宝') {
            $w['carduser'] = $_POST['carduser'][1];
            $w['cardnumber'] = $_POST['cardnumber'][1];
        } elseif ($_POST['cardtype'] == '微信') {
            $w['carduser'] = $_POST['carduser'][2];
            $w['cardnumber'] = $_POST['cardnumber'][2];
        }
        $w['cardtype'] = $_POST['cardtype'];
        $i = $ad->where(array('id' => $_POST['id']))->save($w);
        if ($i > 0) {
            $this->success('编辑下级代理资料成功');
        } else {
            $this->error('编辑下级代理资料失败，请重试');
        }
    }
    public function edit_st()
    {
        $ad = M('admin');
        $admin = $ad->where(array('id' => $_GET['id']))->find();
        if ($admin['st'] == '1') {
            $w['st'] = 2;
        } else {
            $w['st'] = 1;
        }
        $i = $ad->where(array('id' => $_GET['id']))->save($w);
        if ($i > 0) {
            $this->success('修改禁用状态成功');
        } else {
            $this->error('修改禁用状态失败，请重试');
        }
    }
    public function mydeposit()
    {
        $this->checklogin();
        $c = M('chanrge');
        $d = M('deposit');
        $total1 = $c->where(array('aid' => $_SESSION['aid']))->sum('moneyadmin') * 1;
        $total2 = $c->where(array('aid' => $_SESSION['aid']))->sum('moneyall') * 1;
        $total3 = $d->where(array('aid' => $_SESSION['aid'], 'st' => 1))->sum('tgold') * 1;
        $total4 = $d->where(array('aid' => $_SESSION['aid'], 'st' => 2))->sum('tgold') * 1;
        $this->assign('total1', $total1);
        $this->assign('total2', $total2);
        $this->assign('total3', $total3);
        $this->assign('total4', $total4);
        $ad = M('admin');
        $admin = $ad->where(array('id' => $_SESSION['aid']))->find();
        $this->assign('admin', $admin);
        if ($_GET['st'] == '2') {
            $ww['st'] = 2;
        } else {
            $ww['st'] = 1;
        }
        $this->assign('st', $ww['st']);
        $ww['aid'] = $_SESSION['aid'];
        $deposit = $d->where($ww)->field('time,st,strtime,pro,sum(tgold) AS ttgold,count(id) AS count')->group('strtime')->order('time DESC')->select();
        $this->assign('deposit', $deposit);
        $this->display();
    }
    public function dodeposit()
    {
        $this->checklogin();
        $ad = M('admin');
        $admin = $ad->where(array('id' => $_SESSION['aid']))->find();
        $this->assign('admin', $admin);
        $this->display();
    }
    public function doing_deposit()
    {
        $this->checklogin();
        $ad = M('admin');
        $admin = $ad->where(array('id' => $_SESSION['aid']))->find();
        if ($_POST['tgold'] > $admin['gold']) {
            $this->error('余额不足，无法提现');
        }
        $d = M('deposit');
        $w['aid'] = $admin['id'];
        $w['lid'] = $admin['lid'];
        $w['tgold'] = $_POST['tgold'];
        $w['time'] = time();
        $w['cardtype'] = $admin['cardtype'];
        $w['carduser'] = $admin['carduser'];
        $w['cardnumber'] = $admin['cardnumber'];
        $w['cardbank'] = $admin['cardbank'];
        $w['pro'] = $admin['pro'];
        $w['st'] = 1;
        $w['strtime'] = date("Y-m-d");
        $i = $d->add($w);
        if ($i > 0) {
            $ad->where(array('id' => $admin['id']))->setDec('gold', $_POST['tgold']);
            $this->success('提现申请成功，请耐心等待审核');
        } else {
            $this->error('提现申请失败，请重试');
        }
    }
    public function deposit_list()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 1) {
            $this->error('权限不足，无法访问');
        }
        $c = M('chanrge');
        $w['lid'] = $_SESSION['aid'];
        $ww['n_deposit.lid'] = $w['lid'];
        $cmoneyall = $c->where($w)->sum('moneyall');
        $cmoneyadmin = $c->where($w)->sum('moneyadmin');
        $cmoneyleader = $cmoneyall - $cmoneyadmin;
        $this->assign('cmoneyall', $cmoneyall);
        $this->assign('cmoneyadmin', $cmoneyadmin);
        $this->assign('cmoneyleader', $cmoneyleader);
        $chanrgecount = $c->where($w)->count();
        $this->assign('chanrgecount', $chanrgecount);
        $d = M('deposit');
        $tgold1 = $d->where(array('lid' => $_SESSION['aid'], 'st' => 1))->sum('tgold');
        if (empty($tgold1)) {
            $tgold1 = 0;
        }
        $tgold2 = $d->where(array('lid' => $_SESSION['aid'], 'st' => 2))->sum('tgold');
        if (empty($tgold2)) {
            $tgold2 = 0;
        }
        $tgold3 = $cmoneyadmin - $tgold1 - $tgold2;
        $this->assign('tgold1', $tgold1);
        $this->assign('tgold2', $tgold2);
        $this->assign('tgold3', $tgold3);
        if (!empty($_GET['time1']) && !empty($_GET['time2'])) {
            $time1 = strtotime($_GET['time1']);
            $time2 = strtotime($_GET['time2']) + 86390;
            $ww['n_deposit.time'] = array('between', array($time1, $time2));
        }
        if ($_GET['st'] == '2') {
            $ww['n_deposit.st'] = 2;
        } else {
            $ww['n_deposit.st'] = 1;
        }
        $this->assign('st', $ww['n_deposit.st']);
        $deposit = $d->join('n_admin ON n_deposit.aid = n_admin.id', 'LEFT')->where($ww)->field('n_admin.username,n_deposit.*')->select();
        $this->assign('deposit', $deposit);
        $this->display();
    }
    public function do_deposit_list()
    {
        $d = M('deposit');
        $w['st'] = 2;
        $i = $d->where(array('id' => $_GET['id']))->save($w);
        if ($i > 0) {
            $this->success('提现状态修改成功');
        } else {
            $this->error('提现状态修改失败，请重试');
        }
    }
    public function deposit_record()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if (!empty($_GET['time1']) && !empty($_GET['time2'])) {
            $time1 = strtotime($_GET['time1']);
            $time2 = strtotime($_GET['time2']) + 86390;
            $ww['time'] = array('between', array($time1, $time2));
        }
        $ww['aid'] = $_SESSION['aid'];
        $d = M('deposit');
        $deposit = $d->where($ww)->order('time DESC')->select();
        $this->assign('deposit', $deposit);
        $this->display();
    }
    public function admin_change_list()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法访问');
        }
        $ad = M('admin');
        $admins = $ad->where(array('level' => 1))->field('id,username')->select();
        $c = M('chanrge');
        foreach ($admins as $k => $v) {
            $condition['aid'] = $v['id'];
            $condition['lid'] = $v['id'];
            $condition['_logic'] = 'OR';
            $arr[$k]['username'] = $v['username'];
            $yestime = date("Y-m-d", time() - 86400);
            $arr[$k]['yes_static'] = $c->where(array('time2' => $yestime, $condition))->sum('moneyall');
            if (empty($arr[$k]['yes_static'])) {
                $arr[$k]['yes_static'] = 0;
            }
            $month = strtotime(date("Y-m") . '-1');
            $timenow = time();
            $condition2['time'] = array('between', array($month, $timenow));
            $arr[$k]['month_static'] = $c->where(array($condition2, $condition))->sum('moneyall');
            if (empty($arr[$k]['month_static'])) {
                $arr[$k]['month_static'] = 0;
            }
            $arr[$k]['all_static'] = $c->where(array($condition))->sum('moneyall');
            if (empty($arr[$k]['all_static'])) {
                $arr[$k]['all_static'] = 0;
            }
            $yes_profit1 = $c->where(array('time2' => $yestime, 'aid' => $v['id']))->sum('moneyadmin');
            $yes_profit2 = $c->where(array('time2' => $yestime, 'lid' => $v['id']))->sum('moneyleader');
            $arr[$k]['yes_profit'] = $yes_profit1 + $yes_profit2;
            $arr[$k]['yes_fenprofit'] = $yes_profit2 * 1;
            $month_profit1 = $c->where(array($condition2, 'aid' => $v['id']))->sum('moneyadmin');
            $month_profit2 = $c->where(array($condition2, 'lid' => $v['id']))->sum('moneyleader');
            $arr[$k]['month_profit'] = $month_profit1 + $month_profit2;
            $arr[$k]['month_fenprofit'] = $month_profit2 * 1;
            $all_profit1 = $c->where(array('aid' => $v['id']))->sum('moneyadmin');
            $all_profit2 = $c->where(array('lid' => $v['id']))->sum('moneyleader');
            $arr[$k]['all_profit'] = $all_profit1 + $all_profit2;
            $arr[$k]['all_fenprofit'] = $all_profit2 * 1;
        }
        $this->assign('arr', $arr);
        $this->display();
    }
    public function admin_change_list2()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法访问');
        }
        $ad = M('admin');
        $admins = $ad->where(array('level' => 2))->field('id,username')->select();
        $c = M('chanrge');
        foreach ($admins as $k => $v) {
            $condition['aid'] = $v['id'];
            $arr[$k]['username'] = $v['username'];
            $yestime = date("Y-m-d", time() - 86400);
            $arr[$k]['yes_static'] = $c->where(array('time2' => $yestime, $condition))->sum('moneyall');
            if (empty($arr[$k]['yes_static'])) {
                $arr[$k]['yes_static'] = 0;
            }
            $month = strtotime(date("Y-m") . '-1');
            $timenow = time();
            $condition2['time'] = array('between', array($month, $timenow));
            $arr[$k]['month_static'] = $c->where(array($condition2, $condition))->sum('moneyall');
            if (empty($arr[$k]['month_static'])) {
                $arr[$k]['month_static'] = 0;
            }
            $arr[$k]['all_static'] = $c->where(array($condition))->sum('moneyall');
            if (empty($arr[$k]['all_static'])) {
                $arr[$k]['all_static'] = 0;
            }
            $yes_profit1 = $c->where(array('time2' => $yestime, 'aid' => $v['id']))->sum('moneyadmin');
            $arr[$k]['yes_fenprofit'] = $yes_profit1 * 1;
            $month_profit1 = $c->where(array($condition2, 'aid' => $v['id']))->sum('moneyadmin');
            $arr[$k]['month_fenprofit'] = $month_profit1 * 1;
            $all_profit1 = $c->where(array('aid' => $v['id']))->sum('moneyadmin');
            $arr[$k]['all_fenprofit'] = $all_profit1 * 1;
        }
        $this->assign('arr', $arr);
        $this->display();
    }
    public function admin_fenchange()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法访问');
        }
        $ad = M('admin');
        $admins = $ad->where(array('level' => 2))->field('id,username,lid')->select();
        $c = M('chanrge');
        foreach ($admins as $k => $v) {
            $condition['lid'] = $v['id'];
            $leader = $ad->where(array('id' => $v['lid']))->field('username')->find();
            $arr[$k]['username'] = $leader['username'];
            $yestime = date("Y-m-d", time() - 86400);
            $now = date("Y-m-d");
            $month = strtotime(date("Y-m") . '-1');
            $timenow = time();
            $condition2['time'] = array('between', array($month, $timenow));
            $yes_profit1 = $c->where(array('time2' => $yestime, $condition))->sum('moneyadmin');
            $arr[$k]['yes_fenprofit'] = $yes_profit1 * 1;
            $today_profit1 = $c->where(array('time2' => $now, $condition))->sum('moneyadmin');
            $arr[$k]['today_fenprofit'] = $today_profit1 * 1;
            $month_profit1 = $c->where(array($condition2, $condition))->sum('moneyadmin');
            $arr[$k]['month_fenprofit'] = $month_profit1 * 1;
            $all_profit1 = $c->where(array($condition))->sum('moneyadmin');
            $arr[$k]['all_fenprofit'] = $all_profit1 * 1;
        }
        $this->assign('arr', $arr);
        $this->display();
    }
    public function do_all_deposit()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法访问');
        }
        $ad = M('admin');
        $wd['gold'] = array('gt', 199);
        $wd['level'] = 1;
        $admins = $ad->where($wd)->select();
        $d = M('deposit');
        foreach ($admins as $k => $v) {
            $w['aid'] = $v['id'];
            $w['lid'] = $v['lid'];
            $w['tgold'] = $v['gold'];
            $w['time'] = time();
            $w['cardtype'] = $v['cardtype'];
            $w['carduser'] = $v['carduser'];
            $w['cardnumber'] = $v['cardnumber'];
            $w['cardbank'] = $v['cardbank'];
            $w['pro'] = $v['pro'];
            $w['st'] = 1;
            $w['strtime'] = date("Y-m-d");
            $i = $d->add($w);
            if ($i > 0) {
                $ad->where(array('id' => $v['id']))->setDec('gold', $w['tgold']);
            }
        }
        $this->success('一键提现执行成功');
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
}