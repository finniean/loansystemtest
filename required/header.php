<!DOCTYPE html>
<html>
<head>
	<title>SME Loan System - <?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/jquery-ui.css">
	<script src="/js/jquery-1.12.4.js"></script>
  	<script src="/js/jquery-ui.js"></script>
</head>
<body>
<!-- Header -->
	<div class="wrapper">
		<div class="header_branding clearfix">
			<div id="site_title">
				<img src="/images/logo.png">
			</div>
			<div id="welcome">
				<h4>
					<?php
					session_start(); 
					echo "Welcome! Admin ";
					echo "<a href='view_admin.php?admin_id=". $_SESSION['admin_id'] ."'>". $_SESSION['firstname'] ."</a>
					<br><a href='/php/logout.php'>Log Out</a>";
					?>
				</h4>
			</div>
		</div>	
	</div>