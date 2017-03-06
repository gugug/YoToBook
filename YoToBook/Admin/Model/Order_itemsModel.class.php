<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;
use Think\Model;
/**
 * Description of order_items
 * 订单表
 * @author gu
 */
class Order_itemsModel extends Model{

    /**
     * 根据传入的书的id,删除订单
     */
    public function deleteOrderByBid($data){
        $order = M('order_items');
        $result=$order->where(array('b_id'=>array('in',$data)))->delete();
        return $result;
    }
    
    
        /**
     * 根据传入的用户的id,删除订单
     */
    public function deleteOrderByBuyid($data){
        $order = M('order_items');
        $result=$order->where(array('buy_id'=>array('in',$data)))->delete();
        return $result;
    }
    
    
    /**
     * 查找全部订单
     * @return type
     */
    public function showAllOrder(){
        $order = M('order_items');
        $result=$order->select();
        return $result;
    }
    
    /**
     * 传入用户id和对应的书籍, 查找到对应的订单
     */
    public function showOrderByOid($map){
        $order = M('order_items');
        $result=$order->where($map)->find();
        return $result;
    }
        
    /**
     * 修改订单信息
     */
    public function editOrder($data){
        $order = M('order_items');
        $result=$order->where(array('b_id'=>$data['b_id']))->save($data);
        return $result;
    }
   

    /**
     * 根据传入的id数组，删除订单
     */
    public function deleteOrder($bidDaata,$uidData){
        $order = M('order_items');
        $num=count($bidDaata);
        for($i=0;$i<$num;$i++){ 
            $map['b_id']=$bidDaata[$i];
            $map['buy_id']=$uidData[$i];
            $result=$order->where($map)->delete();
        }
        return $result;
    }
    
    
 
    
    
    
    
}
