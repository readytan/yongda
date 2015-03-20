<?php
/**属性控制器
 */

class Attribute {
    public function index(){
        $page=isset($_REQUEST['page'])?$_REQUEST['page']:1;
        $pageSize=isset($_REQUEST['pageSize'])?$_REQUEST['pageSize']:$GLOBALS['config']['Admin']['pageSize'];

    $attributModel=new AttributeModel();
        $attributModel->getPageResult();
    }
}