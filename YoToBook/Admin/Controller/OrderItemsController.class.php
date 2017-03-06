<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Admin\Model\BooksModel;
use Admin\Model\Order_itemsModel;
use Admin\Model\UsersModel;
/**
 * Description of OrdersController
 * 订单表控制器，主要有删除和修改的功能，其中删除包括批量删除和单一删除的功能
 * @author gu
 */
class OrderItemsController extends Controller{
    /**
     * 显示订单的视图，分页显示
     */
    public function ordersTable(){
       
        $book = D('Order_items');
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
        
        $bookM=new BooksModel();
        $bookResult=$bookM->showAllBook();
        $bidBname=Array();
        foreach($bookResult as $x=>$x_value)
        {
        $bidBname[$x_value["b_id"]]=$x_value["b_name"];//建立关联数组，键是书的id，值是书名
        }
//        dump($bidBname);
        $this->assign("bidBname",$bidBname);
        
        $userM=new UsersModel();
        $userResult=$userM->showAllUser();
        $useridName=Array();
        foreach($userResult as $x=>$x_value)
        {
        $useridName[$x_value["buy_id"]]=$x_value["username"];
        }
//        dump($useridName);
        $this->assign("useridName",$useridName);
        
        $this->display();
    }
    
    /**
     * 显示修改订单的视图
     */
    public function editOrders($bid,$buy_id){
       
        $map['b_id']=$bid;
        $map['buy_id']=$buy_id;
        $order=new Order_itemsModel();
        $result=$order->showOrderByOid($map);
//        dump($result);
        $this->assign("orderResult",$result);
//        $this->assign('bid',$bid);
        
        $bookM=new BooksModel();
        $bookResult=$bookM->showAllBook();
        $bidBname=Array();
        foreach($bookResult as $x=>$x_value)
        {
        $bidBname[$x_value["b_id"]]=$x_value["b_name"];
        }
//        dump($bidBname);
        $this->assign("bidBname",$bidBname);
        
        $userM=new UsersModel();
        $userResult=$userM->showAllUser();
        $useridName=Array();
        foreach($userResult as $x=>$x_value)
        {
        $useridName[$x_value["buy_id"]]=$x_value["username"];//建立关联数组，键是书的id，值是书名
        }
//        dump($useridName);
        $this->assign("useridName",$useridName); 
        $this->display();
    }


    /**
     * 根据用户的uid和书籍的id，确认修改订单的信息
     */
    public function editOrderSubmit($uid,$bid){
        
        $data=I('post.');
        $data['buy_id']=$uid;
        $data['b_id']=$bid;
        $order = new Order_itemsModel();
        $result=$order->editOrder($data);
        if($result){
            $this->success('修改成功',"ordersTable");
        }else{
            $this->error("修改失败,您没有做出任何修改");
        }
    }
    
    /**
     *  传入oid，然后删除订单
     * @param type $idList 视图选中需要删除的oid
     */
    public function deleteOrder($biduid){
        $OrderbIduIdArr = explode(",",$biduid);
        $bIdArr = array();//书籍的id
        $uIdArr = array();//用户名的id
        foreach($OrderbIduIdArr as $key => $value){
            if($key%2 == 0){
                $bIdArr[]=$value;
            }else{
                $uIdArr[]=$value;
            }
        }
        $order=new Order_itemsModel();
        $deleteUserResult=$order->deleteOrder($bIdArr,$uIdArr);
        if($deleteUserResult){
            $this->success("删除成功","ordersTable");
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
