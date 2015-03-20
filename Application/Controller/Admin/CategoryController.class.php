<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/13 0013
 * Time: 上午 10:35
 */

class CategoryController extends Controller{

    /**
     * 展示category表中的数据
     */
    public function indexAction(){
            //分页
            $page_Size=$GLOBALS['config']['Admin']['pageSize'];
            $page=  isset($_GET['page'])?$_GET['page']:1;
            $pageSize=  isset($_GET['pageSize'])?$_GET['pageSize']:$page_Size;
            $upload=new CategoryModel();
            $pageRsult=$upload->getPageResult($page, $pageSize);
            $rows=$pageRsult['rows'];
            $rows=$upload->getTree($rows);
            $this->assign('rows',$rows);
            
            $page_html=  PageTool::show('index.php?p=Admin&c=Category&a=index', $pageRsult['count'], $page, $pageSize);
            $this->assign('page_html',$page_html);
            
            $this->display('index.html');
    }


    /**
     * 展示添加页面
     */
    public function addAction(){
        //>>1.将分类数据查询出来
        $categoryModel = new CategoryModel();
        $rows = $categoryModel->getList();
        //>>2. 分配数据给页面展示
         $this->assign('rows',$rows);
        //>>3. 选择页面
        $this->display('add.html');
    }

    public function insertAction(){
        //>>1.接受请求参数
         $category = $_POST;
        //>>2.将参数内容传递给Model让其保存到数据库表中
            $categoryModel = new CategoryModel();
            $result = $categoryModel->insert($_POST);
            if($result===false){
                $this->redirect('index.php?p=Admin&c=Category&a=add',$categoryModel->error_info,2);
            }
        //>>3.跳转到列表
        $this->redirect('index.php?p=Admin&c=Category&a=index');
    }

    /**
     * 根据一个id 在页面上回显 当前行的数据
     */
    public function editAction(){
        //>>1.接收id的值
            $id = $_GET['id'];
        //>>2.需要根据id查询出对应的数据
            $categoryModel = new CategoryModel();
            $category =  $categoryModel->get($id);
            $this->assign('category',$category);
        //>>3.查询出所有分类
            $rows = $categoryModel->getList();
            $this->assign('rows',$rows);
        //>>4. 展示回显页面
        $this->display('edit.html');
    }

    /**
     * 将请求中的数据修改到对应的行上面
     */
    public function updateAction(){
        //>>1.接收修改表单的参数
        //>>2.使用Model进行修改
        $categoryModel = new CategoryModel();
        $result = $categoryModel->update($_POST);
        if($result===false){
            $this->redirect('index.php?p=Admin&c=Category&a=edit&id='.$_POST['cat_id'],$categoryModel->error_info,2);
        }else{
            $this->redirect('index.php?p=Admin&c=Category&a=index');
        }
    }


    /**
     * 根据id删除一行数据..
     * 但是只能够删除 没有子分类的分类
     */
    public function removeAction(){
        //>>1.得到请求参数..
        $id = $_GET['id'];
        //>>2.根据请求参数删除
        $categoryModel = new CategoryModel();
        $result = $categoryModel->remove($id);
        if($result===false){
            $this->redirect('index.php?p=Admin&c=Category&a=index',$categoryModel->error_info,2);
        }else{
            $this->redirect('index.php?p=Admin&c=Category&a=index');
        }
    }
}