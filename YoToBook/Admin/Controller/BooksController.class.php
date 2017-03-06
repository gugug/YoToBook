<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;
use Think\Controller;
use Admin\Model\BooksModel;
use Think\Page;
/**
 * Description of BooksController
 * 表格书籍的控制器，主要是删除和修改的操作 其中删除包括批量删除和单一删除的功能
 * @author gu
 */
class BooksController extends Controller{
     

    /**
     * 显示书籍的视图，分页显示
     */
    public function booksTable(){
       
        $book = D('Books');
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
     * 显示修改书籍的视图
     */
    public function editBook($bid){
        $books=new BooksModel();
        $result=$books->showBookByBid($bid);
        $this->assign("bookResult",$result);
        $this->assign('bid',$bid);
       
        $this->display();
    }


    /**
     * 根据书的id确认修改书籍的信息
     */
    public function editBookSubmit($id){

        $data=I('post.');
        $data['b_id']=$id;
        $books = new BooksModel();
        $result=$books->editBook($data);
        if($result){
            $this->success('修改成功',"booksTable");
        }else{
            $this->error("修改失败,您没有做出任何修改");
        }
    }
    
    /**
     *  传入id，然后书籍
     * @param type $idList 视图选中需要删除的id
     */
    public function deleteBooks($idList){
        $bookIdArr = explode(",",$idList);
        $books=new BooksModel();
        $deleteBookResult=$books->deleteBook($bookIdArr);
        if($deleteBookResult){
            $this->success("删除成功","booksTable");
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
