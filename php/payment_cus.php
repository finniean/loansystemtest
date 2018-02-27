<?php
require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

$customer_id = $_GET['customer_id'];
$payment_amount = '';

$sql = "SELECT * FROM `customers` WHERE `customers`.`customer_id` = '$customer_id'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result)> 0) {
	$_SESSION['customer_id'] = $_GET['customer_id'];

	while ($row = mysqli_fetch_array($result)) {
		$balance = $row['balance'];
		$birth = $row['birth_date'];
		$today= date('m/d/Y');
		
		$datetime1 = new DateTime($today) ;
		$datetime2 = new DateTime($birth) ;
		$interval = $datetime1->diff($datetime2);
		$age = $interval->format('%Y');

		if ($balance <= 0){
			$disabled = 'disabled';
			$loan_button = 'No Existing Loan';
		}

		else{
			$disabled = '';
			$loan_button = 'Process Payment';
		}

		$customer_info = "
			<div class='customer_info clearfix'>
				<div class='col1'>
					<div class='customer_image'>
						<img src='/uploads/".$row['image']."'>
					</div>
				</div>
				<div class='col2'>
					<label>Customer ID</label>
					<p>".$row['customer_id']."</p>
					<label>Full Name</label>
					<p>".$row['fname']." ".$row['mname']." ".$row['lname']."</p>
					<label>Birthday</label>
					<p>".$row['birth_date']."</p>
					<label>Age</label>
					<p>".$age."</p>
				</div>
				<div class='col3'>
					<label>Phone Number</label>
					<p>".$row['phone_number']."</p>
					<label>Address</label>
					<p>".$row['address']."</p>
					<label>Balance</label>
					<p>₱ ".$row['balance']."</p>
					<label>Last Loan Due Date</label>
					<p>".$row['due_date']."</p>
					<div id='payment_amount' class='form-group'>
						<label>Payment Amount</label>
						<input type='number' id='payment_amount' name='payment_amount' max=".$row['balance'].">
					</div>
					<button type='submit'  name='process_payment' ".$disabled.">".$loan_button."</button>
				</div>
			</div>
		"
		;
	}
}
if(isset($_POST['process_payment'])){
	$valid = true;

	if (empty($_POST["payment_amount"])) {
		$valid = false;
	}
	else {
		$payment_amount = mysqli_real_escape_string($link, $_REQUEST['payment_amount']);
	}

	if($valid) {
		$customer_id = $_SESSION['customer_id'];
		$balance = $row['balance'];
		echo $balance;
		echo $payment_amount;
		$new_balance = abs($balance - $payment_amount);

		$update = "UPDATE `customers` SET `balance` = '$new_balance' WHERE `customers`.`customer_id` = '$customer_id'";

		if(mysqli_query($link, $update)){
			$payment_id = date('mdyis');
			$customer_id = $_SESSION['customer_id'];
			$admin_id = $_SESSION['admin_id'];
			$date_now = date("M/d/Y h:i:s A");

			$insert = "INSERT INTO `payments` (`payment_id`, `customer_id`, `admin_id`, `payment_amount`, `payment_date`) VALUES ('$payment_id', '$customer_id', '$admin_id', '$payment_amount', '$date_now');";

			if(mysqli_query($link, $insert)){
				// header('Location:/pages/payment_processed.php');
			}
		}
	}
}
?>