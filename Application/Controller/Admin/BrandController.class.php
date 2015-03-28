<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/18 0018
 * Time: 18:01
 */
//index1.php?p=Admin&c=Brand&a=index
class BrandController extends Controller{
    public function indexAction(){
        //搜索功能
        $condition="";
        if(isset($_REQUEST['keyword'])){
            $keyword=trim($_REQUEST['keyword']);
            if(!empty($keyword)){
                $condition="name like '%$keyword%'";
            }
        }
        $page=isset($_GET['page'])?$_GET['page']:1;//页码
        $pageSize=isset($_GET['pageSize'])?$_GET['pageSize']:$GLOBALS['config']['Admin']['PAGE_SIZE'];//每页展示的条数

        //调用model中的方法
        $brandModel = new BrandModel();
        $pageResult=$brandModel->getPageResult($page,$pageSize,$condition);
        $rows =$pageResult['rows'];
        //分配数据
        $this->assign('rows', $rows);
        //分页工具条
       $page_html= PageTool::show("index.php?a=Admin&c=Brand&a=index",$pageResult['count'],$page,$pageSize,$_REQUEST);
        $this->assign('page_html',$page_html);
        //选择视图index.html
        $this->display('index.html');
    }

    public function editAction(){
        //添加时分配页面

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $brandModel = new BrandModel();
            $row = $brandModel->getByPK($id);
//            var_dump($row);
//            exit;
            $this->assign('row', $row);
        }
        $this->display('edit.html');
    }

    //处理提交的数据 index1.php?p=Admin&c=Brand&a=save
    public function saveAction(){

        //接收请求参数
        $allow_image_types = $GLOBALS['config']['ALLOW_IMAGE_TYPE'];
        $uploadTool = new UploadTool($allow_image_types);
//        var_dump($_FILES);
//        exit;
        $logo_path = $uploadTool->uploadOne($_FILES['logo'], 'logo');
        if ($logo_path !== false) {
            $_POST['logo'] = $logo_path;
        }
        //传递给model
        //根据是否传入id判断执行编辑还是添加操作
        $brandModel = new BrandModel();
//        var_dump($_POST);
//        exit;
        if (!empty($_POST['id'])) {
            $result = $brandModel->update($_POST);
            if ($result === false) {
                $this->redirect("index.php?p=Admin&c=Brand&a=edit&id=" . $_POST['id'], $brandModel->error_info, 2);
            }
            $this->redirect("index.php?p=Admin&c=Brand&a=index");
        } else {
//            var_dump($_POST);
//            exit;
            $result = $brandModel->add($_POST);

            //跳转到index.php?p=Admin&c=Brand&a=index页面
            if ($result === false) {
                $this->redirect("index.php?p=Admin&c=Brand&a=edit", $brandModel->error_info, 2);
            } else {
                $this->redirect("index.php?p=Admin&c=Brand&a=index");
            }
        }
    }

    public function removeAction(){
        $brandModel = new BrandModel();
        $id=$_GET['id'];
        $brandModel->remove($id);
        $this->redirect('index.php?p=Admin&c=Brand&a=index');
    }
}
