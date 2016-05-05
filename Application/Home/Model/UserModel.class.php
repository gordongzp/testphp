<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	protected $patchValidate = true;
	protected $_map = array(
         'username' =>'user_name', // 把表单中name映射到数据表的username字段
         'pwd' =>'user_pwd', // 把表单中name映射到数据表的username字段
         'pwd2' =>'user_pwd2', // 把表单中name映射到数据表的username字段
         );
	protected $_validate = array(
		array('user_name','','帐号名称已经存在！',0,'unique',1), 
		array('email','','邮箱已经存在！',0,'unique',1), 
		array('tel','','手机号码已经存在！',0,'unique',1), 
		array('tel','/^1[3|4|5|8][0-9]\d{4,8}$/','请输入正确的手机格式'),
		array('user_pwd2','user_pwd','确认密码不正确',0,'confirm'), 
		array('user_pwd','/^[\w\d-_]{2,9}$/','密码必须以字母开头，长度在3-10之间'), 
		array('user_name','/^[\w\d-_]{5,17}$/','用户名必须以字母开头，长度在6-18之间'),
		array('email','/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/','请输入正确的邮箱格式'),  
		);
	protected $_auto = array ( 
        array('user_pwd','md10',3,'function') , 
        array('update_time','time',2,'function'),
        array('reg_time','time',1,'function'),
        array('reg_ip','get_client_ip',1,'function'),
        array('last_log_time',"time",3,'function'),
         );
	public function getUserInfo(){
		return $this->select();
	}
	public function register(){
		if (!$this->create()) {
			return $this->getError();
		}else{
			$this->add();
			return NULL;
		}
	}
	public function getUserInfoByPwd($username,$pwd){ 
		$condition = array('user_name' => $username,'user_pwd' => md10($pwd));
		$info=$this->where($condition)->find();
		if ($info) {
			$info['user_pwd']='';
		}
		return $info;
	}
}