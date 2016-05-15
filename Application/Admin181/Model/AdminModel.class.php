<?php
namespace Admin181\Model;
use Think\Model;
class AdminModel extends Model {
    protected $_validate = array(
        array('user_name','','DOUBLE_USERS',0,'unique',3), 
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
        $data = array(
            'user_name' =>'admin' , 
            'user_pwd' =>md10('admin') , 
            );
        if (!$this->create($data)){
           return ($this->getError());
       }else{
        $this->add();
    }
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