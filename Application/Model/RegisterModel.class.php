<?php

/**
 * 注册model
 *
 * @author Administrator
 */
class RegisterModel extends Model{
    public $error_info;

    //向数据库插入用户数据
    public function insert($user) {
        $basketball = isset($_POST['baseketball']) ? $_POST['baseketball'] : 0;
        $football = isset($_POST['football']) ? $_POST['football'] : 0;
        $volleryball = isset($_POST['volleryball']) ? $_POST['volleryball'] : 0;
        $baseball = isset($_POST['basebaseballketball']) ? $_POST['baseball'] : 0;

        $hobby = $baseball | $football | $volleryball | $baseball;
        $user['hobby'] = $hobby;
        var_dump($user);
        exit;

       $sql="insert into yd_user values";

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
}
