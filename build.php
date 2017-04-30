<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    // 生成应用公共文件
  //  '__file__' => ['common.php', 'config.php', 'database.php'],//表示生成文件（不定义默认会生成 config.php 文件）
	'__dir__'  => ['runtime/cache', 'runtime/log', 'runtime/temp', 'runtime/template'],  //表示生成目录


    // 定义demo模块的自动生成 （按照实际定义的文件名生成）
    'index'     => [
        '__file__'   => ['common.php','config.php'],
        '__dir__'    => ['extra','behavior', 'controller', 'model', 'view'],//extra 为index模块扩展配置目录,增加了扩展配置目录的概念，在应用配置目录或者模块配置目录下面增加extra子目录，下面的配置文件都会自动加载，无需任何配置。
        'controller' => ['Index', 'Test', 'User'],
        'model'      => ['User',],
        'view'       => ['index/index'],
    ],
    // 其他更多的模块定义
];
