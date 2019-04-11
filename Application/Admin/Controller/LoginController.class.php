<?php
namespace Admin\Controller;

use Think\Controller;
class LoginController extends Controller
{
    public function login()
    {
        $this->display();
    }
    public function doLogin()
    {
        $w['username'] = $_POST['username'];
        $w['password'] = md5($_POST['password']);
        $m = M('admin');
        $i = $m->where($w)->count();
        if ($i == 0) {
            $this->error('用户名或密码错误');
        } else {
            $arr = $m->where($w)->find();
            $_SESSION['aid'] = $arr['id'];
            $this->redirect('Admin/Index/index');
        }
    }
    public function logout()
    {
        $_SESSION = array();
        $this->success('成功退出，正在跳转请稍后...', U('Admin/Login/login'));
    }
}