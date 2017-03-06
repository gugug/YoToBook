<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;
use Think\Model;

/**
 * Description of Contact_usModel
 * 联系表
 * @author gu
 */
class Contact_usModel extends Model{
    
    
    public function showAllContact(){
        $contact=M('Contact_us');
        $result=$contact->select();
        return $result;
    }
    
    /**
     * 根据传入的联系id数组，删除联系内容
     */
    public function deleteContact($data){
        $contact=M('Contact_us');
        $result=$contact->where(array('contact_id'=>array('in',$data)))->delete();
        return $result;
    }
    
}
