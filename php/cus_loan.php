<?php $title='Customer Loan' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>New Customer Loan</h4>
			<?php
			session_start();
			require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

			$customer_id = $_SESSION['customer_id'];
			$admin_id = $_SESSION['admin_id'];

			$sql = "SELECT * FROM customers WHERE customer_id = '$customer_id'";
			$result = mysqli_query($link, $sql);

			if (mysqli_num_rows($result)> 0) {
				while ($row = mysqli_fetch_array($result)){
					echo "
						<img src='/images/".$row['image']."' >
						<td>Customer ID: " . $row['customer_id'] . "</td>
	                   	<td>Full Name: " . $row['fname'] . " " . $row['lname'] . "</td>
	                   	<td>Balance: " . $row['balance'] . "</td>
					";
					$balance = $row['balance'];
}
				    if(isset($_POST['process_loan'])){
				    	$loan_amount = mysqli_real_escape_string($link, $_REQUEST['loan_amount']);
				    	$new_balance = $balance + $loan_amount;
				    	$loan_id = date('mdyis');

				    	$update = "UPDATE `customers` SET `balance` = '$new_balance' WHERE `customers`.`customer_id` = '$customer_id'";

				    	if($result = mysqli_query($link, $update)){
					    	$insert = "INSERT INTO `loans` (`loan_id`, `customer_id`, `admin_id`, `loan_amount`, `loan_date`) VALUES ('$loan_id', '$customer_id', '$admin_id', '$loan_amount', '$date_now');";
					    	$inserted = mysqli_query($link, $insert);
					    }
		    		}
		    	
		    }
		    ?>
		    <div id='loan_form'>
		    	<form id='loan' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
		    		<div id="loan_amount">
						<label>Loan Amount</label>
						<input type="number" name="loan_amount" min="1" max="9999999">
					</div>
					<button type="submit"  name="process_loan">Process Loan</button>
		    	</form>
		    </div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>