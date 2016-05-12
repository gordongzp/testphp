<?php
namespace Admin181\Controller;
use Think\Controller;
class GoodsController extends Controller {
	public function index(){
	}
    //商品分类页面
	public function cate(){
		if (is_admin_login()) {
						//更新session数据
			session('admin_user',D('Admin')->getUserInfoById(session('admin_user.id')));
			if (IS_POST) {
			//添加一级分类
				$msg=D('Cate')->createAdd(I('post.type1'));
				if (!$msg) {
					$this->success('添加成功','/Admin181/Goods/Cate',1);
				} else {
					$this->error($msg,'',2);
				}
			} else {
				$items = D('Cate')->select();
				$this->assign('items',format_tree($items));
				$this->display();	
			}
		}else{
			$this->error('请先登录','/Admin181/AdminUser/logIn',2);
		}
	}

	//删除分类
	public function delCate(){
		if (is_admin_login()) {
						//更新session数据
			session('admin_user',D('Admin')->getUserInfoById(session('admin_user.id')));
			$id=I('get.id');
			D('Cate')->delCate($id);
			$this->success('删除成功','/Admin181/Goods/Cate',1);
		}else{
			$this->error('请先登录','/Admin181/AdminUser/logIn',2);
		}
	}

	//添加子分类
	public function addSubCate(){
		if (is_admin_login()) {
						//更新session数据
			session('admin_user',D('Admin')->getUserInfoById(session('admin_user.id')));
			if (IS_POST) {
			//添加子分类
				$msg=D('Cate')->createAdd();
				if (!$msg) {
					$this->success('添加成功','/Admin181/Goods/Cate',1);
				} else {
					$this->error($msg,'',2);
				}
			} else {
				$this->error('没有访问该页面的权限','',2);
			}
		}else{
			$this->error('请先登录','/Admin181/AdminUser/logIn',2);
		}
	}

	public function editCate(){
		if (is_admin_login()) {
						//更新session数据
			session('admin_user',D('Admin')->getUserInfoById(session('admin_user.id')));
			if (IS_POST) {
			//编辑分类名称
				$new_type=I('post.new_type');
				$msg=D('Cate')->createSave();
				if (!$msg) {
					$this->success('编辑成功','/Admin181/Goods/Cate',1);
				} else {
					$this->error($msg,'',2);
				}
			} else {
				$this->error('没有访问该页面的权限','',2);
			}
		}else{
			$this->error('请先登录','/Admin181/AdminUser/logIn',2);
		}
	}
}