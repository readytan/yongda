<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/7 0007
 * Time: 下午 4:46
 */

class Controller {
    /**
     * 跳转的功能..
     * 1. 立即跳转
     * 2. 延时跳转(提示信息)
     * @param $url
     * @param string $msg
     * @param int $times
     */
    public static function redirect($url,$msg='',$times=0){
        if(!headers_sent()){
            //使用header实现
            if(!$times){
                //立即跳转
                header("Location: $url");
            }else{
                //延时跳转
                echo "<h1>".$msg."</h1>";  //输出错误信息
                header("Refresh: $times;$url");
            }
        }else{
            //使用js实现
            echo <<<JS
            <script type='text/javascript'>
                window.setTimeout(function(){
                    window.location.href="$url";
                },{$times}000)
            </script>
JS;
            if($times){
                echo "<h1>".$msg."</h1>";
            };
        }
        exit;  //因为已经跳转. 所以后面的代码不需要执行...
    }

    /**
     * 选择视图页面
     * @param $fileName
     */
    public function display($fileName){   //$this->data['row'] = $row;
        extract($this->data);  //$name =array('id'=>1,'name'=>'小米')
        /*$id = 1;
        $name = '小米';*/
            require CURRENT_VIEW_PATH.CONTROLLER_NAME.DS.$fileName;
    }

    private $data = array();
    /**
     * 该方法是用来为视图页面分配数据
     * @param $name   如果name是一个数组, 必须是一个关联数组(键值对的数组)
     * @param $value
     */
    public function assign($name,$value=''){  //$name =array('id'=>1,'name'=>'小米')
        if(is_array($name)){  //如果$name是一个数组, 直接将$name对应的数组中的键值放到$this->data中. 作为$this->data数组对应的键值
            $this->data = array_merge($this->data,$name);
        }else{
            $this->data[$name] = $value;
        }
    }
}