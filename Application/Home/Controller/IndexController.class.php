<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		$info=D('User')->getUserInfo();
		$this->assign('info',$info);
		$this->display();
	}
}