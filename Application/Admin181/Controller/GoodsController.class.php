<?php
namespace Admin181\Controller;
use Think\Controller;
class GoodsController extends Controller {
	public function index(){
	}
    //商品分类页面
	public function cate(){
		//判断登录
		if (!is_admin_login()) {
			$this->error('请先登录',U('Admin181/AdminUser/logIn'),2);
		}
		//更新session
		session('admin_user',D('Admin')->getUserInfoById(session('admin_user.id')));
		if (IS_POST) {
				//添加一级分类
			$msg=D('Cate')->createAdd(I('post.type1'));
			if (!$msg) {
				$this->success('添加成功',U('Admin181/Goods/Cate'),1);
			} else {
				$this->error(L2($msg),'',2);
			}
		} else {
			$items = D('Cate')->select();
			$this->assign('tree',$this->_showTree(format_tree($items)));
			$this->display();	
		}
	}

	//删除分类
	public function delCate(){
		//判断登录
		if (!is_admin_login()) {
			$this->error('请先登录',U('Admin181/AdminUser/logIn'),2);
		}
		//更新session
		session('admin_user',D('Admin')->getUserInfoById(session('admin_user.id')));
		$id=I('get.id');
		D('Cate')->delCate($id);
		$this->success('删除成功',U('Admin181/Goods/Cate'),1);
	}

	//添加子分类
	public function addSubCate(){
		//判断登录
		if (!is_admin_login()) {
			$this->error('请先登录',U('Admin181/AdminUser/logIn'),2);
		}
		//更新session
		session('admin_user',D('Admin')->getUserInfoById(session('admin_user.id')));
		if (IS_POST) {
				//添加子分类
			$msg=D('Cate')->createAdd();
			if (!$msg) {
				$this->success('添加成功',U('Admin181/Goods/Cate'),1);
			} else {
				$this->error(L2($msg),'',2);
			}
		} else {
			$this->error('没有访问该页面的权限','',2);
		}
	}

	public function editCate(){
		//判断登录
		if (!is_admin_login()) {
			$this->error('请先登录',U('Admin181/AdminUser/logIn'),2);
		}
		//更新session
		session('admin_user',D('Admin')->getUserInfoById(session('admin_user.id')));
		if (IS_POST) {
				//编辑分类名称
			$new_type=I('post.new_type');
			$msg=D('Cate')->createSave();
			if (!$msg) {
				$this->success('编辑成功',U('Admin181/Goods/Cate'),1);
			} else {
				$this->error(L2($msg),'',2);
			}
		} else {
			$this->error('没有访问该页面的权限','',2);
		}
	}

	private function _showTree($arr){
		$re='';
		$re.= "<ul>";
		foreach ($arr as $k => $v) {
			$re.= "<li>";
			if (0==$v['pid']) {
				$re.= "<span><i class=\"glyphicon glyphicon-folder-open\"></i>".$v['name']."</span> <a onclick=\"click_e(".$v['cat_id'].")\" href=\"javascript:void(0);\">编辑</a>|<a href=\"".U('Admin181/Goods/delCate',array('id'=>$v['cat_id'],))."\">删除</a>|<a onclick=\"click_a(".$v['cat_id'].",'".$v['name']."')\" href=\"javascript:void(0);\">增加</a>";
			}elseif ($v['son']) {
        //有儿子
				$re.= "<span><i class=\"glyphicon glyphicon-minus-sign\"></i>".$v['name']."</span> <a onclick=\"click_e(".$v['cat_id'].")\" href=\"javascript:void(0);\">编辑</a>|<a href=\"".U('Admin181/Goods/delCate',array('id'=>$v['cat_id'],))."\">删除</a>|<a onclick=\"click_a(".$v['cat_id'].",'".$v['name']."')\" href=\"javascript:void(0);\">增加</a>";
			}else{
        //没儿子
				$re.= "<span><i class=\"glyphicon glyphicon-leaf\"></i>".$v['name']."</span> <a onclick=\"click_e(".$v['cat_id'].")\" href=\"javascript:void(0);\">编辑</a>|<a href=\"".U('Admin181/Goods/delCate',array('id'=>$v['cat_id'],))."\">删除</a>|<a onclick=\"click_a(".$v['cat_id'].",'".$v['name']."')\" href=\"javascript:void(0);\">增加</a>";
			}
			if ($v['son']) {
				$re.=$this->_showTree($v['son']);
			}
			$re.= "</li>";
		}
		$re.= "</ul>";
		return $re;
	}




}