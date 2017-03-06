<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;
use Think\Controller;
use Admin\Model\Contact_usModel;
use Think\Page;
/**
 * Description of ContactController
 * 联系表的删除控制器，管理员可以删除这个表的信息，其中删除包括批量删除和单一删除的功能
 * @author gu
 */
class ContactController extends Controller{
    
    /**
     * 显示联系表的视图
     */
    public function contactTable(){
        $contact = D('Contact_us');
        //求出记录的个数
        $count = $contact->count();
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
        $list = $contact->limit($page->firstRow.
        ','.$page->listRows)->select();
        //把分好的记录列表传给相应的页面
        $this->assign('list', $list);
        $this->assign("page",$show);
        $this->display();
        
    }
    
    
    /**
     *  传入联系id，然后删除联系内容
     * @param type $idList 视图选中需要删除的联系id
     */
    public function deleteContact($idList){
        $contactIdArr = explode(",",$idList);
        $contact=new Contact_usModel();
        $deleteContResult=$contact->deleteContact($contactIdArr);
        if($deleteContResult){
            $this->success("删除成功","contactTable");
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
