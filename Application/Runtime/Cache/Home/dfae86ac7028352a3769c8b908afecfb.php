<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh">
<!--<![endif]-->

<head>
	<title>注册</title>
	<!-- 模板上部配置 -->
		<meta charset="utf-8">
	<meta name="description" content="The Project a Bootstrap-based, Responsive HTML5 Template">
	<meta name="author" content="htmlcoder.me">

	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link rel="shortcut icon" href="/Public/images/favicon.ico">

	<!-- Web Fonts -->
<!-- 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'> -->

	<!-- Bootstrap core CSS -->
	<link href="/Public/bootstrap/css/bootstrap.css" rel="stylesheet">

	<!-- Font Awesome CSS -->
	<link href="/Public/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

	<!-- Fontello CSS -->
	<link href="/Public/fonts/fontello/css/fontello.css" rel="stylesheet">

	<!-- Plugins -->
	<link href="/Public/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
	<link href="/Public/plugins/rs-plugin/css/settings.css" rel="stylesheet">
	<link href="/Public/css/animations.css" rel="stylesheet">
	<link href="/Public/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="/Public/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
	<link href="/Public/plugins/hover/hover-min.css" rel="stylesheet">	
	<!-- The Project core CSS file后加 -->
	<link href="/Public/plugins/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet">
	<!-- The Project core CSS file -->
	<link href="/Public/css/style.css" rel="stylesheet" >
	<!-- Color Scheme (In order to change the color scheme, replace the blue.css with the color scheme that you prefer)-->
	<link href="/Public/css/skins/light_blue.css" rel="stylesheet">

	<!-- Custom css --> 
	<link href="/Public/css/custom.css" rel="stylesheet">
	<!-- 本页css -->
</head>

<!-- body classes:  -->
<!-- "boxed": boxed layout mode e.g. <body class="boxed"> -->
<!-- "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> -->
<!-- "transparent-header": makes the header transparent and pulls the banner to top -->
<!-- "gradient-background-header": applies gradient background to header -->
<!-- "page-loader-1 ... page-loader-6": add a page loader to the page (more info @components-page-loaders.html) -->
<body class="no-trans front-page transparent-header  "style="height: 100%">

	<!-- scrollToTop -->
	<!-- ================ -->
	<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>

	<!-- page wrapper start -->
	<!-- ================ -->
	<div class="page-wrapper" style="height: 100%">
		
		<!-- background image -->
		<div class="fullscreen-bg"></div>

		<!-- banner start -->
		<!-- ================ -->
		<div style="height: 100%" class="pv-40 dark-translucent-bg">
			<div class="container">
				<div class="object-non-visible text-center" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
					<!-- logo -->
					<div id="logo" class="logo">
						<h3 class="margin-clear"><a href="index.html" class="logo-font link-light">The <span class="text-default">Project</span></a></h3>
					</div>
					<!-- name-and-slogan -->
					<p class="small">Multipurpose HTML5 Template</p>
					<div id="block1" class="form-block center-block p-30 light-gray-bg border-clear text-left">
						<h2 class="title">用户注册</h2>
						<form method="post" class="form-horizontal" role="form" action="<?php echo U('Home/User/signUp');?>">
							<div class="form-group has-feedback">
								<label for="inputName" class="col-sm-3 control-label">用户名 <span class="text-danger small">*</span></label>
								<div class="col-sm-8">
									<input name="username" type="text" class="form-control" id="inputName" placeholder="<?php echo ($msg["user_name"]); ?>" required>
									<i class="fa fa-pencil form-control-feedback"></i>
								</div>
							</div>
							<div class="form-group has-feedback">
								<label for="inputEmail" class="col-sm-3 control-label">手机 <span class="text-danger small">*</span></label>
								<div class="col-sm-8">
									<input name="tel" type="text" class="form-control" id="tel" placeholder="<?php echo ($msg["tel"]); ?>">
									<i class="fa fa-mobile-phone form-control-feedback"></i>
								</div>
							</div>
							<div class="form-group has-feedback">
								<label for="inputPassword" class="col-sm-3 control-label">密码 <span class="text-danger small">*</span></label>
								<div class="col-sm-8">
									<input name="pwd" type="password" class="form-control" id="inputPassword" placeholder="<?php echo ($msg["user_pwd"]); ?>" required>
									<i class="fa fa-lock form-control-feedback"></i>
								</div>
							</div>
							<div class="form-group has-feedback">
								<label for="inputPassword" class="col-sm-3 control-label">确认密码 <span class="text-danger small">*</span></label>
								<div class="col-sm-8">
									<input name="pwd2" type="password" class="form-control" id="inputPassword" placeholder="<?php echo ($msg["user_pwd2"]); ?>" required>
									<i class="fa fa-lock form-control-feedback"></i>
								</div>
							</div>

							<div class="form-group has-feedback">
								<label for="inputPassword" class="col-sm-3 control-label">手机验证码 <span class="text-danger small">*</span></label>
								<div class="col-sm-4">
									<input name="check_tel" type="text" class="form-control" id="check_tel" placeholder="" required>
									<i class="fa fa-cog form-control-feedback"></i>
								</div>
								<div class="col-sm-4"><button id="send1" type="button" class="btn btn-animated btn-gray btn-sm"  >发送验证码 <i class="fa fa-send-o"></i></button><span style="color: red" id="time"></span><span style="display: none;" id="time_tip">秒后重新发送</span></div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-8">
									<div class="checkbox">
										<label>
											<input type="checkbox" required> 同意我们的 <a href="#">政策</a> 和 <a href="#">协议</a>
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-8">
									<div class="row">
										<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
											<button type="submit" class="btn btn-group btn-default btn-animated">注册 <i class="fa fa-check"></i></button>
										</div>
										<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
											<button type="button" class="btn btn-group btn-default btn-animated" onclick="javascript:window.location.href='<?php echo U('Home/Index/index');?>';">返回 <i class="fa fa-reply-all"></i></button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>

					<div id="block2" style="display: none;" class="form-block center-block p-30 light-gray-bg border-clear text-left">
						<h2 class="title">请输入验证码</h2>
						<form method="post" class="form-horizontal" role="form">

							<div class="form-group has-feedback">
								<label class="col-sm-3 control-label">验证码 <span class="text-danger small">*</span></label>
								<div class="col-sm-4">
									<input name="check" type="text" class="form-control" id="check" placeholder="" required>
									<i class="fa fa-cog form-control-feedback"></i>
								</div>
								<div class="col-sm-4"><img id="check_img" src="<?php echo U('Home/User/verify');?>"></div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-8">
									<div class="row">
										<div class="col-xs-5">
											<button id="send2" type="button" class="btn btn-group btn-default btn-animated">确认发送 <i class="fa fa-check"></i></button>
										</div>
										<div class="col-xs-5">
											<button id="back" type="button" class="btn btn-group btn-default btn-animated" >返回 <i class="fa fa-reply-all"></i></button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<!-- .subfooter start -->
					<!-- ================ -->
					<p class="mt-20">Copyright © 2015 The Project by <a target="_blank" href="http://htmlcoder.me">HtmlCoder</a>. All Rights Reserved</p>
					<!-- .subfooter end -->


				</div>
			</div>
		</div>
		<!-- banner end -->

		<!-- modal -->
		<button style="display: none;" id="modal_btn" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm">按钮名称</button>

		<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="mySmallModalLabel">警告</h4>
					</div>
					<div class="modal-body">
						<p>请输入正确的手机号码</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">关闭</button>
					</div>
				</div>
			</div>
		</div>

		<button style="display: none;" id="modal_btn2" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm2">按钮名称</button>

		<div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="mySmallModalLabel">警告</h4>
					</div>
					<div class="modal-body">
						<p>请输入正确的验证码</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">关闭</button>
					</div>
				</div>
			</div>
		</div>
		<!-- modal end-->

	</div>
	<!-- page-wrapper end -->

	<!-- 模板底部配置 -->
	<!-- JavaScript files placed at the end of the document so the pages load faster -->
<!-- ================================================== -->
<!-- Jquery and Bootstap core js files -->
<script type="text/javascript" src="/Public/plugins/jquery.min.js"></script>
<script type="text/javascript" src="/Public/bootstrap/js/bootstrap.min.js"></script>
<!-- Modernizr javascript -->
<script type="text/javascript" src="/Public/plugins/modernizr.js"></script>
<!-- jQuery Revolution Slider  -->
<script type="text/javascript" src="/Public/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/Public/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<!-- Jasny Bootstrap  -->
<script type="text/javascript" src="/Public/plugins/jasny-bootstrap/js/jasny-bootstrap.js"></script>
<!-- Isotope javascript -->
<script type="text/javascript" src="/Public/plugins/isotope/isotope.pkgd.min.js"></script>
<!-- Magnific Popup javascript -->
<script type="text/javascript" src="/Public/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Appear javascript -->
<script type="text/javascript" src="/Public/plugins/waypoints/jquery.waypoints.min.js"></script>
<!-- Count To javascript -->
<script type="text/javascript" src="/Public/plugins/jquery.countTo.js"></script>
<!-- Parallax javascript -->
<script src="/Public/plugins/jquery.parallax-1.1.3.js"></script>
<!-- Contact form -->
<script src="/Public/plugins/jquery.validate.js"></script>
<!-- Background Video -->
<script src="/Public/plugins/vide/jquery.vide.js"></script>
<!-- Owl carousel javascript -->
<script type="text/javascript" src="/Public/plugins/owl-carousel/owl.carousel.js"></script>
<!-- SmoothScroll javascript -->
<script type="text/javascript" src="/Public/plugins/jquery.browser.js"></script>
<script type="text/javascript" src="/Public/plugins/SmoothScroll.js"></script>
<!-- Initialization of Plugins -->
<script type="text/javascript" src="/Public/js/template.js"></script>
<!-- Custom Scripts -->
<script type="text/javascript" src="/Public/js/custom.js"></script>

<!-- Custom Scripts2带有模板函数。。。 -->
<script type="text/javascript">
	if (<?php echo is_login();?>) {
		$('#uinfo').css("display","");
		$('#dm').css("display","none");
	}

	$(function(){
		$('#btn').click(function(){
			var user=$('#username').val();
			var pwd=$('#pwd').val();
			var action='<?php echo U('Home/User/logInAj');?>';
			$.post(action,{user:user,pwd:pwd},function(data){
				if (data.stage) {
					$('#uinfo').css("display","");
					$('#dm').css("display","none");	
					document.getElementById("li_name").innerHTML=data.msg.user_name;
				}else{
					document.getElementById("tip").innerHTML=data.msg;
				}

			});
		})
	})
</script>
	<!-- 本页js -->
	<script type="text/javascript">
		$(function(){
			$('#check_img').click(function(){
				$("#check_img").attr("src","<?php echo U('Home/User/verify');?>");
			})
		})

		$(function(){
			$('#send2').click(function(){
				var tel=$('#tel').val();
				var check=$('#check').val();
				var action="<?php echo U('Home/User/verify_check');?>";
				$.post(action,{check:check},function(data){
					if (data) {
						var action2="<?php echo U('Home/User/send_tel_check');?>";
						$.post(action2,{tel:tel},function(data2){
							console.log(data2);
							$('#block1').css("display","");
							$('#block2').css("display","none");	
							$('#send1').css("display","none");
							$('#time').text(60);//将发送验证码改为等待时间
							$('#time_tip').css("display","");
							(function(){
								var wait = document.getElementById('time');
								var interval = setInterval(function(){
									var time = --wait.innerHTML;
									if(time <= 0) {
										$('#send1').css("display","");
										$('#time').text('');
										$('#time_tip').css("display","none");
										clearInterval(interval);
									};
								}, 1000);
							})();

						});
					}else{
						$("#modal_btn2").trigger("click");
					}
				});				
			})
		})

		$(function(){
			$('#send1').click(function(){
				//验证手机正确性
				var tel=$('#tel').val();
				regexp=/^1[3|4|5|8][0-9]\d{4,8}$/;
				if(!regexp.test(tel)){
					$("#modal_btn").trigger("click");
				}else{
					$('#block2').css("display","");
					$('#block1').css("display","none");
				}		
			})
		})

		$(function(){
			$('#back').click(function(){
				$('#block1').css("display","");
				$('#block2').css("display","none");				
			})
		})

	</script>
</body>
</html>