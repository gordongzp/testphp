<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh">
<!--<![endif]-->

<head>
	<title>个人中心</title>
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
												<label  class="control-label">用户名/手机 <span id="tip" style="color: red"></span></label>
												<input id="username" type="text" class="form-control" placeholder="">
												<i class="fa fa-user form-control-feedback"></i>
											</div>
											<div class="form-group has-feedback">
												<label class="control-label">密码</label>
												<input id="pwd" type="password" class="form-control" placeholder="">
												<i class="fa fa-lock form-control-feedback"></i>
											</div>
											<button id="btn" type="button" class="btn btn-gray btn-sm">登录</button>
											<span class="pl-5 pr-5">or</span>
											<button onclick="javascript:window.location.href='<?php echo U('Home/User/signUp');?>';" type="button" class="btn btn-default btn-sm">注册</button>
											<ul>
												<li><a href="<?php echo U('Home/UserCenter/comeBackPwd');?>">忘记密码?</a></li>
											</ul>
											<span class="text-center">Login with</span>
											<ul class="social-links circle small colored clearfix">
												<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
												<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
												<li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
											</ul>
										</form>
									</li>
								</ul>
							</div>
							<div class="btn-group">
								<a href="<?php echo U('Home/User/signUp');?>" class="btn btn-default btn-sm"><i class="fa fa-user pr-10"></i> 注册 </a>
							</div>
						</div>
						<!--  header top dropdowns end -->

						<!-- unvisible start -->
						<!-- ================ -->								
						<ul id="uinfo" style="display: none;" class="list-inline hidden-sm hidden-xs">
							<li>欢迎您：</li>
							<li id="li_name"><?php echo is_login()['user_name'];?></li>
							<li id="li_link"><a href="<?php echo U('Home/UserCenter/index');?>">进入个人中心</a></li>
							<li><a href="<?php echo U('Home/User/logOut');?>">退出登录</a></li>
						</ul>
						<!--  header top dropdowns end -->

					</div>
					<!-- header-top-second end -->
				</div>
			</div>
		</div>
	</div>
	<!-- header-top end -->

	<!-- header start -->
	<!-- classes:  -->
	<!-- "fixed": enables fixed navigation mode (sticky menu) e.g. class="header fixed clearfix" -->
	<!-- "dark": dark version of header e.g. class="header dark clearfix" -->
	<!-- "full-width": mandatory class for the full-width menu layout -->
	<!-- "centered": mandatory class for the centered logo layout -->
	<!-- ================ --> 
	<header class="header  fixed   dark clearfix">

		<div class="container">
			<div class="row">
				<div class="col-md-3 ">
					<!-- header-left start -->
					<!-- ================ -->
					<div class="header-left clearfix">

						<!-- logo -->
						<div id="logo" class="logo">
							<a href="index.html"><img id="logo_img" src="/Public/images/logo_light_blue.png" alt="The Project"></a>
						</div>

						<!-- name-and-slogan -->
						<div class="site-slogan">
							Multipurpose HTML5 Template
						</div>

					</div>
					<!-- header-left end -->

				</div>
				<div class="col-md-9">
					
					<!-- header-right start -->
					<!-- ================ -->
					<div class="header-right clearfix">

						<!-- main-navigation start -->
						<!-- classes: -->
						<!-- "onclick": Makes the dropdowns open on click, this the default bootstrap behavior e.g. class="main-navigation onclick" -->
						<!-- "animated": Enables animations on dropdowns opening e.g. class="main-navigation animated" -->
						<!-- "with-dropdown-buttons": Mandatory class that adds extra space, to the main navigation, for the search and cart dropdowns -->
						<!-- ================ -->
						<div class="main-navigation  animated with-dropdown-buttons">

							<!-- navbar start -->
							<!-- ================ -->
							<nav class="navbar navbar-default" role="navigation">
								<div class="container-fluid">

									<!-- Toggle get grouped for better mobile display -->
									<div class="navbar-header">
										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>

									</div>

									<!-- Collect the nav links, forms, and other content for toggling -->
									<div class="collapse navbar-collapse" id="navbar-collapse-1">
										<!-- main-menu -->
										<ul class="nav navbar-nav ">

											<!-- mega-menu start -->
											<li class=" active mega-menu">
												<a href="<?php echo U('Home/Index/index');?>" class="dropdown-toggle" >首页</a>
											</li>
											<!-- mega-menu end -->
											<!-- mega-menu start -->
											<li class="  mega-menu">
												<a href="#" class="dropdown-toggle" >我们</a>
											</li>
											<!-- mega-menu end -->
											<li class=" ">
												<a href="#" class="dropdown-toggle" >常见问题</a>
											</li>
											<!-- mega-menu start -->
											<li class="  mega-menu narrow">
												<a href="#" class="dropdown-toggle">业务联系</a>
											</li>
											<!-- mega-menu end -->
											<li class=" ">
												<a href="#" class="dropdown-toggle">城市合伙人</a>
											</li>
											<li class=" ">
												<a href="#" class="dropdown-toggle">关于我们</a>
											</li>
											<li class=" ">
												<a href="#" class="dropdown-toggle">加入我们</a>
											</li>
										</ul>
										<!-- main-menu end -->

										<!-- header buttons -->
										<div class="header-dropdown-buttons">
											<a href="mailto:theproject@info.com" class="btn btn-sm hidden-xs btn-white">联系我们 <i class="fa fa-envelope-o pl-5"></i></a>
											<a href="mailto:theproject@info.com" class="btn btn-lg visible-xs btn-block btn-white">Contact Us <i class="fa fa-envelope-o pl-5"></i></a>
										</div>
										<!-- header buttons end-->
									</div>
								</div>
							</nav>
							<!-- navbar end -->
						</div>
						<!-- main-navigation end -->
					</div>
					<!-- header-right end -->
				</div>
			</div>
		</div>

	</header>
	<!-- header end -->
</div>
			<!-- header-container end -->
					<!-- Offcanvas side start -->
			<div class="offcanvas-container">
				<nav id="offcanvas" class="animated navmenu navmenu-default navmenu-fixed-left offcanvas offcanvas-left" role="navigation">
					<!-- 头像 -->
					<div class="logo">

						<a href="<?php echo U('Home/UserCenter/avatar');?>"><img class="img-circle" src="<?php echo U(USERS_PATH.session('user.id').'/avatar','','jpg') ?>" style="width: 100px; height: 100px;"></a>
					</div>

					<!-- name-and-slogan -->
					<div class="site-slogan">
						gordongzp
					</div>

					<ul class="nav navbar-nav text-center">
						<li class="active"><a href="<?php echo U('Home/UserCenter/index');?>">首页</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">用户管理</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo U('Home/UserCenter/basicInfo');?>">填写个人资料</a></li>
								<li><a href="<?php echo U('Home/UserCenter/avatar');?>">设置用户头像</a></li>
								<li><a href="<?php echo U('Home/UserCenter/changePwd');?>">修改密码</a></li>
								<li><a href="<?php echo U('Home/UserCenter/comeBackPwd');?>">找回密码</a></li>
								<li><a href="<?php echo U('Home/UserCenter/changeTel1');?>">更换手机号</a></li>
								<li><a href="<?php echo U('Home/UserCenter/changeEmail');?>">绑定/更换邮箱</a></li>
								<li><a href="<?php echo U('Home/UserCenter/identifyId');?>">实名认证</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Second Level Item With Submenu</a>
									<ul class="dropdown-menu">
										<li><a href="#">Third Level Item 1</a></li>
										<li><a href="#">Third Level Item 2</a></li>
										<li><a href="#">Third Level Item 3</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">财务管理</a>
							<ul class="dropdown-menu">
								<li><a href="#">我要充值</a></li>
								<li><a href="#">我要提现</a></li>
								<li><a href="#">积分明细</a></li>		
							</ul>
						</li>
						<!-- 判断是否为卖家，是则显示卖家菜单 -->
						<?php
 if (session('user.is_seller')) { ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">我是卖家</a>
								<ul class="dropdown-menu">
									<li><a href="#">商品列表</a></li>
									<li><a href="#">订单管理</a></li>
									<li><a href="<?php echo U('Home/SellerCenter/showShopInfo');?>">店铺设置</a></li>
									<li><a href="<?php echo U('Home/Goods/goodsList');?>">商品列表</a></li>
								</ul>
							</li>
							<?php
 }else{ ?>
							<li><a href="<?php echo U('Home/SellerCenter/openShop');?>">成为卖家</a></li>
							<?php
 } ?>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">我是买家</a>
							<ul class="dropdown-menu">
								<li><a href="#">我的订单</a></li>
								<li><a href="#">购物车</a></li>
								<li><a href="#">积分明细</a></li>		
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
					<li><a class="link-dark" href="<?php echo U('Home/UserCenter/index');?>">个人中心</a></li>
					<li class="active">商品编辑</li>
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
						<h1 class="page-title">商品编辑</h1>
						<div class="separator-2"></div>
						<!-- page-title end -->
						<div class="row">
							<div class="col-sm-8">
								<!-- tabs start -->
								<!-- ================ -->
								<!-- Nav tabs -->
								<!-- Nav tabs -->
<ul class="nav nav-tabs style-2" role="tablist">
	<li><a href="<?php echo U('Home/Goods/goodsList');?>">商品列表</a></li>
	<li><a href="<?php echo U('Home/Goods/addGoods');?>">新增商品</a></li>
	<li><a href="<?php echo U('Home/Goods/editGoods');?>">编辑商品</a></li>
	<li><a href="<?php echo U('Home/Goods/attrList');?>">编辑属性</a></li>
	<li><a href="<?php echo U('Home/Goods/imgList');?>">编辑图片</a></li>
</ul>


								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane in active" id="h2tab1">
										<div class="row">
											<div class="col-sm-12">

												<form onkeydown="if(event.keyCode==13){return false;}" action="" method="POST" role="form" enctype="multipart/form-data">
													<!-- 隐藏输入项 -->
													<!-- goods_id号 -->
													<input style="display: none;" type="text" name="goods_id" value="<?php echo ($goods_arr["goods_id"]); ?>" >
													<!-- cate_id号 -->
													<input style="display: none;" type="text" name="cat_id" id="cat_id" value="" >
													<p>当前分类：<span id="cate"></span><a onclick="click_e()" href="javascript:void(0);"> 修改</a>
													</p>
													<div class="form-group">
														<label>商品名称：</label>
														<input type="text" name="goods_name" id="goods_name" class="form-control" required="required" value="<?php echo ($goods_arr["goods_name"]); ?>" placeholder="">
													</div>
													<div class="form-group">
														<label>商品描述：</label>
														<textarea name="goods_describe" class="form-control" required="" style="height: 200px" placeholder="" ><?php echo ($goods_arr["goods_describe"]); ?></textarea>
													</div>

													<button type="submit" class="btn btn-default">保存</button>
													<button type="button" class="btn btn-default" onclick="javascript:window.location.href='<?php echo U('Home/Goods/goodsList');?>';">返回</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- tabs end -->
							</div>
														<div class="col-sm-3">
								<h3 class="title">Contact Me</h3>
								<ul class="list-icons">
									<li><i class="fa fa-phone pr-10 text-default"></i> +00 1234567890</li>
									<li><i class="fa fa-mobile pr-10 text-default"></i> +00 1234567890</li>
									<li><a href="mailto:info@janedoe.com"><i class="fa fa-envelope-o pr-10"></i>info@janedoe.com</a></li>
								</ul>
								<h3>Follow Me</h3>
								<div class="separator-2"></div>
								<a target="_blank" href="https://www.linkedin.com" class="btn btn-animated linkedin btn-sm">Linkedin<i class="pl-10 fa fa-linkedin"></i></a>
								<a target="_blank" href="https://www.xing.com/" class="btn btn-animated xing btn-sm">Xing<i class="fa fa-xing"></i></a>
								<h3>See My Portfolio</h3>
								<a class="btn btn-gray collapsed btn-animated" data-toggle="collapse" href="#collapseContent" aria-expanded="false" aria-controls="collapseContent">Click Me <i class="fa fa-plus"></i></a>
							</div>
						</div>
					</div>
					<!-- main end -->
				</div>
			</div>
		</section>
		<!-- main-container end -->

		<!-- modal -->
		<button style="display: none;" id="modal_btn" class="btn btn-default" data-toggle="modal" data-target="#mymodal">按钮名称</button>
		<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="mySmallModalLabel">选择分类</h4>
					</div>
					<div class="modal-body">
						<form onkeydown="if(event.keyCode==13){return false;}" id="form1" action="<?php echo U('Admin181/Goods/addSubCate');?>" method="POST" role="form">
							<div class="tree well">
								<?php echo ($show_tree); ?>
							</div>
							<button type="submit" class="btn btn-default">确认</button>
						</form>
					</div>
					<div class="modal-footer">
						<button id="modal_btn_close" type="button" class="btn btn-sm btn-dark" data-dismiss="modal">关闭</button>
					</div>
				</div>
			</div>
		</div>


					<!-- footer top start -->
			<!-- ================ -->
			<div class="dark-bg footer-top animated-text">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="call-to-action text-center">
								<div class="row">
									<div class="col-sm-8">
										<h2>Powerful Bootstrap Template</h2>
										<h2>Waste no more time</h2>
									</div>
									<div class="col-sm-4">
										<p class="mt-10"><a href="#" class="btn btn-animated btn-lg btn-gray-transparent">Purchase<i class="fa fa-cart-arrow-down pl-20"></i></a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- footer top end -->
			<!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
			<!-- ================ -->
			<footer id="footer" class="clearfix dark">

				<!-- .footer start -->
				<!-- ================ -->
				<div class="footer">
					<div class="container">
						<div class="footer-inner">
							<div class="row">
								<div class="col-md-6">
									<div class="footer-content">
										<div class="logo-footer"><img id="logo-footer" src="/Public/images/logo_light_blue.png" alt=""></div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus illo vel dolorum soluta consectetur doloribus sit. Delectus non tenetur odit dicta vitae debitis suscipit doloribus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed dolore fugit vitae quia dicta inventore reiciendis. Ipsa, aut voluptas quaerat.</p>
										<ul class="list-inline mb-20">
											<li><i class="text-default fa fa-map-marker pr-5"></i> One infinity loop, 54100</li>
											<li><i class="text-default fa fa-phone pl-10 pr-5"></i> +00 1234567890</li>
											<li><a href="mailto:info@theproject.com" class="link-dark"><i class="text-default fa fa-envelope-o pl-10 pr-5"></i> info@theproject.com</a></li>
										</ul>
										<div class="separator-2"></div>
										<ul class="social-links circle margin-clear animated-effect-1">
											<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
											<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
											<li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
											<li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
											<li class="xing"><a target="_blank" href="http://www.xing.com"><i class="fa fa-xing"></i></a></li>
											<li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
											<li class="youtube"><a target="_blank" href="https://www.youtube.com"><i class="fa fa-youtube"></i></a></li>
											<li class="dribbble"><a target="_blank" href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
											<li class="pinterest"><a target="_blank" href="http://www.pinterest.com"><i class="fa fa-pinterest"></i></a></li>
											<li class="flickr"><a target="_blank" href="http://www.flickr.com"><i class="fa fa-flickr"></i></a></li>
											<li class="instagram"><a target="_blank" href="http://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="col-md-6">
									<div class="footer-content">
										<h2 class="title">Contact Us</h2>
										<div class="alert alert-success hidden" id="MessageSent2">
											We have received your message, we will contact you very soon.
										</div>
										<div class="alert alert-danger hidden" id="MessageNotSent2">
											Oops! Something went wrong please refresh the page and try again.
										</div>
										<form role="form" id="footer-form" class="margin-clear">
											<div class="form-group has-feedback mb-10">
												<label class="sr-only" for="name2">Name</label>
												<input type="text" class="form-control" id="name2" placeholder="" name="name2">
												<i class="fa fa-user form-control-feedback"></i>
											</div>
											<div class="form-group has-feedback mb-10">
												<label class="sr-only" for="email2">Email address</label>
												<input type="email" class="form-control" id="email2" placeholder="" name="email2">
												<i class="fa fa-envelope form-control-feedback"></i>
											</div>
											<div class="form-group has-feedback mb-10">
												<label class="sr-only" for="message2">Message</label>
												<textarea class="form-control" rows="4" id="message2" placeholder="" name="message2"></textarea>
												<i class="fa fa-pencil form-control-feedback"></i>
											</div>
											<input type="submit" value="Send" class="margin-clear submit-button btn btn-default">
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .footer end -->

				<!-- .subfooter start -->
				<!-- ================ -->
				<div class="subfooter">
					<div class="container">
						<div class="subfooter-inner">
							<div class="row">
								<div class="col-md-12">
									<p class="text-center">Copyright © 2016 The Project by <a target="_blank" href="http://htmlcoder.me">HtmlCoder</a>. All Rights Reserved</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .subfooter end -->

			</footer>
			<!-- footer end -->
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
		click_c(<?php echo ($goods_arr["cat_id"]); ?>);
		var is_shunk=0;
		$('ul.nav.nav-tabs.style-2 > li:nth-child(3)').attr("class", "active");
		function click_e(){
		// $('#pid').attr("value",id);
		// $('#father').text(name);
		// $(".tree li:has(ul) span").trigger("click");
		$("#modal_btn").trigger("click");
		if (!is_shunk) {
			setTimeout("shink()",500);
			is_shunk=1;
		}
	}

	function click_c(cate_id){
		// $('#pid').attr("value",id);
		// $('#father').text(name);

		//获取分类name
		var action="<?php echo U('Home/Goods/getCateNameAj');?>";
		$.post(action,{cate_id:cate_id},function(data){
			$('#cate').text(data);
		});
		$('#cat_id	').attr("value",cate_id);
		$("#modal_btn_close").trigger("click");
	}


	function shink(){
		var children = $('.tree li.parent_li > span').parent('li.parent_li').find(' > ul > li');
		if (children.is(":visible")) {
			children.hide('fast');
			$('.tree li.parent_li > span').attr('title', '展开').find(' > i').addClass('glyphicon-plus-sign').removeClass('glyphicon-minus-sign');
		} else {
			children.show('fast');
			$('.tree li.parent_li > span').attr('title', '收起').find(' > i').addClass('glyphicon-minus-sign').removeClass('glyphicon-plus-sign');
		}
	}
</script>


</body>
</html>