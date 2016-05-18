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

//createSave方法
	public function createSave(){ 
		if (!$this->create()) {
			return $this->getError();
		}else{
			$this->save();
			return NULL;
		}
	}

}
