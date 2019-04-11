<?php
namespace Admin\Controller;

use Think\Controller;
class IndexController extends Controller
{
    public function index()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        $n = M('news');
        if ($admin['level'] == '1') {
            $w['show'] = array('neq', 2);
        } elseif ($admin['level'] == '2') {
            $w['show'] = array('neq', 1);
        } else {
            $w['show'] = array('neq', 3);
        }
        $news = $n->where($w)->order('time DESC')->select();
        $count = count($news);
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $news = array_slice($news, $Page->firstRow, $Page->listRows);
        $this->assign('page', $show);
        $this->assign('news', $news);
        $this->display();
    }
    public function showinfo()
    {
        $n = M('news');
        $new = $n->where(array('id' => $_GET['id']))->find();
        if ($new) {
            $this->ajaxReturn($new);
        } else {
            $new = 'error';
            $this->ajaxReturn($new);
        }
    }
    public function news_list()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法访问');
        }
        $n = M('news');
        $news = $n->order('time DESC')->select();
        $this->assign('news', $news);
        $this->display();
    }
    public function add_news()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法访问');
        }
        $this->display();
    }
    public function do_add_news()
    {
        if (empty($_POST['title']) || empty($_POST['content'])) {
            $this->error('内容填写不能为空');
        }
        $n = M('news');
        $w['title'] = $_POST['title'];
        $w['content'] = $_POST['content'];
        $w['time'] = time();
        $w['show'] = $_POST['show'];
        $i = $n->add($w);
        if ($i > 0) {
            $this->success('添加公告成功', U('Index/news_list'));
        } else {
            $this->error('添加公告失败，请重试');
        }
    }
    public function edit_news()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法访问');
        }
        $n = M('news');
        $news = $n->where(array('id' => $_GET['id']))->find();
        $this->assign('news', $news);
        $this->display();
    }
    public function do_edit_news()
    {
        $n = M('news');
        $w['title'] = $_POST['title'];
        $w['content'] = $_POST['content'];
        $i = $n->where(array('id' => $_POST['id']))->save($w);
        if ($i > 0) {
            $this->success('编辑成功', U('Index/news_list'));
        } else {
            $this->error('编辑失败，请重试');
        }
    }
    public function del_news()
    {
        $n = M('news');
        $i = $n->where(array('id' => $_GET['id']))->delete();
        if ($i > 0) {
            $this->success('删除成功', U('Index/news_list'));
        } else {
            $this->error('删除失败，请重试');
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
    public function show()
    {
        $a = $_SERVER['HTTP_HOST'];
        dump($a);
        die;
        $time = '1' < '0';
        dump($time);
    }
}