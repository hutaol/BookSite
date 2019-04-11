<?php
namespace Home\Controller;

use Think\Controller;
use Com\Wechat;
use Com\WechatAuth;
class WeChatController extends Controller
{
    public function index()
    {
        header("Content-type:text/html;charset=utf-8");
        $nonce = $_GET['nonce'];
        $token = 'nC82mFe8lLie4rfZeCTCe4F4CLLWgt4n';
        $timestamp = $_GET['timestamp'];
        $echostr = $_GET['echostr'];
        $signature = $_GET['signature'];
        $array = array();
        $array = array($nonce, $timestamp, $token);
        sort($array);
        $str = sha1(implode($array));
        if ($str == $signature && $echostr) {
            ob_clean();
            echo $echostr;
            exit;
            die;
        } else {
            $id = $_GET['id'];
            $this->createMenu($id);
            $this->reponseMsg2($id);
        }
    }
    public function _empty()
    {
        redirect(SITE_URL);
    }
    public function reponseMsg2($id)
    {
        $postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
        $postObj = simplexml_load_string($postArr);
        $aa = strtolower($postObj->MsgType);
        if (strtolower($postObj->MsgType) == 'event') {
            if (strtolower($postObj->Event == 'subscribe')) {
                $toUser = $postObj->FromUserName;
                $fromUser = $postObj->ToUserName;
                $time = time();
                $template_tuWen = "<xml><ToUserName><![CDATA[%s]]></ToUserName>\r\n                                    <FromUserName><![CDATA[%s]]></FromUserName>\r\n                                    <CreateTime>%s</CreateTime>\r\n                                    <MsgType><![CDATA[%s]]></MsgType>\r\n                                    <ArticleCount>%s</ArticleCount>\r\n                                    <Articles>\r\n                                        <item>\r\n                                        <Title><![CDATA[%s]]></Title>\r\n                                        <Description><![CDATA[%s]]></Description>\r\n                                        <PicUrl><![CDATA[%s]]></PicUrl>\r\n                                        <Url><![CDATA[%s]]></Url>\r\n                                        </item>\r\n                                    </Articles>\r\n                                    <FuncFlag>0</FuncFlag>\r\n                                </xml>";
                $info = sprintf($template_tuWen, $toUser, $fromUser, $time, 'news', '1', $book['title'], '', $img, $url);
                $openid = $this->strcut('CDATA[', ']]', $info);
                $wc = M('wechat');
                $wechat = $wc->where(array('aid' => $id))->find();
                $u = M('user');
                $user = $u->where(array('openid' => $openid))->find();
                $his = M('history');
                $history = $his->where(array('uid' => $user['id']))->find();
                $b = M('book');
                $book = $b->where(array('id' => $history['biid']))->find();
                $img = 'http://' . $wechat['businessurl'] . '/Public/Uploads/book/' . $book['img'];
                $url = 'http://' . $wechat['businessurl'] . '/Home/Book/bookinfo?bid=' . $book['id'] . '&number=' . $history['number'];
                $info3 = sprintf($template_tuWen, $toUser, $fromUser, $time, 'news', '1', $book['title'], '点击继续阅读', $img, $url);
                echo $info3;
            }
        } elseif (strtolower($postObj->MsgType) == 'text') {
            $toUser = $postObj->FromUserName;
            $fromUser = $postObj->ToUserName;
            $time = time();
            $keyword = strtolower($postObj->Content);
            $wc = M('wechat');
            $wechat = $wc->where(array('aid' => $id))->find();
            $kw = M('keywords');
            $keyword = $kw->join('n_bookinfo ON n_bookinfo.id = n_keywords.biid', 'LEFT')->join('n_book ON n_book.id = n_bookinfo.bid', 'LEFT')->where(array('n_keywords.aid' => $id, 'n_keywords.keyword' => $keyword))->field('n_keywords.*,n_bookinfo.title2,n_bookinfo.number,n_bookinfo.content,n_book.title,n_book.img')->find();
            if ($keyword) {
                $img = 'http://' . $wechat['businessurl'] . '/Public/Uploads/book/' . $keyword['img'];
                $url = 'http://' . $wechat['businessurl'] . '/Home/Book/bookinfo?bid=' . $keyword['bid'] . '&number=' . $keyword['number'] . '&kid=' . $keyword['id'];
                $template_tuWen = "<xml>\r\n                                    <ToUserName><![CDATA[%s]]></ToUserName>\r\n                                    <FromUserName><![CDATA[%s]]></FromUserName>\r\n                                    <CreateTime>%s</CreateTime>\r\n                                    <MsgType><![CDATA[%s]]></MsgType>\r\n                                    <ArticleCount>%s</ArticleCount>\r\n                                    <Articles>\r\n                                        <item>\r\n                                        <Title><![CDATA[%s]]></Title>\r\n                                        <Description><![CDATA[%s]]></Description>\r\n                                        <PicUrl><![CDATA[%s]]></PicUrl>\r\n                                        <Url><![CDATA[%s]]></Url>\r\n                                        </item>\r\n                                    </Articles>\r\n                                    <FuncFlag>0</FuncFlag>\r\n                                </xml>";
                $info = sprintf($template_tuWen, $toUser, $fromUser, $time, 'news', '1', $keyword['title'], '', $img, $url);
            } else {
                $msgType = 'text';
                $content = '很抱歉，没有关于此关键字的信息';
                $template = "<xml>\r\n                            <ToUserName><![CDATA[%s]]></ToUserName>\r\n                            <FromUserName><![CDATA[%s]]></FromUserName>\r\n                            <CreateTime>%s</CreateTime>\r\n                            <MsgType><![CDATA[%s]]></MsgType>\r\n                            <Content><![CDATA[%s]]></Content>\r\n                            </xml>";
                $info = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
            }
            echo $info;
        }
    }
    public function getWxAccessToken()
    {
        $wc = M('wechat');
        $wechat = $wc->where(array('weburl' => $_SERVER['HTTP_HOST']))->find();
        $AppId = $wechat['appid'];
        $AppSecret = $wechat['appsecret'];
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $AppId . "&secret=" . $AppSecret;
        $res = $this->http_curl($url, 'get', 'json');
        $access_token = $res['access_token'];
        return $access_token;
    }
    public function http_curl($url, $type, $res, $arr)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        if ($type == 'post') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
        }
        $output = curl_exec($ch);
        curl_close($ch);
        if ($res == 'json') {
            if (curl_error($ch)) {
                return curl_error($ch);
            } else {
                return json_decode($output, true);
            }
        }
    }
    public function createMenu($id)
    {
        $ACCESS_TOKEN = $this->getWxAccessToken();
        $url1 = 'http://' . $_SERVER['HTTP_HOST'] . '/Home/User/history?id=' . $id;
        $url2 = 'http://' . $_SERVER['HTTP_HOST'];
        $url3 = 'http://' . $_SERVER['HTTP_HOST'] . '/Home/User/center?id=' . $id;
        $url4 = 'http://' . $_SERVER['HTTP_HOST'] . '/Home/Index/recharge?id=' . $id;
        $data = '{

         "button":[
             {
                  "type":"view",
                  "name":"阅读记录",
                  "url":"' . $url1 . '"
              },
              {
                  "type":"view",
                  "name":"访问书城",
                  "url":"' . $url2 . '"
              },
              {
                  "name":"用户中心",
                  "sub_button":[
                    {
                       "type":"view",
                       "name":"个人中心",
                       "url":"' . $url3 . '"
                    },
                    {
                       "type":"view",
                       "name":"我要充值",
                       "url":"' . $url4 . '"
                    }]
              }]
         }';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$ACCESS_TOKEN}");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Errno' . curl_error($ch);
        }
        curl_close($ch);
        var_dump($tmpInfo);
    }
    function strcut($begin, $end, $str)
    {
        $b = mb_strpos($str, $begin) + mb_strlen($begin);
        $e = mb_strpos($str, $end) - $b;
        return mb_substr($str, $b, $e);
    }
}