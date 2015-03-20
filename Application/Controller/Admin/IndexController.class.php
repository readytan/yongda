<?php

/**
 * 后台首页控制器
 *
 * @author Administrator
 */
class IndexController extends Controller {
    public function indexAction(){
        $this->display('index.html');
    }
    public function topAction(){
        $this->display('top.html');
    }
    public function menuAction(){
        $this->display('menu.html');
    }
    public function dragAction(){
        $this->display('drag.html');
    }
    public function mainAction(){
        $this->display('main.html');
    }
}
