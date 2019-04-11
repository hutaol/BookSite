<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=us-ascii" />
	<title>小说分销平台登陆</title>

	<link type="text/css" href="/book/Public/admin/style.css" rel="stylesheet" />
	<link type="text/css" href="/book/Public/admin/css/login.css" rel="stylesheet" />

	<script type='text/javascript' src="/book/Public/admin/js/jquery-1.4.2.min.js')}}"></script>	<!-- jquery library -->
	<script type='text/javascript' src="/book/Public/admin/js/iphone-style-checkboxes.js"></script> <!-- iphone like checkboxes -->

	<script type='text/javascript'>
		jQuery(document).ready(function() {
			jQuery('.iphone').iphoneStyle();
		});
	</script>

	<!--[if IE 8]>
		<script type='text/javascript' src='js/excanvas.js'></script>
		<link rel="stylesheet" href="css/loginIEfix.css" type="text/css" media="screen" />
	<![endif]-->

	<!--[if IE 7]>
		<script type='text/javascript' src='js/excanvas.js'></script>
		<link rel="stylesheet" href="css/loginIEfix.css" type="text/css" media="screen" />
	<![endif]-->

</head>
<body>
	<div id="line"><!-- --></div>
	<div id="background">
		<div id="container">
			<div id="logo">
				<img src="/book/Public/admin/images/logologin.png" alt="Logo" />
			</div>
			<div id="box">
				<form action="/book/Admin/Login/doLogin" method="POST">
					<div class="one_half">
						<p><input name="username" value="" class="field" /></p>
						<!-- <p><input type="checkbox" class="iphone" name="rem" /><label class="fix">Remember me</label></p>  -->
					</div>
					<div class="one_half last">
						<p><input type="password" name="password" value="" class="field" /></p>
						<p><input type="submit" value="登录" class="login" /></p>
					</div>
			</form>
		</div>

		</div>
	</div>
</body>
</html>