<?php $title='New Registration' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Register New Customer</h4>
			<div id="new_cus">
				<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/php/new_reg.php');?>
				<form id="new_cus" class="clearfix" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post' enctype="multipart/form-data">
					<div class='reg_col1'>
						<div id="cus_fname" class="form-group <?php echo $fnameError; ?>">
							<label>First Name <span class='error'><?php echo $fnameErr; ?></span></label>
							<input type="text" name="cus_fname">
						</div>
						<div id="cus_mname" class="form-group <?php echo $mnameError; ?>">
							<label>Middle Name <span class='error'><?php echo $mnameErr; ?></span></label>						
							<input type="text" name="cus_mname">
						</div>
						<div id="cus_lname" class="form-group <?php echo $lnameError; ?>">
							<label>Last Name <span class='error'><?php echo $lnameErr; ?></span></label>						
							<input type="text" name="cus_lname">
						</div>
						<div id='cus_birth' class="form-group <?php echo $birthError; ?>">
	                        <label>Birth Day <span class="error"><?php echo $birthErr; ?></span></label>
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
	                </div>
	                <div class="reg_col2">
	                    <div id="cus_phone_number" class="form-group <?php echo $phoneError; ?>">
	                    	<label>Phone Number <span class="error"><?php echo $phoneErr; ?></span></label>
							<input type="text" name="cus_phone_number">
	                    </div>
	                    <div id="cus_address" class="form-group  <?php echo $addressError; ?>">
	                    	<label>Address <span class="error"><?php echo $addressErr; ?></span></label>
							<input type="text" name="cus_address">
	                    </div>
	                    <div class="form-group  <?php echo $imageError; ?>">
		                    <label>Photo <span class="error"><?php echo $imageErr; ?></span></label>
		                    <input name="cus_image" type="file">
		                </div>
		                <div class='form-group' class="form-group">
		                    <label>Additional Documents</label>
		                    <input name="add_docu" type="file">
		                </div>
		            </div>
                    <button type="submit"  name="register">Register</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>