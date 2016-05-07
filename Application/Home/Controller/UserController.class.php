<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
	//个人中心
	public function index(){

	}

	//注册
	public function signUp(){
		if (IS_POST) {
			if (verify_tel_check(I('post.check_tel'),I('post.tel'))) {//验证手机验证码
				$msg=D('User')->register();
				if (!$msg) {
					session('user',D('user')->logInWithTel(I('post.username'),I('post.pwd')));
					//创建uploads/user/id目录并复制默认头像文件
					mkdir(U(USER_PATH.'/'.session('user.id'),'',''),0777,true);
					$this->success('操作完成','/Home/Index/index',2);
				}else{
					$this->error('请输入正确注册信息',U('Home/User/signUp',array('msg'=>serialize($msg))),2);
				}
			}else{
				$this->error('手机验证码不正确','',2);
			}
		}else{
			$this->assign('msg',unserialize($_GET['msg']));
			$this->display();
		}
	}

	//登录
	public function logIn(){
		if (IS_POST) {
			$user_info=D('User')->logInWithTel(I('post.inputUserName'),I('post.inputPassword'));
			if ($user_info) {
				session('user',$user_info);
				$this->success('操作完成','/Home/Index/index',2);		
			}else{
				$this->error('密码或用户名错误','',2);
			}
		}else
		{
			$this->display();
		}
	}

	// 首页快速登录
	public function logInAj(){
		if (IS_POST) {
			$user_info=D('User')->logInWithTel(I('post.user'),I('post.pwd'));
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

	//登出
	public function logOut(){
		session('user',null);
		$this->success('退出成功','/Home/Index/index',2);
	}

	//生成验证码
	public function verify(){
		$config =    array(
    'fontSize'    =>    25,    // 验证码字体大小
    'length'      =>    4,     // 验证码位数
    'useNoise'    =>    false, // 关闭验证码杂点
    );
		$Verify =     new \Think\Verify($config);
		$img=$Verify->entry(1);	
	}

	// ajax验证图片验证码
	public function verify_check(){
		$this->ajaxReturn(check_verify(I('post.check'),1));
	}

	// ajax请求发送手机验证码
	public function send_tel_check(){
		$ajax_msg=array();
		$rand=rand(10000,99999);
		//将验证码及手机号存入session
		$to_session = array(
			'check' => $rand,
			'tel'=>I('post.tel'),
			);
		session('check_tel',$to_session);
		$ajax_msg = array(
			'stage' => send_sms(I('post.tel'),'验证码:'.$rand),
			'check' => md5($rand),  
			);
		$this->ajaxReturn($ajax_msg);
	}

	// ajax请求发送邮箱验证码
	public function send_email_check(){
		$ajax_msg=array();
		$rand=rand(10000,99999);
		//将验证码及邮箱存入session
		$to_session = array(
			'check' => $rand,
			'email'=>I('post.email'),
			);
		session('check_email',$to_session);
		$ajax_msg = array(
			'stage' => send_mail(I('post.email'), '邮箱验证码', '邮箱验证码为：'.$rand),
			'check' => md5($rand),  
			);
		$this->ajaxReturn($ajax_msg);
	}
}