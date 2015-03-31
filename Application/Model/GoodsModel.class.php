<?php //

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class GoodsModel extends Model {

    public function insert($post) {
        $is_best = isset($post['is_best']) ? 1 : 0;
        $is_new = isset($post['is_new']) ?2 :0 ;
        $is_hot = isset($post['is_hot']) ? 4:0;
        $goo_status=0;
        $goo_status= $goo_status | $is_best | $is_new| $is_hot;
        $post['goo_status']=$goo_status;
        return $this->insertData($post);
    }
    public function remove($id){
        $goo_tu=  $this->getFieldByPK($id, 'goo_tu');
        if($goo_tu){
            unlink(ROOT_PATH.$goo_tu);
        }
        return  $this->deleteByPK($id);
    }
    public function update($post)
    {
        if(empty($post['goo_name'])){
            $this->error_info = '名字不能够为空!';
            return false;
        }
        //>>2.名字不能够其他的重复
        $count  =  $this->count("goo_name='{$post['goo_name']}' and goo_id<>{$post['goo_id']}");  //需要将自己排除掉..
        if($count>0){
            $this->error_info = '名字已经在数据库中存在,请求更换!';
            return false;
        }
        return $this->updateData($post);
    }

}
