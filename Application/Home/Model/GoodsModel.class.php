<?php
namespace Home\Model;
use Think\Model\RelationModel;
class GoodsModel extends RelationModel {
	protected $_auto = array ( 
		array('is_on_shelve',0,1),
		);

	protected $_link = array(
		'Cate' => array(
			'mapping_type'  => self::BELONGS_TO,
			'class_name'    => 'Cate',
			'foreign_key'   => 'cat_id',
			'mapping_name'  => 'cate',
			),
		'Shop' => array(
			'mapping_type'  => self::BELONGS_TO,
			'class_name'    => 'Shop',
			'foreign_key'   => 'shop_id',
			'mapping_name'  => 'shop',
			),
		'Attr' => array(
			'mapping_type'  => self::HAS_MANY,
			'class_name'    => 'Attr',
			'foreign_key'   => 'goods_id',
			'mapping_name'  => 'attr',
			),
		'Gdimg' => array(
			'mapping_type'  => self::HAS_MANY,
			'class_name'    => 'Gdimg',
			'foreign_key'   => 'goods_id',
			'mapping_name'  => 'gdimg',
			),
		);


//createAdd 方法
	public function createAdd(){
		if (!$this->create()) {
			return $this->getError();
		}else{
			$this->add();
			return NULL;
		}
	}

//createAdd 方法
	public function createAddReId(){
		if (!$this->create()) {
			return $this->getError();
		}else{
			return $this->add();
		}
	}

//createSave方法
	public function createSave(){ 
		if (!$this->create()) {
			return $this->getError();
		}else{
			$this->save();
			return NULL;
		}
	}


//获取所有商品信息(带分页)
	public function getGoodsList($shop_id){
		$page=I('get.p',1,'int');
		$limit=10;//每页显示数量
		$lists=$this->relation(true)->where('shop_id='.$shop_id)->page($page,$limit)->select();//先where 再order再。。。
		$count=$this->count();
		$Page=new \Think\Page($count,$limit);
		return array('show' => $Page->show(), 'lists'=>$lists);
	}

}
