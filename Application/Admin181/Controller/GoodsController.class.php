<?php
namespace Admin181\Controller;
use Think\Controller;
class GoodsController extends Controller {
	public function index(){

	}
    //商品分类页面
	public function cate(){
		if (IS_POST) {
			//添加一级分类
			$msg=D('Cate')->addCate(I('post.type1'));
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
	}

	//删除分类
	public function delCate(){
		$id=I('get.id');
		D('Cate')->delCate($id);
		$this->success('删除成功','/Admin181/Goods/Cate',1);
	}

	//添加子分类
	public function addSubCate(){
		if (IS_POST) {
			//添加子分类
			$msg=D('Cate')->addCate();
			if (!$msg) {
				$this->success('添加成功','/Admin181/Goods/Cate',1);
			} else {
				$this->error($msg,'',2);
			}
		} else {
			$this->error('没有访问该页面的权限','',2);
		}
	}

	public function editCate(){
		if (IS_POST) {
			//编辑分类名称
			$new_type=I('post.new_type');
			$msg=D('Cate')->editCate($new_type);
			if (!$msg) {
				$this->success('编辑成功','/Admin181/Goods/Cate',1);
			} else {
				$this->error($msg,'',2);
			}
		} else {
			$this->error('没有访问该页面的权限','',2);
		}
	}

}