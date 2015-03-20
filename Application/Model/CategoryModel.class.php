<?php
/**
 * Created by PhpStorm.
 */

class CategoryModel extends Model{
    /**
     * 查询出数据表中的数据
     */
    public function getList($parent_id=0){
         $rows = $this->getAll();
        return $this->getTree($rows,$parent_id);  //将其排序并且在每一行数据上面记录了一个deep
    }
    /**
     * 递归得到子分类
     * 根据分父分类id找到子分类的数据
     */
    public function  getTree(&$rows,$parent_id =0,$deep = 0){
        static $tree = array();
        foreach($rows as $row){
            if($row['cat_parent_id']==$parent_id){  //递归出口
                $row['deep'] = $deep;
                 $row['name_text'] = str_repeat('&nbsp;',$deep*5).$row['cat_name'];
                $tree[] = $row;
                $this->getTree($rows,$row['cat_id'],$deep+1); //递归入口
            }
        }
        return $tree;
    }

    /**
     * 将传递过来的数据保存到数据库表中.
     * @param $category
     */
    public function insert($category){
        //>>1.判断分类的名字是否为空
            $name = trim($category['cat_name']);
            if(empty($name)){
                $this->error_info = '分类的名字不能够为空';
                return false;
            }
        //>>2.添加分类的名字不能够在  当前父分类下存在...
             //>>2.1 先找到 parent_id 下的所有 子分类
                    $parent_id = $category['cat_parent_id'];
                    $chidrens = $this->getList($parent_id);
                    foreach($chidrens as $chidren){
                        //>>2.2 再将当前分类的名字和 parent_id 下所有子分类进行对比
                            if($chidren['cat_name']==$name){
                                $this->error_info = '分类的名字已经和子分类重复了';
                                 return false;
                            }
                    }

        return $this->insertData($category);
    }



    /**
     * 根据id查询出一行数据
     * @param $id
     */
    public function get($id){
        return $this->getByPK($id);
    }

    /**
     * 将请求中的数据修改到数据库表中
     * @param $category
     */
    public function update($category){
        //>>1.判断分类的名字是否为空
        $name = trim($category['cat_name']);
        if(empty($name)){
            $this->error_info = '分类的名字不能够为空';
            return false;
        }
        //>>2.添加分类的名字不能够在  当前父分类下存在...
        //>>2.1 修改时不能够将自己的父分类作为 自己或者是自己的子分类
                //>>a. 得到自己的子分类
                    $rows = $this->getList($category['cat_id']);
                    $ids = array_map(function($row){ return $row['cat_id'];},$rows);  //$ids 是一维数组.. 是每一个子分类的id
                    $ids[] = $category['cat_id'];  //将自己也放到ids中... 因为也不能够放自身上...
                //>>b. 比对用户选择的父分类的id是否在自己子分中.
                    //ids中包含了 自己的id和 子分类的id
                    if(in_array($category['cat_parent_id'],$ids)){
                        $this->error_info = '选择的父分类不能够是自己或者是自己的子分类';
                        return false;
                    }

        //>>2.2 先找到 parent_id 下的所有 子分类
        $parent_id = $category['cat_parent_id'];
        $chidrens = $this->getList($parent_id);
        foreach($chidrens as $chidren){
            if($chidren['cat_name']==$name && $chidren['cat_id']!=$category['cat_id']){
                $this->error_info = '分类的名字已经和子分类重复了';
                return false;
            }
        }
        return $this->updateData($category);
    }


    /**
     * 根据id删除一行数据
     * @param $id
     */
    public function remove($id){
        /**
         * 验证删除的分类下不能够有子分类
         */
        $count = $this->count("cat_parent_id = $id");
        if($count){
            $this->error_info = '删除的分类下有子分类不能够删除';
            return false;
        }
        return $this->deleteByPK($id);
    }


}