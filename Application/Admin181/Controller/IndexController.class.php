<?php
namespace Admin181\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	if (session('admin_user')) {
    		$this->display();
    	} else {
    		$this->error('请先登录','/Admin181/AdminUser/logIn',2);
    	}
    }

}	