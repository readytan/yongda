<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/18 0018
 * Time: 18:08
 */

class BrandModel extends Model{
    public function add($brand){
//        var_dump($brand);
//        exit;
        //用户名不能为空
        if(empty($brand['name'])){
            $this->error_info="名字不能为空";
            return false;
        }
        //用户名不能与数据库中重复
//        count(*) as count where name=$brand['name'];
        $count=$this->count("name='{$brand['name']}'");
        if($count>0){
            $this->error_info="用户名已经存在";
            return false;
        }
        //将数据插入数据库
        $this->insertData($brand);
    }
    public function update($brand){
        if(empty($brand['name'])){
            $this->error_info="用户名不能为空";
            return false;
        }
//        $sql = "select count(*) as count from ".$this->table();
        $count=$this->count("name='{$brand['name']}' and id<>{$brand['id']}");
        if($count>0){
            $this->error_info="用户名已经存在";
            return false;
        }
        $result=$this->updateData($brand);
    }

    public function remove($id){
        $logo=$this->getFieldByPK($id,'logo');
        if($logo){
            @unlink(ROOT_PATH.$logo);
        }
        $this->deleteByPK($id);
    }
}