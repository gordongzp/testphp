<?php
namespace Home\Model;
use Think\Model\RelationModel;
class UconfigModel extends RelationModel {

    protected $_link = array(
        'User' => array(
            'mapping_type'  => self::BELONGS_TO,
            'class_name'    => 'User',
            'foreign_key'   => 'id',
            'mapping_name'  => 'user',
    // 定义更多的关联属性
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