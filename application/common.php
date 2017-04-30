<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//\think\Route::rule('logout','admin/site/logout');
// user 别名路由到 index/user 控制器
\think\Route::alias('member','admin/member.member',[
    'ext'=>'shtml',
    'allow'=>'index,save,delete',
    'method'=>['index'=>'GET','save'=>'POST','delete'=>'DELETE'],
]);