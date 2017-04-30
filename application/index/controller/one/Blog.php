<?php
namespace app\index\controller\one;

use think\Controller;

class Blog extends Controller
{
    public function index()
    {
       echo '2332';
        //return $this->fetch();
    }

    public function add()
    {
		echo '000';
        //return $this->fetch();//\view\one\blog\add.html
    }

    public function edit($id)
    {
        return $this->fetch('edit:'.$id);
    }
}