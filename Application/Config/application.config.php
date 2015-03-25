<?php
/**
 * 该文件是一个配置文件. 通常来存放 数据库的信息和网站的一些默认信息
 */
return array(
    'DB'=>array(  //DB对应数据库的相关配置
        'host'=>'localhost',
        'user'=>'root',
        'password'=>'hello',
        'port'=>'3306',
        'dbname'=>'yongda',
        'prefix'=>'yd_'   //配置前缀
    ),
    'app'=>array(  //将来为项目提供默认值
        'default_platform'=>'Home',
        'default_controller'=>'User',
        'default_action'=>'login',
    ),
    //前后台的配置信息
    'Admin'=>array(
        'PAGE_SIZE'=>2 //默认每页显示条数
    ),
    'Home'=>array(),
    'ALLOW_IMAGE_TYPE'=>array('image/jpg','image/jpeg','image/png','image/gif')
);