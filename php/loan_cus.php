<?php
require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

$customer_id = $_GET['customer_id'];
$loan_amount = '';

$sql = "SELECT * FROM `customers` WHERE `customers`.`customer_id` = '$customer_id'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result)> 0) {
	$_SESSION['customer_id'] = $_GET['customer_id'];

	while ($row = mysqli_fetch_array($result)) {
		$balance = $row['balance'];
		$tier = $row['tier'];
		$birth = $row['birth_date'];
		$today= date('m/d/Y');
		
		$datetime1 = new DateTime($today) ;
		$datetime2 = new DateTime($birth) ;
		$interval = $datetime1->diff($datetime2);
		$age = $interval->format('%Y');

		if ($tier >=1 && $tier <=5) {
			$max_loan = '1999';
		}

		elseif ($tier >=6 && $tier <=10) {
			$max_loan = '4499';
		}

		elseif ($tier >= 11) {
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
					<label>Phone Number</label>
					<p>".$row['phone_number']."</p>
				</div>
				<div class='col3'>
					<label>Address</label>
					<p>".$row['address']."</p>
					<label>Balance</label>
					<p>₱ ".$row['balance']."</p>
					<label>Last Loan Due Date</label>
					<p>".$row['due_date']."</p>
					<div id='loan_amount' class='form-group'>
						<label>Loan Amount</label>
						<input type='number' id='loan_amount' name='loan_amount' min='1000' max=".$max_loan.">
					</div>
					<button type='submit'  name='process_loan' ".$disabled.">".$loan_button."</button>
				</div>
			</div>
		"
		;
	}
}
if(isset($_POST['process_loan'])){
	$valid = true;

	if (empty($_POST["loan_amount"])) {
		$valid = false;
	}
	else {
		$loan_amount = mysqli_real_escape_string($link, $_REQUEST['loan_amount']);
	}

	if($valid) {
		$customer_id = $_SESSION['customer_id'];
		$balance = $row['balance'];
		$new_balance = $balance + $loan_amount;
		$due_date = date('M/d/Y', strtotime('+2 months'));

		$update = "UPDATE `customers` SET `balance` = '$new_balance', `due_date` = '$due_date' WHERE `customers`.`customer_id` = '$customer_id'";

		if(mysqli_query($link, $update)){
			$loan_id = date('mdyis');
			$customer_id = $_SESSION['customer_id'];
			$admin_id = $_SESSION['admin_id'];
			$date_now = date("M/d/Y h:i:s A");

			$insert = "INSERT INTO `loans` (`loan_id`, `customer_id`, `admin_id`, `loan_amount`, `loan_date`, `due_date`) VALUES ('$loan_id', '$customer_id', '$admin_id', '$loan_amount', '$date_now', '$due_date');";

			if(mysqli_query($link, $insert)){
				header('Location:/pages/loan_processed.php');
			}
		}
	}
}
?>