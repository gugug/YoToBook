<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Controller;
use Think\Controller;

//空控制器 请求不到指定控制器时，调用一个专门的空控制器
class EmptyController extends Controller {
    public function index() {
      echo '找不到控制器：'.CONTROLLER_NAME;
}
}
