<?php
namespace Admin181\Model;
use Think\Model;
class AdminModel extends Model {
    
    //临时用于创建管理用户名与密码
    public function createAdmin(){
    	$data = array(
    		'user_name' => 'admin',
    		'user_pwd' => md10('admin'), 
    		);
    	$this->create($data);
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