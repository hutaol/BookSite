<?php
namespace Admin\Controller;

use Think\Controller;
class WechatController extends Controller
{
    public function set_signal()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 1) {
            $this->error('权限不足，无法访问');
        }
        $wc = M('wechat');
        $wechat = $wc->where(array('aid' => $_SESSION['aid']))->find();
        $this->assign('wechat', $wechat);
        $this->display();
    }
    public function do_set_signal()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 1) {
            $this->error('权限不足，无法访问');
        }
        $we = M('wechat');
        $oldwechat = $we->where(array('aid' => $_SESSION['aid']))->find();
        if ($oldwechat) {
            $w['appid'] = $_POST['appid'];
            $w['appsecret'] = $_POST['appsecret'];
            $w['oldid'] = $_POST['oldid'];
            $w['wxnumber'] = $_POST['wxnumber'];
            $w['wxnickname'] = $_POST['wxnickname'];
            $i = $we->where(array('id' => $oldwechat['id']))->save($w);
            if ($i > 0) {
                $this->success('参数修改成功');
            } else {
                $this->error('参数修改失败，请重试');
            }
        } else {
            $web = M('web');
            $newweb = $web->find();
            if (!$newweb) {
                $this->error('域名库数量不足，请稍后再试');
            }
            $w['aid'] = $_SESSION['aid'];
            $w['appid'] = $_POST['appid'];
            $w['appsecret'] = $_POST['appsecret'];
            $w['oldid'] = $_POST['oldid'];
            $w['wxnumber'] = $_POST['wxnumber'];
            $w['wxnickname'] = $_POST['wxnickname'];
            $w['businessurl'] = $newweb['url'];
            $w['jsurl'] = $newweb['url'];
            $w['weburl'] = $newweb['url'];
            $w['serurl'] = 'http://' . $newweb['url'] . '/Home/WeChat/index?id=' . $w['aid'];
            $w['token'] = 'nC82mFe8lLie4rfZeCTCe4F4CLLWgt4n';
            $i = $we->add($w);
            if ($i > 0) {
                $web->where(array('id' => $newweb['id']))->delete();
                $this->success('保存成功', U('Wechat/join_signal'));
            } else {
                $this->error('生成接入参数失败，请重试');
            }
        }
    }
    public function join_signal()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 1) {
            $this->error('权限不足，无法访问');
        }
        $we = M('wechat');
        $wechat = $we->where(array('aid' => $_SESSION['aid']))->find();
        $this->assign('wechat', $wechat);
        $this->display();
    }
    public function reply_keywords()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 1) {
            $this->error('权限不足，无法访问');
        }
        $we = M('wechat');
        $wechat = $we->where(array('aid' => $_SESSION['aid']))->find();
        if (!$wechat) {
            $this->error('公众号参数尚未配置，请配置后重试');
        }
        $b = M('book');
        $book = $b->select();
        $this->assign('book', $book);
        $kw = M('keywords');
        $keywords = $kw->join('n_bookinfo ON n_bookinfo.id = n_keywords.biid', 'LEFT')->join('n_book ON n_book.id = n_bookinfo.bid', 'LEFT')->where(array('n_keywords.aid' => $_SESSION['aid']))->field('n_keywords.*,n_bookinfo.title2,n_bookinfo.number,n_book.title')->select();
        $this->assign('keywords', $keywords);
        $this->display();
    }
    public function del_reply_keywords()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $kw = M('keywords');
        $keywords = $kw->where(array('aid' => $_SESSION['aid'], 'id' => $_GET['id']))->find();
        if ($keywords) {
            $kw->where(array('id' => $_GET['id']))->delete();
            $this->success('删除成功');
        } else {
            $this->error('删除失败，请稍后再试');
        }
    }
    public function selectbookinfo()
    {
        $bi = M('bookinfo');
        $bookinfo = $bi->where(array('bid' => $_GET['bid']))->order('number ASC')->select();
        if ($bookinfo) {
            $this->ajaxReturn($bookinfo);
        } else {
            $bookinfo = 'error';
            $this->ajaxReturn($bookinfo);
        }
    }
    public function add_reply_keywords()
    {
        $this->checklogin();
        $wc = M('wechat');
        $wechat = $wc->where(array('aid' => $_SESSION['aid']))->find();
        if (!$wechat) {
            $this->error('请先配置微信公众号');
        }
        $bi = M('bookinfo');
        $bookinfo = $bi->where(array('id' => $_POST['biid']))->find();
        $kw = M('keywords');
        $w['aid'] = $_SESSION['aid'];
        $w['biid'] = $_POST['biid'];
        $w['bid'] = $bookinfo['bid'];
        $w['wxid'] = $wechat['id'];
        $w['keyword'] = $_POST['keyword'];
        $w['clicknum'] = 0;
        $i = $kw->add($w);
        if ($i > 0) {
            $this->success('关键字回复设置成功');
        } else {
            $this->error('关键字回复设置失败，请重试');
        }
    }
    public function add_web()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法访问');
        }
        $wb = M('web');
        $count = $wb->count();
        if (!$count) {
            $count = 0;
        }
        $this->assign('count', $count);
        $this->display();
    }
    public function do_add_web()
    {
        $wb = M('web');
        $web = $wb->where(array('url' => $_POST['url']))->find();
        if ($web) {
            $this->error('该域名已被添加，请更换后重试');
        } else {
            $w['url'] = $_POST['url'];
            $i = $wb->add($w);
            if ($i > 0) {
                $this->success('域名添加成功');
            } else {
                $this->error('域名添加失败，请重试');
            }
        }
    }
    public function edit_cut()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法访问');
        }
        $cu = M('cut');
        $cut = $cu->where(array('id' => 1))->find();
        $this->assign('cut', $cut);
        $this->display();
    }
    public function do_edit_cut()
    {
        $cu = M('cut');
        $w['number'] = $_POST['number'];
        $i = $cu->where(array('id' => 1))->save($w);
        if ($i > 0) {
            $this->success('修改成功');
        } else {
            $this->error('修改失败，请重试');
        }
    }
    public function cut_list()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法访问');
        }
        $cc = M('chanrgecut');
        $chanrgecut = $cc->join('n_admin ON n_chanrgecut.aid = n_admin.id', 'LEFT')->field('n_admin.username,n_chanrgecut.*')->order('n_chanrgecut.time DESC')->select();
        $this->assign('chanrgecut', $chanrgecut);
        $this->display();
    }
    public function repassword()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法访问');
        }
        $this->display();
    }
    public function do_repassword()
    {
        if ($_POST['pwd1'] != $_POST['pwd2']) {
            $this->error('两次输入密码不一致');
        }
        $w['password'] = md5($_POST['pwd1']);
        $ad = M('admin');
        $i = $ad->where(array('id' => $_SESSION['aid']))->save($w);
        if ($i > 0) {
            $this->success('密码修改成功');
        } else {
            $this->error('密码修改失败，请重试');
        }
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