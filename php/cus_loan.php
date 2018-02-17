<?php $title='Customer Loan' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');
?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>New Customer Loan</h4>
			<?php
			session_start();
			require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

			$customer_id = $_GET['customer_id'];
			$admin_id = $_SESSION['admin_id'];
			$loan_amountErr = '';

			$sql = "SELECT * FROM `customers` WHERE `customers`.`customer_id` = '$customer_id'";
			$result = mysqli_query($link, $sql);

			if (mysqli_num_rows($result)> 0) {

				while ($row = mysqli_fetch_array($result)) {
					echo "
						<img src='/images/".$row['image']."' >
						<tr>Customer ID: " . $row['customer_id'] . "</tr>
	                   	<tr>Full Name: " . $row['fname'] . " " . $row['lname'] . "</tr>
	                   	<tr>Balance: " . $row['balance'] . "</tr>
					";
				}
				$tier = $row['tier'];
				$balance = $row['balance'];
				$cus = $row['customer_id'];
				if ($tier >=1 && $tier <=5) {
					$max_loan = '1999';
				}
				elseif ($tier >=6 && $tier <=10) {
					$max_loan = '4499';
				}
				elseif ($tier >= 11) {
					$max_loan = '10000';
				}
				elseif ($balance > 0){
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

			    if($valid) {
			    	$cus = $row['customer_id'];
			    	$admin_id = $_SESSION['admin_id'];
			    	$balance = $row['balance'];
			        $loan_amount = mysqli_real_escape_string($link, $_REQUEST['loan_amount']);
			    	$new_balance = $balance + $loan_amount;
			    	$loan_id = date('mdyis');
			    	$update = "UPDATE `customers` SET `balance` = '$new_balance' WHERE `customers`.`customer_id` = '$cus'";

			    	if(mysqli_query($link, $update)){
			    		$cus = $row['customer_id'];
						
				    	$insert = "INSERT INTO `loans` (`loan_id`, `customer_id`, `admin_id`, `loan_amount`, `loan_date`) VALUES ('$loan_id', '$cus', '$admin_id', '$loan_amount', '$date_now');";
				    	$inserted = mysqli_query($link, $insert);
				    	header('Location:/pages/loan_processed.php');
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
					<button type="submit"  name="process_loan" <?php echo $disabled; ?>><?php echo $loan_button; ?></button>
		    	</form>
		    </div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>