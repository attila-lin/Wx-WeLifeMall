<?php /* Smarty version Smarty-3.1.15, created on 2013-12-23 20:22:26
         compiled from "/var/www/wx-welifemall/htdocs/templates/login.html" */ ?>
<?php /*%%SmartyHeaderCode:127385529052b8143b88e015-61973130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'baec8f7fde30c78295fa08ae6dfc0a2c4cad2f8f' => 
    array (
      0 => '/var/www/wx-welifemall/htdocs/templates/login.html',
      1 => 1387801306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127385529052b8143b88e015-61973130',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52b8143b8daca6_87474205',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b8143b8daca6_87474205')) {function content_52b8143b8daca6_87474205($_smarty_tpl) {?>﻿<!DOCTYPE html><!--[if IE 8]> <html lang="en" class="ie8"> <![endif]--><!--[if IE 9]> <html lang="en" class="ie9"> <![endif]--><!--[if !IE]><!--> <html lang="en"> <!--<![endif]--><!-- BEGIN HEAD --><head>	<meta charset="utf-8" />    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	<title>故乡人后台管理 | 登录</title>	<meta content="width=device-width, initial-scale=1.0" name="viewport" />	<meta content="" name="description" />	<meta content="" name="author" />	<!-- BEGIN GLOBAL MANDATORY STYLES -->	<link href="media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>	<link href="media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>	<link href="media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>	<link href="media/css/style-metro.css" rel="stylesheet" type="text/css"/>	<link href="media/css/style.css" rel="stylesheet" type="text/css"/>	<link href="media/css/style-responsive.css" rel="stylesheet" type="text/css"/>	<link href="media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>	<link href="media/css/uniform.default.css" rel="stylesheet" type="text/css"/>	<!-- END GLOBAL MANDATORY STYLES -->	<!-- BEGIN PAGE LEVEL STYLES -->	<link href="media/css/login.css" rel="stylesheet" type="text/css"/>	<!-- END PAGE LEVEL STYLES -->	<link rel="shortcut icon" href="media/image/favicon.ico" /></head><!-- END HEAD --><!-- BEGIN BODY --><body class="login">	<!-- BEGIN LOGO -->	<div class="logo">		<img src="media/image/logo-big.png" alt="" /> 	</div>	<!-- END LOGO -->	<!-- BEGIN LOGIN -->	<div class="content">		<!-- BEGIN LOGIN FORM -->		<form class="form-vertical login-form" action="login.php" method="GET">			<h3 class="form-title">登录</h3>			<div class="alert alert-error hide">				<button class="close" data-dismiss="alert"></button>				<span>请输入用户名和密码</span>			</div>			<div class="control-group">				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->				<label class="control-label visible-ie8 visible-ie9">用户名</label>				<div class="controls">					<div class="input-icon left">						<i class="icon-user"></i>						<input class="m-wrap placeholder-no-fix" type="text" placeholder="Username" name="uname"/>					</div>				</div>			</div>			<div class="control-group">				<label class="control-label visible-ie8 visible-ie9">密码</label>				<div class="controls">					<div class="input-icon left">						<i class="icon-lock"></i>						<input class="m-wrap placeholder-no-fix" type="password" placeholder="Password" name="pwd"/>					</div>				</div>			</div>			<div class="form-actions">				<label class="checkbox">				<input type="checkbox" name="remember" value="1"/> 记住我				</label>				<button type="submit" class="btn green pull-right" name="action" value="login">				登录 <i class="m-icon-swapright m-icon-white"></i>				</button>            			</div>			<div class="forget-password">				<h4>忘记密码？</h4>				<p>					不要慌，点击 <a href="javascript:;" class="" id="forget-password">这里</a>					重新设置密码。				</p>			</div>			<div class="create-account">				<p>					还没有账号？&nbsp; 					<a href="javascript:;" id="register-btn" class="">点此注册</a>				</p>			</div>		</form>		<!-- END LOGIN FORM -->        		<!-- BEGIN FORGOT PASSWORD FORM -->		<form class="form-vertical forget-form" action="index.php">			<h3 class="">忘记密码？</h3>			<p>请输入邮件地址来重置密码。</p>			<div class="control-group">				<div class="controls">					<div class="input-icon left">						<i class="icon-envelope"></i>						<input class="m-wrap placeholder-no-fix" type="text" placeholder="Email" name="email" />					</div>				</div>			</div>			<div class="form-actions">				<button type="button" id="back-btn" class="btn">				<i class="m-icon-swapleft"></i> 后退				</button>				<button type="submit" class="btn green pull-right">				提交 <i class="m-icon-swapright m-icon-white"></i>				</button>            			</div>		</form>		<!-- END FORGOT PASSWORD FORM -->		<!-- BEGIN REGISTRATION FORM -->		<form class="form-vertical register-form" action="index.php">			<h3 class="">注册</h3>			<p>请输入您的用户信息：</p>			<div class="control-group">				<label class="control-label visible-ie8 visible-ie9">用户名</label>				<div class="controls">					<div class="input-icon left">						<i class="icon-user"></i>						<input class="m-wrap placeholder-no-fix" type="text" placeholder="Username" name="username"/>					</div>				</div>			</div>			<div class="control-group">				<label class="control-label visible-ie8 visible-ie9">密码</label>				<div class="controls">					<div class="input-icon left">						<i class="icon-lock"></i>						<input class="m-wrap placeholder-no-fix" type="password" id="register_password" placeholder="Password" name="password"/>					</div>				</div>			</div>			<div class="control-group">				<label class="control-label visible-ie8 visible-ie9">请再次输入密码</label>				<div class="controls">					<div class="input-icon left">						<i class="icon-ok"></i>						<input class="m-wrap placeholder-no-fix" type="password" placeholder="Re-type Your Password" name="rpassword"/>					</div>				</div>			</div>			<div class="control-group">				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->				<label class="control-label visible-ie8 visible-ie9">邮件地址</label>				<div class="controls">					<div class="input-icon left">						<i class="icon-envelope"></i>						<input class="m-wrap placeholder-no-fix" type="text" placeholder="Email" name="email"/>					</div>				</div>			</div>			<div class="control-group">				<div class="controls">					<label class="checkbox">					<input type="checkbox" name="tnc"/> 我同意 <a href="#">这些服务信息</a> 以及 <a href="#">隐私条款</a>					</label>  					<div id="register_tnc_error"></div>				</div>			</div>			<div class="form-actions">				<button id="register-back-btn" type="button" class="btn">				<i class="m-icon-swapleft"></i>  后退				</button>				<button type="submit" id="register-submit-btn" class="btn green pull-right">				注册 <i class="m-icon-swapright m-icon-white"></i>				</button>            			</div>		</form>		<!-- END REGISTRATION FORM -->	</div>	<!-- END LOGIN -->	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->	<!-- BEGIN CORE PLUGINS -->	<script src="media/js/jquery-1.10.1.min.js" type="text/javascript"></script>	<script src="media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->	<script src="media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      	<script src="media/js/bootstrap.min.js" type="text/javascript"></script>	<!--[if lt IE 9]>	<script src="media/js/excanvas.min.js"></script>	<script src="media/js/respond.min.js"></script>  	<![endif]-->   	<script src="media/js/jquery.slimscroll.min.js" type="text/javascript"></script>	<script src="media/js/jquery.blockui.min.js" type="text/javascript"></script>  	<script src="media/js/jquery.cookie.min.js" type="text/javascript"></script>	<script src="media/js/jquery.uniform.min.js" type="text/javascript" ></script>	<!-- END CORE PLUGINS -->	<!-- BEGIN PAGE LEVEL PLUGINS -->	<script src="media/js/jquery.validate.min.js" type="text/javascript"></script>	<!-- END PAGE LEVEL PLUGINS -->	<!-- BEGIN PAGE LEVEL SCRIPTS -->	<script src="media/js/app.js" type="text/javascript"></script>	<!-- // <script src="media/js/login.js" type="text/javascript"></script>       -->	<!-- END PAGE LEVEL SCRIPTS --> 	<script>		jQuery(document).ready(function() {     		  App.init();		  Login.init();		});	</script>	<!-- END JAVASCRIPTS --><script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body><!-- END BODY --></html><?php }} ?>
