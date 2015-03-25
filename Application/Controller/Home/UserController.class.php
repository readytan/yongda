<?php

/**
 * 用户控制器
 */
class UserController extends PlatformController {

    //用户中心
    public function indexAction() {
        $this->display('ucenter.html');
    }

    //展示登录页面
    public function LoginAction() {
        $this->display('login.html');
    }

    // 验证登录
    public function checkLoginAction() {

        new SessionDBTool();

        $username = $_POST['username'];
        $password = $_POST['password'];
        $userModel = new UserModel();
        $result = $userModel->checkLogin($username, $password);

        if ($result) {
            $_SESSION['isLogin'] = 'yes';
            //将用户名存入cookie中
            setcookie('username', $_POST['username'], time() + 60 * 60 * 24, '/');
            //将user_id存入cookie中
                setcookie('user_id', $result['user_id'], time() + 60 * 60 * 24, '/', '.test.212.com');
            //将当前时间存入cookie中
            setcookie('now_time', date('Y-m-d H:i:s', time()), time() + 60 * 60 * 24, '/');
            //上次登录时间
            $last_time = isset($_COOKIE['now_time']) ? $_COOKIE['now_time'] : '欢迎首次登录';
            setcookie('last_time', $last_time, time() + 60 * 60 * 24, '/');
            //是否记住我
            if (isset($_POST['remember'])) {
                setcookie('password', md5($result['password']), time() + 60 * 60 * 24, '/', '.test.212.com');
            }

            $this->redirect('index.php?p=Home&c=User&a=index', '登录成功 , 即将进入个人中心', 2);
        } else {
            $this->redirect('index.php?p=Home&c=User&a=login', '登录失败 , 用户名或密码错误', 2);
        }
    }

    //退出登录
    public function exitAction() {
        $userModel = new UserModel();
        $userModel->exitLogin();
        $this->redirect('index.php?p=Home&c=User&a=login', '退出成功', 2);
    }

    //用户信息
    public function userInfoAction() {
        //根据id查出用户信息
        $username = $_COOKIE['username'];
        $userModel = new UserModel();
        $row = $userModel->getUserInfo($username);
        //向页面分配数据
        $this->assign('row', $row);
        //展示页面
        $this->display('userInfo.html');
    }

    //修改用户信息
    public function updateUserInfoAction() {
        $user = $_POST;
        $id = $_COOKIE['user_id'];
        $userModel = new UserModel();
        $userModel->updateUserInfo($user, $id);
        $this->redirect('index.php?p=Home&c=User&a=userInfo');
    }

    //收货人信息表
    public function listAction() {
        $consigneeModel = new ConsigneeModel();
        //获取收货人信息
        $rows = $consigneeModel->getConsigneeInfo();
        //设置默认收货地址
        $row = $rows[6];
        // 向页面分配数据
        $this->assign('row', $row);
        //展示页面
        $this->display('gwc2.html');
    }

    //展示增加收货人的编辑页面
    public function editAction() {
        $id = $_GET['id'];
        $consigneeModel = new ConsigneeModel();
        $row = $consigneeModel->getByPK($id); //根据id查询出一行记录
        $this->assign('row', $row);
        $this->display('consignee.html');
    }

    //添加收货人
    public function addAction() {
        $consignee = $_POST;
        $consigneeModel = new ConsigneeModel();
        $consigneeModel->insert($consignee);
    }

    //删除收货人
    public function removeAction() {
        $id = $_GET['id'];
        $consigneeModel = new ConsigneeModel();
        $consigneeModel->remove($id);
    }

    //修改收货人信息
    public function updateAction() {
        $consignee = $_POST;
        $id = $_POST['id'];
        $consigneeModel = new ConsigneeModel();
        $consigneeModel->update($consignee, $id);
        $this->redirect("index.php?p=Home&c=User&a=edit&id=$id", '修改成功', 2);
    }

    //修改密码
    public function updatePasswordAction() {
        $user = $_POST;
        //将输入的原密码与数据库中的密码进行比对,看原密码是否输入正确
        $userModel = new UserModel();
        $result = $userModel->updatePassword($user);
        if ($result) {
            $this->redirect('index.php?p=Home&c=User&a=userInfo', '密码修改成功', 2);
        } else {
            $this->redirect('index.php?p=Home&c=User&a=userInfo', $userModel->error_info, 2);
        }
    }

}
