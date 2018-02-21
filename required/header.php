<!DOCTYPE html>
<html>
<head>
	<title>SME Loan System - <?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
<!-- Header -->
	<div class="wrapper">
		<div class="header_branding clearfix">
			<div id="site_title">
				<img src="/images/logo.png">
			</div>
			<div id="time">
				<h4>
					<?php session_start(); echo $_SESSION['admin_id']; ?>
				</h4>
			</div>
		</div>	
	</div>