<?php $title='New Registration' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Register New Customer</h4>
			<div id="new_cus">
				<?php
				session_start();
				require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');
				$fname = $mname = $lname = $fnameErr = $mnameErr = $lnameErr = '';
				if(isset($_POST['register'])){
				    $valid = true;
				    if (empty($_POST["cus_fname"])) {
				        $valid = false;
				        $fnameErr = "First Name is required";
				    } else {
				        $fname = mysqli_real_escape_string($link, $_REQUEST['cus_fname']);
				    }
				    if (empty($_POST["cus_mname"])) {
				        $valid = false;
				        $mnameErr = "Middle Name is required";
				    } else {
				        $mname = mysqli_real_escape_string($link, $_REQUEST['cus_mname']);
				    }
				    if (empty($_POST["cus_lname"])) {
				        $valid = false;
				        $lnameErr = "Last Name is required";
				    } else {
				        $lname = mysqli_real_escape_string($link, $_REQUEST['cus_lname']);
				    }
				    $cid = date('mdhis', time());
				    $admin_id = $_SESSION['aid'];
				    if ($valid){
				        // $birth_date =  $birth_month ."/". $birth_day ."/". $birth_year;
				        $sql = "INSERT INTO `customers` (`cid`, `admin_id`, `fname`, `mname`, `lname`)
				        VALUES
				        ('$cid', '$admin_id', '$fname', '$mname', '$lname')";
				        if(mysqli_query($link, $sql)){
				            echo "<div class='alert alert-success'>
				            <strong>Success!</strong> You have been registered. You can login now.
				            </div>";
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
				<form id="new_cus" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
					<div id="cus_fname">
						<label>First Name</label>
						<span class='error'>* <?php echo $fnameErr; ?></span>
						<input type="text" name="cus_fname">
					</div>
					<div id="cus_mname">
						<label>Middle Name</label>
						<span class='error'>* <?php echo $mnameErr; ?></span>
						<input type="text" name="cus_mname">
					</div>
					<div id="cus_lname">
						<label>Last Name</label>
						<span class='error'>* <?php echo $lnameErr; ?></span>
						<input type="text" name="cus_lname">
					</div>
					<div id='cus_birth'>
                        <label>Birth Day</label>
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
                    <div id="cus_status">
                    	<label>Status</label>
						<input type="text" name="cus_status">
                    </div>
                    <div id="cus_address">
                    	<label>Address</label>
						<input type="text" name="cus_address">
                    </div>
                    <div class='form-group'>
	                    <label>Photo</label>
	                    <input type="file" name="image_upload" />
	                </div>
	                <div class='form-group'>
	                    <label>Additional Documents</label>
	                    <input type="file" name="add_docu" />
	                </div>
                    <button type="submit"  name="register">Register</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>