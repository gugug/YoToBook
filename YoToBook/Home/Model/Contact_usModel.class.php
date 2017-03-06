<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Model;
use Think\Model;
/**
 * Description of Contact_usModel
 *
 * @author gu
 */
class Contact_usModel extends Model{
    
    public function contanct_us($data){
       $contact = M('Contact_us');
       $result= $contact->add($data);//插入数据
       return $result;

    }
}
