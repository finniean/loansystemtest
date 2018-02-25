<!DOCTYPE html>
<html>
<head>
	<title>SME Loan System</title>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>

<!-- Content -->
<div class="wrapper">
	<div class="container index-space">
		<div class="content login">
			<div id="front-logo">
				<img src="/images/logo.png">
			</div>
			<div>
				<h3>Sign In to continue</h3>
			</div>
			<div id="login">
				<?php
					include($_SERVER[ 'DOCUMENT_ROOT']. '/php/login.php');
				?>
				<span class='error'><?php echo $invalidErr;  ?></span>
				<form id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="form-group" id="username">
					<label>Username</label>
					<input type="text" name="username">
				</div>
				<div class="form-group" id="password">
					<label>Password</label>
					<input type="password" name="password">
				</div>
				<button type="submit" name="login">Login</button>
			</form>
			</div>
			<a href="/pages/new_admin.php">Register</a>
		</div>
	</div>
</div>
<!-- Content -->

</body>
</html>