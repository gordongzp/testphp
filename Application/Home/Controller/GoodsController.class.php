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
			if (!I('post.cate_id')) {
				$this->error('分类不能为空','',2);
			}
			$msg=D('Goods')->createAdd();
			if (!$msg) {
					// if(!$info['info']) {
		   			// 上传错误提示错误信息
						// $this->error($info['err']);
					// }else{
						$this->success('新增成功','/Home/SellerCenter/showShopInfo',2);
					// }	
				} else {
					$this->error('请输入正确注册信息',U('Home/Goods/addGoods',array('msg'=>serialize($msg))),2);
				}
		} else {
			$items = D('Admin181/Cate')->select();
			$this->assign('show_tree',$this->_showTree(format_tree($items)));
			$this->assign('msg',unserialize($_GET['msg']));
			$this->assign('shop',$shop);
			$this->display();
		}
	}

	public function getCateNameAj(){
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

		if (IS_POST) {
			$cate_id=I('post.cate_id');
			//关联查询与shop的用户绑定的shop信息
			$this->ajaxReturn($this->_findPath($cate_id));
		} else {
			$this->error('您没有访问的权限','',2);
		}
		
	}


	private function _findPath($id){
		$re='';
		$arr=D('Admin181/Cate')->find($id);
		$re=$arr['name'].$re;
		if ($arr['pid']!=0) {	
			$re=$this->_findPath($arr['pid']).' - '.$re;
		}
		return $re;
	}


	private function _showTree($arr){
		$re='';
		$re.= "<ul>";
		foreach ($arr as $k => $v) {
			$re.= "<li>";
			if (0==$v['pid']) {
				$re.= "<span><i class=\"glyphicon glyphicon-folder-open\"></i>".$v['name']."</span> <a onclick=\"click_c(".$v['cat_id'].")\" href=\"javascript:void(0);\">选择</a>";
			}elseif ($v['son']) {
        //有儿子
				$re.= "<span><i class=\"glyphicon glyphicon-minus-sign\"></i>".$v['name']."</span> <a onclick=\"click_c(".$v['cat_id'].")\" href=\"javascript:void(0);\">选择</a>";
			}else{
        //没儿子
				$re.= "<span><i class=\"glyphicon glyphicon-leaf\"></i>".$v['name']."</span> <a onclick=\"click_c(".$v['cat_id'].")\" href=\"javascript:void(0);\">选择</a>";
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