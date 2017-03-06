<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Controller;

use Think\Controller;
use Home\Model\UsersModel;
use Home\Model\Contact_usModel;
use Home\Model\Order_itemsModel;
use Think\Verify;

/**
 * Description of UsersController
 *
 * @author gu
 */
class UsersController extends Controller {

    /**
     * 登录
     */
    function login() {
        $this->display();
    }

    /**
     * 检查登录信息
     */
    function dologin() {

        header("Content-Type:text/html; charset=utf-8");

        if (!empty($_POST["username"]) && !empty($_POST["password"])&& !empty($_POST['code'])) {
            $verify = new Verify();
            if (!$verify->check($_POST['code'])){
                $this->error('验证码错误！','',1);
            }
            $username = $_POST["username"];
            $password = $_POST["password"];
            $user = new UsersModel();
            $result = $user->login($username, $password);
            //判断是否能够登录 
            if ($result) {
                //登录成功,记录用户登录 session 值 
//                $_SESSION["user"]=$username; 
                $this->assign('data', $username);
                session('username', $username);
                session('password', $password);

                $buy_id = $user->getUID($username);
                session('buy_id', $buy_id);

                $this->orderAndCount();
                $this->success('登录成功！，欢迎您' . $username, '../Index/index');
            } else {
                $this->error('用户名或密码错误！','login',1);
            }
        } else {
            //非法访问方式，直接跳转到页面 
            $this->error('非法操作，跳转到登录页面！','login',1);
        }
    }

    /**
     * 退出登录
     */
    public function logout() {
        session_unset();
        session_destroy();
        echo "<script>alert('退出成功')</script>";
        $this->display('login');
    }

    /**
     * 注册
     */
    function register() {
        $this->display();
    }
    /**
     * 执行注册
     */
    function doregister() {
        header("Content-Type:text/html; charset=utf-8");
        //注册
        if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password1"]) && !empty($_POST["account"])) {

            $user = new UsersModel();
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $password1 = $_POST["password1"];
            $account = $_POST["account"];
            $result = $user->register($username, $password, $password1, $email, $account);
            switch ($result) {
                case -1:
                    echo "<script>alert('用户名或账号已被注册，重新注册')</script>";
                    $this->display('register');
                    break;
                case -2:
                    echo "<script>alert('两次密码不对应，重新注册')</script>";
                    $this->display('register');
                    break;
                case 1:
//                    echo  "<script>alert('注册成功,欢迎您.$username')</script>"; 
                    $this->assign('data', $username);
                    $this->success('注册成功,欢迎您' . $username, '../Index/index');
                    break;
                case 2:
                    echo "<script>alert('注册失败！')</script>";
                    $this->display('register');
                    break;
            }
        } else {
            //非法访问方式，直接跳转到页面 
            echo "<script>alert('非法操作，重新注册')</script>";
            $this->display('register');
        }
    }
    /**
     * 联系我们
     */
    function contact_us() {
        $this->display();
    }
    /**
     * 处理联系我们事务
     */
    function do_contact_us() {
        header("Content-Type:text/html; charset=utf-8");

        if (!session('username') && !session('password')) {
            $this->error("你还没登录，请登录");
        } else {
            //联系我们
            if (!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["phone"]) && !empty($_POST["message"])) {
                $data["name"] = $_POST["username"];
                $data["phone"] = $_POST["phone"];
                $data["email"] = $_POST["email"];
                $data["message"] = $_POST["message"];
                $cantact = new Contact_usModel();
                $result = $cantact->contanct_us($data);
                if ($result) {
                    echo "<script>alert('已收到你的联系，谢谢')</script>";
                    $this->display('contact_us');
                } else {
                    echo "<script>alert('操作失败，请再次尝试。')</script>";
                    $this->display('contact_us');
                }
            } else {
                //非法访问方式，直接跳转到页面 
                echo "<script>alert('非法操作，重新注册')</script>";
                $this->display('contact_us');
            }
        }
    }
    /**
     * 购物车
     */
    public function cart() {
        if (!session('username') && !session('password')) {
            $this->error("你还没登录，请登录");
        } else {
            $orderResult = $this->orderAndCount();
            $this->assign('totalMoney', $orderResult[0]);
            $this->assign("pricelist", $orderResult[1]);
            $this->assign("order_result", $orderResult[2]);
            $this->assign("blist", $orderResult[3]);
            $this->display();
        }
    }
    /**
     * 删除购物车商品
     * @param type $id
     */
    public function delete($id) {

        $delete = new \Home\Model\UsersModel;
        $result = $delete->deleteCart($id);
        if ($result > 0) {
            $this->success("删除成功", U('Users/cart'));
        } else {
            $this->error("删除失败！", U('Users/cart'));
        }
    }
    /**
     * 添加商品到购物车
     * @param type $id
     */
    public function order_now($id) {
        if (!session('username') && !session('password')) {
            $this->error("你还没登录，请登录");
        } else {
            $orderdata["buy_id"] = session('buy_id');
            $orderdata["b_id"] = $id;
            $orderitem = new Order_itemsModel();
            $result = $orderitem->order_now($orderdata);
            if ($result) {
                $this->orderAndCount();
                $this->success("已放入购物车");
            } else {
                $this->error("放入购物车失败");
            }
        }
    }
    /**
     * 提交订单
     */
    public function doorder() {
        $this->success("提交成功！", U('Index/index'));
    }

    /**
     * 登录和下单时刷新首页的购物车数量
     */
    public function orderAndCount() {
        $order_item = new Order_itemsModel();
        $uid = session('buy_id');
        $order_result = $order_item->showOrder($uid);
        $count = count($order_result);
        $books = new \Home\Model\BooksModel();
        $blist = array();
        $pricelist = array();
        $totalMoney = 0;
        for ($i = 0; $i < $count; $i++) {
            $bid = $order_result[$i]["b_id"];
            $bresult = $books->getBook($bid);
            $pricelist[$i] = $bresult["price"] * $order_result[$i]["s_num"];
            $totalMoney+=$pricelist[$i];
            $blist[$i] = $bresult;
        }
        session("total", $totalMoney);
        session("order", $order_result);
        return array($totalMoney, $pricelist, $order_result, $blist);
    }
    
    
    /**
     *  验证码处理
     */
    public function verify() {
        ob_clean();//ob_clean这个函数的作用：用来丢弃输出缓冲区中的内容，如果你的网站有许多生成的图片类文件，那么想要访问正确，就要经常清除缓冲区
        $config =[
            'fontSize' => 16, // 验证码字体大小
            'length' => 4, // 验证码位数
            'imageH' => 38,
            'useNoise' => false,
        ];

        $Verify = new Verify($config);
        $Verify->entry();
    } 
    
    /**
     * 找不到控制器
     * @param type $name
     */
    public function _empty($name) {
        $this->error("找不到方法" . $name . "，正在跳转上一页面");
    }

}
