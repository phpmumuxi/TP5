<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
header("content-type:text/html;charset=utf-8");
// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');

// 绑定当前访问到index模块
//define('BIND_MODULE','index');
// 绑定当前访问到index模块的index控制器
//define('BIND_MODULE','index/index');

//define('APP_AUTO_BUILD',true); //开启自动生成,目前好像不起作用了
//define('APP_DEBUG', true);// 开启调试模式

// 绑定到index模块  [可把当前入口文件绑定到指定的模块或者控制器]
//define('BIND_MODULE','index');

// 加载框架引导文件
require __DIR__ . './thinkphp/start.php';

//自动生成目录
// \think\Build::module('admin');(一)

// 读取自动生成定义文件
//  $build = include '../build.php';//(二)
// 运行自动生成
// \think\Build::run($build,'application',false);

// cmd下的 php think  build  (三)