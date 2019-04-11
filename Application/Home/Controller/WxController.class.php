<?php
namespace Home\Controller;

use Think\Controller;
class WxController extends Controller
{
    protected function _initialize()
    {
        Vendor('WxpayV3.WxPayPubHelper');
    }
    public function jsapi()
    {
        $this->assign('jumpurl', $_GET['jumpurl']);
        $binfo = $_GET['binfo'];
        $b = M('buy');
        $buy = $b->where('id=1')->find();
        if ($_GET['pay'] == '30' || $_GET['pay'] == '50' || $_GET['pay'] == '100' || $_GET['pay'] == '200') {
            $tol = $_GET['pay'];
        } elseif ($_GET['pay'] == 'vip') {
            $tol = $buy['vipratio'];
        }
         elseif ($_GET['pay'] == 'vipjd') {
            $tol = $buy['vipjd'];
        } 
         else {
            $this->error('数据异常');
        }
        $this->assign('tol', $tol);
        $tol = $tol*$buy['ratio'];
        $wc = M('wechat');
        $wechat = $wc->where(array('id' => 1))->find();
        $server = $wechat['weburl'];
        $url = 'http://' . $server . '/Home/Wx/notify';
        $tools = new \JsApiPay();
        $openId = $tools->GetOpenid();
        $input = new \WxPayUnifiedOrder();
        $input->SetBody("wxpay");
        $input->SetAttach($binfo);
        $input->SetOut_trade_no(\WxPayConfig::MCHID . date("YmdHis"));
        $input->SetTotal_fee($tol);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url($url);
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $order = \WxPayApi::unifiedOrder($input);

            //  var_dump($tol);
         // die();
        $jsApiParameters = $tools->GetJsApiParameters($order);
        $editAddress = $tools->GetEditAddressParameters();
        $this->assign('jsApiParameters', $jsApiParameters);
        $this->display();
    }
    public function jsapi2()
    {
        $this->assign('jumpurl', $_GET['jumpurl']);
        $binfo = $_GET['binfo'];
        $b = M('buy');
        $buy = $b->where('id=1')->find();
        if ($_GET['pay'] == '30' || $_GET['pay'] == '50' || $_GET['pay'] == '100' || $_GET['pay'] == '200') {
            $tol = $_GET['pay'];
        } elseif ($_GET['pay'] == 'vip') {
            $exp = explode(",", $binfo);
            $pr = M('promotion');
            $promotion = $pr->where(array('id' => $exp[3]))->find();
            $tol = $promotion['pvip'];
        } else {
            $this->error('数据异常');
        }
        $this->assign('tol', $tol);
        $tol = $tol * 100;
        $wc = M('wechat');
        $wechat = $wc->where(array('id' => 1))->find();
        $server = $wechat['weburl'];
        $url = 'http://' . $server . '/Home/Wx/notify2';
        $tools = new \JsApiPay();
        $openId = $tools->GetOpenid();
        $input = new \WxPayUnifiedOrder();
        $input->SetBody("wxpay");
        $input->SetAttach($binfo);
        $input->SetOut_trade_no(\WxPayConfig::MCHID . date("YmdHis"));
        $input->SetTotal_fee($tol);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url($url);
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $order = \WxPayApi::unifiedOrder($input);
        $jsApiParameters = $tools->GetJsApiParameters($order);
        $editAddress = $tools->GetEditAddressParameters();
        $this->assign('jsApiParameters', $jsApiParameters);
        $this->display();
    }
    public function native()
    {
        $notify = new \NativePay();
        $url1 = $notify->GetPrePayUrl("123456789");
        $input = new \WxPayUnifiedOrder();
        $input->SetBody("test");
        $input->SetAttach("test");
        $input->SetOut_trade_no(\WxPayConfig::MCHID . date("YmdHis"));
        $input->SetTotal_fee("1");
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url("http://zp.ijuying.com/Home/Wx/notify");
        $input->SetTrade_type("NATIVE");
        $input->SetProduct_id("123456789");
        $result = $notify->GetPayUrl($input);
        $url2 = $result["code_url"];
        $this->assign('url1', $url1);
        $this->assign('url2', $url2);
        $this->display();
    }
    public function micropay()
    {
        if (isset($_REQUEST["auth_code"]) && $_REQUEST["auth_code"] != "") {
            $auth_code = $_REQUEST["auth_code"];
            $input = new \WxPayMicroPay();
            $input->SetAuth_code($auth_code);
            $input->SetBody("刷卡测试样例-支付");
            $input->SetTotal_fee("1");
            $input->SetOut_trade_no(\WxPayConfig::MCHID . date("YmdHis"));
            $microPay = new \MicroPay();
            dump($microPay->pay($input));
        }
        $this->display();
    }
    public function notify()
    {
        $xml = $GLOBALS["HTTP_RAW_POST_DATA"];
        $postObj = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
        $data = array();
        $data = (array) $postObj;
        if ($data["return_code"] == "SUCCESS" && $data["result_code"] == "SUCCESS") {
            $exp = explode(",", $data['attach']);
            file_put_contents("signxml.txt", var_export($exp, true) . "\r\n", 8);
            $c = M('chanrge');
            $cu = M('cut');
            $i = $c->where(array('onum' => $data['out_trade_no']))->count();
            if (empty($i)) {
                $b = M('buy');
                $buy = $b->where(array('id' => '1'))->find();
                switch ($exp[1]) {
                    case '30':
                        $gold = $buy['ratio'] * 30;
                        break;
                    case '50':
                        $gold = $buy['ratio'] * 50 + $buy['ratio'] * 30;
                        break;
                    case '100':
                        $gold = $buy['ratio'] * 100 + $buy['ratio'] * 80;
                        break;
                    case '200':
                        $gold = $buy['ratio'] * 200 + $buy['ratio'] * 200;
                        break;
                    case 'vip':
                        $gold = 0;
                        $exp[1] = $buy['vipratio'];
                        break;
                      case 'vipjd':
                        $gold = 0;
                        $exp[1] = $buy['vipjd'];
                        break;
                }
                $u = M('user');
                $user = $u->where(array('id' => $exp[0]))->find();
                if ($gold != '0') {
                    $u->where(array('id' => $exp[0]))->setInc('gold', $gold);
                    $type = '充值金币';
                } else {
                    $w['vip'] = 2;
                    
                    if($exp[1]==180)
                     {
                    $w['viptime'] = time() + 31536000;
                }else
                {
                  $w['viptime'] = time() + 7776000;

                }


                    $u->where(array('id' => $exp[0]))->save($w);
                    $type = '充值会员';
                }
                if ($user['paystatic'] == '1') {
                    $wpay['paystatic'] = 2;
                    $u->where(array('id' => $exp[0]))->save($wpay);
                }
                if (!empty($exp[2])) {
                    $l = M('links');
                    $ad = M('admin');
                    $admin = $ad->where(array('id' => $user['shareid']))->find();
                    $cut = $cu->where(array('id' => 1))->find();
                    if ($admin['chanrgesnum'] < $cut['number']) {
                        $link = $l->where(array('id' => $exp[2]))->find();
                        if ($link) {
                            $l->where(array('id' => $link['id']))->setInc('pay', $exp[1]);
                        }
                        if ($admin['st'] == '1') {
                            $gold1 = ceil($exp[1] * $admin['pro']);
                            $gold2 = $exp[1] - $gold1;
                            $ad->where(array('id' => $admin['id']))->setInc('gold', $gold1);
                            $ad->where(array('id' => $admin['lid']))->setInc('gold', $gold2);
                            $wc['onum'] = $data['out_trade_no'];
                            $wc['uid'] = $user['id'];
                            $wc['aid'] = $admin['id'];
                            $wc['lid'] = $admin['lid'];
                            $wc['type'] = $type;
                            $wc['moneyall'] = $exp[1];
                            $wc['moneyleader'] = $gold2;
                            $wc['moneyadmin'] = $gold1;
                            $wc['time'] = time();
                            $wc['time2'] = date("Y-m-d");
                            $c->add($wc);
                            $ad->where(array('id' => $admin['id']))->setInc('chanrgesnum', 1);
                        } else {
                            $ad->where(array('id' => $admin['lid']))->setInc('gold', $exp[1]);
                        }
                    } else {
                        $ad->where(array('id' => $user['shareid']))->setDec('chanrgesnum', $cut['number']);
                        $cc = M('chanrgecut');
                        $wcc['onum'] = $data['out_trade_no'];
                        $wcc['moneycut'] = $exp[1];
                        $wcc['type'] = $type;
                        $wcc['time'] = time();
                        $wcc['aid'] = $admin['id'];
                        $cc->add($wcc);
                    }
                } else {
                    $ad = M('admin');
                    if (empty($user['shareid'])) {
                        $ad->where(array('lid' => '0'))->setInc('gold', $exp[1]);
                    } else {
                        $admin = $ad->where(array('id' => $user['shareid']))->find();
                        if ($admin['level'] < 2) {
                            $cut = $cu->where(array('id' => 1))->find();
                            if ($admin['chanrgesnum'] < $cut['number']) {
                                if ($admin['st'] == '1') {
                                    $gold1 = ceil($exp[1] * $admin['pro']);
                                    $gold2 = $exp[1] - $gold1;
                                    $ad->where(array('id' => $admin['id']))->setInc('gold', $gold1);
                                    $ad->where(array('id' => $admin['lid']))->setInc('gold', $gold2);
                                    $wc['onum'] = $data['out_trade_no'];
                                    $wc['uid'] = $user['id'];
                                    $wc['aid'] = $admin['id'];
                                    $wc['lid'] = $admin['lid'];
                                    $wc['type'] = $type;
                                    $wc['moneyall'] = $exp[1];
                                    $wc['moneyleader'] = $gold2;
                                    $wc['moneyadmin'] = $gold1;
                                    $wc['time'] = time();
                                    $wc['time2'] = date("Y-m-d");
                                    $c->add($wc);
                                    $ad->where(array('id' => $admin['id']))->setInc('chanrgesnum', 1);
                                } else {
                                    $ad->where(array('id' => $admin['lid']))->setInc('gold', $exp[1]);
                                }
                            } else {
                                $ad->where(array('id' => $user['shareid']))->setDec('chanrgesnum', $cut['number']);
                                $cc = M('chanrgecut');
                                $wcc['onum'] = $data['out_trade_no'];
                                $wcc['moneycut'] = $exp[1];
                                $wcc['type'] = $type;
                                $wcc['time'] = time();
                                $wcc['aid'] = $admin['id'];
                                $cc->add($wcc);
                            }
                        }
                    }
                }
                unset($_SESSION['pay']);
                unset($_SESSION['lid']);
            }
            $xml = '<xml> <return_code><![CDATA[SUCCESS]]></return_code>
                                   <return_msg><![CDATA[OK]]></return_msg>
                                 </xml> ';
            echo $xml;
        }
    }
    public function notify2()
    {
        $xml = $GLOBALS["HTTP_RAW_POST_DATA"];
        $postObj = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
        file_put_contents("signxml.txt", var_export($postObj, true) . "\r\n", 8);
        $data = array();
        $data = (array) $postObj;
        if ($data["return_code"] == "SUCCESS" && $data["result_code"] == "SUCCESS") {
            $exp = explode(",", $data['attach']);
            file_put_contents("signxml.txt", var_export($exp, true) . "\r\n", 8);
            $c = M('chanrge2');
            $i = $c->where(array('onum' => $data['out_trade_no']))->count();
            if (empty($i)) {
                $b = M('buy');
                $buy = $b->where(array('id' => '1'))->find();
                $pr = M('promotion');
                $pro = $pr->where(array('id' => $exp[3]))->find();
                switch ($exp[1]) {
                    case '30':
                        $gold = $buy['ratio'] * 30 + $pro['p30'];
                        break;
                    case '50':
                        $gold = $buy['ratio'] * 50 + $pro['p50'];
                        break;
                    case '100':
                        $gold = $buy['ratio'] * 100 + $pro['p100'];
                        break;
                    case '200':
                        $gold = $buy['ratio'] * 200 + $pro['p200'];
                        break;
                    case 'vip':
                        $gold = 0;
                        $exp[1] = $pro['pvip'];
                        break;
                }
                $u = M('user');
                $user = $u->where(array('id' => $exp[0]))->find();
                if ($gold != '0') {
                    $u->where(array('id' => $exp[0]))->setInc('gold', $gold);
                } else {
                    $w['vip'] = 2;
                    $w['viptime'] = time() + 31536000;
                    $u->where(array('id' => $exp[0]))->save($w);
                }
                if ($user['paystatic'] == '1') {
                    $wpay['paystatic'] = 2;
                    $u->where(array('id' => $exp[0]))->save($wpay);
                }
                if (!empty($exp[2])) {
                    $pl = M('paylinks');
                    $paylink = $pl->where(array('aid' => $exp[2], 'pid' => $exp[3]))->find();
                    $ad = M('admin');
                    $admin = $ad->where(array('id' => $exp[2]))->find();
                    if ($admin['st'] == '1') {
                        $gold1 = ceil($exp[1] * $admin['pro']);
                        $gold2 = $exp[1] - $gold1;
                        $ad->where(array('id' => $admin['id']))->setInc('gold', $gold1);
                        $ad->where(array('id' => $admin['lid']))->setInc('gold', $gold2);
                        if ($paylink) {
                            $pl->where(array('id' => $paylink['id']))->setInc('paynum', 1);
                            $pl->where(array('id' => $paylink['id']))->setInc('payme', $gold1);
                            $pl->where(array('id' => $paylink['id']))->setInc('pay', $gold1);
                        }
                    } else {
                        $ad->where(array('id' => $admin['lid']))->setInc('gold', $exp[1]);
                    }
                    $wc['onum'] = $data['out_trade_no'];
                    $wc['uid'] = $user['id'];
                    $wc['moneyall'] = $exp[1];
                    $wc['time'] = time();
                    $c->add($wc);
                }
                unset($_SESSION['pay']);
                unset($_SESSION['lid']);
                unset($_SESSION['pid']);
            }
            $xml = '<xml> <return_code><![CDATA[SUCCESS]]></return_code>
                                   <return_msg><![CDATA[OK]]></return_msg>
                                 </xml> ';
            echo $xml;
        }
    }
}