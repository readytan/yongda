<?php

/*
 * 平台控制器
 */
header('Content-Type:text/html;charset=utf-8');

class PlatformController extends Controller {

    public function __construct() {
        $this->checkLogin();
    }

    //验证是否登录
    public function checkLogin() {

        if (CONTROLLER_NAME == 'User' && in_array(ACTION_NAME, array('login', 'checkLogin'))) {
            return;
        }
       
        new SessionDBTool();
        if (!(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == 'yes')) {
            if (isset($_COOKIE['user_id']) && isset($_COOKIE['password'])) {
                $userModel = new UserModel();
                $result = $userModel->checkCookie($_COOKIE['user_id'], $_COOKIE['password']);
                if ($result) {
                    $_SESSION['isLogin'] = 'yes';
                    //如果通过cookie验证成功则跳转至个人中心

                    $this->redirect('index.php?p=Home&c=User&a=index');
                }
            }
            //cookie验证失败则跳转至登录页面
            $this->redirect('index.php?p=Home&c=User&a=login');    
        }
    }

}
