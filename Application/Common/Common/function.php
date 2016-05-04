<?php 
function md10($pwd) {
	return md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5($pwd).'caonima').'fucknima').'rangnipojie').'chishiba').'niubima').'youbenshipojiea').'caonima'))).'caonima'));
}

// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
function check_verify($code, $id = ''){
	$verify = new \Think\Verify();
	return $verify->check($code, $id);
}

function is_login(){
	if (session('user')) {
		return session('user');
	}else{
		return 0;
	}
}


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


function send_sms($tel,$check){
	$url='http://sms.webchinese.cn/web_api/?Uid='.__UID__.'&Key='.__KEY__.'&smsMob='.$tel.'&smsText='.$check;
	return tel_get($url);
}

?>
