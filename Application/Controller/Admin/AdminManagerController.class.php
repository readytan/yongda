<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/19 0019
 * Time: 10:24
 */
//index.php?p=Admin&c=AdminManager&a=login
class AdminManagerController extends PlatformController{

    public function indexAction(){
//        $this->checkLogin();
        $this->display('index.html');
    }
    public function loginAction(){
        $username=isset($_COOKIE['username'])?$_COOKIE['username']:'';
        $this->assign('username',$username);
        $this->display('login.html');
    }
    //提交登陆表单时检查提交的数据
    public function checkLoginAction(){
        new SessionDBTool();
        if(!CaptchaTool::check($_POST['captcha'])){
            $this->redirect("index.php?p=Admin&c=AdminManager&a=login","验证码输入错误",2);
        }

        //接收数据
//        var_dump($_POST);
//        exit;
        $username=$_POST['username'];
        $password=$_POST['password'];
        //传给model验证登录信息
        $adminManagerModel=new AdminManagerModel();
        $result=$adminManagerModel->checkLogin($username,$password);
//        var_dump($result);
//        exit;

        if($result) {
            $_SESSION['islogin']='yes';
            setcookie('username',$username,time()+3600);
           // 勾选了记住我.....
            if(isset($_POST['remember'])){
                setcookie('id',$result['id'],time()+3600,'/');
                setcookie('password',md5($result['password']),time()+3600,'/');
            }
            //登陆成功后展示后台页面
            $this->redirect("index.php?p=Admin&c=Index&a=index");

        }else {
            //登陆失败跳转到登陆页面index.php?p=Admin&c=AdminManager&a=login
            $this->redirect("index.php?p=Admin&c=AdminManager&a=login", "用户名或密码错误", 2);
        }

    }
    //退出登录,清除COOKIE信息
    public function LayoutAction(){
        unset($_SESSION);
        $this->display('login.html');
    }
}