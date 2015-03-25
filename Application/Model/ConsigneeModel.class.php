<?php

/**
 * 收货人模型类
 *
 * @author Administrator
 */
class ConsigneeModel extends Model {

    //获取收货人信息
    public function getConsigneeInfo() {
        $rows = $this->getAll();
        return $rows;
    }

    //添加收货人
    public function insert($consignee) {
        $this->insertData($consignee);
    }

    //删除收货人
    public function remove($id) {
        $this->deleteByPK($id);
    }

    //修改收货人信息
    public function update($consignee,$id) {
        $this->updateData($consignee,"id=$id");
    }

}
