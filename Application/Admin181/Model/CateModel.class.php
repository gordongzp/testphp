<?php
namespace Admin181\Model;
use Think\Model\RelationModel;
class CateModel extends RelationModel {
    // protected $_link = array(
    //      '关联1'  =>  array(
    //          '关联属性1' => '定义',
    //          '关联属性N' => '定义',
    //      ),
    //      '关联2'  =>  array(
    //          '关联属性1' => '定义',
    //          '关联属性N' => '定义',
    //      ),
    // );
	protected $_map = array(
		'name1' =>'name', 
		// 'id1' =>'pid', 
		'name2' =>'name', 
		'id2' =>'cat_id', 
		);
	protected $_validate = array(
		// array('name','','一级类别名已存在',0,'unique',3), 
		array('name','is_not_empty','类别名不能为空',3,'function'),
		);
	protected $_auto = array ( 
		// array('pid',0,1),
		);

	public function addCate(){
		if (!$this->create()) {
			return $this->getError();
		}else{
			$this->add();
			return NULL;
		}
	}

	public function delCate($id){
		$condition_to_delet = array('cat_id' =>$id , );
		$condition_to_find_sons = array('pid' => $id,);
		$arr=$this->where($condition_to_find_sons)->select();
		foreach ($arr as $k => $v) {
			$this->delCate($v['cat_id']);
		}	
		$this->where($condition_to_delet)->delete();
	}

	public function editCate($name){
		if (!$this->create()) {
			return $this->getError();
		}else{
			$this->save();
			return NULL;
		}	
	}
}