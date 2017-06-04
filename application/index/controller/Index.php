<?php
namespace app\index\controller;

use app\index\model\Good;
class Index 
{
    public function index()
    {        
    
    $lists = Good::select(function($query){
       $query->where('cat_id', 'in',[58,59,60]);
    });
    $res=[];
    foreach($lists as $list){
        $res[]=$list;
    }      
      return view('index',['res'=>$res]);
    }
    
	public function index1()
    {
	 echo '22';
         $expression=222;
        
        
         print_r($expression);
        
    }
}
