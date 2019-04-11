<?php
    namespace Admin\Controller;
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
        mysqli_select_db($con,'zx6');
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
        redirect('leaderlist', 2, '添加成功，页面跳转中...');

    }

    function duipeng($user)
    {
        $m = M('user');
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
                        $w['gold'] = $v['gold']+$layer*300;
                        $w['layer'] = $layerz;
                        $k = $m->where(array('id'=>$v['id']))->save($w);
                        //存入消息
                        $n = M('message');
                        $ww['name'] = $v['username'];
                        $ww['content'] = $v['username'].'获得了对碰奖'.($layer*300).'金币';
                        $ww['time'] = time();
                        $n->add($ww);


                    }
                    
                  
            }
        }else{
            redirect('active', 2, '数据为空，无法执行');
        }
    }