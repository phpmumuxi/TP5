<?php
namespace app\admin\controller;

class Index 
{
    public function index()
    {
		$bread=array(
                    'first'=>'商品管理',
                    'second'=>'分类列表',
                    );

        return view('index', [
    'bread'  =>$bread,
    
]);
    }
	public function index1()
    {
	 echo '22';
	}
}
