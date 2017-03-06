<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdministratorModel
 * 管理员的表格
 * @author gu
 */
namespace Admin\Model;
use Think\Model;
class AdministratorModel extends Model{
    
    /**
     * 登录查询表
     * @param type $data
     * @return type
     */
    public function login($data){
        $admin = M('Administrator');
        $result = $admin->where($data)->find(); 
        return $result;
    }
    
    /**
     * 修改密码查询表
     * @param type $map
     * @return type
     */
    public function changePwd($map,$postData){
        $administrator = M('Administrator');
        $result = $administrator->where($map)->find();
        if(!$result){
            return -1;
        }			
        $data['password'] = $postData["newpass"];			
        $result = $administrator->where(array('account'=>$map['account']))->save($data);	
        if($result){
            return 1;
        }else{
           return 2;
        }
    }
    
    /**
     * 查询数据库，得到当前用户的信息
     */
    public function getInfo($map){
        $administrator = M('Administrator');
        $map1['a_id']=$map['a_id'];
        $map1['password']=$map['password'];
        $map1['account']=$map['account'];
        $info = $administrator->where($map1)->find();
        return $info;
    }
    
    /**
     * 图片文件名存入数据表,找到id，然后修改头像
     */
    public function changeImg($map){
        $administrator = M('Administrator');
        $result = $administrator->where(array('a_id'=>$map['id']))->save(array('headImage' => $map['filepath']));
        return $result;
    }
    
}
