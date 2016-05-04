<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
    }

    public function signUp(){
    	if (IS_POST) {
    		$msg=D('User')->register();
    		if (!$msg) {
    			$this->success('操作完成','/Home/Index/index',3);
    		}else{
    			$this->error('error',U('Home/User/signUp',array('msg'=>serialize($msg))),3);
    		}
    	}else{
    		$this->assign('msg',unserialize($_GET['msg']));
    		$this->display();
    	}
    }
}