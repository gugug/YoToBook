<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    /**
     * 关于我们
     */
    public function aboutus(){
        $this->display();
    }
    /**
     * 隐私政策
     */
    public function privacy_policy(){
        $this->display();
    }
    /**
     * 主页
     */
    public function index(){
        $books=new \Home\Model\BooksModel();
        $turnPageResult=$books->booksPage();
        
        // 赋值赋值
         $this->assign('list', $turnPageResult[0]);
         $this->assign('page', $turnPageResult[1]);
         $this->assign("count",$turnPageResult[2]);
         $this->display();
    }
    /**
     * 找不到方法
     * @param type $name
     */
    public function _empty($name){ 
        $this->error("找不到方法".$name."，正在跳转上一页面");
    }
    

}