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
		<div class="content admin">
			<div id="front-logo">
				<img src="/images/logo.png">
			</div>
			<div>
				<h3>Registration</h3>
			</div>
			<div id="new_admin" class="clearfix">
				<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/php/new_admin.php');?>
				<form id="new_admin" class="clearfix" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post' enctype="multipart/form-data">
					<div class='reg_col1'>
						<span class='error'>* required fields</span>
						<div id="admin_fname" class="form-group <?php echo $fnameError; ?>">
							<label>First Name <span class='error'>* <?php echo $fnameErr; ?></span></label>
							<input type="text" name="admin_fname">
						</div>
						<div id="admin_mname" class="form-group <?php echo $mnameError; ?>">
							<label>Middle Name <span class='error'>* <?php echo $mnameErr; ?></span></label>						
							<input type="text" name="admin_mname">
						</div>
						<div id="admin_lname" class="form-group <?php echo $lnameError; ?>">
							<label>Last Name <span class='error'>* <?php echo $lnameErr; ?></span></label>						
							<input type="text" name="admin_lname">
						</div>
						<div id='admin_birth' class="form-group <?php echo $birthError; ?>">
	                        <label>Birth Day <span class="error">* <?php echo $birthErr; ?></span></label>
		                    <?php
		                    echo '<select name="birth_month">';
		                    echo '<option selected disabled>Month</option>';
		                    for($i = 1; $i <= 12; $i++){
		                        $i = str_pad($i, 2, 0, STR_PAD_LEFT);
		                        echo "<option value='$i'>$i</option>";
		                    }
		                    echo '</select>';
		                    echo '<select name="birth_day">';
		                    echo '<option selected disabled>Day</option>';
		                    for($i = 1; $i <= 31; $i++){
		                        $i = str_pad($i, 2, 0, STR_PAD_LEFT);
		                        echo "<option value='$i'>$i</option>";
		                    }
		                    echo '</select>';
		                    echo '<select name="birth_year">';
		                    echo '<option selected disabled>Year</option>';
		                    for($i = date('Y'); $i >= date('Y', strtotime('-100 years')); $i--){
		                        echo "<option value='$i'>$i</option>";
		                    } 
		                    echo '</select> ';
		                    ?>
	                    </div>
	                    <div id="admin_phone_number" class="form-group <?php echo $phoneError; ?>">
	                    	<label>Phone Number <span class="error">* <?php echo $phoneErr; ?></span></label>
							<input type="text" name="admin_phone_number">
	                    </div>
	                </div>
	                <div class="reg_col2">
	                    <div id="admin_address" class="form-group <?php echo $addressError; ?>">
	                    	<label>Address <span class="error">* <?php echo $addressErr; ?></span></label>
							<input type="text" name="admin_address">
	                    </div>
	                    <div id="admin_username" class="form-group <?php echo $usernameError; ?>">
							<label>Username <span class='error'>* <?php echo $usernameErr; ?></span></label>
							<input type="text" name="admin_username">
						</div>
						<div id="admin_password" class="form-group <?php echo $passwordError; ?>">
							<label>Password <span class='error'>* <?php echo $passwordErr; ?></span></label>
							<input type="password" name="admin_password">
						</div>
	                    <div class="form-group <?php echo $imageError; ?>">
		                    <label>Photo <span class="error">* <?php echo $imageErr; ?></span></label>
		                    <input name="admin_image" type="file">
		                </div>
		            </div>
                    <button type="submit"  name="admin_register">Register</button>
				</form>
				<a href="/index.php">Back</a>
			</div>
		</div>
	</div>
</div>
<!-- Content -->

</body>
</html>