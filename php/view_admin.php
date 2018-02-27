<?php
require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

$admin_id = $_GET['admin_id'];

$sql = "SELECT * FROM `admins` WHERE `admins`.`admin_id` = '$admin_id'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result)> 0) {
	$_SESSION['admin_id'] = $_GET['admin_id'];

	while ($row = mysqli_fetch_array($result)) {
		$birth = $row['birth_date'];
		$today= date('m/d/Y');
		
		$datetime1 = new DateTime($today) ;
		$datetime2 = new DateTime($birth) ;
		$interval = $datetime1->diff($datetime2);
		$age = $interval->format('%Y');

		$admin_info = "
			<div class='admin_info clearfix'>
				<div class='col1'>
					<div class='admin_image'>
						<img src='/uploads/".$row['image']."'>
					</div>
				</div>
				<div class='col2'>
					<label>Admin ID</label>
					<p>".$row['admin_id']."</p>
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
				</div>
			</div>
		"
		;
	}
}
?>