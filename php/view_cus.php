<?php
require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

$customer_id = $_GET['customer_id'];

$sql = "SELECT * FROM `customers` WHERE `customers`.`customer_id` = '$customer_id'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result)> 0) {
	$_SESSION['customer_id'] = $_GET['customer_id'];

	while ($row = mysqli_fetch_array($result)) {
		$balance = $row['balance'];
		$birth = $row['birth_date'];
		$bday = date_create($birth);
		$birth_date = date_format($bday, 'M/d/Y');
		$today= date('m/d/Y');
		
		$datetime1 = new DateTime($today) ;
		$datetime2 = new DateTime($birth) ;
		$interval = $datetime1->diff($datetime2);
		$age = $interval->format('%Y');

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
					<p>".$row['fullname']."</p>
					<label>Birthday</label>
					<p>".$birth_date."</p>
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
				</div>
			</div>"
		;
	}
}
?>