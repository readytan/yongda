<?php

/**
 * 注册控制器
 *
 * @author Administrator
 */
class RegisterController extends Controller {

    //展示注册页面
    public function registerAction() {
        $this->display('register.html');
    }

    //用户注册,将用户注册信息存入数据表
    public function checkRegisterAction() {
        //判断用户名是否可用,跟数据的用户名进行比对,不能有同名
        $user = $_POST;
        if (empty($_POST['username'])) {
            $this->redirect('index.php?p=Home&c=Register&a=register', '用户名不能为空', 2);
        }
        if (empty($_POST['password'])) {
            $this->redirect('index.php?p=Home&c=Register&a=register', '密码不能为空', 2);
        }
        if (empty($_POST['password2'])) {
            $this->redirect('index.php?p=Home&c=Register&a=register', '密码不能为空', 2);
        }
        if (empty($_POST['email'])) {
            $this->redirect('index.php?p=Home&c=Register&a=register', '邮箱不能为空', 2);
        }
        if (empty($_POST['qq'])) {
            $this->redirect('index.php?p=Home&c=Register&a=register', 'qq不能为空', 2);
        }
        if (empty($_POST['phone'])) {
            $this->redirect('index.php?p=Home&c=Register&a=register', '手机号码不能为空', 2);
        }
        $userModel = new UserModel();
        $result = $userModel->checkRegister($user);
        //注册成功则跳转提示成功,失败继续跳转至当前页面
        if ($result == FALSE) {

            $this->redirect('index.php?p=Home&c=Register&a=register', $userModel->error_info, 2);
        } else {
            $userModel->insert($user);
            setcookie('user_id', $result['user_id'], time() + 60 * 60 * 24, '/', '.test.212.com');
            setcookie('password', md5($result['password']), time() + 60 * 60 * 24, '/', '.test.212.com');
            $this->redirect('index.php?p=Home&c=User&a=index', '注册成功,即将跳转到个人中心', 2);
        }
    }

}
