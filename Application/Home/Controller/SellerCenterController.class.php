<?php
namespace Home\Controller;
use Think\Controller;
class SellerCenterController extends Controller {
	public function index(){
	}
	public function showShopInfo(){
		//判断登录
		if (!is_login()) {
			$this->error('请先登录','/Home/User/logIn',2);
		}
		//更新session数据
		session('user',D('User')->getUserInfoById(session('user.id')));
		//判断是否已经是卖家
		if (1!=session('user.is_seller')) {
			$this->error('您还没有成为卖家','/Home/SellerCenter/openShop',2);
		}
		$arr=D('User')->relation('shop')->where('id='.session('user.id'))->find();
		$shop=$arr['Shop'];
		$this->assign('shop',$shop);
		$this->display();
	}
	public function openShop(){
		//判断登录
		if (!is_login()) {
			$this->error('请先登录','/Home/User/logIn',2);
		}
		//更新session数据
		session('user',D('User')->getUserInfoById(session('user.id')));
		// //判断是否已经是卖家
		// if (session('user.is_seller')==1) {
		// 	$this->error('您已经是卖家','/Home/UserCenter/index',2);
		// }
		//获取admin配置信息
		$config=M('Config')->find(1);
		//判断是否需要邮箱验证
		if ($config['openshop_need_email']) {
			if (!session('user.email')) {
				$this->error('需要进行邮箱验证','/Home/UserCenter/changeEmail',2);
			}
		}
		//判断是否需要实名认证
		if ($config['openshop_need_person_id']) {
			if (session('user.person_identify_stage')!=3) {
				$this->error('需要进行实名认证','/Home/UserCenter/identifyId',2);
			}
		}
		//判断是否需要开店认证
		if ($config['openshop_need_verify']) {
			if (session('user.shop_identify_stage')!=3) {
				$this->error('需要进行商店认证','/Home/SellerCenter/shopVerify',2);
			}	
		}
		if (IS_POST) {
			//判断是否有资料,无资料新建，有资料修改
			if (1!=session('user.is_seller')) {
				//未开店
				$msg=D('Shop')->createAdd();
				//上传图片
				$info=$this->_uploadShopImg();
				if (!$msg) {
					if(!$info['info']) {
		   			// 上传错误提示错误信息
						$this->error($info['err']);
					}else{
		   				//上传成功
						//更改状态
						$data = array('is_seller' =>1 , );
						$id=session('user.id');
						M('User')->where('id='.$id)->save($data);
						$this->success('开店成功','/Home/SellerCenter/showShopInfo',2);
					}	
				} else {
					$this->error('请输入正确注册信息',U('Home/SellerCenter/openShop',array('msg'=>serialize($msg))),2);
				}
			} else {
				//已开店，采用修改
				$msg=D('Shop')->createSave();
				//上传图片
				$info=$this->_uploadShopImg();
				if (!$msg) {
					if(!$info['info']) {
		   			// 上传错误提示错误信息
						$this->error($info['err']);
					}else{
						$this->success('修改成功','/Home/SellerCenter/showShopInfo',2);
					}	
				} else {
					$this->error('请输入正确注册信息',U('Home/SellerCenter/openShop',array('msg'=>serialize($msg))),2);
				}
			}
		} else {
			//如果有，找到shop_id
			if (1==session('user.is_seller')) {
				$arr=D('User')->relation('shop')->where('id='.session('user.id'))->find();
				$shop=$arr['Shop'];
				$this->assign('shop',$shop);
			}
			$this->assign('msg',unserialize($_GET['msg']));
			$this->display();
		}
	}
	public function shopVerify(){
		//判断登录
		if (!is_login()) {
			$this->error('请先登录','/Home/User/logIn',2);
		}
		//更新session数据
		session('user',D('User')->getUserInfoById(session('user.id')));
		if (IS_POST) {
			$upload = new \Think\Upload();// 实例化上传类
		   	$upload->maxSize   =     3145728 ;// 设置附件上传大小
		   	$upload->exts      =     array('jpg', 'png', 'jpeg');// 设置附件上传类型
		   	$upload->rootPath  =     USERS_PATH; // 设置附件上传根目录
		   	$upload->savePath  =     I('post.id').'/'; // 设置附件上传（子）目录
		   	$upload->autoSub   =     false;
		   	$upload->saveName  =     'shop_identify';
		   	$upload->replace   =     true;
		   	$upload->saveExt   =     'jpg';
		   	// 上传文件 
		   	$info   =   $upload->upload();
	    	//set状态identify_stage以及身份证+truename；
		   	$msg=D('User')->createSave();
		   	if (!$msg) {
		   		if(!$info) {
		   		// 上传错误提示错误信息
		   			$this->error($upload->getError());
		   		}else{
		   		// 上传成功
		   			$this->success('上传成功！','/Home/SellerCenter/shopVerify');
		   		}		
		   	}else{
		   		$this->error('输入信息有误',U('Home/SellerCenter/shopVerify',array('msg'=>serialize($msg))),2);
		   	}
		   } else {
		   	$this->assign('shop_identify_stage',session('user.shop_identify_stage'));
		   	$this->display();	
		   }
		}
		private function _uploadShopImg(){
			$upload = new \Think\Upload();// 实例化上传类
		   	$upload->maxSize   =     3145728 ;// 设置附件上传大小
		   	$upload->exts      =     array('jpg', 'png', 'jpeg');// 设置附件上传类型
		   	$upload->rootPath  =     USERS_PATH; // 设置附件上传根目录
		   	$upload->savePath  =     I('post.id').'/'; // 设置附件上传（子）目录
		   	$upload->autoSub   =     false;
		   	$upload->saveName  =     array('shop_upload_rule');
		   	$upload->replace   =     true;
		   	$upload->saveExt   =     'jpg';
		   	// 上传文件 
		   	$info   =   $upload->upload();
		   	return array('info' => $info,'err'=>$upload->getError());
		   }




		}