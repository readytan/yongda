<?php
/**
 商品类型
 */

class GoodsTypeController extends Controller {

    //展示商品类型列表
    public function indexAction(){
        //获取页码与每页显示的记录数
       $page=  isset($_REQUEST['page'])?$_REQUEST['page']:1;
        $pageSize=  isset($_REQUEST['pageSize'])?$_REQUEST['pageSize']:5;

        //创建goodsModel类
        $goodsTypeModel=new GoodsTypeModel();
        //查询分类
        $pageResult=$goodsTypeModel->getPageResult($page, $pageSize);

        //向页面分配数据
        $this->assign('rows', $pageResult['rows']);

        //展示页面
       $this->display('index.html');
    }

    //增加商品分类
    public function addAction(){

        if(isset($_GET['type_id'])){
            $id=$_GET['type_id'];
        $goodsModel=new GoodsTypeModel();
        $row=$goodsModel->getByPK($id);
        //向页面分配数据
            $this->assign($row);
        }
        //展示页面
        $this->display('add.html');


    }
    //接收post提交的数据存入数据库
    public function insertAction(){
        $goodsType=$_POST;
        var_dump($_POST);
    $goodsTypeModel=new GoodsTypeModel();
      $goodsTypeModel->insert($goodsType);

        //向页面分配数据

        $this->redirect('index.php?p=admin&c=GoodsType&a=index');
    }

    //删除功能
    public function removeAction(){
        $id=$_GET['type_id'];
        $goodsModel=new GoodsTypeModel();
        $goodsModel->deleteByPK($id);
        $this->redirect('index.php?p=admin&c=GoodsType&a=index');
    }
}