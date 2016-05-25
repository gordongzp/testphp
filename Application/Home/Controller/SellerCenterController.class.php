<?php
namespace Home\Controller;
use Think\Controller;
class SellerCenterController extends Controller {
	public function index(){
	}


	public function editShop(){
		//判断登录
		if (!is_login()) {
			$this->error('请先登录',U('Home/User/logIn'),2);
		}
		//更新session数据
		session('user',D('User')->getUserInfoById(session('user.id')));
		$shop=M('Shop')->where('id='.session('user.id'))->find();
		$this->assign('shop',$shop);
		if (IS_POST) {
			//判断shop_id是否被篡改
			if ($shop['shop_id']!=I('post.shop_id')) {
				$this->error('非法操作','',2);
			}
			//上传图片
			$upload = new \Think\Upload();// 实例化上传类
		   	$upload->maxSize   =     3145728 ;// 设置附件上传大小
		   	$upload->exts      =     array('jpg', 'png', 'jpeg');// 设置附件上传类型
		   	$upload->rootPath  =     USERS_PATH; // 设置附件上传根目录
		   	$upload->savePath  =     session('user.id').'/'; // 设置附件上传（子）目录
		   	$upload->autoSub   =     false;
		   	$upload->saveName  =     array('shop_upload_rule');
		   	$upload->replace   =     true;
		   	$upload->saveExt   =     'jpg';
		   	// 上传文件 
		   	$info   =   $upload->upload();
		   	if(!$info) {
		   		// 上传错误提示错误信息
		   		$this->error($upload->getError());
		   	}else{
		   		$msg=D('Shop')->createSave();
		   		if (!$msg) {
		   			$this->success('修改成功',U('Home/SellerCenter/showShopInfo'),2);
		   		} else {
		   			$this->error('请输入正确注册信息',U('Home/SellerCenter/editShop',array('msg'=>serialize($msg))),2);
		   		}
		   	}	
		   } else {
		   	$this->assign('msg',unserialize($_GET['msg']));
		   	$this->display();
		   }
		}


		public function shopVerify(){
		//判断登录
			if (!is_login()) {
				$this->error('请先登录',U('Home/User/logIn'),2);
			}
		//更新session数据
			session('user',D('User')->getUserInfoById(session('user.id')));
		//获取admin配置信息
			$config=M('Config')->find(1);
		//判断是否需要邮箱验证
			if ($config['openshop_need_email']) {
				if (!session('user.email')) {
					$this->error('需要进行邮箱验证',U('Home/UserCenter/changeEmail'),2);
				}
			}
		//判断是否需要实名认证
			if ($config['openshop_need_person_id']) {
				if (session('user.person_identify_stage')!=3) {
					$this->error('需要进行实名认证',U('Home/UserCenter/identifyId'),2);
				}
			}
		//模板赋值		   	
			$this->assign('shop_identify_stage',session('user.shop_identify_stage'));
		//如果有，找到
			if (0!=session('user.shop_identify_stage')) {
				$shop=M('Shop')->where('id='.session('user.id'))->find();
				$this->assign('shop',$shop);
			}
			if (IS_POST) {
			// 判断id是否被篡改
				if (session('user.id')!=I('post.id')) {
					$this->error('非法操作','',2);
				}
			//判断shop_id是否被篡改
				if ($shop['shop_id']!=I('post.shop_id')) {
					$this->error('非法操作','',2);
				}
			$upload = new \Think\Upload();// 实例化上传类
		   	$upload->maxSize   =     3145728 ;// 设置附件上传大小
		   	$upload->exts      =     array('jpg', 'png', 'jpeg');// 设置附件上传类型
		   	$upload->rootPath  =     USERS_PATH; // 设置附件上传根目录
		   	$upload->savePath  =     session('user.id').'/'; // 设置附件上传（子）目录
		   	$upload->autoSub   =     false;
		   	$upload->saveName  =     'shop_identify';
		   	$upload->replace   =     true;
		   	$upload->saveExt   =     'jpg';
		   	// 上传文件 
		   	$info   =   $upload->upload();
		   	if(!$info) {
		   		// 上传错误提示错误信息
		   		$this->error($upload->getError());
		   	}else{
		   		// 上传图像成功
		   		//判断xy_shop是否存在
		   		if (0!=session('user.shop_identify_stage')) {
		   			//存在需修改
		   			$msg=D('Shop')->createSave();
		   		} else {
		   			//不存在需创建
		   			$msg=D('Shop')->createAdd();
		   		}
		   		if (!$msg) {
		   			//修改shop_identify_stage为1
		   			$data = array('shop_identify_stage' => 1, );
		   			M('User')->where('id='.I('post.id'))->save($data);
		   			$this->success('操作成功',U('Home/SellerCenter/shopVerify'),2);
		   		}else{
		   			$this->error('输入信息有误',U('Home/SellerCenter/shopVerify',array('msg'=>serialize($msg))),2);
		   		}	   			
		   	}		
		   } else {
		   	$this->display();	
		   }
		}
	}