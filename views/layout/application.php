<!DOCTYPE html>
<html lang="ja">
<head>
	<!-- /.website title -->
	<title>NexSeed Portal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="UTF-8">

	<!-- CSS Files -->
	<link href="/NexSeedPortal/webroot/asset/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="/NexSeedPortal/webroot/asset/css/font-awesome.css" rel="stylesheet">
	<link href="/NexSeedPortal/webroot/asset/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
	<link href="/NexSeedPortal/webroot/asset/css/animate.css" rel="stylesheet" media="screen">
	<link href="/NexSeedPortal/webroot/asset/css/owl.theme.css" rel="stylesheet">
	<link href="/NexSeedPortal/webroot/asset/css/owl.carousel.css" rel="stylesheet">

	<!-- Colors -->
	<link href="/NexSeedPortal/webroot/asset/css/css-index.css" rel="stylesheet" media="screen">

	<!-- Google Fonts -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" />

	<!-- Fabicon -->
	<link rel="icon" type="image/png" href="/NexSeedPortal/webroot/asset/images/favicon.png">
</head>

<body data-spy="scroll" data-target="#navbar-scroll">
	<div id="menu">
		<nav class="navbar-wrapper navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand site-name" href="/NexSeedPortal/contents/index/"><img src="/NexSeedPortal/webroot/asset/images/nex.png" alt="logo"></a>
					<ul class="nav navbar-nav">
					<li>
						<div class="navbar-brand2">
							<?php if (isset($_SESSION['user_id']) && isset($_SESSION['time']) && $_SESSION['time'] + 3600 > time()) {
								echo 'Welcome '.$_SESSION['user_name'].'!';
							} ?>
						</div>
					</li>
					</ul>
				</div>
		 		<!-- NAVIGATION -->
				<div id="navbar-scroll" class="collapse navbar-collapse navbar-backyard navbar-right">
					<ul class="nav navbar-nav">
					<li>
						<div class="btn-section">
							<?php if (isset($_SESSION['user_id']) &&isset($_SESSION['time']) && $_SESSION['time'] + 3600 > time()) {
								echo '<a href="/NexSeedPortal/users/logout/" button type="button" class="btn-default2">Logout</a>';
							} else {
								echo '<p>      </p>';
								echo '<p>      </p>';
							} ?>
						</div>
					</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<?php
		include('views/' . $this->resource. '/' . $this->action . '.php');
	?>
	<footer id="footer">
		<div class="container">
			<div class="col-sm-4 col-sm-offset-4">
				<!-- /.social links -->
					<div class="social text-center">
						<ul>
							<li><a class="wow fadeInUp" href="https://twitter.com/NexSeed_Cebu?lang=ja" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<li><a class="wow fadeInUp" href="https://www.facebook.com/NexSeed/?ref=br_rs" target="_blank" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
						</ul>
					</div>
				<div class="text-center wow fadeInUp" style="font-size: 14px;">Copyright NexSeed Portal since 2016</div>
				<a href="#" class="scrollToTop"><i class="pe-7s-up-arrow pe-va"></i></a>
			</div>
		</div>
	</footer>

	<!-- /.javascript files -->
	<script src="/NexSeedPortal/webroot/asset/js/jquery.js"></script>
	<script src="/NexSeedPortal/webroot/asset/js/bootstrap.js"></script>
	<script src="/NexSeedPortal/webroot/asset/js/custom.js"></script>
	<script src="/NexSeedPortal/webroot/asset/js/jquery.sticky.js"></script>
	<script src="/NexSeedPortal/webroot/asset/js/wow.min.js"></script>
	<script src="/NexSeedPortal/webroot/asset/js/owl.carousel.min.js"></script>
	<script>
		new WOW().init();
	</script>
</body>
</html>