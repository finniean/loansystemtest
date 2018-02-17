<?php $title='Customer Payment' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Customer Payment</h4>
			<?php
			session_start();
			require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

			$customer_id = $_GET['customer_id'];
			$admin_id = $_SESSION['admin_id'];
			$payment_amountErr = '';

			$sql = "SELECT * FROM `customers` WHERE `customers`.`customer_id` = '$customer_id'";
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
					$tier = $row['tier'];
				}
			}
		    if(isset($_POST['process_payment'])){
		    	$payment_amount = mysqli_real_escape_string($link, $_REQUEST['payment_amount']);
		    	$new_balance = $balance - $payment_amount;
		    	$payment_id = date('mdyis');

		    	$update = "UPDATE `customers` SET `balance` = '$new_balance' WHERE `customers`.`customer_id` = '$customer_id'";

		    	if($updated = mysqli_query($link, $update)){
			    	$insert = "INSERT INTO `payments` (`payment_id`, `customer_id`, `admin_id`, `payment_amount`, `payment_date`) VALUES ('$payment_id', '$customer_id', '$admin_id', '$payment_amount', '$date_now');";
			    	$inserted = mysqli_query($link, $insert);

				    // if($balance = 0){
				    // 	$new_tier = $tier + 1;
				    // 	$tier_update = "UPDATE `customers` SET `tier` = '$new_tier' WHERE `customers`.`customer_id` = '$customer_id'";
				    // 	$updated = mysqli_query($link, $new_tier);
				    // }
				    header('Location:/pages/loan_processed.php');
				}
    		}
		    	
		    ?>
		    <div id='payment_form'>
		    	<form id='payment' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
		    		<div id="payment_amount">
						<label>Payment Amount</label>
						<input type="number" name="payment_amount" value="<?php echo $balance ?>">
					</div>
					<button type="submit"  name="process_payment">Process payment</button>
		    	</form>
		    </div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>