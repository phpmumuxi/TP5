<?php

namespace app\admin\controller\goods;

use app\common\controller\Base;
use think\Request;
use think\Db;

class Category extends Base
{
    /**
     * 显示创建分类表单.
     *
     * @return \think\Response
     */
    public function add()
    { 
     $category=new \app\admin\model\Category;
     if (request()->isPost()){
        $name=input('post.name/s');
        $pid=input('post.pid/d');
        $has=$category ->hasChildrenByName($pid, $name);
        if (!$has && $parent = $category::get($pid)) {  
            // 启动事务
            Db::startTrans();
            try{
                //将所有后添加的结点的左值扩展2
                Db::table('tp_category')
                    ->where('lft','>',intval($parent['rgt']))
                    ->setInc('lft',2);             
               //把父分类的所有父级及后添加的结点右边界值扩展2
                Db::table('tp_category')
                    ->where('rgt','>=',intval($parent['rgt']))
                    ->setInc('rgt',2);
                //新加入节点，本节点的左值为父节点的原右值，右值为左值+1
                $category->name    = $name;
                $category->pid    = $pid;
                $category->lft     = intval($parent['rgt']);
                $category->rgt     = intval($parent['rgt'])+1;
                $category->depth   = intval($parent['depth'])+1;
                $category->save();
            // 提交事务
              return Db::commit()?true:false; 
            }catch(think\Exception $e){
                // 回滚事务
                Db::rollback();
                return false;
            }
        }
     }
       
        $names= $category ->getNames(); 
        $bread=array(
                    'first'=>'商品管理',
                    'second'=>'分类列表',
                    );
        return $this->fetch('add',[
               'bread'=>$bread,
               'names'=>$names
           ]);
    }
    
    ////删除当前要删除节点及其子节点
    public function delAll($id)
    {
        $id=input('get.id/d');
        $category=new \app\admin\model\Category;
        $node = $category::get($id);
        if ($node) {
            Db::startTrans();
            try {
                //删除当前要删除节点及其子节点
                 Db::table('tp_category')
                    ->where('lft','>=',intval($node['lft']))
                    ->where('rgt','<=',intval($node['rgt']))
                    ->delete(); 
                //重置被删除节点父节点的左右值
                 $offset = $node['rgt'] - $node['lft'] + 1;
                //重新校正所有左边界值大于被删除节点右边界值的节点(一般指创建在被删除节点之后的那些节点)
                 Db::execute("update tp_category set lft=lft-{$offset} where lft>". intval($node['rgt']));
                //同上，校正被删除节点父级分类及后来创建分类的右边界值
                 Db::execute("update tp_category set rgt=rgt-{$offset} where rgt>". intval($node['rgt']));  
                return Db::commit()?true:false; 
            } catch (Exception $e) {
                // 回滚事务
                Db::rollback();
                return false;
            }
        }
    }
    
   //在某些情况下，只需要删除某个节点，但是并不希望删除该节点下的子节点数据。  
   //通过把右侧所有节点的左右值-2，当前节点的子节点左右值-1  
    public function delOne($id)
    {
        $id=input('get.id/d');
        $category=new \app\admin\model\Category;
        $node = $category::get($id);
        if ($node) {
            Db::startTrans();
            try {
                //删除当前要删除节点
                 Db::table('tp_category')
                    ->delete($id); 
                //重新校正所有子节点
                 Db::execute("update tp_category set lft=lft-1,rgt=rgt-1,depth=depth+1 where lft between {$node['lft']} and {$node['rgt']}");
                //同上，校正被删除节点父级分类及后来创建分类的右边界值
                 Db::execute("update tp_category set lft=lft-2 where lft>". intval($node['rgt']));  
                 Db::execute("update tp_category set rgt=rgt-2 where rgt>". intval($node['rgt']));  
                return Db::commit()?true:false; 
            } catch (Exception $e) {
                // 回滚事务
                Db::rollback();
                return false;
            }
        }
    }
    
    /**
     * 取得节点的父节点
     *
     * @access public
     * @param integer $id
     * @return array
     */
    function getsParent($id)
    {
        $category=new \app\admin\model\Category;
        $node = $category::get($id);
        //print_r($node);die;
        $cate=$category->where('lft','<', $node['lft'])
                ->where('rgt','>', $node['rgt'])
                ->where('depth','>',0)
                ->order('lft', 'asc')
                ->select();
        $s='';
        foreach ($cate as $key => $va) {
             $s.=$va['name'].'>';
        }
        echo $s;
    }

}