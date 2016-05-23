<?php
namespace Home\Model;
use Think\Model\RelationModel;
class GdimgModel extends RelationModel {

    protected $_link = array(
        'Goods' => array(
            'mapping_type'  => self::BELONGS_TO,
            'class_name'    => 'Goods',
            'foreign_key'   => 'goods_id',
            'mapping_name'  => 'goods',
    // 定义更多的关联属性
),
    );

}