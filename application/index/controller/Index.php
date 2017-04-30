<?php
namespace app\index\controller;

class Index 
{
    public function index()
    {
		echo '22';exit();
        return view();
    }
    
	public function index1()
    {
	 echo '22';
         $expression=222;
        
        
         print_r($expression);
        
    }
}
