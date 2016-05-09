<?php
namespace Admin181\Model;
use Think\Model;
class AdminModel extends Model {
    public function createAdmin(){
    	$data = array(
    		'user_name' => 'admin',
    		'user_pwd' => md10('admin'), 
    		);
    	$this->create($data);
    	$this->add();
    }

    public function logIn($user_name,$user_pwd){
    	$condition = array(
    		'user_name' => $user_name, 
    		'user_pwd' => md10($user_pwd),
    		);
    	return $this->where($condition)->find();
    }

}