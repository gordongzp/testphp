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
	public function changePwd(){
		if (IS_POST) {
			if (D('User')->getUserInfoByPwd(session('user.user_name'),I('post.old_pwd'))) {
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
			if (is_login()) {
				$this->assign('msg',unserialize($_GET['msg']));
				$this->display();
			}else{
				$this->error('请先登录','/Home/User/logIn',2);
			}
		}
	}
}