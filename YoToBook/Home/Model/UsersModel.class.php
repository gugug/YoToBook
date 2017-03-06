<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Model;

/**
 * Description of UsersModel
 *
 * @author gu
 */
use Think\Model;

class UsersModel extends Model {
    
    public function login($username,$password){
        $user = M('Users');
        $result = $user->where("username='$username' and password ='$password'")->find(); 
        return $result;
    }


    public function register($username,$password,$password1,$email,$account){
      
        $user = M('Users');
        $data['username']=$username;
        $data['account']=$account;
        $data['password']=$password;
        $data['email']=$email;
        
        $isregisterd = $user->where("username='$username'")->find();
        $isaccount = $user->where("account='$account'")->find();
        if($isregisterd||$isaccount) { 
            return -1;//账号或用户名被注册了
        } else { 
            if($password!= $password1){
                return -2;//密码输入不对应
            }else{
                $result= $user->add($data);//插入数据
                if($result){ 
                    return 1; //注册成功
                } else { 
                    return 2; //注册失败
                } 
            }           
        } 
        
    }
    
    public function getUID($username){
        $user = M('Users');
        $userdata=$user->where("username = '$username'")->find();
//        dump($userdata);
        return $userdata["buy_id"];

    }
    public function deleteCart($id){
        $user = M('Order_items');
        $result=$user->where("b_id='$id'")->delete();
        return $result;
    }
    
}
