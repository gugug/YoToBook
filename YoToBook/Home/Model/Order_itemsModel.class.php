<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Model;
use Think\Model;

/**
 * Description of Order_itemsModel
 *
 * @author gu
 */

class Order_itemsModel extends Model{
    
    public function order_now($data){
        $order_books = M('order_items');
        $isordered= $order_books->where($data)->find();
        if($isordered){
            $num=$isordered['s_num']+1;
            $date = date('Y-m-d H:i:s',time());
            $d['s_num']=$num;
            $d['s_time']=$date;
            $result = $order_books->where($data)->save($d);
        }else{
            $data['s_num']=1;
            $data['s_time']=date('Y-m-d H:i:s',time());
            $result = $order_books->add($data);
        }
        return $result;
    }
    
    public function showOrder($uid){
        $order_books=M('order_items');
        $order_result=$order_books->where("buy_id = $uid")->select();
        return $order_result;
    }
    /**
     * 修改图书数量
     * @param type $buy_id
     * @param type $b_id
     * @param type $s_num
     * @return type
     */
    public function changeCount($buy_id,$b_id,$s_num){
        $order=M('order_items');
        $date["buy_id"]=$buy_id;
        $date["s_num"]=$s_num;
        $date["b_id"]=$b_id;
        $result=$order->save($date);
        return $result;
    }
}
