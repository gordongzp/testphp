<?php
namespace Admin181\Controller;
use Think\Controller;
class AdminUserController extends Controller {
	//登录
    public function logIn(){
    	if (IS_POST) {
    		$user_name=I('post.user_name');
    		$user_pwd=I('post.user_pwd');
    		$arr=D('Admin')->logIn($user_name,$user_pwd);
    		session('admin_user',$arr);
    		$this->success('登录成功','/Admin181/Index/index',2);
    	} else {
    		$this->display();
    	}
    }

    // 快速登录
	public function logInAj(){
		if (IS_POST) {
			$user_info=D('Admin')->logIn(I('post.user'),I('post.pwd'));
			$msg = array();
			if ($user_info) {
				session('admin_user',$user_info);
				$msg = array('stage' => 1,'msg' => $user_info );
			}else{
				$msg = array('stage' => 0,'msg' => '用户名或密码错误' );
			}
			$this->ajaxReturn($msg);
		}else
		{
			$this->error('您无权访问该页面','',2);
		}
	}

    //登出
    public function logOut(){
    	session('admin_user',null);
    	$this->success('退出成功','/Admin181/AdminUser/logIn',2);
    }
}