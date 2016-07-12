<?php
/**
 * Created by PhpStorm.
 * User: YaoHeng
 * Date: 2016/6/4
 * Time: 9:33
 */
namespace Common\Model;
use Think\Model;

class AdminModel extends Model{
    private  $_db='';
    public function __construct(){
        $this->_db=M('admin');//表cms_admin

    }


    public function getAdminByUsername($username)
    {
        $ret =$this->_db->where('username="'.$username.'"')->find();
        return $ret;
    }
}