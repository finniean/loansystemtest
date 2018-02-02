<?php $title='New Registration' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Register New Admin</h4>
			<div id="new_cus">
				<?php
				session_start();
				require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

				$usernameErr = $passwordErr = '';

				if(isset($_POST['admin_register'])){
				    $valid = true;

				    if (empty($_POST["admin_username"])) {
				        $valid = false;
				        $usernameErr = "Username is required";
				    }

				    else {
				        $username = mysqli_real_escape_string($link, $_REQUEST['admin_username']);
				    }

				    if (empty($_POST["admin_password"])) {
				        $valid = false;
				        $passwordErr = "Password is required";
				    }

				    else {
				        $password = mysqli_real_escape_string($link, $_REQUEST['admin_password']);
				    }

				    if ($valid){
				    	$admin_id = date('mdyis');
				        $sql = "INSERT INTO `admins` (`admin_id`, `username`, `password`) VALUES ('$admin_id', '$username', '$password')";

				        if(mysqli_query($link, $sql)){
				            echo "<div class='alert alert-success'>
				            <strong>Success!</strong> You have been registered. You can login now.
				            </div>";
				        }
				        else {
				        	echo 'error';
				        }
				    }

				    else {
				        echo "<div class='alert alert-danger'>
				        <strong>Sorry!</strong> Please fill the required fields.
				        </div>";
				    }
				    mysqli_close($link);
				}
				?>
				<form id="new_admin" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
					<div id="admin_username">
						<label>Username</label>
						<span class='error'>* <?php echo $usernameErr; ?></span>
						<input type="text" name="admin_username">
					</div>
					<div id="admin_password">
						<label>Password</label>
						<span class='error'>* <?php echo $passwordErr; ?></span>
						<input type="password" name="admin_password">
					</div>
                    <button type="submit"  name="admin_register">Register</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>