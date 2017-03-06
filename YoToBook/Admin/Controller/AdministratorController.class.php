<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;
use Think\Controller;
use Admin\Model\AdministratorModel;
use Think\Verify;
use Think\Image;
use Think\Upload;


/**
 * Description of AdministratorController
 * 主要包括登录 修改密码 修改图片的功能，其中登录页面有js的技术判断表单的填写正误，并且登陆时有验证码校验
 * @author gu
 */

class AdministratorController extends Controller{
    
    /*
     * 显示登录的页面,如果已经登录直接进入首页
     */
    function login(){
        if(session("adminInfo")){
            $this->error("您已经登录",U('Index/index'),1);
        }else{
            $this->display();
        }
    }
    
    /**
     * 处理登录的信息，包括验证码
     */
    function dologin(){
        header("Content-Type:text/html; charset=utf-8"); 
        
        //验证码登录 
        if(!empty($_POST["account"])&& !empty($_POST["password"])){
            $verify = new Verify();
            if (!$verify->check($_POST['code'])){
                    $this->error('验证码错误！','',1);
            }
            
            $adminData=I("post.");
          
            $admin = new AdministratorModel(); 
            $result=$admin->login($adminData);

            if($result) { 
                $info=$admin->getInfo($result); //缓存用户的信息
                session("adminInfo",$info);
                $this->success('登录成功！，欢迎您'.$result['name'],'../Index/index',2);
            } else { 
                $this->error('用户名或密码错误','login',2); 
            } 
        } else { 
            //非法访问方式，直接跳转到页面 
            echo "<script>alert('非法操作，跳转到登录页面')</script>"; 
            $this->display('login'); 
        }
    }
    
    /**
     * 注销用户的登录信息
     */
    public function logout(){
        session_unset();
        session_destroy();
        $this->success("退出成功","login",2);
    }

    /**
     *  显示更换密码视图
     */
    public function changePwd(){
        $this->display();
    }
	
   /**
    * 处理用户的新密码,前端已经有js判断程序（判断长度和判断两次密码是否相同）
    * 
    */
    public function doChangePwd(){
        if($_POST['renewpass']){
            $postData=I("post.");
            $map["account"] = session("adminInfo")[account];
            $map['password'] = $postData["oldpass"];       

            $admin = new AdministratorModel();  
            $result = $admin->changePwd($map,$postData);
            switch ($result){
            case -1:
                $this->error('请输入正确的原始密码！');
                break;
            case 1:
                $adminData=session("adminInfo");
                $adminData['password']=$postData[newpass];
                session("adminInfo",$adminData);
                $this->success('修改成功');
                break;
            case 2:
                $this->error('error,有可能是您的老密码和新密码一样');
            }           
        }					   
    }
	
     /**
      * 
      * 显示头像界面
      */
    public function changeImg(){
        $admin = new AdministratorModel();
        $adminData=session("adminInfo");
        $info=$admin->getInfo($adminData);
        session("adminInfo",$info);
        $this->assign('adminInfo',$info);
        $this->display();
    }
        
    
    /**
     * 处理上传的图片
     */
    public function uploadImg(){
        if ($_FILES) {
            $upload = new Upload();
    	    $upload->maxSize = 3145728;
    	    $upload->exts = array('jpg', 'jpeg', 'gif', 'png');
            $upload->rootPath  = './Public/Admin/headImages/';
    	    $upload->savePath = '';
               
            //上传图片
            $info = $upload->upload();
            $file_path='';
            if (!$info) {
                // 上传错误提示错误信息
                $this->error($upload->getError());
            } else {
                // 上传成功 获取上传文件信息
                foreach($info as $file){
                    $file_path=$file['savepath'].$file['savename']; 
                    
            }
                //生成缩略图
                $image=new Image();            
                $image->open("./Public/Admin/headImages/".$file_path);
                $image->thumb(100,100)->save("./Public/Admin/headImages/".$file_path);
                $map['id']=session('adminInfo')['a_id'];
                $map['filepath']="headImages/".$file_path;
                $admin=new AdministratorModel();
                $result=$admin->changeImg($map);
                if ($result) {
                    $this->success('修改成功！', 'changeImg');
                } else {
                    $this->error('upload error');
                }
            }
        } else {
            $this->error('upload error');
        }
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
     * 空方法
     * @param type $name
     */
    public function _empty($name){ 
        $this->error("找不到方法".$name."，正在跳转上一页面",'',1);
    }
    
}
