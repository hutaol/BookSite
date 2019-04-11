<?php
    
    namespace Home\Controller;
    use Think\Controller;
    function checkLogin()
    {
        if(!isset($_SESSION['id']))
        {
            // $this->error('请登录管理员账号','__APP__/Admin/Login/login');
            // header('location:./index.php/Admin/Index/login');
            // success('请登录管理员账号','.//Admin/Login/login');
            redirect('index1');
        }
    }


function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
{
    if(function_exists("mb_substr")){
        if($suffix)
            return mb_substr($str, $start, $length, $charset)."...";
        else
            return mb_substr($str, $start, $length, $charset);
    }
    elseif(function_exists('iconv_substr')) {
        if($suffix)
            return iconv_substr($str,$start,$length,$charset)."...";
        else
            return iconv_substr($str,$start,$length,$charset);
    }
    $re['utf-8']   = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef]
                  [x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";
    $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";
    $re['gbk']    = "/[x01-x7f]|[x81-xfe][x40-xfe]/";
    $re['big5']   = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $slice = join("",array_slice($match[0], $start, $length));
    if($suffix) return $slice."…";
    return $slice;
}


function cutstr_html($string, $sublen)
{
    $string = strip_tags($string);
    $string = preg_replace ('/\n/is', '', $string);
    $string = preg_replace ('/ |　/is', '', $string);
    $string = preg_replace ('/&nbsp;/is', '', $string);

    preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $t_string);
    if(count($t_string[0]) - 0 > $sublen) $string = join('', array_slice($t_string[0], 0, $sublen));
    else $string = join('', array_slice($t_string[0], 0, $sublen));

    return $string;
}



function toarabia($str){
    $num=0;
    $bins=array("零","一","二","三","四","五","六","七","八","九",'a'=>"个",'b'=>"十",'c'=>"百",'d'=>"千",'e'=>"万");
    $bits=array('a'=>1,'b'=>10,'c'=>100,'d'=>1000,'e'=>10000);
    foreach($bins as $key=>$val){
        if(strpos(" ".$str,$val)) $str=str_replace($val,$key,$str);
    }
    foreach(str_split($str,2) as $val){
        $temp=str_split($val,1);
        if(count($temp)==1) $temp[1]="a";
        if(isset($bits[$temp[0]])){
            $num=$bits[$temp[0]]+(int)$temp[1];
        }else{
            $num+=(int)$temp[0]*$bits[$temp[1]];
        }
    }
    return $num;
}



    
    //验证码
    function check_verify($code,$id=''){ 
    $verify = new \Think\Verify();  
    return $verify->check($code,$id);
    }
    //见点奖
    function jiandian($uname)
    {
        //$array = array();
        //global $array;
        //连接数据库
        $con = mysqli_connect('localhost','root','123');
        if(mysqli_connect_errno()){
            exit(mysqli_connect_error());
        }
        mysqli_set_charset($con,'utf8');
        mysqli_select_db($con,'yijia');
        //dump($uname);
        $sql = "select * from `zx_user` where username='{$uname}'";
        //echo $sql;
        $query = mysqli_query($con,$sql);
        $rs = array();
        //dump($query);
        while($row = mysqli_fetch_array($query)){
            $rs[] = $row;
            //dump($rs);
        }
        //dump($rs);
        if(!empty($rs)){
            foreach($rs as $k=>$v){

                if($v['jdnum'] < 1024){
                    $m = M('user');
                    if($v['level'] == '198')
                    {
                        $w['gold'] = $v['gold']+5;
                        $ww['content'] = $v['username'].'获得见点奖奖励5元';
                    }elseif($v['level'] == '1098')
                    {
                        $w['gold'] = $v['gold']+20;
                        $ww['content'] = $v['username'].'获得见点奖奖励20元';
                    }
                    //$w['gold'] = $v['gold']+10;
                    $w['jdnum'] = $v['jdnum']+1;
                    $m->where(array('id'=>$v['id']))->save($w);
                    //奖励消息存入数据库
                    $n = M('message');
                    $ww['name'] = $v['username'];
                   
                    $ww['time'] = time();
                    $n->add($ww);
                }
                //再次调用见点奖
                jiandian($v['uname']);

            }
        }
        redirect('jump', 2, '注册成功，页面跳转中...');

    }

     //双轨对碰
    function duipeng($user)
    {
        $m = M('user');
        $in = M('info');
        if(!empty($user))
        {
            foreach($user as $k=>$v)
            {
                //dump($v);
                //判断该用户是否满足对碰要求
                //if($v['layer'] < 10)
                //{
                    //统计下面左右区人数
                    $wl['lcode'] = array('like',$v['lcode'].'1'.'%');
                    $wr['lcode'] = array('like',$v['lcode'].'2'.'%');
                    $countl = $m->where($wl)->count();
                    $countr = $m->where($wr)->count();
                    // dump($countl);
                    // dump($countr);
                    //对比左右区人数，取小
                    if($countl > $countr)
                    {
                        $layerz = $countr;
                    }else{
                        $layerz = $countl;
                    }
                    //总层数减去已经奖励过的层数,得到本次奖励数
                    $layer = $layerz - $v['layer'];
                    if($layer > 0)
                    {
                        //可奖励对数大于10则取10
                        if($layer >10)
                        {
                            $layer = 10;
                        }
                        $w['gold'] = $v['gold']+$layer*90;
                        $w['layer'] = $v['layer']+$layer;      //当前层数+对碰数
                        //$w['layer'] = $layerz;      //当前层数+最少对数
                        $k = $m->where(array('id'=>$v['id']))->save($w);
                        //存入消息
                        $n = M('message');
                        $ww['name'] = $v['username'];
                        $ww['content'] = '获得了对碰奖'.($layer*90).'金币';
                        $ww['time'] = time();
                        $n->add($ww);
                        //统计平台支出
                        $outmoney = $layer*90;
                        $in->where(array('id'=>1))->setInc('outmoney',$outmoney);

                        // if($layer+$v['layer'] >10)
                        // {
                        //     $layer = 10-$v['layer'];
                        // }
                        // $w['gold'] = $v['gold']+$layer*300;
                        // $w['layer'] = $v['layer']+$layer;
                        // $k = $m->where(array('id'=>$v['id']))->save($w);
                        // //存入消息
                        // $n = M('message');
                        // $ww['name'] = $v['username'];
                        // $ww['content'] = '获得了对碰奖'.($layer*300).'金币';
                        // $ww['time'] = time();
                        // $n->add($ww);
                    }
                    
                    // if($k >0)
                    // {
                    //     redirect('active', 2, '对碰奖励发放成功，正在跳转页面..');
                    // }else{
                    //     redirect('active', 2, '对碰奖励发放失败');
                    // }

                //}
               
            }
        }else{
            redirect('active', 2, '数据为空，无法执行');
        }
    }
		function verificationCode($leng) {
		$arr   = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
		shuffle($arr);
		$str = implode('', array_slice($arr, 0, $leng));
		return $str;
		}

    function jiandian1($uname)
    {
        //$array = array();
        //global $array;
        //连接数据库
        $con = mysqli_connect('localhost','www_vip','2633755');
        if(mysqli_connect_errno()){
            exit(mysqli_connect_error());
        }
        mysqli_set_charset($con,'utf8');
        mysqli_select_db($con,'www_vip');
        //dump($uname);
        $sql = "select * from `zx_user` where username='{$uname}'";
        //echo $sql;
        $query = mysqli_query($con,$sql);
        $rs = array();
        //dump($query);
        while($row = mysqli_fetch_array($query)){
            $rs[] = $row;
            //dump($rs);
        }
        //dump($rs);
        if(!empty($rs)){
            foreach($rs as $k=>$v){

                if($v['jdnum'] < 2046){
                    $m = M('user');
                    if($v['level'] == '198')
                    {
                        $w['gold'] = $v['gold']+5;
                        $ww['content'] = $v['username'].'获得见点奖奖励5元';
                    }elseif($v['level'] == '1098')
                    {
                        $w['gold'] = $v['gold']+20;
                        $ww['content'] = $v['username'].'获得见点奖奖励20元';
                    }
                    //$w['gold'] = $v['gold']+10;
                    $w['jdnum'] = $v['jdnum']+1;
                    $m->where(array('id'=>$v['id']))->save($w);
                    //奖励消息存入数据库
                    $n = M('message');
                    $ww['name'] = $v['username'];
                   
                    $ww['time'] = time();
                    $n->add($ww);
                }
                //再次调用见点奖
                jiandian1($v['uname']);

            }
        }
        redirect('leaderlist', 2, '添加成功，页面跳转中...');

    }
	