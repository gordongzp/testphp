<?php
namespace Admin181\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		if (is_admin_login()) {
			//更新session数据
			session('admin_user',D('Admin')->getUserInfoById(session('admin_user.id')));
			//获取所有用户信息
			if (IS_POST) {	
				$msg=D('Admin')->createSave();
				if (!$msg) {
					$this->success('操作完成','/Admin181/Index/index',2);
				} else {
					$this->success($msg,'/Admin181/Index/index',2);
				}
			} else {
				$this->display();
			}
		}else{
    		// D('Admin')->createAdmin();
			$this->error('请先登录','/Admin181/AdminUser/logIn',2);		}
	}

}	