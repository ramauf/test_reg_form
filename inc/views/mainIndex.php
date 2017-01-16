
<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<title> Ramauf </title>
		<meta name="description" content="">
		<meta name="author" content="">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="/design/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/design/css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
		<link rel="stylesheet" type="text/css" media="screen" href="/design/css/smartadmin-production.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/design/css/smartadmin-skins.css">

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="/design/css/demo.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="/design/img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/design/img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">


	    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script> if (!window.jQuery) { document.write('<script src="/design/js/libs/jquery-2.0.2.min.js"><\/script>');} </script>

	    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script> if (!window.jQuery.ui) { document.write('<script src="/design/js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>


		<!-- BOOTSTRAP JS -->
		<script src="/design/js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="/design/js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="/design/js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="/design/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="/design/js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="/design/js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="/design/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="/design/js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="/design/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="/design/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="/design/js/plugin/fastclick/fastclick.js"></script>

		<!--[if IE 7]>

			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

	</head>
	<body id="login">
		<!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->
		<header id="header">
			<!--<span id="logo"></span>-->

			<div id="logo-group">
				<span id="logo"><!-- <img src="/design/img/logo.png" alt="SmartAdmin"> --></span>

				<!-- END AJAX-DROPDOWN -->
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<a href="?lang=ru"><img alt="" src="/design/img/flags/ru.png"> RU</a>
				<a href="?lang=en"><img alt="" src="/design/img/flags/us.png"> US</a>
			</div>
			<span id="login-header-space">

				<?php if (globals::$controller == 'defaultController'){ ?>
				<span class="hidden-mobile"><?php echo la::ng('Уже зарегистрированы?');?></span>
				<a href="/login" class="btn btn-danger"><?php echo la::ng('Вход');?></a>
				<?php }?>

				<?php if (globals::$controller == 'loginController'){ ?>
				<span class="hidden-mobile"><?php echo la::ng('Еще не зарегистрированы?');?></span>
				<a href="/" class="btn btn-danger"><?php echo la::ng('Регистрация');?></a>
				<?php }?>



			</span>

		</header>

		<div id="main" role="main">

			<!-- MAIN CONTENT -->
			<div id="content" class="container">
			<?php include($this->templates['inner']); ?>


			</div>

		</div>





	</body>
</html>