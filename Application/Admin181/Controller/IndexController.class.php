<?php
namespace Admin181\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		if (is_admin_login()) {
			//更新session数据
			session('admin_user',D('Admin')->getUserInfoById(session('admin_user.id')));
			//获取config信息
			$config=M('Config')->find(1);
			if (IS_POST) {	
				$msg=D('Config')->createSave();
				if (!$msg) {
					$this->success('操作完成',U('Admin181/Index/index'),2);
				} else {
					$this->success($msg,U('Admin181/Index/index'),2);
				}
			} else {
				$this->assign('config',$config);
				$this->display();
			}
		}else{
			// 初始化临时
    		// echo L2(D('Admin')->createAdmin());
    		// echo L2(D('Config')->init());
			$this->error('请先登录',U('Admin181/AdminUser/logIn'),2);		
    	}
	}

}	