<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Controller;

use Think\Image;
use Think\Controller;
use Home\Model\BooksModel;
use Home\Model\Order_itemsModel;
use Home\Controller\IndexController;

/**
 * Description of BooksController
 *
 * @author gu
 */
class BooksController extends Controller {

    //put your code here
    /**
     * 图书类别列表
     */
    function category() {
        $book = new BooksModel();
        $typeResult = $book->getType();
//        dump($typeResult);
        $this->assign('typeResult', $typeResult);
        $this->display();
    }

    /**
     * 具体每个类别的图书里列表
     * @param type $typeName
     */
    function specialType($typeName) {
        $book = new BooksModel();
        $specialTypeResult = $book->getTypeBook($typeName);
//        dump($specialTypeResult);
        $this->assign('specialTypeResult', $specialTypeResult);
        $this->display();
    }

    /**
     * 新书列表
     */
    function newreleases() {
        $book = new BooksModel;
        $turnPageResult = $book->getNewsReleases();
        // 赋值赋值
        $this->assign('list', $turnPageResult[0]);
        $this->assign('page', $turnPageResult[1]);
        $this->assign("count", $turnPageResult[2]);
        $this->display();
    }

    /**
     * 书的详细信息
     * @param type $id
     */
    function details($id) {
        $book = new BooksModel();
        $details = $book->getBook($id);
        $this->assign("detailsid", $id);
//        dump($result);
        $releateBooks = $book->getReleateBook($details['type'], $details['b_id']);
//        dump($releateBooks);
        $comment = new \Home\Model\Book_commentModel();
        $commentsNum = $comment->showCommments($id);
        $this->assign('commentsNum', $commentsNum);
        $this->assign('releateBooks', $releateBooks);
        $this->assign('bookdetails', $details);
        $this->display();
    }

    /**
     * 更新购物车的数量
     * @return type
     */
    public function orderAndCount() {
        $order_item = new Order_itemsModel();
        $uid = session('buy_id');
        $order_result = $order_item->showOrder($uid);
        $count = count($order_result);
        $books = new \Home\Model\BooksModel();
        $blist = array();
        $pricelist = array();
        $totalMoney = 0;
        for ($i = 0; $i < $count; $i++) {
            $bid = $order_result[$i]["b_id"];
            $bresult = $books->getBook($bid);
            $pricelist[$i] = $bresult["price"] * $order_result[$i]["s_num"];
            $totalMoney+=$pricelist[$i];
            $blist[$i] = $bresult;
        }
        session("total", $totalMoney);
        session("order", $order_result);
        return array($totalMoney, $pricelist, $order_result, $blist);
    }

    /**
     * 修改商品数量
     * @param type $buy_id
     * @param type $b_id
     * @param type $count
     */
    public function changeCount($buy_id, $b_id, $count) {
        $order_item = new Order_itemsModel();
        $result = $order_item->changeCount($buy_id, $b_id, $count);
        if ($result > 0) {
            $this->success("修改成功", U('Users/cart'));
        } else {
            $this->error("修改失败！", U('Users/cart'));
        }
    }

    /**
     * 订单页面
     */
    public function order() {
        $orderResult = $this->orderAndCount();
        $this->assign('totalMoney', $orderResult[0]);
        $this->assign("pricelist", $orderResult[1]);
        $this->assign("order_result", $orderResult[2]);
        $this->assign("blist", $orderResult[3]);
        $this->display();
    }

    /**
     * 上传新书页面
     */
    public function upload() {
        $this->display();
    }

    /**
     * 处理上传新书事物，上传的图片生成缩略图
     */
    public function doupload() {
        header("Content-Type:text/html; charset=utf-8");
        if (!session('username') && !session('password')) {
            $this->error("你还没登录，请登录");
        } else {

            if (!empty($_POST["b_name"]) && !empty($_POST["author"]) && !empty($_POST["press"]) && !empty($_POST["type"]) && !empty($_POST["introduction"]) && !empty($_POST["price"]) && !empty($_FILES['file']['tmp_name'])) {

                if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 2097152)) {
                    if ($_FILES["file"]["error"] > 0) {
                        $flag = 1;
                    } else {
                        $name = iconv('utf-8', 'gb2312', $_FILES["file"]["name"]); //利用Iconv函数对文件名进行重新编码
                        if (file_exists("Public/upload/" . $name)) {
                            $flag = 2;
                        } else {
                            //生成缩略图
                            $image = new Image();
                            $image->open($_FILES['file']['tmp_name']);
//                            $width = $image->width(); // 返回图片的宽度
//                            $height = $image->height();
//                            $width = $width /100; //取得图片的长宽比  190是要输出的图片的宽度
//                            $height = ceil($height/ $width);
//                            $image->thumb(100, $height)->save("Public/upload/" . $name);
                            $image->thumb(100, 150)->save("Public/upload/" . $name);
                            $flag = 3;
                        }
                    }
                } else {
                    $flag = 4;
                }

                switch ($flag) {
                    case 1:
//                    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
                        $this->error("Return Code: " . $_FILES["file"]["error"]);
                        break;
                    case 2:
//                    echo $_FILES["file"]["name"] . " already exists. ";
                        $this->error($_FILES["file"]["name"] . " already exists. ");
                        break;
                    case 4:
//                    echo "<script>alert('照片无效，请检查照片格式（.gif/.jpeg/.jpg/.pjeg/.pgh）或大小（小于2M）')</script>"; 
                        $this->error('照片无效，请检查照片格式（.gif/.jpeg/.jpg/.pjeg/.pgh）或大小（小于2M）');
                        break;
                    case 3:
                        $data = I('post.');
                        $data['b_pic_src'] = "upload/" . $_FILES["file"]["name"];
                        $book = new BooksModel();
                        $result = $book->upload($data);

                        if ($result) {
//                        echo "<script>alert('上传成功')</script>"; 
                            $this->success('上传成功', '../Index/index');
                        } else {
                            echo "<script>alert('操作失败，请再次尝试。')</script>";
                            $this->display('upload');
                        }
                }
            } else {
                //非法访问方式，直接跳转到页面 
                echo "<script>alert('非法操作')</script>";
                $this->display('upload');
            }
        }
    }

    /**
     * 评论页面
     * @param type $bid
     */
    public function comments($bid) {
        $bcomment = new \Home\Model\Book_commentModel();
        $commentRresult = $bcomment->showCommments($bid);
//        dump($commentRresult);
        $this->assign("bookid", $bid);
        if ($commentRresult) {
            $this->assign('commentRresult', $commentRresult);
            $this->display();
        } else {
            echo "<script>alert('还没有书评~')</script>";
//            $this->error("还没有书评,返回详情页中...");
            $this->display();
        }
    }

    /**
     * 删除评论
     * @param type $b_id
     * @param type $c_id
     */
    public function deletecomment($b_id, $c_id) {
        $delete = new \Home\Model\Book_commentModel;
        $result = $delete->deleteComment($c_id);
        if ($result > 0) {
            $this->success("删除成功", U('Books/comments/' . $b_id));
        } else {
            $this->error("删除失败！", U('Books/comments/' . $b_id));
        }
    }

    /**
     * 添加评论
     * @param type $id
     */
    public function addComment($id) {
        $this->assign("cbid", $id);
        $this->display();
    }

    /**
     * 处理添加评论事务
     * @param type $id
     */
    public function doAddComment($id) {
        
        
        if (!session('username') && !session('password')) {
            $this->error("你还没登录，请登录");
        } else {
        if (!empty($_POST["comment_content"])) {
            $data = I('post.');
            $data["user_account"] = session('username');
            $data['comment_bid'] = $id;
            $data['comment_time'] = date('Y-m-d H:i:s', time());
            $bcomment = new \Home\Model\Book_commentModel();
            $addResult = $bcomment->addComment($data);
            if ($addResult) {
//                echo "<script>alert('发表评论成功')</script>"; 
                $this->success("发表评论成功", U('Books/comments/' . $id));
            }
        } else {
//            echo "<script>alert('非法操作')</script>"; 
            $this->error("非法操作");
//            $this->display('addComment',$id);
        }
        }
    }

    /**
     * 搜索
     */
    public function search() {
        if (!empty($_POST["search"])) {
            $search = $_POST["search"];
            $book = new BooksModel();
            $searchResult = $book->search_book($search);
            if ($searchResult) {
//                dump($searchResult);
                $this->assign('searchResult', $searchResult);
                $this->display();
            } else {
//                    echo "<script>alert('没有查询到您想要的结果')</script>"; 
                $this->error('没有查询到您想要的结果', '', 2);
            }
        } else {
//           echo "<script>alert('请输入内容')</script>"; 
            $this->error("请输入内容，正在跳转上一页面");

//           $this->display('Index/index');
        }
    }

    /**
     * 找不到方法
     * @param type $name
     */
    public function _empty($name) {
        $this->error("找不到方法" . $name . "，正在跳转上一页面");
    }

}
