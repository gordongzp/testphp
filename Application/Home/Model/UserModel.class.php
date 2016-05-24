<?php
namespace Home\Model;
use Think\Model\RelationModel;
class UserModel extends RelationModel {
	protected $_link = array(
		'Shop' => array(
			'mapping_type'  => self::HAS_ONE,
			'class_name'    => 'Shop',
			'foreign_key'   => 'id',
			'mapping_name'  => 'shop',
			),
		);
	protected $patchValidate = true;
	protected $_map = array(
         'username' =>'user_name', // 把表单中name映射到数据表的username字段
         'pwd' =>'user_pwd', // 把表单中pwd映射到数据表的username字段
         'pwd2' =>'user_pwd2', // 把表单中pwd2映射到数据表的username字段
         );
	protected $_validate = array(
		array('user_name','','DOUBLE_USERS',0,'unique',3), 
		array('email','','DOUBLE_EMAILS',0,'unique',3), 
		array('person_id','','DOUBLE_ID',0,'unique',3), 
		array('tel','','DOUBLE_TEL',0,'unique',3), 

		array('tel','/^1[3|4|5|8][0-9]\d{4,8}$/','WRONG_TEL'),	
		array('user_pwd','/^[\w\d-_]{3,10}$/','WRONG_PWD'), 
		array('user_name','/^[\w\d-_]{6,18}$/','WRONG_USER_NAME'),
		array('email','/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/','WRONG_EMAIL'),  
		array('person_id','/^(^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$)|(^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])((\d{4})|\d{3}[Xx])$)$/','WRONG_ID'),  

		array('user_pwd2','user_pwd','WRONG_CONFIRM_PWD',0,'confirm'), 
		);
	protected $_auto = array ( 
		array('user_pwd','md10',1,'function') , 
		array('person_identify_stage',0,1),//0表示未认证，1表示已提交认证等待审核，2表示审核不通过，3表示认证通过
		array('shop_identify_stage',0,1),//0表示未认证，1表示已提交认证等待审核，2表示审核不通过，3表示认证通过

		array('update_time','time',2,'function'),
		array('reg_time','time',1,'function'),
		array('reg_ip','get_client_ip',1,'function'),
		array('last_log_time',"time",3,'function'),
		array('last_log_ip',"get_client_ip",3,'function'),
		);

//获取所有用户信息(带分页)
	public function getUserInfo(){
		$page=I('get.p',1,'int');
		$limit=10;//每页显示数量
		$lists=$this->page($page,$limit)->select();//先where 再order再。。。
		$count=$this->count();
		$Page=new \Think\Page($count,$limit);
		return array('show' => $Page->show(), 'lists'=>$lists);
	}

//获取单个用户信息by id
	public function getUserInfoById($id){
		return $this->find($id);
	}

//用户名/手机+密码方式验证身份
	public function logInWithTel($username_or_tel,$pwd){ 
		$condition_tem=array('user_name' =>$username_or_tel,'tel' => $username_or_tel,'_logic'=>'or');
		$condition = array('_complex' => $condition_tem,'user_pwd' => md10($pwd));
		$info=$this->where($condition)->find();
		$data = array(
			'last_log_time'=>time(),
			'last_log_ip'=>get_client_ip(),
			);
		$this->where($condition)->save($data);
		if ($info) {
			$info['user_pwd']='';
		}
		return $info;
	}

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

//普通方法重置密码
	public function setPwdByTel($tel,$pwd){ 
		if (!$this->create()) {
			return $this->getError();
		}else{
			$condition = array('tel' => $tel, );
			$data = array('user_pwd' => md10($pwd), 
				'update_time'=>time(),);
			if (!$this->where($condition)->select()) {
				//失败
				return array('tel' => 'NO_TEL', );
			}else{
				//成功
				$this->where($condition)->save($data);
				return null;
			}
		}
	}

//更换手机
	public function changeTel($old_tel,$new_tel){
		$condition = array('tel' => $old_tel, );
		$condition2 = array('tel' => $new_tel, );
		$data = array(
			'tel' => $new_tel, 
			'update_time'=>time());
		if (!$this->where($condition)->find()) {
			//失败
			return array('tel' => 'NO_TEL', );
		}else{
			//成功
			//判断新号码是否存在
			if ($this->where($condition2)->find()) {
				//已存在
				return array('tel' => 'DOUBLE_TEL', );
			}else{
				$this->where($condition)->save($data);
				return null;
			}
		}
	} 

//更换邮箱
	public function changeEmail($old_email,$new_email){
		$condition = array('email' => $old_email, );
		$condition2=array('email' => $new_email, );
		$data = array(
			'email' => $new_email, 
			'update_time'=>time());
		if (!$this->where($condition)->find()) {
			//失败
			return array('email' => 'NO_EMAIL', );
		}else{
			//成功
			//判断新号码是否存在
			if ($this->where($condition2)->find()) {
				//已存在
				return array('email' => 'DOUBLE_EMAILS', );
			}else{
				$this->where($condition)->save($data);
				return null;
			}
		}
	} 
}