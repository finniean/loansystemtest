<?php $title='New Registration' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Register New Customer</h4>
			<div id="new_cus">
				<?php
				require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');
				
				$fname = $mname = $lname = $birth_month = $birth_day = $birth_year = $phone = $address = $image = $fnameErr = $mnameErr = $lnameErr = $phoneErr = $birthErr = $addressErr = $imageErr = '';
				if(isset($_POST['register'])){
				    $valid = true;

				    if (empty($_POST["cus_fname"])) {
				        $valid = false;
				        $fnameErr = "First Name is required";
				    }

				    else {
				        $fname = mysqli_real_escape_string($link, $_REQUEST['cus_fname']);
				    }

				    if (empty($_POST["cus_mname"])) {
				        $valid = false;
				        $mnameErr = "Middle Name is required";
				    }

				    else {
				        $mname = mysqli_real_escape_string($link, $_REQUEST['cus_mname']);
				    }

				    if (empty($_POST["cus_lname"])) {
				        $valid = false;
				        $lnameErr = "Last Name is required";
				    }
				    else {
				        $lname = mysqli_real_escape_string($link, $_REQUEST['cus_lname']);
				    }
				    if (empty($_POST["birth_month"])) {
				        $valid = false;
				        $birthErr = "Birth Month is required";
				    }
				    else {
				        $birth_month = mysqli_real_escape_string($link, $_REQUEST['birth_month']);
				    }
				    if (empty($_POST["birth_day"])) {
				        $valid = false;
				        $birthErr = "Birth Day is required";
				    }
				    else {
				        $birth_day = mysqli_real_escape_string($link, $_REQUEST['birth_day']);
				    }
				    if (empty($_POST["birth_year"])) {
				        $valid = false;
				        $birthErr = "Birth Year is required";
				    }
				    else {
				        $birth_year = mysqli_real_escape_string($link, $_REQUEST['birth_year']);
				    }
				    if (empty($_POST["cus_phone_number"])) {
				        $valid = false;
				        $phoneErr = "Last Name is required";
				    }
				    else {
				        $phone = mysqli_real_escape_string($link, $_REQUEST['cus_phone_number']);
				    }
				    if (empty($_POST["cus_address"])) {
				        $valid = false;
				        $addressErr = "Address is required";
				    }
				    else {
				        $address = mysqli_real_escape_string($link, $_REQUEST['cus_address']);
				    }
				    if (empty($_POST["image"])) {
				        $valid = false;
				        $imageErr = "Photo is required";
				    }
				    else {
				        $image = $_FILES['image']['name'];
				    }
				    $target = "images/".basename($image);
				    $customer_id = date('mdyis');
				    $admin_id = $_SESSION['admin_id'];

				    if ($valid){
				        $birth_date =  $birth_month ."/". $birth_day ."/". $birth_year;
				        $sql = "INSERT INTO `customers` (`customer_id`, `admin_id`, `fname`, `mname`, `lname`, `birth_date`, `phone_number`, `address`, `image`) VALUES ('$customer_id', '$admin_id', '$fname', '$mname', '$lname', '$birth_date', '$phone', '$address', '$fileToUpload')";

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
					<div id="cus_fname" class="form-group">
						<label>First Name <span class='error'>* <?php echo $fnameErr; ?></span></label>
						<input type="text" name="cus_fname">
					</div>
					<div id="cus_mname" class="form-group">
						<label>Middle Name <span class='error'>* <?php echo $mnameErr; ?></span></label>						
						<input type="text" name="cus_mname">
					</div>
					<div id="cus_lname" class="form-group">
						<label>Last Name <span class='error'>* <?php echo $lnameErr; ?></span></label>						
						<input type="text" name="cus_lname">
					</div>
					<div id='cus_birth' class="form-group">
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
                    <div id="cus_phone_number" class="form-group">
                    	<label>Phone Number <span class="error">* <?php echo $phoneErr; ?></span></label>
						<input type="text" name="cus_phone_number">
                    </div>
                    <div id="cus_address" class="form-group">
                    	<label>Address <span class="error">* <?php echo $addressErr; ?></span></label>
						<input type="text" name="cus_address">
                    </div>
                    <div class='form-group' class="form-group">
	                    <label>Photo <span class="error">* <?php echo $imageErr; ?></span></label>
	                    <input type="file" name="image">
	                </div>
	                <div class='form-group' class="form-group">
	                    <label>Additional Documents</label>
	                    <input type="file" name="add_docu">
	                </div>
                    <button type="submit"  name="register">Register</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>