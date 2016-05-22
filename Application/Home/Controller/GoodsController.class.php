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
			//判断分类是否为空
			if (!I('post.cat_id')) {
				$this->error('分类不能为空','',2);
			}
			//判断shop_id是否遭篡改
			if (I('post.shop_id')!=$shop['shop_id']) {
				$this->error('非法操作','',2);
			}
			//判断属性是否为空
			$i=0;
			foreach (I('post.attr_name') as $k => $val) {
				if ((!$val)||(!I('post.price')[$i])) {
					$this->error('属性不能为空','',2);
				}
				if (!is_numeric(I('post.price')[$i])){
					$this->error('价格必须是数字','',2);
				}
				$i++;
			}
			//新增商品
			$msg=D('Goods')->createAddReId();
			//上传商品图片
			$upload = new \Think\Upload();// 实例化上传类
		   	$upload->maxSize   =     3145728 ;// 设置附件上传大小
		   	$upload->exts      =     array('jpg', 'png', 'jpeg');// 设置附件上传类型
		   	$upload->rootPath  =     USERS_PATH; // 设置附件上传根目录
		   	$upload->savePath  =     session('user.id').'/'; // 设置附件上传（子）目录
		   	$upload->autoSub   =     false;
		   	// $upload->saveName  =     'shop_identify';
		   	$upload->replace   =     true;
		   	$upload->saveExt   =     'jpg';
		   	$info   =   $upload->upload();
		   	if (is_numeric($msg)) {
		   		if(!$info) {
		   			// 上传错误提示错误信息
		   			$this->error($upload->getError());
		   		}else{
		   			//图片上传成功
			    	//整理attr数据
		   			$goods_id=$msg;
		   			$i=0;
		   			foreach (I('post.attr_name') as $k => $val) {
		   				$data[]=array(
		   					'attr_name' =>$val , 
		   					'price' =>I('post.price')[$i] ,
		   					'goods_id' =>$goods_id,
		   					);
		   				$i++;
		   			}
		    		//写入图像数据库
		   			foreach ($info as $k => $v) {
		   				$path=USERS_PATH.session('user.id').'/';
		   				$src= U($path.$v['savename'],'','');
		   				$data_img = array(
		   					'img_path'=>$path.$v['savename'],
		   					'thumb_path'=>$path.'thumb'.$v['savename'],
		   					'img_url' => $src, 
		   					'goods_id' =>$msg, 
		   					);
		   				M('Gdimg')->add($data_img);
		   				$image = new \Think\Image(); 
		   				$image->open($path.$v['savename']);
						// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb_$v['savename'].jpg
		   				$image->thumb(120, 120)->save($path.'thumb'.$v['savename']);
		   			}
		   			//写入attr数据库
		   			if (M('Attr')->addAll($data)) {

		   				$this->success('新增成功','/Home/Goods/goodsList',1);
		   			}
		   		}	
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

		public function goodsList(){
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
		//查询所有goods
			$lists=D('Goods')->getGoodsList();
			$page_show=$lists['show'];
			$goods_list=$lists['lists'];
		//计算最高价和最低价
			foreach ($goods_list as $k => $v) {
				$max=0;
				$min=99999;
				foreach ($v['attr'] as $key => $value) {
					if ($value['price']>$max) {
						$max=$value['price'];
					}
					if ($value['price']<$min) {
						$min=$value['price'];
					}
				}
				$v['max_price']=$max;
				$v['min_price']=$min;
				$goods_list[$k]=$v;
			}
			if (IS_POST) {
			} else {
				$items = D('Admin181/Cate')->select();
				$this->assign('show_tree',$this->_showTree(format_tree($items)));
				$this->assign('msg',unserialize($_GET['msg']));
				$this->assign('shop',$shop);
				$this->assign('page_show',$page_show);
				$this->assign('goods_list',$goods_list);
				$this->display();
			}
		}

		public function delGoods(){
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
			//获取要删除的商品id号
			$goods_ids=unserialize(I('get.ids'));
			$i=0;
			foreach ($goods_ids as $k => $v) {
				$condition = array(
					'shop_id' =>$shop['shop_id'], 
					'goods_id' =>$v ,  
					);
				$Goods_to_del=D('Goods')->relation(true)->where($condition)->find();
				//判断操作数据是否属于该商户
				if ($Goods_to_del) {
					//删除从表
					foreach ($Goods_to_del['attr'] as $key => $vel) {
						M('Attr')->where('attr_id='.$vel['attr_id'])->delete();
					}
					foreach ($Goods_to_del['gdimg'] as $key => $vel) {
						@unlink ($vel['thumb_path']); 
						@unlink ($vel['img_path']); 
						M('Gdimg')->where('gdimg_id='.$vel['gdimg_id'])->delete();
					}
					//删除主表
					M('Goods')->where($condition)->delete();	
					$i++;			
				}

			}
			if ($i) {		
				$this->success('成功删除'.$i.'件商品','/Home/Goods/goodsList',2);
			}
		}


		public function upDownShelve(){
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
		//获取要操作的商品id号
			$goods_ids=unserialize(I('get.ids'));
			$i=0;
			foreach ($goods_ids as $k => $v) {
				$condition = array(
					'shop_id' =>$shop['shop_id'], 
					'goods_id' =>$v ,  
					);
				$Goods_to_del=D('Goods')->relation('attr')->where($condition)->find();
			//判断操作数据是否属于该商户
				if ($Goods_to_del) {
					if ($Goods_to_del['is_on_shelve']) {
						$data = array('is_on_shelve' => 0, );
					} else {
						$data = array('is_on_shelve' => 1, );
					}
					M('Goods')->where($condition)->save($data);	
					$i++;			
				}
			}
			if ($i) {		
				$this->success('成功操作'.$i.'件商品','/Home/Goods/goodsList',2);
			}
		}






		public function attrList(){
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
			//获取要查询的商品id号
			$goods_id=I('get.id');
			//判断商品是否属于该店铺
			$condition = array(
				'shop_id' =>$shop['shop_id'], 
				'goods_id' =>$goods_id,  
				);
			$Goods_with_attr=D('Goods')->relation('attr')->where($condition)->find();
			if (!$Goods_with_attr) {
				$this->error('非法操作','',2);
			}
			$attr_list=$Goods_with_attr['attr'];
			$this->assign('msg',unserialize($_GET['msg']));
			$this->assign('shop',$shop);
			$this->assign('goods_id',$goods_id);
			$this->assign('attr_list',$attr_list);
			if (IS_POST) {
				//验证隐藏项目
				if (I('post.goods_id')!=$goods_id) {
					$this->error('非法操作','',2);
				}
			//判断属性是否为空
				$i=0;
				foreach (I('post.attr_name') as $k => $val) {
					if ((!$val)||(!I('post.price')[$i])) {
						$this->error('属性不能为空','',2);
					}
					if (!is_numeric(I('post.price')[$i])){
						$this->error('价格必须是数字','',2);
					}
					$i++;
				}
				$i=0;
				foreach (I('post.attr_name') as $k => $val) {
					$data[]=array(
						'attr_name' =>$val , 
						'price' =>I('post.price')[$i] ,
						'goods_id' =>$goods_id,
						);
					$i++;
				}
		   			//写入attr数据库
				if (M('Attr')->addAll($data)) {
					$this->success('新增成功',U('Home/Goods/attrList',array('id'=>$goods_id,)),1);
				}
			} else {
				$this->display();
			}
		}




		public function delAttr(){
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
			$shop_id=$shop['shop_id'];
			//获取要查询的属性id号
			$attr_id=I('get.id');
			//判断属性是否属于该店铺
			$goods=D('Attr')->relation('goods')->find($attr_id)['goods'];
			if ($shop_id!=$goods['shop_id']) {
				$this->error('非法操作','',2);
			}
			if (M('Attr')->delete($attr_id)) {
				$this->success('删除成功',U('Home/Goods/attrList',array('id'=>$goods['goods_id'],)),2);	
			}
		}






		public function imgList(){
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