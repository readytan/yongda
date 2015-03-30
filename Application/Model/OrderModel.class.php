<?php

/**
 * 订单Model
 *
 * @author Administrator
 */
class OrderModel extends Model{
    //展示用户订单列表
    public function orderList($id){
        $userOrder=$this->getAll();
    }
}
