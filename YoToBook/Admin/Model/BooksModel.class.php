<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;
use Think\Model;
/**
 * Description of BooksModel
 * 书籍表
 * @author gu
 */
class BooksModel extends Model{
    
    /**
     * 查找全部书籍
     * @return type
     */
    public function showAllBook(){
        $book = M('Books');
        $result=$book->select();
        return $result;
    }
    
    /**
     * 传入书的id, 查找到对应的书
     */
    
    public function showBookByBid($bid){
        $book = M('Books');
        $result=$book->where("b_id=$bid")->find();
        return $result;
    }
        
    /**
     * 修改书籍信息
     */
    public function editBook($data){
        $book = M('Books');
        $result=$book->where(array('b_id'=>$data['b_id']))->save($data);
        return $result;
    }
   

    /**
     * 根据传入的id数组，删除书籍，（先删除了评论的外键，然后删除了订单上的外键）
     */
    public function deleteBook($data){
        $book = M('Books');
        $bookComment=new Book_commentModel();
        $bookComment->deleteCommentByBid($data);
        $order=new Order_itemsModel();
        $order->deleteOrderByBid($data);
        
        $result=$book->where(array('b_id'=>array('in',$data)))->delete();
        return $result;
    }
    
    
 
    
}
