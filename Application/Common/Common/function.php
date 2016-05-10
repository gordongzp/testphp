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

/**
 * 邮件发送函数
 */
function send_mail($to, $title, $content) {
	Vendor('PHPMailer.PHPMailerAutoload');     
        $mail = new PHPMailer(); //实例化
        $mail->IsSMTP(); // 启用SMTP
        $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
        $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
        $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
        $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
        $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
        $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
        $mail->AddAddress($to,"尊敬的客户");
        $mail->WordWrap = 50; //设置每行字符长度
        $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
        $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
        $mail->Subject =$title; //邮件主题
        $mail->Body = $content; //邮件内容
        $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
        return($mail->Send());
    }

//验证邮箱验证码
    function verify_email_check($check,$email){
    	if (session('check_email.check')==$check&&session('check_email.email')==$email) {
    		session('check_email',null);
    		return 1;
    	}else{
    		return 0;
    	}
    }

//无限分类
    function format_tree($array, $pid = 0){
    	$arr = array();
    	$tem = array();
    	foreach ($array as $v) {
    		if ($v['pid'] == $pid) {
    			$tem = format_tree($array, $v['cat_id']);
                        //判断是否存在子数组
    			$tem && $v['son'] = $tem;
    			$arr[] = $v;
    		}
    	}
    	return $arr;
    }


    function show_tree($arr){
        echo "<ul>";
        foreach ($arr as $k => $v) {
            echo "<li>";
            if (0==$v['pid']) {
                echo "<span><i class=\"glyphicon glyphicon-folder-open\"></i>".$v['name']."</span> <a onclick=\"click_e(".$v['cat_id'].")\" href=\"javascript:void(0);\">编辑</a>|<a href=\"".U('Admin181/Goods/delCate',array('id'=>$v['cat_id'],))."\">删除</a>|<a onclick=\"click_a(".$v['cat_id'].",'".$v['name']."')\" href=\"javascript:void(0);\">增加子分类</a>";
            }elseif ($v['son']) {
        //有儿子
                echo "<span><i class=\"glyphicon glyphicon-minus-sign\"></i>".$v['name']."</span> <a onclick=\"click_e(".$v['cat_id'].")\" href=\"javascript:void(0);\">编辑</a>|<a href=\"".U('Admin181/Goods/delCate',array('id'=>$v['cat_id'],))."\">删除</a>|<a onclick=\"click_a(".$v['cat_id'].",'".$v['name']."')\" href=\"javascript:void(0);\">增加子分类</a>";
            }else{
        //没儿子
                echo "<span><i class=\"glyphicon glyphicon-leaf\"></i>".$v['name']."</span> <a onclick=\"click_e(".$v['cat_id'].")\" href=\"javascript:void(0);\">编辑</a>|<a href=\"".U('Admin181/Goods/delCate',array('id'=>$v['cat_id'],))."\">删除</a>|<a onclick=\"click_a(".$v['cat_id'].",'".$v['name']."')\" href=\"javascript:void(0);\">增加子分类</a>";
            }
            if ($v['son']) {
                show_tree($v['son']);
            }
            echo "</li>";
        }
        echo "</ul>";
    }

    function is_not_empty($x){
        if ($x=='') {
            return false;
        } else {
            return true;
        }
    }

//身份证上传命名规则
    function identify_upload_rule(){
        global $just_call;
        if (!$just_call) {
            $just_call=1;
            return 'identify1';
        } else {
            return 'identify2';
        }
    }



    ?>
