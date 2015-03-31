<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/23 0023
 * Time: 15:04
 */
class GoodsTypeController extends Controller{
    public function indexAction(){
        $goodsTypeModel=new GoodsTypeModel();
        $rows=$goodsTypeModel->index();
        $this->assign('rows',$rows);
        $this->display('index.html');
    }
    public function editAction(){
        //根据传入的id回显数据
        //若传入了id则需要回显,进行的操作是编辑
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $goodsTypeModel=new GoodsTypeModel();
            $row=$goodsTypeModel->getByPK($id);
            $this->assign('row',$row);
        }
        $this->display('edit.html');



//        $this->display('edit.html');
    }
    public function saveAction(){

        //接收post提交的参数
        $data=$_POST;
        $goodsTypeModel=new GoodsTypeModel();
        if(!empty($data['id'])){
            $result=$goodsTypeModel->update($data);//update方法不仅可以添加数据到数据库,也能验证name;
            if($result===false){//更新数据失败
                //返回失败原因,跳转到添加页面
                $this->redirect("index.php?p=Admin&c=GoodsType&a=edit&id=".$data['id'],$goodsTypeModel->error_info,2);
            }else {
                $this->redirect("index.php?p=Admin&c=GoodsType&a=index");
            }
        }
        $result=$goodsTypeModel->add($data);//add方法不仅可以添加数据到数据库,也能验证name;
        if($result===false){//添加数据失败
            //返回失败原因,跳转到添加页面
            $this->redirect("index.php?p=Admin&c=GoodsType&a=edit",$goodsTypeModel->error_info,2);
        }else {
            $this->redirect("index.php?p=Admin&c=GoodsType&a=index");
        }

    }
    public function removeAction(){
        //接收id
        $id=$_GET['id'];
        //将id传给model中的remove方法删除数据
        $goodsTypeModel=new GoodsTypeModel();
        $result=$goodsTypeModel->remove($id);
        //返回列表页面
        $this->redirect("index.php?p=Admin&c=GoodsType&a=index");
    }
}