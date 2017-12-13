<?php
return array(
    //'配置项'=>'配置值'
    'URL_ROUTER_ON' =>true,

    //路由重写
    'URL_ROUTE_RULES'=>array(
        'blogs/:id\d' => array('Index/read'),
        'blogs/:year/:month/:day' => array('Index/archive','status=1')
    ),

    //静态路由
    'URL_MAP_RULES'=>array(
        'new/top' => 'Index/top?type=top'
    ),

    //数据库参数
    'DB_TYPE' => 'mysqli',
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'think',
    'DB_USER' => 'root',
    'DB_PWD' => '',
    'DB_PORT' => '3306',
    'DB_PREFIX' => 'think_',

);