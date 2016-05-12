<?php
namespace Admin181\Controller;
use Think\Controller;
class UserController extends Controller {

		// if (is_admin_login()) {
		// 				//更新session数据
		// 	session('admin_user',D('Admin')->getUserInfoById(session('admin_user.id')));



		// }else{
		// 	$this->error('请先登录','/Admin181/AdminUser/logIn',2);
		// }


	public function userList(){
		if (is_admin_login()) {
			//更新session数据
			session('admin_user',D('Admin')->getUserInfoById(session('admin_user.id')));
			//获取所有用户信息
			$lists=D('Home/User')->getUserInfo();
			$this->assign('users',$lists['lists']);
			$this->assign('show',$lists['show']);
			$this->display();
		}else{
			$this->error('请先登录','/Admin181/AdminUser/logIn',2);
		}
	}

	public function identityId(){
		if (is_admin_login()) {
			//更新session数据
			session('admin_user',D('Admin')->getUserInfoById(session('admin_user.id')));
			if (IS_POST) {
				//更新审核状态create方法
				$msg=D('Home/User')->createSave();
				$user=I('get.id');
				if (!$msg) {
					$this->success('操作完成',U('Admin181/User/identityId',array('id'=>$user,)),2);
				} else {
					$this->error($msg,'',2);
				}
				
			} else {
				$user_id=I('get.id');
				$user=D('Home/User')->getUserInfoById($user_id);
				$this->assign('user',$user);
				$this->display();
			}
		}else{
			$this->error('请先登录','/Admin181/AdminUser/logIn',2);
		}
	}
	public function getUserName(){
	}
}	