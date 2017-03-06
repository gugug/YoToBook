<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;
use Think\Model;
/**
 * Description of Book_commentModel
 * 书评的表
 * @author gu
 */
class Book_commentModel extends Model{
    /**
     * 根据书的id找到书评
     * @param type $b_id 某本书的id
     * @return type
     */
    public function showCommments($b_id){
        $comment = M('Book_comment');
        $result = $comment->where("comment_bid=$b_id")->select(); 
        return $result;
    }
    
        /**
     * 根据书书评的id找到书评
     * @param type $c_id 某书评的id
     * @return type
     */
    public function showCommmentsByCid($c_id){
        $comment = M('Book_comment');
        $result = $comment->where("comment_id=$c_id")->select(); 
        return $result;
    }
    
    
    
    /**
     * 增加书评
     * @param type $data
     * @return type
     */
    public function addComment($data){
        $comment = M('Book_comment');
        $result = $comment->add($data); 
        return $result;
    }
    
    /**
     * 
     * @return type查找全部书评
     */
    public function showAllComment(){
        $comment = M('Book_comment');
        $result = $comment->select(); 
        return $result;
    }
    
    /**
     * 根据传入的评论id数组，删除评论
     */
    public function deleteComment($data){
        $comment = M('Book_comment');
        $result=$comment->where(array('comment_id'=>array('in',$data)))->delete();
        return $result;
    }
    
    
    /**
     * 根据传入的书的id,删除评论
     */
    public function deleteCommentByBid($data){
        $comment = M('Book_comment');
        $result=$comment->where(array('comment_bid'=>array('in',$data)))->delete();
        return $result;
    }
    
    
    /**
     * 修改评论
     */
    public function editComment($data){
        $comment = M('Book_comment');
        $result=$comment->where(array('comment_id'=>$data['comment_id']))->save($data);
        return $result;
    }
}
