<?php 
function md10($pwd) {
	return md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5().'caonima').'fucknima').'rangnipojie').'chishiba').'niubima').'youbenshipojiea').'caonima'))).'caonima'));
}

// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
function check_verify($code, $id = ''){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

function is_login(){
	return session('user');
}
 ?>
