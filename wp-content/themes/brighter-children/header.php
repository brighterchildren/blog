<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Brighter Children
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<title>Brighter Children</title>
<!-- Description, Keywords and Author -->
<meta name="description" content="Brighter Children is a non-profit that raises money for the education of children while you have a good time with friends at events.">
<meta name="keywords" content="Brighter Children, nyc, new york, education, fundraising, events, parties, donate">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Styles -->
<!-- Bootstrap CSS -->
<link href="<?php echo CSSDIR ?>/bootstrap.min.css" rel="stylesheet">
<!-- Animate CSS -->
<link href="<?php echo CSSDIR ?>/animate.min.css" rel="stylesheet">
<!-- Slider Revolution CSS -->
<link href="<?php echo CSSDIR ?>/settings.css" rel="stylesheet">
<!--[if IE ]>
<link rel="stylesheet" href="<?php echo CSSDIR ?>/settings-ie8.css">
<![endif]-->
<!-- Portfolio CSS -->
<link href="<?php echo CSSDIR ?>/prettyPhoto.css" rel="stylesheet">
<!-- Font awesome CSS -->
<link href="<?php echo CSSDIR ?>/font-awesome.min.css" rel="stylesheet">		
<!-- Custom CSS -->
<link href="<?php echo CSSDIR ?>/style.css" rel="stylesheet">
<!-- Color Style sheet - purple, blue, light blue, red or green-->
<link type="text/css" rel="stylesheet" id="theme" href="<?php echo CSSDIR ?>/green.css" />
<!-- Custom Style sheet-->
<link href="<?php echo CSSDIR ?>/custom.css" rel="stylesheet">
<!-- Favicon -->
<link rel="shortcut icon" href="#">

</head>

<body>
<!-- Wrapper -->
<div class="wrapper">

	<!-- Header Start -->
	
	<div class="header">
		<!-- Navigation Bar -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<a class="navbar-brand" href="/"><span class="logo">Brighter Children</span></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="nav-donate" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="https://www.paypal.com">Donate</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</div>
	
	<!-- Header End -->
