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
				<div class='col2 form-group'>
					<label>Customer ID</label>
					<p>".$row['customer_id']."</p>
					<label>Full Name</label>
					<input type='text' name='edit_fullname' value='". $row['fullname'] ."'>
					<label>Birthday</label>
					<input type='text' name='edit_birth_date' value='". $row['birth_date'] ."'>
					<label>Age</label>
					<p>".$age."</p>
				</div>
				<div class='col3 form-group'>
					<label>Phone Number</label>
					<input type='text' name='edit_phone_number' value='". $row['phone_number'] ."'>
					<label>Address</label>
					<input type='text' name='edit_address' value='". $row['address'] ."'>
					<label>Balance</label>
					<p>₱ ".$row['balance']."</p>
					<label>Last Loan Due Date</label>
					<p>".$row['due_date']."</p>
				</div>
			</div>"
		;
	}
}
				
$full_name = $birth_date = $phone = $address = $full_nameErr = $birth_dateErr = $phoneErr =  $addressErr = $imageErr = $full_nameError = $birth_dateError = $phoneError = $addressError = '';

if(isset($_POST['edit'])){
    $valid = true;

    if (empty($_POST["edit_fullname"])) {
        $valid = false;
        $full_nameErr = "required";
        $full_nameError = 'error';
    }

    else {
        $full_name = mysqli_real_escape_string($link, $_REQUEST['edit_fullname']);
    }

    if (empty($_POST["edit_birth_date"])) {
        $valid = false;
        $birth_dateErr = "required";
        $birth_dateError = 'error';
    }
    else {
        $birth_date = mysqli_real_escape_string($link, $_REQUEST['edit_birth_date']);
    }

    if (empty($_POST["edit_phone_number"])) {
        $valid = false;
        $phoneErr = "required";
        $phoneError = 'error';
    }
    else {
        $phone = mysqli_real_escape_string($link, $_REQUEST['edit_phone_number']);
    }

    if (empty($_POST["edit_address"])) {
        $valid = false;
        $addressErr = "required";
        $addressError = "error";
    }
    else {
        $address = mysqli_real_escape_string($link, $_REQUEST['edit_address']);
    }

    if ($valid){
    	$customer_id = $_SESSION['customer_id'];

        $update = "UPDATE `customers` SET `fullname` = '$full_name', `birth_date` = '$birth_date', `phone_number` = '$phone', `address` = '$address' WHERE `customers`.`customer_id` = '$customer_id'";

        if(mysqli_query($link, $update)){
        	header('Location:/pages/view_cus.php?customer_id='.$customer_id.'');
        }
    }

    else {
        echo "<span class='error' style='font-size: 100%;!important;'>
        Sorry! Please fill the <strong>REQUIRED</strong> fields.
        </span>";
    }
}
if(isset($_POST['delete'])){
	$customer_id = $_SESSION['customer_id'];

	$delete = "DELETE FROM `customers` WHERE `customers`.`customer_id` = '$customer_id'";

	if(mysqli_query($link, $delete)){
		header('Location: /pages/edit_search.php');
	}
}
?>