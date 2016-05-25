<?php
namespace Admin181\Controller;
use Think\Controller;
class UserController extends Controller {

	public function userList(){
		//检查登录
		if (!is_admin_login()) {
			$this->error('请先登录',U('Admin181/AdminUser/logIn'),2);
		}
		//更新session数据
		session('admin_user',D('Admin')->getUserInfoById(session('admin_user.id')));
		//获取所有用户信息
		$lists=D('Home/User')->getUserInfo();
		$this->assign('users',$lists['lists']);
		$this->assign('show',$lists['show']);
		$this->display();

	}

	public function identifyId(){
		//检查登录
		if (!is_admin_login()) {
			$this->error('请先登录',U('Admin181/AdminUser/logIn'),2);
		}
		//更新session数据
		session('admin_user',D('Admin')->getUserInfoById(session('admin_user.id')));
		if (IS_POST) {
				//更新审核状态create方法
			$msg=D('Home/User')->createSave();
			$user=I('get.id');
			if (!$msg) {
				$this->success('操作完成',U('Admin181/User/identifyId',array('id'=>$user,)),2);
			} else {
				$this->error(L2($msg),'',2);
			}

		} else {
			$user_id=I('get.id');
			$user=D('Home/User')->getUserInfoById($user_id);
			$this->assign('user',$user);
			$this->display();
		}
	}

	public function identifyShop(){
		//检查登录
		if (!is_admin_login()) {
			$this->error('请先登录',U('Admin181/AdminUser/logIn'),2);
		}
		//更新session数据
		session('admin_user',D('Admin')->getUserInfoById(session('admin_user.id')));

		$user_id=I('get.id');
		$user=D('Home/User')->getUserInfoById($user_id);
		//模板赋值
		$this->assign('user',$user);
		//如果有，找到shop_id

		if (0!=session('user.shop_identify_stage')) {
			$shop=M('Shop')->where('id='.session('user.id'))->find();
			$this->assign('shop',$shop);
		}
		if (IS_POST) {
			//更新审核状态create方法
			$msg=D('Home/User')->createSave();
			if (!$msg) {
				$this->success('操作完成',U('Admin181/User/identifyShop',array('id'=>$user_id,)),2);
			} else {
				$this->error(L2($msg),'',2);
			}

		} else {

			$this->display();
		}

	}
}	