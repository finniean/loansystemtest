<?php $title='Login' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h3>Login</h3>
			<div id="login">
				<?php
				session_start();
				ob_start();
				require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');
				$invalidErr = '';
				if(isset($_POST['login'])){
				    if ($_POST) {
				        $valid = true;
				        if (empty($_POST['username'])) {
				            $valid = false;
				            $invalidErr = 'Please input your Username.';
				        } else {
				            $username = mysqli_real_escape_string($link, $_REQUEST['username']);
				        }
				        if (empty($_POST['password'])) {
				            $valid = false;
				            $invalidErr = 'Please input your Password.';
				        }
				        else {
				            $password = mysqli_real_escape_string($link, $_REQUEST['password']);
				        }
				        if ($valid){
				            $sql="SELECT * FROM admins WHERE username='$username' and password='$password'";
				            $result=mysqli_query($link, $sql);
				            $row = mysqli_fetch_assoc($result);
				            $_SESSION['aid'] = $row['aid'];
				            if(mysqli_num_rows($result)> 0){
				                header('Location:/pages/logged.php');
				            }
				            else{
				                $invalidErr = 'Email or Password is incorrect.';
				            }
				        }
				    }
				} ?>
				<span class='error'><?php echo $invalidErr; ?></span>
				<form id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div id="username">
					<label>Username</label>
					<input type="text" name="username">
				</div>
				<div id="password">
					<label>Password</label>
					<input type="text" name="password">
				</div>
				<button type="submit" name="login">Login</button>
			</form>
			</div>
			<a href="">Register</a>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>