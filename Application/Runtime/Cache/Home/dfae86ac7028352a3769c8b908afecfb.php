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
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>

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
<body class="no-trans front-page transparent-header  ">

	<!-- scrollToTop -->
	<!-- ================ -->
	<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>

	<!-- page wrapper start -->
	<!-- ================ -->
	<div class="page-wrapper">
		
		<!-- background image -->
		<div class="fullscreen-bg"></div>

		<!-- banner start -->
		<!-- ================ -->
		<div class="pv-40 dark-translucent-bg">
			<div class="container">
				<div class="object-non-visible text-center" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
					<!-- logo -->
					<div id="logo" class="logo">
						<h3 class="margin-clear"><a href="index.html" class="logo-font link-light">The <span class="text-default">Project</span></a></h3>
					</div>
					<!-- name-and-slogan -->
					<p class="small">Multipurpose HTML5 Template</p>
					<div class="form-block center-block p-30 light-gray-bg border-clear text-left">

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
								<label for="inputEmail" class="col-sm-3 control-label">邮箱 <span class="text-danger small">*</span></label>
								<div class="col-sm-8">
									<input name="email" type="email" class="form-control" id="inputEmail" placeholder="<?php echo ($msg["email"]); ?>" required>
									<i class="fa fa-envelope form-control-feedback"></i>
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
									<button type="submit" class="btn btn-group btn-default btn-animated">Sign Up <i class="fa fa-check"></i></button>
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
	<!-- 本页js -->

</body>
</html>