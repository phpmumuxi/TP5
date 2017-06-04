<?php
namespace app\index\controller;
use app\index\model\Good;
class Cart
{
	const GOOD_EMPTY=1;
	const GOOD_ADD_SUCCESS=2;
	const GOOD_ADD_ERRO=3;
  function addCart($type='',$good_id){
  	$type=input(?get.type,'',intval());
  	if($this->findGoods($good_id)){ 
  	    if($type===''){
             $num=1;
  	    } 			
  		$cart = new \app\index\model\Cart([
		    'good_id'  =>  $good_id,
		    'num' =>  $num,
		    'user_id' =>  1, 
	    ]);
  		if($cart->save()){    	
           $this->returnAjaxMess('已加入购物车',self::GOOD_ADD_SUCCESS,'');
  		}else{
           $this->returnAjaxMess('添加失败',self::GOOD_ADD_ERRO,'');
  		}
  	}else{
        $this->returnAjaxMess('库存不足，已售完',self::GOOD_EMPTY,'');
  	}
  	 
  }

  function findGoods($good_id){
    $good=Good::get($good_id);
    if($good['good_num']<1){
        return false;
    }
    return true;
  }

  function returnAjaxMess($mes,$code,$data){
  	$res=[
       'message'=>$mes,
       'code'  =>$code,
       'data' =>$data,
  	];
    echo json_encode($res);
  }

}