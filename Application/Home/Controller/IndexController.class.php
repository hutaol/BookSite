<?php
namespace Home\Controller;

use Think\Controller;
class IndexController extends Controller
{
    public function index()
    {

        if (!$this.checkWeChatAuth()) {
            $this.weChatLogin();

        }
        $this.checkVip();

        $u = M('user');
        $user = $u->where(array('id' => $_SESSION['id']))->find();
        $this->assign('nickname', $user['nickname']);
        $this->assign('img', $user['img']);

        $h = M('history');
        $history = $h->join('n_book ON n_book.id = n_history.biid', 'LEFT')->where(array('uid' => $user['id']))->field('n_history.*,n_book.title AS btitle')->order('time DESC')->limit(1)->select();
        $this->assign('history', $history);

        $this->queryIndexDataWithSex('1');

        $this->display();
    }

    public function index_female()
    {
        $this->queryIndexDataWithSex('2');

        $this->display();

    }

    public function queryIndexDataWithSex($sex = '1')
    {
        // 微信二维码
        $wc = M('wechat');
        $wechat = $wc->where(array('weburl' => $_SERVER['HTTP_HOST']))->find();
        $imgurl = 'http://open.weixin.qq.com/qr/code?username=' . $wechat['wxnumber'];
        $this->assign('imgurl', $imgurl);
        $this->assign('wxname', $wechat['wxnumber']);

        // 轮播图
        $banner = M('banner');
        $banners = $banner->where(array('type' => $sex))->limit(0, 4)->select();

        $this->assign('banners', $banners);

        $b = M('book');

        // 热门
        $bookhots = $b->where(array('hot' => 2, 'sex' => $sex))->limit(0, 6)->select();
        $this->assign('bookhots', $bookhots);

        // 推荐
        $bookeics = $b->where(array('eic' => 2, 'sex' => $sex))->limit(0, 6)->select();
        $this->assign('bookeics', $bookeics);

        // 精选 20
        $bookshows = $b->where(array('show' => 2, 'sex' => $sex))->limit(0, 20)->select();
        $this->assign('bookshows', $bookshows);

        //  本周新书  select * from n_book where time between current_date()-7 and sysdate()
        $bookweaks = $b->query("select * from __TABLE__ where time between current_date()-7 and sysdate() and sex = '" . $sex . "' LIMIT " . 6);

        $this->assign('bookweaks', $bookweaks);

    }

    public function qrshow()
    {
        $wc = M('wechat');
        $wechat = $wc->where(array('weburl' => $_SERVER['HTTP_HOST']))->find();
        $imgurl = 'http://open.weixin.qq.com/qr/code?username=' . $wechat['wxnumber'];
        $this->assign('imgurl', $imgurl);
        $this->assign('wxname', $wechat['wxnumber']);
        $this->display();
    }
    public function login()
    {
        session_start();
        $wc = M('wechat');
        $wechat = $wc->where(array('weburl' => $_SERVER['HTTP_HOST']))->find();
        $appid = $wechat['appid'];
        $encurl = urlencode($wechat['weburl']);
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $appid . '&redirect_uri=' . $encurl . '&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
        header("Location:" . $url);
    }
    public function recharge()
    {
        $buy = M('buy');
        $buys = $buy->where('id = 1')->find();
        $this->assign('buys', $buys);
        if ($_GET['id']) {
            $_SESSION['jumpurl'] = 'Index/recharge';
        }
        $this->checklogin();
        $u = M('user');
        $user = $u->where(array('id' => $_SESSION['id']))->find();
        $this->assign('user', $user);
        if (!empty($_GET['biid'])) {
            $_SESSION['biid'] = $_GET['biid'];
        }
        $pr = M('promotion');
        $prom = $pr->where(array('st' => 2))->find();
        $this->assign('prom', $prom);
        $this->display();
    }
    public function jumprecharge()
    {
        if ($_GET['pay'] == '30' || $_GET['pay'] == '50' || $_GET['pay'] == '100' || $_GET['pay'] == '200' || $_GET['pay'] == 'vip'|| $_GET['pay'] == 'vipjd') {
            $_SESSION['pay'] = $_GET['pay'];
            $binfo = $_SESSION['id'] . ',' . $_SESSION['pay'] . ',' . $_SESSION['lid'];
            $jumpurl = urlencode($_SERVER['HTTP_HOST']);
            $wc = M('wechat');
            $wechat = $wc->where(array('id' => 1))->find();
            $server = $wechat['weburl'];
            $url = 'http://' . $server . '/Home/Wx/jsapi?pay=' . $_SESSION['pay'] . '&jumpurl=' . $jumpurl . '&binfo=' . $binfo;
            header("Location:" . $url);
        } else {
            $this->error('数据异常，请重试');
        }
    }
    public function recharge_promotion()
    {
//        $this->checklogin();
        $pr = M('promotion');
        $prom = $pr->where(array('id' => $_GET['pid'], 'st' => 2))->find();
        if (!$prom) {
            $this->error('促销活动暂未开启');
        }
        $this->assign('prom', $prom);
        $_SESSION['pid'] = $_GET['pid'];
        $ad = M('admin');
        $admin = $ad->where(array('id' => $_GET['share']))->find();
        if (!$admin) {
            $this->error('推广人不存在，活动链接无效');
        }
        $_SESSION['lid'] = $admin['id'];
        $u = M('user');
        $user = $u->where(array('id' => $_SESSION['id']))->find();
        $this->assign('user', $user);
        $buy = M('buy');
        $buys = $buy->where('id = 1')->find();
        $this->assign('buys', $buys);
        $this->display();
    }
    public function jumprecharge2()
    {
        if ($_GET['pay'] == '30' || $_GET['pay'] == '50' || $_GET['pay'] == '100' || $_GET['pay'] == '200' || $_GET['pay'] == 'vip') {
            $_SESSION['pay'] = $_GET['pay'];
            $binfo = $_SESSION['id'] . ',' . $_SESSION['pay'] . ',' . $_SESSION['lid'] . ',' . $_SESSION['pid'];
            $jumpurl = urlencode($_SERVER['HTTP_HOST']);
            $wc = M('wechat');
            $wechat = $wc->where(array('id' => 1))->find();
            $server = $wechat['weburl'];
            $url = 'http://' . $server . '/Home/Wx/jsapi2?pay=' . $_SESSION['pay'] . '&jumpurl=' . $jumpurl . '&binfo=' . $binfo;
            header("Location:" . $url);
        } else {
            $this->error('数据异常，请重试');
        }
    }

    // 微信授权回调
    public function index1()
    {
        if ($_GET['code']) {
            $wc = M('wechat');
            $wechat = $wc->where(array('weburl' => $_SERVER['HTTP_HOST']))->find();
            $appid = $wechat['appid'];
            $secret = $wechat['appsecret'];
            $code = $_GET['code'];
            // 通过code换取网页授权access_token
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
            // 拉取用户信息(需scope为 snsapi_userinfo)
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
            $u = M('user');
            $user = $u->where(array('openid' => $user_obj['openid']))->find();
            if ($user) {
                $_SESSION['id'] = $user['id'];
                cookie('id', $user['id']);
            } else {
                // TODO token怎么保存
                $w['token'] = $access_token;
                $w['openid'] = $user_obj['openid'];
                $w['nickname'] = $user_obj['nickname'];
                $w['img'] = $user_obj['headimgurl'];
                $w['gold'] = 0;
                $w['vip'] = 1;
                $w['sex'] = $user_obj['sex'];
                $uid = $u->add($w);
                $_SESSION['id'] = $uid;
                cookie('id', $uid);
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

            if (C('CHECK_LOGIN') == '0') {
                $u = M('user');

                $w['openid'] = 'oiYLe0pszqZ3K2x9cV8TCrW9uHWo';
                $w['nickname'] = 'test';
                $w['img'] = 'http://thirdwx.qlogo.cn/mmopen/vi_32/6nUoyZqMVr2jKxQVbNFFaVzapWBpqzHicQux8oCd9ibxwtLeBamYHFF8WNFXPXVbfpEkKue5GZ4O9FL7cPyOeEiag/132';
                $w['gold'] = 0;
                $w['vip'] = 1;
                $w['sex'] = '1';
                $uid = $u->add($w);
                $_SESSION['id'] = $uid;
                cookie('id', $uid);
                $this->redirect('Index/index');

                return;
            }

            $wc = M('wechat');
            $wechat = $wc->where(array('weburl' => $_SERVER['HTTP_HOST']))->find();
            $appid = $wechat['appid'];
            echo($appid);
            $lenurl = 'http://' . $wechat['weburl'] . '/Home/Index/index1.html';
            $encurl = urlencode($lenurl);
            $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $appid . '&redirect_uri=' . $encurl . '&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
            header("Location:" . $url);
        }
    }
    public function checkvip()
    {
        $u = M('user');
        $user = $u->where(array('id' => $_SESSION['id']))->find();
        if ($user['vip'] == '2') {
            $now = time();
            if ($user['viptime'] < $now) {
                $w['vip'] = 1;
                $w['viptime'] = '';
                $u->where(array('id' => $user['id']))->save($w);
            }
        }
    }
    public function logout()
    {
        $_SESSION = array();
    }

 public function pb()
    {
   
   if (empty($_POST['pay']) || empty($_POST['tid']) || empty($_POST['bid']) || empty($_POST['number']) || empty($_POST['title2']) || empty($_POST['content'])) {
       echo "数据为空，无法提交";
        die();
       }

   
        
       $number=$_POST['number'];
       $tid=$_POST['tid'];  

        $bid= $_POST['bid'];
        $title2 = $_POST['title2'];
        $content = $_POST['content'];
        $pay = $_POST['pay'];
        $gold = $_POST['gold'];

/*

        $number='第24章 说好的暴击呢？';
         $tid='1';  
        $bid= '28';
        $title2 = '第十一章';
        $content = 'dfgdsfgsdfgsd';
        $pay = '0';
        $gold = '5';
   
    */ 

     //  $numberstr=cutstr_html($number);

        $numberstr=trim($number);
        $p = "%第(.+?)章%si";
        if(preg_match($p,$numberstr,$m))
        {
        $numberstr=$m[1];
        }
   

       $numberstr=preg_replace('/^0+/','',$numberstr);  //去掉前面所有的0

       $vowels = array("第", "几", "零", "章", "回", " ", "&nbsp;","〇","卷","节");

       $numberstr = str_replace($vowels, "",$numberstr);

       $numberstr = str_replace("两", "二",$numberstr);

  
    
    if(!is_numeric($numberstr))
    {
    $number=toarabia($numberstr);
   }else
   {
    $number=$numberstr;
   }

   $number=$number;


 //$number=toarabia($numberstr);

// if(!is_numeric($number))
   // {
       //  echo "章节不对";
       // die(); 
   // }
       
        $bookinfo="bookinfo";

        $bi = M($bookinfo);

       // $w['bid'] =$_POST['bid'];
       // $w['title2'] = array('like', '%' .$_POST['title2']. '%');
       // $count = $bi->where($w)->count();

        //$count = $bi->where(array('bid' => $_POST['bid'], 'number' => $number))->count();
        //if ($count > 0) {
          //  echo "该章节已存在，请重试";
          //  die();
       // }


        $w['tid'] = $tid;
        $w['bid'] = $bid;
        $w['title2'] = $title2;
        $w['content'] = $content;
        $w['pay'] = $pay;
        $w['gold'] = $gold;
        $w['number'] = $number;
        $w['time'] = time();

        $i = $bi->add($w);
        if ($i > 0) {
            $b = M('book');
            $b->where(array('id' => $_POST['bid']))->setInc('num', 1);
                    
                         echo "添加书籍章节成功";
                          die();
        } else {
             echo "添加书籍章节失败，请重试";
              die();
        }

    }
    
}