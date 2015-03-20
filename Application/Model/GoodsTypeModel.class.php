<?php
/**
 * 商品类型模型类
 */

class GoodsTypeModel extends Model{
    public function insert($data){
        return $this->insertData($data);
    }
}