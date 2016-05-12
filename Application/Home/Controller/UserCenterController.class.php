<?php
namespace Home\Controller;
use Think\Controller;
class UserCenterController extends Controller {
	//个人中心
	public function index(){
		if (is_login()) {
						//更新session数据
			session('user',D('User')->getUserInfoById(session('user.id')));
			$this->display();
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}
	//个人基本资料
	public function basicInfo(){
		if (is_login()) {
						//更新session数据
			session('user',D('User')->getUserInfoById(session('user.id')));
			$this->display();
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}

	//修改密码
	public function changePwd(){
		if (is_login()) {
						//更新session数据
			session('user',D('User')->getUserInfoById(session('user.id')));
			if (IS_POST) {
				if (D('User')->logInWithTel(session('user.user_name'),I('post.old_pwd'))) {
					$msg=D('User')->setPwdByTel(session('user.tel'),I('post.pwd'));
					if (!$msg) {
						session('user',null);
						$this->success('修改完成','/Home/Index/index',2);
					}else{
						$this->error('输入信息有误',U('Home/UserCenter/changePwd',array('msg'=>serialize($msg))),2);
					}
				}else{
					$this->error('原密码错误','',2);
				}
			}else{
				$this->assign('msg',unserialize($_GET['msg']));
				$this->display();
			}
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}

	//密码找回
	public function comeBackPwd(){
		if (IS_POST) {
			if (verify_tel_check(I('post.check_tel'),I('post.tel2'))) {

				$msg=D('User')->setPwdByTel(I('post.tel2'),I('post.pwd'));
				if (!$msg) {
					session('user',null);
					$this->success('修改完成','/Home/Index/index',2);
				}else{
					$this->error('输入信息有误',U('Home/UserCenter/comeBackPwd',array('msg'=>serialize($msg))),2);
				}

			}else{
				$this->error('验证码不正确','',2);
			}
		}else{
			$this->assign('msg',unserialize($_GET['msg']));
			$this->display();
		}
	}

//修改手机号步骤一
	public function changeTel1(){
		if (is_login()) {
						//更新session数据
			session('user',D('User')->getUserInfoById(session('user.id')));
			if (IS_POST) {
				if (verify_tel_check(I('post.check_tel'),session('user.tel'))) {
					//获取进入step2的权限
					session('confirm_tmp',session('user.tel'));
					header('Location:'.U('Home/UserCenter/changeTel2'));
					exit;
				}else{
					$this->error('验证码不正确','',2);
				}
			}else{
				// $this->assign('msg',unserialize($_GET['msg']));
				$this->display();
			}
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}

//修改手机号步骤二
	public function changeTel2(){
		if (is_login()) {
						//更新session数据
			session('user',D('User')->getUserInfoById(session('user.id')));
			if (IS_POST) {
				//验证step传过来的confirm_tmp
				if (session('confirm_tmp')==session('user.tel')) {
				//确实是step1过来的
					if (verify_tel_check(I('post.check_tel'),I('post.tel'))) {
						$msg=D('User')->changeTel(session('user.tel'),I('post.tel'));
						if (!$msg) {

							//收回step2权限
							session('confirm_tmp',null);
							$this->success('修改完成','/Home/UserCenter/basicInfo',2);
						}else
						{
							$this->error('输入信息有误',U('Home/UserCenter/changeTel2',array('msg'=>serialize($msg))),2);
						}
					}else
					{
						$this->error('验证码不正确','',2);
					}
				}else{
					$this->error('您没有权限访问该页面','',2);
				}
			}else{
				//验证step传过来的confirm_tmp
				if (session('confirm_tmp')==session('user.tel')) {
				//确实是step1过来的
				//重置session(不需要)
					// session('confirm_tmp',null);
					$this->assign('msg',unserialize($_GET['msg']));
					$this->display();
				}else{
					$this->error('您没有权限访问该页面','',2);
				}
			}
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}

//email路由，决定是创建还是修改
	public function changeEmail(){
		if (is_login()) {
						//更新session数据
			session('user',D('User')->getUserInfoById(session('user.id')));
			//判断邮箱是否为空
			if (''==session('user.email')) {
				header('Location:'.U('Home/UserCenter/createEmail'));
				exit();
			}else{
				header('Location:'.U('Home/UserCenter/changeEmail1'));
				exit();
			}
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}

//创建email
	public function createEmail(){
		if (is_login()) {
						//更新session数据
			session('user',D('User')->getUserInfoById(session('user.id')));
			//判断邮箱是否为空
			if (''!=session('user.email')) {
				$this->error('无法重复创建邮箱','/Home/UserCenter/basicInfo',2);
				exit();
			}
			if (IS_POST) {
				if (verify_email_check(I('post.check_email'),I('post.email'))) {
					$msg=D('User')->createSave();
					if (!$msg) {
						$this->success('修改完成','/Home/UserCenter/basicInfo',2);
					}else{
						$this->error('输入信息有误',U('Home/UserCenter/createEmail',array('msg'=>serialize($msg))),2);
					}
				}else{
					$this->error('验证码不正确','',2);
				}
			}else{
				$this->assign('msg',unserialize($_GET['msg']));
				$this->display();
			}
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}



//修改邮箱步骤一
	public function changeEmail1(){
		if (is_login()) {
						//更新session数据
			session('user',D('User')->getUserInfoById(session('user.id')));
			if (IS_POST) {
				if (verify_email_check(I('post.check_email'),session('user.email'))) {
					//获取进入step2的权限
					session('confirm_tmp_email',session('user.email'));
					header('Location:'.U('Home/UserCenter/changeEmail2'));
					exit;
				}else{
					$this->error('验证码不正确','',2);
				}
			}else{
				// $this->assign('msg',unserialize($_GET['msg']));
				$this->display();
			}
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}

//修改邮箱步骤二
	public function changeEmail2(){
		if (is_login()) {
						//更新session数据
			session('user',D('User')->getUserInfoById(session('user.id')));
			if (IS_POST) {
				//验证step传过来的confirm_tmp
				if (session('confirm_tmp_email')==session('user.email')) {
				//确实是step1过来的
					if (verify_email_check(I('post.check_email'),I('post.email'))) {
						$msg=D('User')->changeEmail(session('user.email'),I('post.email'));
						if (!$msg) {
							//收回step2权限
							session('confirm_tmp_email',null);
							$this->success('修改完成','/Home/UserCenter/basicInfo',2);
						}else{
							$this->error('输入信息有误',U('Home/UserCenter/changeEmail2',array('msg'=>serialize($msg))),2);
						}
					}else{
						$this->error('验证码不正确','',2);
					}
				}else{
					$this->error('您没有权限访问该页面','',2);
				}
			}else{
				//验证step传过来的confirm_tmp
				if (session('confirm_tmp_email')==session('user.email')) {
				//确实是step1过来的
				// session('confirm_tmp',null);
					$this->assign('msg',unserialize($_GET['msg']));
					$this->display();
				}else{
					$this->error('您没有权限访问该页面','',2);
				}
			}
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}

//设置头像
	public function avatar(){
		if (is_login()) {
						//更新session数据
			session('user',D('User')->getUserInfoById(session('user.id')));
			if (IS_POST) {
			    $upload = new \Think\Upload();// 实例化上传类
			    $upload->maxSize   =     3145728 ;// 设置附件上传大小
			    $upload->exts      =     array('jpg', 'png', 'jpeg');// 设置附件上传类型
			    $upload->rootPath  =     USERS_PATH; // 设置附件上传根目录
			    $upload->savePath  =     I('post.id').'/'; // 设置附件上传（子）目录
			    $upload->autoSub   =     false;
			    $upload->saveName  =     'avatar';
			    $upload->replace   =     true;
			    $upload->saveExt   =     'jpg';
			    // 上传文件 
			    $info   =   $upload->upload();
			    if(!$info) {
			    // 上传错误提示错误信息
			    	$this->error($upload->getError());
			    }else{
			    // 上传成功
			    	$this->success('上传成功！','/Home/UserCenter/avatar');
			    }
			} else {
				$this->display();
			}
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}
	}	

//实名认证
	public function identityId(){
		if (is_login()) {
			//更新session数据
			session('user',D('User')->getUserInfoById(session('user.id')));
			if (IS_POST) {
				$upload = new \Think\Upload();// 实例化上传类
			    $upload->maxSize   =     3145728 ;// 设置附件上传大小
			    $upload->exts      =     array('jpg', 'png', 'jpeg');// 设置附件上传类型
			    $upload->rootPath  =     USERS_PATH; // 设置附件上传根目录
			    $upload->savePath  =     I('post.id').'/'; // 设置附件上传（子）目录
			    $upload->autoSub   =     false;
			    $upload->saveName  =     array('identify_upload_rule');
			    $upload->replace   =     true;
			    $upload->saveExt   =     'jpg';
			    // 上传文件 
			    $info   =   $upload->upload();
			    //set状态identity_stage以及身份证+truename；
			    $msg=D('User')->createSave();
			    if (!$msg) {
			    	if(!$info) {
			    // 上传错误提示错误信息
			    		$this->error($upload->getError());
			    	}else{
			    // 上传成功
			    		$this->success('上传成功！','/Home/UserCenter/identityId');
			    	}		
			    }else{
			    	$this->error('输入信息有误',U('Home/UserCenter/identityId',array('msg'=>serialize($msg))),2);
			    }
			} else {
				$this->assign('person_identity_stage',is_login()['person_identity_stage']);
				$this->assign('true_name',is_login()['true_name']);
				$this->assign('person_id',is_login()['person_id']);
				$this->assign('msg',unserialize($_GET['msg']));
				$this->display();
			}
		}else{
			$this->error('请先登录','/Home/User/logIn',2);
		}		
	}

}