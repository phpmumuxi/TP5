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
    '__pattern__' => [
        'name' => '\w+',
    ],
   '[category]'     => [
       'add'=>['@admin/goods.category/add'],
       'del'=>['@admin/goods.category/delAll'],
       'delOne'=>['@admin/goods.category/delOne'],
       'getsParent'=>['@admin/goods.category/getsParent'],
       'index'=>['@admin/member.member/index', ['method' => 'post'],],
    ],
    '[cart]'   =>  [
          'addCart'=>['index/cart/addCart',['method' => 'get']],
    ],
];
