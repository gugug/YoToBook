<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Widget;

use Home\Model\BooksModel;
use Think\Controller;

class TypeWidget extends Controller {
    /**
     * 使用widget技术在每一个页面显示图书类别列表模块
     * @return type
     */
    public function category() {
        $book = new BooksModel();
        $typeResult = $book->getType();
        $this->assign('typeResult', $typeResult);   
        return $this->display("Type:category");
    }

}
