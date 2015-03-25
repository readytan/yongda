<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/20
 * Time: 16:24
 */
class UserModel extends Model {

    public $error_info;

    //向数据库插入用户数据
    public function insert($user) {
        $basketball = isset($_POST['baseketball']) ? $_POST['baseketball'] : 0;
        $football = isset($_POST['football']) ? $_POST['football'] : 0;
        $volleryball = isset($_POST['volleryball']) ? $_POST['volleryball'] : 0;
        $baseball = isset($_POST['basebaseballketball']) ? $_POST['baseball'] : 0;

        $hobby = 0;
        $hobby = $baseball | $football | $volleryball | $baseball;
        $user['hobby'] = $hobby;
        $password = $user['password'];
        $user['password'] = md5($password);
        $this->insertData($user);
    }

    //注册验证
    public function checkRegister($user) {
        //检查用户名是否存在
        $username = $user['username'];
        $result = $this->getRow("username='$username'");
        if ($result) {
            $this->error_info = '注册失败,用户名已存在';
            return false;
        } elseif ($user['password'] != $user['password2']) {
            $this->error_info = '注册失败,两次输入的密码不一样';
            return false;
        } else {
            return true;
        }
    }

    //验证登录
    public function checkLogin($username, $password) {
        $row = $this->getRow("username='$username' and password=md5('$password')");
        return $row;
    }

    //通过cookie验证登录
    public function checkCookie($cookie_id, $cookie_password) {

        $row = $this->getRow("user_id=$cookie_id");
        if ($row && md5($row['password']) == $cookie_password) {
            return $row;
        } else {
            return false;
        }
    }

    //退出登录
    public function exitLogin() {
        new SessionDBTool();
        unset($_SESSION['isLogin']);
        setcookie('user_id', '', time() - 60 * 60 * 24, '/', '.test.212.com');
        setcookie('password', '', time() - 60 * 60 * 24, '/', '.test.212.com');
    }

    //展示用户信息
    public function getUserInfo($username) {
        return $row = $this->getRow("username = '$username'");
    }

    //修改用户信息
    public function updateUserInfo($user, $id) {
        $this->updateData($user, "user_id=$id");
    }

    //修改密码
    public function updatePassword($user) {
        //输入的原密码 
        $old_password = $user['old_password'];
        $old_password=md5($old_password);
        //输入新密码
        $new_password = $user['new_password'];
        $new_password=  md5($new_password);
        //确认密码
        $confirm_password=$user['confirm_password'];
        $confirm_password=md5($confirm_password);
        //从数据库中取出真正的密码
        $id=$_COOKIE['user_id'];
        $password=  $this->getFieldByPK($id, "password");
        //比对输入的原密码与数据库中的密码是否相同
        if ($old_password != $password) {
            $this->error_info = '原密码输入错误';
            return false;
        } elseif ($confirm_password != $new_password) {
            $this->error_info = '确认密码输入错误';
            return false;
        } else {
            $user['password']=$new_password;
            $this->updateData($user, "password=$new_password");
            return true;
        }
    }

}
