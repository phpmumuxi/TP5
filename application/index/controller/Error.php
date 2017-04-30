<?php
namespace app\index\controller;
use think\Request;

class Error
{
	public function index(Request $request)
	{
		$controller = $request->controller();
		$action = $request->action();
		return '进入了空的控制器：'.$controller.' / '.$action;
	}


}