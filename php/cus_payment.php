<?php $title='Customer Payment' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Customer Payment</h4>
			<?php
			require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

			$customer_id = $_GET['customer_id'];
			$payment_amountErr = '';

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
			}
		    if(isset($_POST['process_payment'])){

		    	$valid = true;

	    		if (empty($_POST["payment_amount"])) {
			        $valid = false;
			        $payment_amountErr = "Enter Payment Amount";
			    }
			    else {
			    	$payment_amount = mysqli_real_escape_string($link, $_REQUEST['payment_amount']);
			    }

			    
			    if($valid) {
			    	$customer_id = $_SESSION['customer_id'];
			    	$balance = $row['balance'];
			    	$new_balance = $balance -= $payment_amount;
			    	
			    	$update = "UPDATE `customers` SET `balance` = '$new_balance' WHERE `customers`.`customer_id` = '$customer_id'";

			    	if(mysqli_query($link, $update)){
			    		$payment_id = date('mdyis');
			    		$customer_id = $_SESSION['customer_id'];
						$admin_id = $_SESSION['admin_id'];
						$date_now = date("M/d/Y h:i:s A");

				    	$insert = "INSERT INTO `payments` (`payment_id`, `customer_id`, `admin_id`, `payment_amount`, `payment_date`) VALUES ('$payment_id', '$customer_id', '$admin_id', '$payment_amount', '$date_now');";

				    	if(mysqli_query($link, $insert)){
				    		header('Location:/pages/payment_processed.php');
				    	} 
				    }
				}
    		}
		    ?>
		    <div id='payment_form'>
		    	<form id='payment' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
		    		<div id="payment_amount">
						<label>payment Amount</label>
						<span class='error'>* <?php echo $payment_amountErr; ?></span>
						<input type="number" id='payment_amount' name="payment_amount">
					</div>
					<button type="submit"  name="process_payment">Process Payment</button>
		    	</form>
		    </div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>