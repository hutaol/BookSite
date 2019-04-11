<?php
namespace Home\Controller;

use Think\Controller;
class UserController extends Controller
{
    public function center()
    {
        if ($_GET['id']) {
            $_SESSION['jumpurl'] = 'User/center';
        }
        $this->checklogin();
        $u = M('user');
        $user = $u->where(array('id' => $_SESSION['id']))->find();
        $this->assign('user', $user);
        $this->display();
    }
    public function search()
    {
        $this->checklogin();
        $this->display();
    }
    public function bookmark()
    {
        $this->checklogin();
        $bm = M('bookmark');
        $bookmark = $bm->where(array('uid' => $_SESSION['id']))->order('time DESC')->select();
        $this->assign('bookmark', $bookmark);
        $this->display();
    }
    public function del_bookmark()
    {
        $bm = M('bookmark');
        $i = $bm->where(array('id' => $_GET['id']))->delete();
        if ($i > 0) {
            $this->success('删除书签成功');
        } else {
            $this->error('删除书签失败，请重试');
        }
    }
    public function history()
    {
        if ($_GET['id']) {
            $_SESSION['jumpurl'] = 'User/history';
        }
        $this->checklogin();
        $h = M('history');
        $history = $h->where(array('uid' => $_SESSION['id']))->order('time DESC')->select();
        $this->assign('history', $history);
        $this->display();
    }
    public function del_history()
    {
        $bm = M('history');
        $i = $bm->where(array('id' => $_GET['id']))->delete();
        if ($i > 0) {
            $this->success('删除记录成功');
        } else {
            $this->error('删除记录失败，请重试');
        }
    }
    public function index1()
    {
        header("Content-type:text/html;charset=utf-8");
        if ($_GET['code']) {
            $wc = M('wechat');
            $wechat = $wc->where(array('weburl' => $_SERVER['HTTP_HOST']))->find();
            $appid = $wechat['appid'];
            $secret = $wechat['appsecret'];
            $code = $_GET["code"];
            $get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . $appid . '&secret=' . $secret . '&code=' . $code . '&grant_type=authorization_code';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $get_token_url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $res = curl_exec($ch);
            curl_close($ch);
            $json_obj = json_decode($res, true);
            $access_token = $json_obj['access_token'];
            $openid = $json_obj['openid'];
            $get_user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token=' . $access_token . '&openid=' . $openid . '&lang=zh_CN';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $get_user_info_url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $res = curl_exec($ch);
            curl_close($ch);
            $user_obj = json_decode($res, true);
            session_start();
            $_SESSION['nickname'] = $user_obj['nickname'];
            $u = M('user');
            $user = $u->where(array('openid' => $user_obj['openid']))->find();
            if ($user) {
                $_SESSION['id'] = $user['id'];
            } else {
                $w['openid'] = $user_obj['openid'];
                $w['nickname'] = $user_obj['nickname'];
                $w['img'] = $user_obj['headimgurl'];
                $w['gold'] = 0;
                $w['vip'] = 1;
                $uid = $u->add($w);
                $_SESSION['id'] = $uid;
            }
            if (!empty($_SESSION['jumpurl'])) {
                $jumpurl = $_SESSION['jumpurl'];
                unset($_SESSION['jumpurl']);
                $this->redirect($jumpurl);
            } else {
                $this->redirect('Index/index');
            }
        } else {
            $this->display();
        }
    }
    public function checklogin()
    {
        if (empty($_SESSION['id'])) {
            session_start();
            $wc = M('wechat');
            $wechat = $wc->where(array('weburl' => $_SERVER['HTTP_HOST']))->find();
            $appid = $wechat['appid'];
            $lenurl = 'http://' . $wechat['weburl'] . '/index.php/Home/Index/index1.html';
            $encurl = urlencode($lenurl);
            $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $appid . '&redirect_uri=' . $encurl . '&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
            header("Location:" . $url);
        }
    }
}