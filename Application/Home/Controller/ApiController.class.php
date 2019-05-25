<?php

namespace Home\Controller;

use Think\Controller;

class ApiController extends Controller {

    public function banner () {
        $banner = M('banner');
        $banners = $banner->where(array('type' => $_GET['type']))->limit(0, 4)->select();

        $obj['data'] = $banners;
        $this->ajaxReturn($obj, '', '1', 'JSON');

    }

    public function index() {

        $sex = $_GET['type'] ?: '1';

        $banner = M('banner');
        $banners = $banner->where(array('type' => $sex))->limit(0, 4)->select();
        $obj['banners'] = $banners;

        $b = M('book');
        // 热门 6
        $bookhots = $b->where(array('hot' => 2, 'sex' => $sex))->limit(0, 6)->select();
        $obj['bookhots'] = $bookhots;

        // 推荐 6
        $bookeics = $b->where(array('eic' => 2, 'sex' => $sex))->limit(0, 6)->select();
        $this->assign('bookeics', $bookeics);
        $obj['bookeics'] = $bookeics;

        // 精选 20
        $bookshows = $b->where(array('show' => 2, 'sex' => $sex))->limit(0, 20)->select();
        $obj['bookshows'] = $bookshows;

        // 本周新书 6  select * from n_book where time between current_date()-7 and sysdate()
        $bookweaks = $b->query("select * from __TABLE__ where time between current_date()-7 and sysdate() and sex = '" . $sex . "' LIMIT " . 6);
        $obj['bookweaks'] = $bookweaks;

        $this->ajaxReturn($obj, '', '1');

    }


}
