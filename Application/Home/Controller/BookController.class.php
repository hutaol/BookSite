<?php
namespace Home\Controller;

use Think\Controller;
class BookController extends Controller
{
    public function book_type()
    {
    
     $tid=$_GET['tid'];
     $sex=$_GET['sex'];
     $state=$_GET['state'];

     if(!empty($tid))
     {
    
         $ww['tid']=$tid; 
     }

        $t = M('type');
        $b = M('book');
        $type = $t->order("id asc")->select();
        $wt['id']=$tid; 
        $typename = $t->where($wt)->find();

   if(!empty($tid) && !empty($sex) && !empty($state))
     {
    $w['tid'] =$tid;
    $w['sex'] =$sex;
    $w['state'] =$state;

     $booklist = $b->where($w)->join('n_type ON n_type.id = n_book.tid', 'LEFT')->field('n_book.*,n_type.name AS typetitle')->order('id desc')->limit(10)->select();
      $count = $b->field('id')->where($w)->order("id desc")->select();
         
     }elseif(!empty($tid) && !empty($sex))
     {

    $w['tid'] =$tid;
    $w['sex'] =$sex;

   $booklist = $b->where($w)->join('n_type ON n_type.id = n_book.tid', 'LEFT')->field('n_book.*,n_type.name AS typetitle')->order('id desc')->limit(10)->select();
      $count = $b->field('id')->where($w)->order("id desc")->select();

     }elseif(!empty($tid) && !empty($state))

     {
    $w['tid'] =$tid;
    $w['state'] =$state;

   $booklist = $b->where($w)->join('n_type ON n_type.id = n_book.tid', 'LEFT')->field('n_book.*,n_type.name AS typetitle')->order('id desc')->limit(10)->select();
      $count = $b->field('id')->where($w)->order("id desc")->select();

     }elseif(!empty($tid))

     {

    $w['tid'] =$tid;

   $booklist = $b->where($w)->join('n_type ON n_type.id = n_book.tid', 'LEFT')->field('n_book.*,n_type.name AS typetitle')->order('id desc')->limit(10)->select();
      $count = $b->where($w)->field('id')->order("id desc")->select();
     }
     elseif(!empty($sex))

     {
        $w['sex'] =$sex;
   $booklist = $b->where($w)->join('n_type ON n_type.id = n_book.tid', 'LEFT')->field('n_book.*,n_type.name AS typetitle')->order('id desc')->limit(10)->select();
      $count = $b->field('id')->where($w)->order("id desc")->select();
     }
     elseif(!empty($state))
     {
     $w['state'] =$state;
   $booklist = $b->where($w)->join('n_type ON n_type.id = n_book.tid', 'LEFT')->field('n_book.*,n_type.name AS typetitle')->order('id desc')->limit(10)->select();
      $count = $b->field('id')->where($w)->order("id desc")->select();
     }

     else

     {
       
$booklist = $b->join('n_type ON n_type.id = n_book.tid', 'LEFT')->field('n_book.*,n_type.name AS typetitle')->order('id desc')->limit(10)->select();

        $count = $b->field('id')->order("id desc")->select();

     }

      $total = ceil(count($count)/10);

        $this->assign('type', $type);
        $this->assign('typename', $typename);
        $this->assign('tid', $tid);
        $this->assign('sex', $sex);
        $this->assign('state', $state);
        $this->assign('total', $total);
        $this->assign('booklist', $booklist);
        $this->display();
    }

    public function book_typeajax()
    {


     $tid=$_GET['tid'];
     $sex=$_GET['sex'];
     $state=$_GET['state'];
     $page=$_GET['page'];

     if(!empty($tid))
     {
    
         $ww['tid']=$tid; 
     }

        $t = M('type');
        $b = M('book');
        $type = $t->order("id asc")->select();
        $wt['id']=$tid; 
        $typename = $t->where($wt)->find();

   if(!empty($tid) && !empty($sex) && !empty($state))
     {
    $w['tid'] =$tid;
    $w['sex'] =$sex;
    $w['state'] =$state;

     $booklist = $b->where($w)->join('n_type ON n_type.id = n_book.tid', 'LEFT')->field('n_book.*,n_type.name AS typetitle')->order('id desc')->page($page,10)->select();
    
         
     }elseif(!empty($tid) && !empty($sex))
     {

    $w['tid'] =$tid;
    $w['sex'] =$sex;

   $booklist = $b->where($w)->join('n_type ON n_type.id = n_book.tid', 'LEFT')->field('n_book.*,n_type.name AS typetitle')->order('id desc')->page($page,10)->select();

     }elseif(!empty($tid) && !empty($state))

     {
    $w['tid'] =$tid;
    $w['state'] =$state;

   $booklist = $b->where($w)->join('n_type ON n_type.id = n_book.tid', 'LEFT')->field('n_book.*,n_type.name AS typetitle')->order('id desc')->page($page,10)->select();
     

     }elseif(!empty($tid))

     {

    $w['tid'] =$tid;

   $booklist = $b->where($w)->join('n_type ON n_type.id = n_book.tid', 'LEFT')->field('n_book.*,n_type.name AS typetitle')->order('id desc')->page($page,10)->select();
    
     }
     elseif(!empty($sex))

     {
        $w['sex'] =$sex;
   $booklist = $b->where($w)->join('n_type ON n_type.id = n_book.tid', 'LEFT')->field('n_book.*,n_type.name AS typetitle')->order('id desc')->page($page,10)->select();
    
     }
     elseif(!empty($state))
     {
     $w['state'] =$state;
   $booklist = $b->where($w)->join('n_type ON n_type.id = n_book.tid', 'LEFT')->field('n_book.*,n_type.name AS typetitle')->order('id desc')->page($page,10)->select();
   
     }

     else

     {
       
$booklist = $b->join('n_type ON n_type.id = n_book.tid', 'LEFT')->field('n_book.*,n_type.name AS typetitle')->order('id desc')->page($page,10)->select();

     }


 foreach( $booklist as $rec) {

$html=$html."<a href='/Home/Book/bookinfo?bid".$rec['id']."&number=1'><div class='du'><img style='width:30%;float:left;' src='http://".$_SERVER['SERVER_NAME']."/Public/Uploads/book/".$rec['img']."'/><div class='du-div'><p style='font-size:16px;line-height:20px;'>".$rec['title']."</p> <p style='margin-top:5px;''>".$rec['typetitle']."</p><p style='margin-top:8px;line-height:20px;font-size:12px;color:#7c7b79;' class='du-p'>".mb_substr($rec['content'],0,60,'utf-8')."</p></div></div></a>";

   }
  echo $html; 

    }

    public function book_detail()
    {
        $b = M('book');
        $book = $b->where(array('id' => $_GET['bid']))->find();
        $this->assign('book', $book);
        $this->display();
    }

    public function book_list_v1()
    {
        $b = M('book');

        $books = $b->where($_GET)->select();
        $this->assign('books', $books);
        $this->display();


//        $b = M('book');
//        $books = $b->order('id ASC')->select();
//        $this->assign('books', $books);
//        $this->display();
    }

    public function book_list()
    {
        $t = M('type');
        $type = $t->where(array('id' => $_GET['tid']))->find();
        $this->assign('type', $type);
        $b = M('book');
        $books = $b->where(array('tid' => $_GET['tid']))->select();
        $this->assign('books', $books);
        $this->display();
    }
    public function book_list2()
    {
        $b = M('book');
        $books = $b->order('id ASC')->select();
        $this->assign('books', $books);
        $this->display();
    }
    public function book_hot()
    {
        $b = M('book');
        $books = $b->where(array('hot' => 2))->select();
        $this->assign('books', $books);
        $this->display();
    }
    public function book_search()
    {
        $b = M('book');
        $w['title'] = array('like', '%' . $_POST['keywords'] . '%');
        $books = $b->where($w)->select();
        $this->assign('books', $books);
        $this->display();
    }
    public function bookinfo_list()
    {
        $bi = M('bookinfo');
        $bookinfo = $bi->where(array('bid' => $_GET['bid']))->order('number ASC')->select();
        $this->assign('bookinfo', $bookinfo);
        $b = M('book');
        $book = $b->where(array('id' => $_GET['bid']))->field('title')->find();
        $this->assign('book', $book);
        $this->display();
    }
    public function bookinfo()
    {
        $_SESSION['jurl'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $u = M('user');
        $user = $u->where(array('id' => cookie('id')))->find();
        if (empty($user)) {
            $this->checklogin();
            die;
        } else {
            $_SESSION['id'] = $user['id'];
        }
        $this->checkvip();
        $bi = M('bookinfo');
        $bookinfo = $bi->where(array('bid' => $_GET['bid'], 'number' => $_GET['number']))->find();
        if (!$bookinfo) {
            $this->error('该章节不存在，请稍后再来');
        }
        $this->assign('bookinfo', $bookinfo);
        $nextnumber = $bookinfo['number'] + 1;
        $this->assign('nextnumber', $nextnumber);
        $b = M('book');
        $book = $b->where(array('id' => $bookinfo['bid']))->field('id,title,img')->find();
        $this->assign('book', $book);
        $u = M('user');
        if (!empty($_SESSION['id'])) {
            $user = $u->where(array('id' => $_SESSION['id']))->find();
            $this->assign('user', $user);
        }
        if (!empty($_GET['share'])) {
            $l = M('links');
            $link = $l->where(array('biid' => $bookinfo['id'], 'aid' => $_GET['share']))->find();
            if (!$link) {
                $this->error('该推广链接不存在，请重试');
            }
            $_SESSION['lid'] = $link['id'];
            $l->where(array('id' => $link['id']))->setInc('clicknum', 1);
            cookie('shareid', $_GET['share'], 86400);
            $lc = M('linkcount');
            $wlc['uid'] = $_SESSION['id'];
            $wlc['lid'] = $link['id'];
            $find = $lc->where($wlc)->find();
            if (!$find) {
                $ii = $lc->add($wlc);
                if ($ii > 0) {
                    $l->where(array('id' => $link['id']))->setInc('peoplenum', 1);
                }
            }
        }
        if ($bookinfo['number'] > 0) {
            $u = M('user');
            $user = $u->where(array('id' => cookie('id')))->find();
            if (empty($user)) {
                $_SESSION['jurl'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                $this->checklogin();
                die;
            } else {
                $_SESSION['id'] = $user['id'];
            }
            if (empty($user['shareid'])) {
                $shareid = cookie('shareid');
                if (!empty($shareid)) {
                    $wsh['shareid'] = $shareid;
                    $u->where(array('id' => $user['id']))->save($wsh);
                    $ad = M('admin');
                    $admin = $ad->where(array('id' => $shareid))->find();
                    $pc = M('peoplecount');
                    $wpc['aid'] = $shareid;
                    $wpc['uid'] = $user['id'];
                    $wpc['lid'] = $admin['lid'];
                    $wpc['time'] = time();
                    $wpc['time2'] = date("Y-m-d");
                    if ($user['sex'] == '1') {
                        $wpc['sex1'] = 1;
                        $wpc['sex2'] = 0;
                    } else {
                        $wpc['sex1'] = 0;
                        $wpc['sex2'] = 1;
                    }
                    $pc->add($wpc);
                }
            }
            $h = M('history');
            $w['uid'] = $_SESSION['id'];
            $his = $h->where($w)->find();
            if ($his) {
                $w2['biid'] = $book['id'];
                $w2['number'] = $bookinfo['number'];
                $w2['title'] = $book['title'];
                $w2['time'] = time();
                $h->where(array('id' => $his['id']))->save($w2);
            } else {
                $w['biid'] = $book['id'];
                $w['number'] = $bookinfo['number'];
                $w['title'] = $book['title'];
                $w['time'] = time();
                $h->add($w);
            }
        }
        if ($bookinfo['number'] == '10') {
            $res = $this->checkfollow();
            if ($res == '0') {
                $this->redirect('Index/qrshow');
            }
        }
        if ($bookinfo['pay'] == '2') {
            $u = M('user');
            $user = $u->where(array('id' => $_SESSION['id']))->find();
            if ($user['vip'] != '2') {
                $bo = M('buyorder');
                $wbo['biid'] = $bookinfo['id'];
                $wbo['uid'] = $user['id'];
                $countbo = $bo->where($wbo)->find();
                if (!$countbo) {
                    if ($bookinfo['gold'] > $user['gold']) {
                        $this->error('您的金币余额不足，正在跳转至充值页面...', U('Index/recharge', 2));
                    } else {
                        $payi = $u->where(array('id' => $user['id']))->setDec('gold', $bookinfo['gold']);
                        if ($payi < 1) {
                            $this->error('支付金币失败，请稍后重试');
                        } else {
                            $bo->add($wbo);
                        }
                    }
                }
            }
        }
        if (!empty($_GET['kid'])) {
            $kw = M('keywords');
            $kw->where(array('id' => $_GET['kid']))->setInc('clicknum', 1);
        }
        $this->display();
    }
    public function add_bookmark()
    {
        $this->checklogin();
        $bi = M('bookinfo');
        $bookinfo = $bi->where(array('id' => $_GET['id']))->find();
        $b = M('book');
        $book = $b->where(array('id' => $bookinfo['bid']))->find();
        $bm = M('bookmark');
        $w['uid'] = $_SESSION['id'];
        $w['biid'] = $book['id'];
        $w['title'] = $book['title'];
        $w['number'] = $bookinfo['number'];
        $w['time'] = time();
        $i = $bm->add($w);
        if ($i > 0) {
            $this->success('已将该章节添加至书签');
        } else {
            $this - error('添加书签失败，请重试');
        }
    }
    public function spare()
    {
        $u = M('user');
        $user = $u->where(array('id' => $_SESSION['id']))->find();
        if ($user['gold'] < $_GET['gold']) {
            $this->error('余额不足');
        } else {
            $u->where(array('id' => $_SESSION['id']))->setDec('gold', $_GET['gold']);
            $this->success('感谢您的打赏！');
        }
    }
    public function index1()
    {
        if (!empty($_GET['code'])) {
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
            $u = M('user');
            $user = $u->where(array('openid' => $user_obj['openid']))->find();
            if ($user) {
                $_SESSION['id'] = $user['id'];
                cookie('id', $user['id']);
            } else {
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
            header("Location:" . $_SESSION['jurl']);
        }
    }
    public function checklogin()
    {

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

        if (empty($_SESSION['id'])) {
            $id = cookie('id');
            if (empty($id)) {
                $wc = M('wechat');
                $wechat = $wc->where(array('weburl' => $_SERVER['HTTP_HOST']))->find();
                $appid = $wechat['appid'];
                $lenurl = 'http://' . $wechat['weburl'] . '/Home/Book/index1';
                $encurl = urlencode($lenurl);
                $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $appid . '&redirect_uri=' . $encurl . '&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
                header("Location:" . $url);
            } else {
                $_SESSION['id'] = $id;
            }
        }
    }
    public function checkfollow()
    {
        session_start();
        $wc = M('wechat');
        $wechat = $wc->where(array('weburl' => $_SERVER['HTTP_HOST']))->find();
        $appid = $wechat['appid'];
        $secret = $wechat['appsecret'];
        $get_info_url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $appid . '&secret=' . $secret;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $get_info_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $res = curl_exec($ch);
        curl_close($ch);
        $json_obj = json_decode($res, true);
        $token = $json_obj['access_token'];
        $u = M('user');
        $user = $u->where(array('id' => $_SESSION['id']))->find();
        $openid = $user['openid'];
        $get_info_url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=' . $token . '&openid=' . $openid . '&lang=zh_CN';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $get_info_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $res = curl_exec($ch);
        curl_close($ch);
        $json_obj = json_decode($res, true);
        if ($json_obj['subscribe'] == '0') {
            return 0;
        } else {
            $u = M('user');
            $user = $u->where(array('openid' => $json_obj['openid']))->find();
            if ($user['subscribe'] == '1') {
                $w['subscribe'] = 2;
                $u->where(array('openid' => $json_obj['openid']))->save($w);
            }
            return 1;
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
}