<?php
namespace Home\Model;
use Think\Model\RelationModel;
class ShopModel extends RelationModel {
	protected $patchValidate = true;
	protected $_validate = array(
		array('shop_tel','/^1[3|4|5|8][0-9]\d{4,8}$/','WRONG_TEL'),	
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