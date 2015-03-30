<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminManagerController
 *
 * @author Administrator
 */
class AdminManagerController extends Controller {

    //后台展示用户列表
    public function userListAction() {
        $condition = "";
        if (isset($_REQUEST['keyword'])) {
            $keyword = trim($_REQUEST['keyword']);
            if (!empty($keyword)) {
                $condition = "username like '%$keyword%'";
            }
        }
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] : $GLOBALS['config']['Admin']['PAGE_SIZE'];
        //调用userModel查询出所有的用户信息
        $userModel = new UserModel();
         //>>2.准备分页工具条的html
        //>>3. 选择视图页面
        //在cookie中记录该列表的url地址
        setcookie('__forward__', $_SERVER['REQUEST_URI']); //为了删除或者编辑之前重写跳转到该地址
        //展示页面
        $pageResult = $userModel->getPageResult($page, $pageSize, $condition);
        $rows = $pageResult['rows'];
        $page_html = PageTool::show('index.php?p=Admin&c=AdminManager&a=userList', $pageResult['count'], $page, $pageSize, $_REQUEST); //在show方法中传入$params, 为了是让分页的html中生成的url带条件
        $this->assign('page_html', $page_html);
        $this->assign('rows', $rows);
        //向页面分配数据
        $this->display('user_list.html');
    }

    //展示用户的收货地址
    public function consigneeListAction() {
        //获取用户id
        $id = $_GET['id'];
        //调用consigneeModel查询出收货地址
        $consigneeModel = new ConsigneeModel();
        $rows = $consigneeModel->getConsigneeInfo($id);
        //向页面分配数据
        $this->assign('rows', $rows);
       
        //展示页面
        $this->display('address.html');
    }

    //个人订单列表
    public function checkOrderAction() {
        //获取用户id
        $id = $_GET['id'];
        //调用orderModel查询出收货地址
        $orderModel = new OrderModel();
        $userOrder = $orderModel->orderList($id);
        //向页面分配数据
        $this->assign('userOrder', $userOrder);
        //展示页面
        $this->display('person_order.html');
    }

}
