<?php
namespace app\admin\validate;

use think\Validate;

class Category extends Validate
{
    protected $rule = [
        'name'  =>  'require|unique|max:10',
        'pid' =>  'require|integer',
		'__token__' => 'token',
    ];
	protected $message = [
        'name.require'  =>  '分类名必须',
		'name'   => 'unique:tp_category',
        'name.max'  =>  '分类名不能超过10个字符',
        'pid.require' =>  '父级分类必须',
    ];

}