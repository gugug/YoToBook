<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;
use Think\Model;
/**
 * Description of UsersModel
 * 用户表
 * @author gu
 */
class UsersModel extends Model{
    
     /**
     * 查找全部用户
     * @return type
     */
    public function showAllUser(){
        $user = M('Users');
        $result=$user->select();
        return $result;
    }
    
    /**
     * 传入用户的id, 查找到对应的用户
     */
    
    public function showUserByUid($uid){
        $user = M('Users');
        $result=$user->where("buy_id=$uid")->find();
        return $result;
    }
        
    /**
     * 修改用户信息
     */
    public function editUser($data){
        $user = M('Users');
        $result=$user->where(array('buy_id'=>$data['buy_id'],'b_id'=>$data['b_id']))->save($data);
        return $result;
    }
   

     /**
     * 根据传入的uid数组，删除用户
     */
    public function deleteUser($data){
        $user = M('Users');
        $order=new Order_itemsModel();
        $order->deleteOrderByBuyid($data);
        $result=$user->where(array('buy_id'=>array('in',$data)))->delete();
        return $result;
    }
    

}
