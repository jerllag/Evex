<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>EVEX | Event Management Expert System</title>

<!-- Bootstrap -->
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/style.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="/js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/js/bootstrap.min.js"></script>
	
	<script src="/js/js.cookie.js"></script>
	
	
<header id="header">
	<nav class ="navbar navbar-default" id="navBar" style="background-image: url(/images/res/bg_4.jpg); repeat: no-repeat; width=100%;">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#homeNavbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-icon" href="<?=base_url("/evex/index")?>"><img src="/images/logo.png" alt="logo"></a>
			</div>
		
			<div class="collapse navbar-collapse" id="homeNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?=base_url("/evex/index")?>" id="colorHover"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="<?=base_url("/evex/event")?>" id="colorHover"><span class="glyphicon glyphicon-calendar"></span> Events</a></li>
					<?php if(!isset($_SESSION['userdata'])) {?><li><a href="<?=base_url("/evex/sign_up_view")?>" id="colorHover"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li><?php } else { ?>
					<li><a href="<?=base_url("/evex/log_out")?>" id="colorHover"><span class="glyphicon glyphicon-user"></span> Log Out</a></li><?php } ?>
				</ul>
			</div>
		</div>
	</nav>
</header>