<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	protected $patchValidate = true;
	protected $_map = array(
         'username' =>'user_name', // 把表单中name映射到数据表的username字段
         'pwd' =>'user_pwd', // 把表单中pwd映射到数据表的username字段
         'pwd2' =>'user_pwd2', // 把表单中pwd2映射到数据表的username字段
         );
	protected $_validate = array(
		array('user_name','','帐号名称已经存在！',0,'unique',3), 
		array('email','','邮箱已经存在！',0,'unique',3), 
		array('tel','','手机号码已经存在！',0,'unique',3), 
		array('tel','/^1[3|4|5|8][0-9]\d{4,8}$/','请输入正确的手机格式'),
		array('user_pwd2','user_pwd','确认密码不正确',0,'confirm'), 
		array('user_pwd','/^[\w\d-_]{3,10}$/','密码必须以字母开头，长度在3-10之间'), 
		array('user_name','/^[\w\d-_]{6,18}$/','用户名必须以字母开头，长度在6-18之间'),
		array('email','/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/','请输入正确的邮箱格式'),  
		);
	protected $_auto = array ( 
		array('user_pwd','md10',3,'function') , 
		array('is_seller',0,1),
		array('person_identify_stage',0,1),//0表示未认证，1表示已提交认证等待审核，2表示审核不通过，3表示认证通过
		array('update_time','time',2,'function'),
		array('reg_time','time',1,'function'),
		array('reg_ip','get_client_ip',1,'function'),
		array('last_log_time',"time",3,'function'),
		array('last_log_ip',"get_client_ip",3,'function'),
		);
	
//获取所有用户信息
	public function getUserInfo(){
		return $this->select();
	}

//获取所有用户信息by id
	public function getUserInfoById($id){
		return $this->find($id);
	}

//注册
	public function register(){
		if (!$this->create()) {
			return $this->getError();
		}else{
			$this->add();
			return NULL;
		}
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

//create方法重置密码
	public function setPwd(){ 
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
				return array('tel' => '此号码没有注册', );
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
			return array('tel' => '此号码没有注册', );
		}else{
			//成功
			//判断新号码是否存在
			if ($this->where($condition2)->find()) {
				//已存在
				return array('tel' => '此号码已存在，请更换号码', );
			}else{
				$this->where($condition)->save($data);
				return null;
			}
		}
	} 

//创建邮箱
	public function createEmail($old_tel,$new_tel){
		if (!$this->create()) {
			return $this->getError();
		}else{
			$this->save();
			return NULL;
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
			return array('email' => '没有此邮箱', );
		}else{
			//成功
			//判断新号码是否存在
			if ($this->where($condition2)->find()) {
				//已存在
				return array('email' => '此邮箱已存在，请用其他邮箱', );
			}else{
				$this->where($condition)->save($data);
				return null;
			}
		}
	} 
//set状态identity_stage
	public function set_identity_stage(){
		if (!$this->create()) {
			return $this->getError();
		}else{
			$this->save();
			return NULL;
		}
	}

}