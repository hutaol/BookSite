<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'=>'mysql',   //设置数据库类型
    // 'DB_HOST'=>'97.64.29.219',//设置主机
    // 'DB_NAME'=>'book_com',//设置数据库名
    // 'DB_USER'=>'book_com',    //设置用户名
    // 'DB_PWD'=>'book1234',        //设置密码
    'DB_HOST'=>'127.0.0.1',//设置主机
    'DB_NAME'=>'book_com',//设置数据库名
    'DB_USER'=>'root',    //设置用户名
    'DB_PWD'=>'ht123456',        //设置密码
    'DB_PORT'=>'3306',   //设置端口号
    'DB_PREFIX'=>'n_',  //设置表前缀
    'URL_HTML_SUFFIX'   => '.html', //伪静态显示
    'URL_MODEL' => '2',  //URL模式
    /* 错误页面模板 */
    'TMPL_ACTION_ERROR'     =>  '/Public/error', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   =>  '/Public/error', // 默认成功跳转对应的模板文件
    //'SHOW_PAGE_TRACE'=>true,//开启页面Trace
    // '__UPLOAD__'=>__ROOT__.'/Public/Uploads',
);


