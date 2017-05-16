<?php
namespace app\admin\model;

use think\Model;
use think\Db;
class Category extends Model
{
    public function getNames() {        
       $categorys =  Db::query('select * from tp_category'); 
       return $this->getTrees($categorys);
    }
    public function getTrees(array $arr,&$data=array(),$pid=0) {        
        foreach ($arr as $key => $va) {
            if($va['pid']==$pid){
                $data[]=$va;
                $this->getTrees($arr,$data,$va['id']);
            }
        }
        return $data;
    }
    /**
     * 判断某节点下是否存在某名称的子节点
     *
     * @access public
     * @param integer  $cid
     * @param string $cname
     * @return integer
     */
    function hasChildrenByName($pid, $name)
    {
        // 使用数组查询
        $cata = self::get(['pid'=>$pid,'name' =>$name ]);         
        return empty($cata)?false:true;
    }
}