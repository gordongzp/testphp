<?php
namespace Home\Controller;
use Think\Controller;
class UserCenterController extends Controller {
	public function index(){
		if (is_login()) {
			$this->display();
		}else{
			$this->error('请先登录','/Home/Index/index',2);
		}
	}
	public function basicInfo(){
		if (is_login()) {
			$this->display();
		}else{
			$this->error('请先登录','/Home/Index/index',2);
		}
	}
}