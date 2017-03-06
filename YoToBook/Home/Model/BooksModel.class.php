<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Home\Model;

/**
 * Description of BooksModel
 *
 * @author gu
 */
use Think\Model;
class BooksModel extends Model {
    //put your code here
    
    public function search_book($searchs){
        $book = M('Books');
        $result = $book->where("b_name Like '%$searchs%'")->select(); 
        return $result;
    }
    
    public function getBook($id){
        $book = M('Books');
        $result=$book->where("b_id = $id")->find(); 
        return $result;
    }

    public function getTypeBook($typeName){
        $books=M('Books');
        $condition['type'] = $typeName;
        $result=$books->where($condition)->select();
        return $result;
    }
    
    public function getReleateBook($typeName,$id){
        $books=M('Books');
//        $sql="SELECT * FROM `books` WHERE `type` = '$typeName' AND b_id != $id";
//        $releateResult=$books->query($sql);
        $releateResult=$books->where("type='$typeName' AND b_id != $id")->select();
        return $releateResult;
        
    }

    public function upload($data){
       $up = M('Books');
       $result= $up->add($data);//插入数据
       return $result;
    }
    
    
    public function booksPage(){
         $Dao = M("Books");
         $count = $Dao->count();
         import('ORG.Util.Page');
         $p = new \Think\Page($count, 3);
         $list = $Dao->order('b_id ASC')->limit($p->firstRow.','.$p->listRows)->select();
         $page = $p->show();
         return array($list,$page,$count);
    }
    
    
    public function getNewsReleases(){
         $Dao = M("Books");
         $count = $Dao->count();
         import('ORG.Util.Page');
         $p = new \Think\Page($count, 3);
         $list = $Dao->order('b_id DESC')->limit($p->firstRow.','.$p->listRows)->select();
         $page = $p->show();
         return array($list,$page,$count);

    }
    
    public function show(){
        $book = M('Books');
        $result=$book->select();
        return $result;
    }
    
    public function getType() {
        $book = M('Books');
        $reuslt=$book->distinct(true)->field('type')->select();
        return $reuslt;
    }
}
