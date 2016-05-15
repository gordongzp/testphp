<?php
namespace Admin181\Model;
use Think\Model;
class ConfigModel extends Model {
	protected $_validate = array(
		);  

	protected $_auto = array ( 
		array('openshop_need_person_id',0,1),
		array('openshop_need_email',0,1),
		array('openshop_need_verify',0,1),
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

    //初始化
	public function init(){
		$data = array('con_id' => 1, );
		if (!$this->create($data)) {
			return $this->getError();
		}else{
			$this->add();
			return NULL;
		}
	}
}