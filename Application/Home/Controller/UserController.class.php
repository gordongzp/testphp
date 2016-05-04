<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
	public function index(){
	}
	public function signUp(){
		if (IS_POST) {
			if (check_verify(I('post.check'),1)) {
				$msg=D('User')->register();
				if (!$msg) {
					session('user',D('user')->getUserInfoByPwd(I('post.username'),I('post.pwd')));
					$this->success('操作完成','/Home/Index/index',3);
				}else{
					$this->error('error',U('Home/User/signUp',array('msg'=>serialize($msg))),3);
				}
			}else{
				$this->error('请输入正确验证码','',3);
			}
		}else{
			$this->assign('msg',unserialize($_GET['msg']));
			$this->display();
		}
	}

	public function logIn(){
		if (IS_POST) {
			$user_info=D('User')->getUserInfoByPwd(I('post.inputUserName'),I('post.inputPassword'));
			if ($user_info) {
				session('user',$user_info);
				$this->success('操作完成','/Home/Index/index',3);		
			}else{
				$this->error('密码或用户名错误','',3);
			}
		}else
		{
			$this->display();
		}
	}

	public function logInAj(){
		if (IS_POST) {
			$user_info=D('User')->getUserInfoByPwd(I('post.user'),I('post.pwd'));
			$msg = array();
			if ($user_info) {
				session('user',$user_info);
				$msg = array('stage' => 1,'msg' => $user_info );
			}else{
				$msg = array('stage' => 0,'msg' => '用户名或密码错误' );
			}
			$this->ajaxReturn($msg);
		}else
		{
			
		}
	}

	public function logOut(){
		session('user',null);
		$this->success('退出成功','/Home/Index/index',3);
	}

	public function verify(){
		$config =    array(
    'fontSize'    =>    25,    // 验证码字体大小
    'length'      =>    4,     // 验证码位数
    'useNoise'    =>    false, // 关闭验证码杂点
    );
		$Verify =     new \Think\Verify($config);
		$img=$Verify->entry(1);	
	}
}