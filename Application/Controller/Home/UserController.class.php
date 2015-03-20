<?php
/**
 * 用户控制器
 */

class UserController extends Controller {
    public function listAction(){
        $userModel=new UserModel();
        $userModel->getList();

    }
    //用户注册,将用户注册信息存入数据表
    public function register(){
        //判断用户名是否可用,跟数据的用户名进行比对,不能有同名
        $userModel=new UserModel();

        $alluser=

        $user=$_POST;
        $userModel=new UserModel();
        $userModel->insert($user);
        //注册成功则跳转提示成功,失败继续跳转至当前页面


    }
    public function indexAction(){
        //用户中心
        $this->display('ucenter.html');

    }
    //用户登录,登录的时候用户数据与数据的进行比对
    public function LoginAction(){

    }
}