<?php
namespace Admin\Controller;

use Think\Controller;
class BookController extends Controller
{
    public function add_book()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法访问');
        }
        $t = M('type');
        $type = $t->select();
        $this->assign('type', $type);
        $this->display();
    }
    public function edit_book()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法访问');
        }
        $t = M('type');
        $type = $t->select();
        $this->assign('type', $type);
        $b = M('book');
        $book = $b->where(array('id' => $_GET['id']))->find();
        $this->assign('book', $book);
        $this->display();
    }
    public function edit_book_chanrge()
    {
        $bi = M('bookinfo');
        $w['gold'] = $_POST['gold'];
        if($_POST['gold']==0)
        {
             $w['pay'] =1;
        }else
        {
           $w['pay'] = 2;
        }
      
     
   
        foreach ($_POST['arr_biid'] as $k => $v) {
            $bi->where(array('id' => $v))->save($w);
        }
      
      
      
        $this->success('批量修改收费成功');
    }
    public function do_add_book()
    {
        if (empty($_POST['tid']) || empty($_POST['title'])) {
            $this->error('内容提交不能为空');
        }
        $upload = new \Think\Upload();
        $upload->maxSize = 4194304;
        $upload->exts = array('jpg', 'png', 'jpeg');
        $upload->rootPath = "./Public/Uploads/book/";
        $upload->savePath = '';
        $upload->autoSub = false;
        $info = $upload->upload();
        if (!$info) {
            $this->error($upload->getError());
        }
        $t = M('type');
        $type = $t->where(array('id' => $_POST['tid']))->find();
        $w['name'] = $type['name'];
        $w['tid'] = $_POST['tid'];
        $w['title'] = $_POST['title'];
        $w['img'] = $info['img']['savename'];
        $w['content'] = $_POST['content'];
        $w['sex'] = $_POST['sex'];
        $w['state'] = $_POST['state'];
        $b = M('book');
        $i = $b->add($w);
        if ($i > 0) {
            $this->success('添加书籍成功');
        } else {
            $this->error('添加书籍失败，请重试');
        }
    }
    public function do_edit_book()
    {
        if (empty($_POST['tid']) || empty($_POST['title'])) {
            $this->error('内容提交不能为空');
        }
        $upload = new \Think\Upload();
        $upload->maxSize = 4194304;
        $upload->exts = array('jpg', 'png', 'jpeg');
        $upload->rootPath = "./Public/Uploads/book/";
        $upload->savePath = '';
        $upload->autoSub = false;
        $info = $upload->upload();
        if (!$info) {
            $w['img'] = $_POST['showimg'];
        } else {
            $w['img'] = $info['img']['savename'];
        }
        $t = M('type');
        $type = $t->where(array('id' => $_POST['tid']))->find();
        $w['name'] = $type['name'];
        $w['tid'] = $_POST['tid'];
        $w['title'] = $_POST['title'];
        $w['content'] = $_POST['content'];
        $w['sex'] = $_POST['sex'];
         $w['state'] = $_POST['state'];
        $b = M('book');
        $i = $b->where(array('id' => $_POST['id']))->save($w);
        if ($i > 0) {
            $this->success('编辑书籍成功');
        } else {
            $this->error('编辑书籍失败，请重试');
        }
    }
    public function add_book_type()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法访问');
        }
        $this->display();
    }
    public function do_add_book_type()
    {
        if (empty($_POST['name'])) {
            $this->error('分类名称不可为空');
        }
        $t = M('type');
        $w['name'] = $_POST['name'];
        $i = $t->add($w);
        if ($i > 0) {
            $this->success('添加书籍分类成功');
        } else {
            $this->error('添加书籍分类失败，请重试');
        }
    }
    public function add_book_info()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法访问');
        }
        $t = M('type');
        $type = $t->select();
        $this->assign('type', $type);
        $this->display();
    }
    public function edit_bookinfo()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法使用此功能');
        }
        $bi = M('bookinfo');
        $bookinfo = $bi->join('n_book ON n_book.id = n_bookinfo.bid', 'LEFT')->where(array('n_bookinfo.id' => $_GET['id']))->field('n_book.name,n_book.title,n_bookinfo.*')->find();
        $this->assign('bookinfo', $bookinfo);
        $this->display();
    }
    public function changebook()
    {
        $b = M('book');
        $book = $b->where(array('tid' => $_GET['tid']))->select();
        if (!$book) {
            $book = 'error';
        }
        $this->ajaxReturn($book);
    }
    public function do_add_book_info()
    {
        if (empty($_POST['pay']) || empty($_POST['tid']) || empty($_POST['bid']) || empty($_POST['number']) || empty($_POST['title2']) || empty($_POST['content'])) {
            $this->error('数据为空，无法提交');
        }
        $bi = M('bookinfo');
        $count = $bi->where(array('bid' => $_POST['bid'], 'number' => $_POST['number']))->count();
        if ($count > 0) {
            $this->error('该章节已存在，请重试');
        }
        if ($_POST['pay'] == '1') {
            $_POST['gold'] = 0;
        }
        $w['tid'] = $_POST['tid'];
        $w['bid'] = $_POST['bid'];
        $w['title2'] = $_POST['title2'];
        $w['content'] = $_POST['content'];
        $w['pay'] = $_POST['pay'];
        $w['gold'] = $_POST['gold'];
        $w['number'] = $_POST['number'];
        $w['time'] = time();
        $i = $bi->add($w);
        if ($i > 0) {
            $b = M('book');
            $b->where(array('id' => $_POST['bid']))->setInc('num', 1);
            $this->success('添加书籍章节成功');
        } else {
            $this->error('添加书籍章节失败，请重试');
        }
    }
    public function do_edit_bookinfo()
    {
        if (empty($_POST['pay']) || empty($_POST['number']) || empty($_POST['title2']) || empty($_POST['content'])) {
            $this->error('数据为空，无法提交');
        }
        $bi = M('bookinfo');
        if ($_POST['pay'] == '1') {
            $_POST['gold'] = 0;
        }
        $w['title2'] = $_POST['title2'];
        $w['content'] = $_POST['content'];
        $w['pay'] = $_POST['pay'];
        $w['gold'] = $_POST['gold'];
        $w['number'] = $_POST['number'];
        $i = $bi->where(array('id' => $_POST['id']))->save($w);
        if ($i > 0) {
            $this->success('编辑书籍章节成功');
        } else {
            $this->error('编辑书籍章节失败，请重试');
        }
    }
    public function book_list()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        $b = M('book');
        if (!empty($_GET['sex'])) {
            $w['sex'] = $_GET['sex'];
        }
     if (!empty($_GET['state'])) {
            $w['state'] = $_GET['state'];
        }

          if (!empty($_GET['tid'])) {
            $w['tid'] = $_GET['tid'];
        }

         $t = M('type');
        $type = $t->order("id asc")->select();

        $books = $b->where($w)->select();
         $this->assign('type', $type);
        $this->assign('books', $books);
        $this->display();
    }
    public function book_doshow()
    {
        $b = M('book');
        $book = $b->where(array('id' => $_GET['id']))->find();
        if ($book['show'] == '1') {
            $w['show'] = 2;
        } else {
            $w['show'] = 1;
        }
        $i = $b->where(array('id' => $_GET['id']))->save($w);
        if ($i > 0) {
            $this->success('修改推荐状态成功');
        } else {
            $this->error('修改推荐状态失败，请重试');
        }
    }
    public function book_doeic()
    {
        $b = M('book');
        $book = $b->where(array('id' => $_GET['id']))->find();
        if ($book['eic'] == '1') {
            $w['eic'] = 2;
        } else {
            $w['eic'] = 1;
        }
        $i = $b->where(array('id' => $_GET['id']))->save($w);
        if ($i > 0) {
            $this->success('修改编辑推荐状态成功');
        } else {
            $this->error('修改编辑推荐状态失败，请重试');
        }
    }
    public function book_dohot()
    {
        $b = M('book');
        $book = $b->where(array('id' => $_GET['id']))->find();
        if ($book['hot'] == '1') {
            $w['hot'] = 2;
        } else {
            $w['hot'] = 1;
        }
        $i = $b->where(array('id' => $_GET['id']))->save($w);
        if ($i > 0) {
            $this->success('修改编辑推荐状态成功');
        } else {
            $this->error('修改编辑推荐状态失败，请重试');
        }
    }
    public function book_share()
    {
        $this->checklogin();
        $ad = M('admin');
        $admin = $ad->where(array('id' => $_SESSION['aid']))->find();
        $this->assign('admin', $admin);
       // if ($admin['level'] < 2) {
           // $wechat = $this->checkwechat();
           // if (!$wechat) {
              //  $this->error('请先配置公众号设置');
           // }
       // }
        $b = M('book');
        $book = $b->where(array('id' => $_GET['bid']))->find();
        $bi = M('bookinfo');
        if ($admin['level'] == '0') {
            $bookinfo = $bi->where(array('bid' => $_GET['bid']))->order('number ASC')->select();
        } else {
            $bookinfo = $bi->where(array('bid' => $_GET['bid']))->order('number ASC')->limit(5)->select();
        }
        $this->assign('book', $book);
        $this->assign('bookinfo', $bookinfo);
        $this->display();
    }
    public function creatlinks()
    {
        $l = M('links');
        $p = $l->where(array('aid' => $_SESSION['aid'], 'biid' => $_GET['id']))->find();
        if ($p) {
            $this->ajaxReturn($p['url']);
        } else {
            $wc = M('wechat');
            $ad = M('admin');
            $admin = $ad->where(array('id' => $_SESSION['aid']))->find();
           // if ($admin['level'] < 2) {
              //  $wechat = $wc->where(array('aid' => $_SESSION['aid']))->find();
           // } else {
                $leader = $ad->where(array('id' => $admin['lid']))->find();
                $wechat = $wc->where(array('aid' => $leader['id']))->find();
          //  }
            $w['biid'] = $_GET['id'];
            $w['time'] = time();
            $w['aid'] = $_SESSION['aid'];
            $w['clicknum'] = 0;
            $w['peoplenum'] = 0;
            $w['pay'] = 0;
            $w['bid'] = $_GET['bid'];
           // $w['url'] = 'http://' . $wechat['businessurl'] . '/Home/Book/bookinfo?bid=' . $_GET['bid'] . '&number=' . $_GET['number'] . '&share=' . $_SESSION['aid'];

             $w['url'] = 'http://' .$_SERVER['SERVER_NAME'] . '/Home/Book/bookinfo?bid=' . $_GET['bid'] . '&number=' . $_GET['number'] . '&share=' . $_SESSION['aid'];
           
           $durl = file_get_contents('http://suo.im/api.php?url='.urlencode($w['url']));
           $w['durl'] =$durl;
          
          
          
            $i = $l->add($w);
           // $url = $w['url'];
            $url = $durl;
            if ($i > 0) {
                $this->ajaxReturn($url);
            } else {
                $this->ajaxReturn(false);
            }
        }
    }
    public function book_article()
    {
        $randData = mt_rand(1, 6);
        $this->checklogin();
        $bi = M('bookinfo');
        $bookinfo = $bi->where(array('id' => $_GET['id']))->find();
        $number = $bookinfo['number'] + 1;
        $w['number'] = array('lt', $number);
        $w['bid'] = $bookinfo['bid'];
        $bookinfos = $bi->where($w)->select();
        $this->assign('bookinfos', $bookinfos);
        $nextbi = $bi->where(array('bid' => $bookinfo['bid'], 'number' => $number))->find();
        if (!$nextbi) {
            $this->error('下一章节不存在，无法生成文案');
        }
        $l = M('links');
        $p = $l->where(array('aid' => $_SESSION['aid'], 'biid' => $nextbi['id']))->find();
        if ($p) {
            $url = $p['url'];
        } else {
          
            $wc = M('wechat');
            $ad = M('admin');
            $admin = $ad->where(array('id' => $_SESSION['aid']))->find();
           // if ($admin['level'] < 2) {
               // $wechat = $wc->where(array('aid' => $_SESSION['aid']))->find();
            //} else {
                $leader = $ad->where(array('id' => $admin['lid']))->find();
                $wechat = $wc->where(array('aid' => $leader['id']))->find();
           // }
            $w['biid'] = $nextbi['id'];
            $w['time'] = time();
            $w['aid'] = $_SESSION['aid'];
            $w['clicknum'] = 0;
            $w['peoplenum'] = 0;
            $w['pay'] = 0;
            $w['bid'] = $bookinfo['bid'];
          //  $w['url'] = 'http://' . $wechat['businessurl'] . '/Home/Book/bookinfo?bid=' . $bookinfo['bid'] . '&number=' . $number . '&share=' . $_SESSION['aid'];

 $w['url'] = 'http://' .$_SERVER['SERVER_NAME'] . '/Home/Book/bookinfo?bid=' . $bookinfo['bid'] . '&number=' . $number . '&share=' . $_SESSION['aid'];

           $durl = file_get_contents('http://suo.im/api.php?url='.urlencode($w['url']));
           $w['durl'] =$durl;
          
            $i = $l->add($w);
            $url = $w['url'];
        }
        $this->assign('url', $url);
         $this->assign('durl', $durl);
        $this->display('book_article_' . $randData);
    }
    public function add_book_txt()
    {
        $this->checklogin();
        $admin = $this->checkadmin();
        $this->assign('admin', $admin);
        if ($admin['level'] > 0) {
            $this->error('权限不足，无法访问');
        }
        $t = M('type');
        $type = $t->select();
        $this->assign('type', $type);
        $this->display();
    }
    public function do_add_book_txt()
    {
        if (empty($_POST['tid']) || empty($_POST['title'])) {
            $this->error('内容提交不能为空');
        }
        $upload = new \Think\Upload();
        $upload->maxSize = 8388608;
        $upload->exts = array('jpg', 'png', 'jpeg', 'txt');
        $upload->rootPath = "./Public/Uploads/book/";
        $upload->savePath = '';
        $upload->autoSub = false;
        $upload->saveName = array('uniqid', '');
        $info = $upload->upload();
        if (!$info) {
            $this->error($upload->getError());
        }
        $t = M('type');
        $type = $t->where(array('id' => $_POST['tid']))->find();
        $w['name'] = $type['name'];
        $w['tid'] = $_POST['tid'];
        $w['title'] = $_POST['title'];
        $w['img'] = $info['img']['savename'];
        $w['content'] = $_POST['content'];
        $w['sex'] = $_POST['sex'];
        $w['state'] = $_POST['state'];
        $b = M('book');
        $i = $b->add($w);
        if ($i > 0) {
            $bi = M('bookinfo');
            if ($_POST['pay'] == '1') {
                $_POST['gold'] = 0;
            }
            $w2['tid'] = $_POST['tid'];
            $w2['bid'] = $i;
            $w2['pay'] = $_POST['pay'];
            $w2['gold'] = $_POST['gold'];
            $w2['time'] = time();
            $txt = $info['txt']['savename'];
            $content = file_get_contents('Public/Uploads/book/' . $txt);
            $array = explode("###", $content);
            array_shift($array);
            $arr = array();
            foreach ($array as $k => $v) {
                $c = explode("\r\n", $v);
                $d = explode($c[0], $v);
                $d[0] = $c[0];
                array_push($arr, $d);
            }
            foreach ($arr as $k2 => &$v2) {
                $v2[1] = str_replace("\r\n", "</p><p>", $v2[1]);
                $v2[1] = substr($v2[1], 11);
                $v2[1] = substr($v2[1], 0, strlen($v2[1]) - 10);
            }
            foreach ($arr as $ka => $va) {
                $w2['title2'] = $va[0];
                $w2['content'] = $va[1];
                $w2['number'] = $ka + 1;
                $bi->add($w2);
            }
            $add_num = count($arr);
            $b = M('book');
            $b->where(array('id' => $i))->setInc('num', $add_num);
            unlink('Public/Uploads/book/' . $txt);
            $this->success('添加书籍成功');
        } else {
            $this->error('添加书籍失败，请重试');
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
    public function checkwechat()
    {
        $wc = M('wechat');
        $wechat = $wc->where(array('aid' => $_SESSION['aid']))->find();
        return $wechat;
    }
  
        public function del_book()
    {
        $n = M('book');
      
        $bookinfo="bookinfo";

        $nn=M($bookinfo);

       $pic=$n->where(array('id' => $_GET['id']))->find(); 
          
       unlink('Public/Uploads/book/' . $pic['img']);

        $i = $n->where(array('id' => $_GET['id']))->delete();
        if ($i > 0) {
             $ii = $nn->where(array('bid' => $_GET['id']))->delete();

            $this->success('删除成功', U('Book/book_list'));
        } else {
            $this->error('删除失败，请重试');
        }
    }
  
  
     public function del_bookinfo()
    {

     $bookinfo="bookinfo";
     $n = M($bookinfo);
     
        $i = $n->where(array('id' => $_GET['id']))->delete();
        if ($i > 0) {
            $this->success('删除成功!', U('Book/book_share?bid='.$_GET['bid']));
        } else {
            $this->error('删除失败，请重试');
        }
    }

  
}