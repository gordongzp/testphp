<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
	public function index(){
	}

	public function addGoods(){
    	//判断登录
		if (!is_login()) {
			$this->error('请先登录','/Home/User/logIn',2);
		}
		//更新session数据
		session('user',D('User')->getUserInfoById(session('user.id')));
		//判断是否为卖家
		if (1!=session('user.is_seller')) {
			$this->error('您还不是卖家','/Home/SellerCenter/openShop',2);
		}
		//关联查询与shop的用户绑定的shop信息
		$arr=D('User')->relation('shop')->where('id='.session('user.id'))->find();
		$shop=$arr['shop'];
		if (IS_POST) {
			
		} else {
			$items = D('Admin181/Cate')->select();
			$this->assign('tree',$this->_showTree(format_tree($items)));
			$this->display();
		}
	}

	private function _showTree($arr){
		$re='';
		$re.= "<ul>";
		foreach ($arr as $k => $v) {
			$re.= "<li>";
			if (0==$v['pid']) {
				$re.= "<span><i class=\"glyphicon glyphicon-folder-open\"></i>".$v['name']."</span> <a onclick=\"click_e(".$v['cat_id'].")\" href=\"javascript:void(0);\">选择</a>";
			}elseif ($v['son']) {
        //有儿子
				$re.= "<span><i class=\"glyphicon glyphicon-minus-sign\"></i>".$v['name']."</span> <a onclick=\"click_e(".$v['cat_id'].")\" href=\"javascript:void(0);\">选择</a>";
			}else{
        //没儿子
				$re.= "<span><i class=\"glyphicon glyphicon-leaf\"></i>".$v['name']."</span> <a onclick=\"click_e(".$v['cat_id'].")\" href=\"javascript:void(0);\">选择</a>";
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