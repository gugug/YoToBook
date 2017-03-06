<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;
use Think\Controller;
use Admin\Model\UsersModel;
use Think\Page;
/**
 * Description of UsersController
 * 用户表的控制器 主要有删除和修改的功能，其中删除包括批量删除和单一删除的功能
 * @author gu
 */
class UsersController extends Controller {
    /**
     * 显示用户表的视图，分页显示
     */
    public function usersTable(){
       
        $book = D('Users');
        //求出记录的个数
        $count = $book->count();
        //每页5条记录
        $page = new Page($count, 5);
        //设置分页参数
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','末页');
        $page->setConfig('theme', '%HEADER% 共%TOTAL_PAGE%页
        %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        //显示页码的页面
        $show = $page->show();
        //生成每页显示的记录列表
        $list = $book->limit($page->firstRow.
        ','.$page->listRows)->select();
        //把分好的记录列表传给相应的页面
        $this->assign('list', $list);
        $this->assign("page",$show);
        $this->display();
    }
    
   /**
     * 显示修改用户的视图
     */
    public function editUser($uid){
        $user=new UsersModel();
        $result=$user->showUserByUid($uid);
        $this->assign("userResult",$result);
        $this->display();
    }


    /**
     * 根据用户的id确认修改用户的信息
     */
    public function editUserSubmit($buyid){
        $data=I('post.');
        $data['buy_id']=$buyid;
        $user = new UsersModel();
        $result=$user->editUser($data);
        if($result){
            $this->success('修改成功',"usersTable");
        }else{
            $this->error("修改失败,您没有做出任何修改");
        }
    }
    
    /**
     *  传入uid，然后删除用户
     * @param type $idList 视图选中需要删除的id
     */
    public function deleteUser($idList){
        $userIdArr = explode(",",$idList);
        $user=new UsersModel();
        $deleteUserResult=$user->deleteUser($userIdArr);
        if($deleteUserResult){
            $this->success("删除成功","usersTable");
        }else{
            $this->error("删除失败");
        }
    }

    /**
     * 空方法
     * @param type $name
     */
    public function _empty($name){ 
        $this->error("找不到方法".$name."，正在跳转上一页面",'',1);
    }
}
