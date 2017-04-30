<?php
namespace app\admin\controller;
use think\Request;

class Error
{
	public function _empty($name){
		$request = Request::instance();
		$con_name = $request->controller();
		echo '当前输入控制器:'.$con_name;
		echo '<br/>';
		echo '当前输入行为:'.$name;
		echo '<br/>';
	}


}