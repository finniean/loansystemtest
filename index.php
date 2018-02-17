<!DOCTYPE html>
<html>
<head>
	<title>SME Loan System - <?php echo $title; ?></title>
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
				session_start();
				require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

				$invalidErr = '';

				if(isset($_POST['login'])){
			        $valid = true;

			        if (empty($_POST['username'])) {
			            $valid = false;
			            $invalidErr = 'Please input your Username.';
			        }

			        else {
			            $username = mysqli_real_escape_string($link, $_REQUEST['username']);
			        }

			        if (empty($_POST['password'])) {
			            $valid = false;
			            $invalidErr = 'Please input your Password.';
			        }

			        else {
			            $password = mysqli_real_escape_string($link, $_REQUEST['password']);
			        }

			        if ($valid) {
			            $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
			            $result = mysqli_query($link, $sql);
			            $row = mysqli_fetch_assoc($result);
			            

			            if(mysqli_num_rows($result)> 0) {
			            	$_SESSION['admin_id'] = $row['admin_id'];
			                header('Location:/pages/logged.php');
			            }

			            else {
			                $invalidErr = 'Email or Password is incorrect.';
			            }
			        }
				}
				?>
				<span class='error'><?php echo $invalidErr; ?></span>
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