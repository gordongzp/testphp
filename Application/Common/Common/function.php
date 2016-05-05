<?php 
function md10($pwd) {
	return md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5($pwd).'caonima').'fucknima').'rangnipojie').'chishiba').'niubima').'youbenshipojiea').'caonima'))).'caonima'));
}

// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
function check_verify($code, $id = ''){
	$verify = new \Think\Verify();
	return $verify->check($code, $id);
}
// 检测是否处于登录状态，是返回用户信息，否返回0
function is_login(){
	if (session('user')) {
		return session('user');
	}else{
		return 0;
	}
}

// 短信公司api
function tel_get($url){
	if(function_exists('file_get_contents'))
	{
		$file_contents = file_get_contents($url);
	}
	else
	{
		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		curl_close($ch);
	}
	return $file_contents;
}

// 短信收发函数
function send_sms($tel,$msg){
	$url='http://utf8.sms.webchinese.cn/?Uid='.__UID__.'&Key='.__KEY__.'&smsMob='.$tel.'&smsText='.$msg;
	return tel_get($url);
}

//验证手机验证码
function verify_tel_check($check,$tel){
	if (session('check_tel.check')==$check&&session('check_tel.tel')==$tel) {
		session('check_tel',null);
		return 1;
	}else{
		return 0;
	}
}

?>
