<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Model;

/**
 * Description of Book_commentModel
 *
 * @author gu
 */
class Book_commentModel {

    //put your code here
    /**
     * 获取评论
     * @param type $b_id
     * @return type
     */
    public function showCommments($b_id) {
        $comment = M('Book_comment');
        $result = $comment->where("comment_bid=$b_id")->select();
        return $result;
    }
    /**
     * 增加评论
     * @param type $data
     * @return type
     */
    public function addComment($data) {
        $comment = M('Book_comment');
        $result = $comment->add($data);
        return $result;
    }
    /**
     * 删除评论
     * @param type $c_id
     * @return type
     */
    public function deleteComment($c_id) {
        $user = M('Book_comment');
        $result = $user->where("comment_id='$c_id'")->delete();
        return $result;
    }

}
