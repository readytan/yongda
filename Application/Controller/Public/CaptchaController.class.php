<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/12 0012
 * Time: 下午 2:31
 */

class CaptchaController extends Controller{

    public function indexAction(){
        CaptchaTool::generate(); //生成验证码
    }
}