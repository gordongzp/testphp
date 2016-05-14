<?php
namespace Admin181\Model;
use Think\Model;
class AdminModel extends Model {
    protected $_auto = array ( 
        array('openshop_need_person_id',0,1),
        array('openshop_need_email',0,1),
        );
    

    //createAdd 方法
    public function createAdd(){
        if (!$this->create()) {
            return $this->getError();
        }else{
            $this->add();
            return NULL;
        }
    }

    //createSave方法
    public function createSave(){ 
        if (!$this->create()) {
            return $this->getError();
        }else{
            $this->save();
            return NULL;
        }
    }   
    //临时用于创建管理用户名与密码
    public function createAdmin(){
    	$this->create();
        $this->user_name='admin';
        $this->user_pwd=md10('admin');
        $this->add();
    }

    //登录验证
    public function logIn($user_name,$user_pwd){
    	$condition = array(
    		'user_name' => $user_name, 
    		'user_pwd' => md10($user_pwd),
    		);
    	return $this->where($condition)->find();
    }

    //通过id获取用户信息
    public function getUserInfoById($id)
    {
        return $this->find($id);
    }
}