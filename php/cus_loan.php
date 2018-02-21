<?php $title='Customer Loan' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>New Customer Loan</h4>
			<?php
			require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

			$customer_id = $_GET['customer_id'];
			$loan_amountErr = '';

			$sql = "SELECT * FROM `customers` WHERE `customers`.`customer_id` = '$customer_id'";
			$result = mysqli_query($link, $sql);

			if (mysqli_num_rows($result)> 0) {
				$_SESSION['customer_id'] = $_GET['customer_id'];
				while ($row = mysqli_fetch_array($result)) {
					$balance = $row['balance'];
					echo "
						<img src='/images/".$row['image']."' >
						<tr>Customer ID: " . $row['customer_id'] . "</tr>
	                   	<tr>Full Name: " . $row['fname'] . " " . $row['lname'] . "</tr>
	                   	<tr>Balance: " . $row['balance'] . "</tr>
					";
				}
				$tier = $row['tier'];
				if ($tier >=1 && $tier <=5) {
					$max_loan = '1999';
				}
				if ($tier >=6 && $tier <=10) {
					$max_loan = '4499';
				}
				if ($tier >= 11) {
					$max_loan = '10000';
				}
				if ($balance > 0){
					$disabled = 'disabled';
					$loan_button = 'Please Pay Balance First';
				}
				else{
					$disabled = '';
					$loan_button = 'Process Loan';
				}
			}
		    if(isset($_POST['process_loan'])){

		    	$valid = true;

	    		if (empty($_POST["loan_amount"])) {
			        $valid = false;
			        $loan_amountErr = "Enter Loan Amount";
			    }
			    else {
			    	$loan_amount = mysqli_real_escape_string($link, $_REQUEST['loan_amount']);
			    }

			    
			    if($valid) {
			    	$customer_id = $_SESSION['customer_id'];
			    	$balance = $row['balance'];
			    	$new_balance = $balance + $loan_amount;
			    	
			    	$update = "UPDATE `customers` SET `balance` = '$new_balance' WHERE `customers`.`customer_id` = '$customer_id'";

			    	if(mysqli_query($link, $update)){
			    		$loan_id = date('mdyis');
			    		$customer_id = $_SESSION['customer_id'];
						$admin_id = $_SESSION['admin_id'];
						$date_now = date("M/d/Y h:i:s A");

				    	$insert = "INSERT INTO `loans` (`loan_id`, `customer_id`, `admin_id`, `loan_amount`, `loan_date`) VALUES ('$loan_id', '$customer_id', '$admin_id', '$loan_amount', '$date_now');";

				    	if(mysqli_query($link, $insert)){
				    		header('Location:/pages/loan_processed.php');
				    	} 
				    }
				}
    		}
		    ?>
		    <div id='loan_form'>
		    	<form id='loan' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
		    		<div id="loan_amount">
						<label>Loan Amount</label>
						<span class='error'>* <?php echo $loan_amountErr; ?></span>
						<input type="number" id='loan_amount' name="loan_amount" min="1000" max="<?php echo $max_loan ?>">
					</div>
					<button type="submit"  name="process_loan" <?php echo $disabled; ?>><?php echo $loan_button; ?>></button>
		    	</form>
		    </div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>