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
            setcookie('username', $_POST['username'], time() + 60 * 60 * 24, '/','.test.212.com');
            //将user_id存入cookie中
            setcookie('user_id', $result['user_id'], time() + 60 * 60 * 24, '/', '.test.212.com');
            //将当前时间存入cookie中
            setcookie('now_time', date('Y-m-d H:i:s', time()), time() + 60 * 60 * 24, '/');
            //上次登录时间
            $last_time = isset($_COOKIE['now_time']) ? '您上次登录的时间是 :' . $_COOKIE['now_time'] : '欢迎首次登录';
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
//        require "F:\PHP\yongda\yongda\Application\libs\Smarty.class.php";
        require APP_PATH . 'libs/Smarty.class.php';
        $smarty = new Smarty();
        $smarty->setTemplateDir('F:\PHP\yongda\yongda\Application\View\Home\User');  //指定模板的目录,指定之后就可以在display中直接写文件的名字.
        $smarty->setCompileDir('F:\PHP\yongda\yongda\Application\View\Home\User_c'); //指定编译后的目录
        $smarty->left_delimiter = "{";
        $smarty->right_delimiter = "}";
        $years = array();
        for ($i = 1950; $i <= 2015; $i++) {
            $years[$i] = $i;
        }
        $months = array();
        for ($j = 1; $j <= 12; $j++) {
            if ($j < 10) {
                $months['0' . $j] = '0' . $j;
            } else {

                $months['' . $j] = '' . $j;
            }
        }
        $days = array();
        for ($k = 1; $k <= 31; $k++) {
            if ($k < 10) {
                $days['0' . $k] = '0' . $k;
            } else {
                $days['' . $k] = '' . $k;
            }
        }


        //根据id查出用户信息
        $username = $_COOKIE['username'];
        $userModel = new UserModel();
        $row = $userModel->getUserInfo($username);
        
        //生日
        $birthday = $row['birthday'];
        $year = substr($birthday, 0, 4);
        $month = substr($birthday, 5, 2);
        $day = substr($birthday, 8, 2);
        
        //性别
        $sexes=array('男','女');
        $sex=$row['sex'];
        $smarty->assign('sexes',$sexes);
        $smarty->assign('sex',$sex);
        

        $grades = array('0' => '请选择', '大学', '高中', '初中', '小学');
        $grade = $row['grade'];

        $hobby=array('1'=>'蓝球','2'=>'足球','3'=>'排球','4'=>'棒球');
        $smarty->assign('hobby',$hobby);
        $values=  explode(',', $row['hobby']);
        $smarty->assign('values',$values);
        
        $smarty->assign('grade', $grade);
        $smarty->assign('grades', $grades);

        $smarty->assign('year', $year);
        $smarty->assign('years', $years);

        $smarty->assign('month', $month);
        $smarty->assign('months', $months);

        $smarty->assign('day', $day);
        $smarty->assign('days', $days);


        //向页面分配数据
        $smarty->assign('row', $row);
        //展示页面
        $smarty->display('userInfo.html');
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
        $id=$_COOKIE['user_id'];
        $consigneeModel = new ConsigneeModel();
        //获取收货人信息
        $rows = $consigneeModel->getConsigneeInfo($id);
        // 向页面分配数据
        $this->assign('rows', $rows);
        //展示页面
        $this->display('consignee.html');
    }

    //添加收货人
    public function addAction() {
        $consignee = $_POST;
        $consigneeModel = new ConsigneeModel();
        $consigneeModel->insert($consignee);
        $this->redirect('index.php?p=Home&c=User&a=list');
    }

    //删除收货人
    public function removeAction() {
        $id = $_GET['id'];
        $consigneeModel = new ConsigneeModel();
        $consigneeModel->remove($id);
        $this->redirect('index.php?p=Home&c=User&a=list');
    }

    //修改收货人信息
    public function updateAction() {
        $consignee = $_POST;
        $id = $_POST['id'];
        $consigneeModel = new ConsigneeModel();
        $consigneeModel->update($consignee, $id);
        $this->redirect("index.php?p=Home&c=User&a=list", '修改成功', 2);
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
