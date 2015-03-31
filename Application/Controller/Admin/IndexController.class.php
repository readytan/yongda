<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/19 0019
 * Time: 15:33
 */

class IndexController extends PlatformController{
    public function indexAction(){
        $this->display('index.html');
    }
    public function dragAction(){
        $this->display('drag.html');
    }
    public function mainAction(){
        $this->display('main.html');
    }
    public function menuAction(){
        $this->display('menu.html');
    }
    public function topAction(){
        $this->display('top.html');
    }

}