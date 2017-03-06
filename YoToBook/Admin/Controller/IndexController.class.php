<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * Description of OrdersController
 * 首页的控制器，进入首页时会进行是否登录的判断，如果没有登录返回到登陆界面
 * @author gu
 */
class IndexController extends Controller {
    /**
     * 首页视图的显示，有判断是否登陆成功才显示
     */
    public function index(){
         if(session("adminInfo")){
            $this->display();
        }else{
            $this->error("您还没有登录",U('Administrator/login'),1);
        }
    }
    
    /**
     * 首页进入后的视图内容
     */
    public function info(){
        if(session("adminInfo")){
            $this->display();
        }else{
            $this->error("您还没有登录",U('Administrator/login'),1);
        }
    }
    
    public function _empty($name){ 
        $this->error("找不到方法".$name."，正在跳转上一页面",'',1);
    }
}