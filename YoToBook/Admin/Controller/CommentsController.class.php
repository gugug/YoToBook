<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;
use Think\Controller;
use Admin\Model\Book_commentModel;
use Admin\Model\BooksModel;
use Think\Page;
/**
 * Description of CommentsController
 * 书评表单的控制器，主要有删除和修改的功能，其中删除包括批量删除和单一删除的功能
 * @author gu
 */
class CommentsController extends Controller{
 
    
    /**
     * 留言管理，显示全部
     */
    public function commentsTable(){
        
        $Book_comment = D('Book_comment');
        //求出记录的个数
        $count = $Book_comment->count();
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
        $list = $Book_comment->limit($page->firstRow.
        ','.$page->listRows)->select();
        //把分好的记录列表传给相应的页面
        $this->assign('list', $list);
        $this->assign("page",$show);
      
        $book=new BooksModel();
        $booksResult=$book->showAllBook();//全部书籍
        $bookArray=array();
        foreach($booksResult as $x=>$x_value)
        {
        $bookArray[$x_value["b_id"]]=$x_value["b_name"];//建立关联数组，键是书的id，值是书名
        }
        $this->assign("bookArray",$bookArray);
        $this->display();
    }
    

    /**
     *  传入id，然后删除评论
     * @param type $idList 视图选中需要删除的id
     */
    public function deleteComment($idList){
        $commentIdArr = explode(",",$idList);
        $comment=new Book_commentModel();
        $deleteCommentResult=$comment->deleteComment($commentIdArr);
        if($deleteCommentResult){
            $this->success("删除成功","commentsTable");
        }else{
            $this->error("删除失败");
        }
    }
    
    
    /**
     * 显示修改书评的视图
     */
    public function editComment($id){
        $bcomment=new Book_commentModel();
        $result=$bcomment->showCommmentsByCid($id);
        $this->assign("commentResult",$result);
        $this->assign('id',$id);
       
        $this->display();
    }


    /**
     * 根据评论的id确认修改评论
     */
    public function editCommentSubmit($id){
        $data=I('post.');
        $data['comment_id']=$id;
        $bcomment=new Book_commentModel();
        $result=$bcomment->editComment($data);
        if($result){
            $this->success('修改成功',"commentsTable");
        }else{
            $this->error("修改失败，您没有做出任何修改");
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
