<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh">
<!--<![endif]-->

<head>
	<title>管理中心首页</title>
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
<body class="no-trans front-page transparent-header  ">

	<!-- scrollToTop -->
	<!-- ================ -->
	<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>

	<!-- page wrapper start -->
	<!-- ================ -->
	<div class="page-wrapper">
		
		<!-- header-container start -->
<div class="header-container">

	<!-- header-top start -->
	<!-- classes:  -->
	<!-- "dark": dark version of header top e.g. class="header-top dark" -->
	<!-- "colored": colored version of header top e.g. class="header-top colored" -->
	<!-- ================ -->
	<div class="header-top dark ">
		<div class="container">
			<div class="row">
				<div class="col-xs-2 col-sm-5">
					<!-- header-top-first start -->
					<!-- ================ -->
					<div class="header-top-first clearfix">
						<ul class="list-inline hidden-sm hidden-xs">
							<li></li>
							<li></li>
							<li></li>
							<li></li>
						</ul>
					</div>
					<!-- header-top-first end -->
				</div>
				<div class="col-xs-10 col-sm-7">

					<!-- header-top-second start -->
					<!-- ================ -->
					<div id="header-top-second"  class="clearfix text-right">

						<!-- header top dropdowns start -->
						<!-- ================ -->
						<div id="dm" class="header-top-dropdown text-right">
							<div class="btn-group dropdown">
								<button type="button" class="btn dropdown-toggle btn-default btn-sm" data-toggle="dropdown"><i class="fa fa-lock pr-10"></i> 登录 </button>
								<ul class="dropdown-menu dropdown-menu-right dropdown-animation">
									<li>
										<form onkeydown="if(event.keyCode==13){return false;}" class="login-form margin-clear">
											<div class="form-group has-feedback">
												<label  class="control-label">用户名 <span id="tip" style="color: red"></span></label>
												<input id="username" type="text" class="form-control" placeholder="">
												<i class="fa fa-user form-control-feedback"></i>
											</div>
											<div class="form-group has-feedback">
												<label class="control-label">密码</label>
												<input id="pwd" type="password" class="form-control" placeholder="">
												<i class="fa fa-lock form-control-feedback"></i>
											</div>
											<button id="btn" type="button" class="btn btn-gray btn-sm">登录</button>
										</form>
									</li>
								</ul>
							</div>
						</div>
						<!--  header top dropdowns end -->

						<!-- unvisible start -->
						<!-- ================ -->								
						<ul id="uinfo" style="display: none;" class="list-inline hidden-sm hidden-xs">
							<li>欢迎您：</li>
							<li id="li_name"><?php echo session('admin_user.user_name');?></li>
							<li><a href="<?php echo U('Admin181/AdminUser/logOut');?>">退出登录</a></li>
						</ul>
						<!--  header top dropdowns end -->

					</div>
					<!-- header-top-second end -->
				</div>
			</div>
		</div>
	</div>
	<!-- header-top end -->
</div>
			<!-- header-container end -->
					<!-- Offcanvas side start -->
			<div class="offcanvas-container">
				<nav id="offcanvas" class="animated navmenu navmenu-default navmenu-fixed-left offcanvas offcanvas-left" role="navigation">
					<!-- 头像 -->
					<div class="logo">
						<img class="img-circle" src="#" style="width: 100px; height: 100px;">
					</div>

					<!-- name-and-slogan -->
					<div class="site-slogan">
						<?php echo session('admin_user.user_name');?>
					</div>

					<ul class="nav navbar-nav text-center">
						<li class="active"><a href="<?php echo U('Admin181/Index/index');?>">管理中心</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">商品管理</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo U('Admin181/Goods/cate');?>">商品分类</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">会员管理</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo U('Admin181/User/userList');?>">会员列表</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">一级目录</a>
							<ul class="dropdown-menu">
								<li><a href="#">二级目录</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">二级目录</a>
									<ul class="dropdown-menu">
										<li><a href="#">三级目录</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="#">备用</a></li>
					</ul>
				</nav>
				<button id="offcanvas_btn" type="button" class="offcanvas-toggle-left navbar-toggle" data-toggle="offcanvas" data-target="#offcanvas"></button>
			</div>
			<!-- offcanvas side end -->
		<!-- breadcrumb start -->
		<!-- ================ -->
		<div class="breadcrumb-container">
			<div class="container">
				<ol class="breadcrumb">
					<li><i class="fa fa-home pr-10"></i><a class="link-dark" href="<?php echo U('Home/Index/index');?>">首页</a></li>
					<li><a class="link-dark" href="<?php echo U('Admin181/Index/index');?>">管理中心</a></li>
					<li class="active">管理中心首页</li>
				</ol>
			</div>
		</div>
		<!-- breadcrumb end -->

		<!-- main-container start -->
		<!-- ================ -->
		<section class="main-container">
			<div class="container">
				<div class="row">

					<!-- main start -->
					<!-- ================ -->
					<div class="main col-md-12">

						<!-- page-title start -->
						<!-- ================ -->
						<h1 class="page-title">管理中心首页</h1>
						<div class="separator-2"></div>
						<!-- page-title end -->
						<div class="row">
							<div class="col-sm-12">

								<form onkeydown="if(event.keyCode==13){return false;}" action="<?php echo U('Admin181/Index/index');?>" method="POST" role="form">
									<input style="display: none" type="text" name="con_id" value="1">
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" name="openshop_need_person_id" id="openshop_need_person_id1" value="1">
												开店需要实名认证
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="openshop_need_person_id" id="openshop_need_person_id0" value="0">
												开店不需要实名认证
											</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" name="openshop_need_email" id="openshop_need_email1" value="1" >
												开店需要邮箱认证
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="openshop_need_email" id="openshop_need_email0" value="0">
												开店不需要邮箱认证
											</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" name="openshop_need_verify" id="openshop_need_verify1" value="1" >
												开店需要审核
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="openshop_need_verify" id="openshop_need_verify0" value="0">
												开店不需审核
											</label>
										</div>
									</div>

									<div class="row"></div>

									<button type="submit" class="btn btn-default">保存</button>

								</form>

							</div>
						</div>
					</div>
					<!-- main end -->
				</div>
			</div>
		</section>
		<!-- main-container end -->
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
<!-- 顶部快速登录切换 -->
<script type="text/javascript">
	if (<?php echo session('admin_user');?>) {
		$('#uinfo').css("display","");
		$('#dm').css("display","none");
	}

	$(function(){
		$('#btn').click(function(){
			var user=$('#username').val();
			var pwd=$('#pwd').val();
			var action='<?php echo U('Home/AdminUser/logInAj');?>';
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
		<?php  switch ($config['openshop_need_person_id']) { case 0: ?>
			document.getElementById("openshop_need_person_id0").checked=true;
			<?php  break; case 1: ?>
			document.getElementById("openshop_need_person_id1").checked=true;
			<?php  break; } switch ($config['openshop_need_email']) { case 0: ?>
			document.getElementById("openshop_need_email0").checked=true;
			<?php  break; case 1: ?>
			document.getElementById("openshop_need_email1").checked=true;
			<?php  break; } switch ($config['openshop_need_verify']) { case 0: ?>
			document.getElementById("openshop_need_verify0").checked=true;
			<?php  break; case 1: ?>
			document.getElementById("openshop_need_verify1").checked=true;
			<?php  break; } ?>
	</script>

</body>
</html>