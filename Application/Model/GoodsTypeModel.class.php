<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/23 0023
 * Time: 15:37
 */

class GoodsTypeModel extends Model{
    public function index(){
        $result=$this->getAll();
        return $result;
    }
    public function add($data){
        //判断名字是否为空
        if(empty($data['name'])){
            $this->error_info="名字不能为空";
            return false;
        }
        //判断名字在数据库中是否存在
        //select count(*) as count where name=$data['name']
        $count=$this->count("name='{$data['name']}'");
        if($count>0){
            $this->error_info="名字已存在";
            return false;
        }
        $result=$this->insertData($data);
    }



    public function remove($id){
        $this->deleteByPK($id);
    }



    public function update($data){
        //判断名字是否为空
        if(empty($data['name'])){
            $this->error_info="名字不能为空";
            return false;
        }
        //判断名字在数据库中是否存在
        //select count(*) as count where name=$data['name'] and id<>$data['id']
        $count=$this->count("name='{$data['name']}' and id<>{$data['id']}");
        if($count>0){
            $this->error_info="名字已存在";
            return false;
        }
        $this->updateData($data);
    }

}