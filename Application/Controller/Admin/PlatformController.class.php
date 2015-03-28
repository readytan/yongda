<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/12 0012
 * Time: 上午 11:27
 */

/**
 * 所有的后台控制器都要基础该控制器.. 该控制器里面定义了对定了验证的代码..
 * Class PlatformController
 */
class PlatformController extends Controller{

    /**
     * 子类控制器创建对象时就要调用该方法...
     */
    public function __construct(){
        $this->checkLogin();
    }

    /**
     * 验证用户是否登录
     */
    public function checkLogin(){
        //排除请求AdminManagerController中login和checkLogin方法时的验证..
         if(CONTROLLER_NAME=='AdminManager'&&in_array(ACTION_NAME,array('login','checkLogin'))){
             return;
         }
        new SessionDBTool();
        if(!(isset($_SESSION['isLogin']) && $_SESSION['isLogin']=='yes')){
            //>>在没有登录的情况下使用浏览器上保持的cookie数据进行登录
            if(isset($_COOKIE['id'])&&isset($_COOKIE['password'])){
                $adminManagerModel = new AdminManagerModel();
                $result = $adminManagerModel->checkLoginByCookie($_COOKIE['id'],$_COOKIE['password']);
                if($result){
                    $_SESSION['isLogin'] = 'yes';
                    $this->redirect('index.php?p=Admin&c=Index&a=index');
                }
            }
            //说明浏览器没有主动发送过来is_login 的cookie.  说明之前没有登录过..
            $this->redirect('index.php?p=Admin&c=AdminManager&a=login');
        }
    }
}