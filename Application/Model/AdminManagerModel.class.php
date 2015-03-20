<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/19 0019
 * Time: 11:17
 */

class AdminManagerModel extends Model{

    public function checkLogin($username,$password){
        //查询一行数据  select * from biaoming where username=
        $row=$this->getRow("username='$username' and password=md5('$password')");
//        var_dump($row);
//        exit;

       return $row;
    }
    public function checkLoginByCookie($id,$password){
        $row=$this->getByPk($id);
        if(md5($row['password'])==$password){
            return $row;
        }else{
            return false;
        }

    }
}