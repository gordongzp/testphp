<?php
namespace Home\Controller;
use Think\Controller;
class UserCenterController extends Controller {
	public function index(){
		if (is_login()) {
			$this->display();
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}
	public function basicInfo(){
		if (is_login()) {
			$this->display();
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}

	//修改密码
	public function changePwd(){
		if (is_login()) {
			if (IS_POST) {
				if (D('User')->logInWithTel(session('user.user_name'),I('post.old_pwd'))) {
					$msg=D('User')->setPwd();
					if (!$msg) {
						session('user',null);
						$this->success('修改完成','/Home/Index/index',2);
					}else{
						$this->error('密码格式不正确',U('Home/UserCenter/changePwd',array('msg'=>serialize($msg))),2);
					}
				}else{
					$this->error('原密码错误','',2);
				}
			}else{
				$this->assign('msg',unserialize($_GET['msg']));
				$this->display();
			}
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}

	//密码找回
	public function comeBackPwd(){
		if (IS_POST) {
			if (verify_tel_check(I('post.check_tel'),I('post.tel2'))) {
				$msg=D('User')->setPwdByTel(I('post.tel2'),I('post.pwd'));
				if (!$msg) {
					session('user',null);
					$this->success('修改完成','/Home/Index/index',2);
				}else{
					$this->error('输入信息有误',U('Home/UserCenter/comeBackPwd',array('msg'=>serialize($msg))),2);
				}
			}else{
				$this->error('验证码不正确','',2);
			}
		}else{
			$this->assign('msg',unserialize($_GET['msg']));
			$this->display();
		}
	}

//修改手机号步骤一
	public function changeTel1(){
		if (is_login()) {
			if (IS_POST) {
				if (verify_tel_check(I('post.check_tel'),session('user.tel'))) {
					//获取进入step2的权限
					session('confirm_tmp',session('user.tel'));
					header('Location:'.U('Home/UserCenter/changeTel2'));
					exit;
				}else{
					$this->error('验证码不正确','',2);
				}
			}else{
				// $this->assign('msg',unserialize($_GET['msg']));
				$this->display();
			}
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}

//修改手机号步骤二
	public function changeTel2(){
		if (is_login()) {
			if (IS_POST) {
				//验证step传过来的confirm_tmp
				if (session('confirm_tmp')==session('user.tel')) {
				//确实是step1过来的
					if (verify_tel_check(I('post.check_tel'),I('post.tel'))) {
						$msg=D('User')->changeTel(session('user.tel'),I('post.tel'));
						if (!$msg) {
							//改一下session里面的号码
							session('user.tel',I('post.tel'));
							//收回step2权限
							session('confirm_tmp',null);
							$this->success('修改完成','/Home/UserCenter/basicInfo',2);
						}else
						{
							$this->error('输入信息有误',U('Home/UserCenter/changeTel2',array('msg'=>serialize($msg))),2);
						}
					}else
					{
						$this->error('验证码不正确','',2);
					}
				}else{
					$this->error('您没有权限访问该页面','',2);
				}
			}else{
				//验证step传过来的confirm_tmp
				if (session('confirm_tmp')==session('user.tel')) {
				//确实是step1过来的
				//重置session(不需要)
					// session('confirm_tmp',null);
					$this->assign('msg',unserialize($_GET['msg']));
					$this->display();
				}else{
					$this->error('您没有权限访问该页面','',2);
				}
			}
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}

//email路由，决定是创建还是修改
	public function changeEmail(){
		if (is_login()) {
			//判断邮箱是否为空
			if (''==session('user.email')) {
				header('Location:'.U('Home/UserCenter/createEmail'));
				exit();
			}else{
				header('Location:'.U('Home/UserCenter/changeEmail1'));
				exit();
			}
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}

//创建email
	public function createEmail(){
		if (is_login()) {
			//判断邮箱是否为空
			if (''!=session('user.email')) {
				$this->error('无法重复创建邮箱','/Home/UserCenter/basicInfo',2);
				exit();
			}
			if (IS_POST) {
				if (verify_email_check(I('post.check_email'),I('post.email'))) {
					$msg=D('User')->createEmail();
					if (!$msg) {
						session('user.email',I('post.email'));
						$this->success('修改完成','/Home/UserCenter/basicInfo',2);
					}else{
						$this->error('输入信息有误',U('Home/UserCenter/changePwd',array('msg'=>serialize($msg))),2);
					}
				}else{
					$this->error('验证码不正确','',2);
				}
			}else{
				$this->assign('msg',unserialize($_GET['msg']));
				$this->display();
			}
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}



//修改邮箱步骤一
	public function changeEmail1(){
		if (is_login()) {
			if (IS_POST) {
				if (verify_email_check(I('post.check_email'),session('user.email'))) {
					//获取进入step2的权限
					session('confirm_tmp_email',session('user.email'));
					header('Location:'.U('Home/UserCenter/changeEmail2'));
					exit;
				}else{
					$this->error('验证码不正确','',2);
				}
			}else{
				// $this->assign('msg',unserialize($_GET['msg']));
				$this->display();
			}
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}

//修改邮箱步骤二
	public function changeEmail2(){
		if (is_login()) {
			if (IS_POST) {
				//验证step传过来的confirm_tmp
				if (session('confirm_tmp_email')==session('user.email')) {
				//确实是step1过来的
					if (verify_email_check(I('post.check_email'),I('post.email'))) {
						$msg=D('User')->changeEmail(session('user.email'),I('post.email'));
						if (!$msg) {
							//改一下session里面的号码
							session('user.email',I('post.email'));
							//收回step2权限
							session('confirm_tmp_email',null);
							$this->success('修改完成','/Home/UserCenter/basicInfo',2);
						}else{
							$this->error('输入信息有误',U('Home/UserCenter/changeEmail2',array('msg'=>serialize($msg))),2);
						}
					}else{
						$this->error('验证码不正确','',2);
					}
				}else{
					$this->error('您没有权限访问该页面','',2);
				}
			}else{
				//验证step传过来的confirm_tmp
				if (session('confirm_tmp_email')==session('user.email')) {
				//确实是step1过来的
				//重置session(不需要)
					// session('confirm_tmp',null);
					$this->assign('msg',unserialize($_GET['msg']));
					$this->display();
				}else{
					$this->error('您没有权限访问该页面','',2);
				}
			}
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}
}