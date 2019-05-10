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
        // PHP 中的 $_GET 和 $_POST 变量用于检索表单中的信息
        $w['username'] = $_POST['username'];
        $w['password'] = md5($_POST['password']);
 
        /**
         * ThinkPHP M方法 实例化一个基础模型类
         * M('[基础模型名:]模型名', '数据表前缀', '数据库连接信息')
         * ThinkPHP的数据表命名规范是全小写的格式
         * 
         * $user = M('admin') 等效于 $user = new Model('admin') 
         * 表示操作n_admin表
         *  
         */

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