<?php
require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

$full_name = $birth_date = $phone = $address = $image = $add_docu = '';

$customer_id = $_GET['customer_id'];

$sql = "SELECT * FROM `customers` WHERE `customers`.`customer_id` = '$customer_id'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result)> 0) {
	$_SESSION['customer_id'] = $_GET['customer_id'];

	while ($row = mysqli_fetch_array($result)) {
		$customer_id = $row['customer_id'];
		$birth = $row['birth_date'];
		$bday = date_create($birth);
		$birth_date = date_format($bday, 'M/d/Y');
		$today= date('m/d/Y');
		
		$datetime1 = new DateTime($today) ;
		$datetime2 = new DateTime($birth) ;
		$interval = $datetime1->diff($datetime2);
		$age = $interval->format('%Y');

		$_SESSION['rowname'] = $row['fullname'];
		$_SESSION['rowbday'] = $row['birth_date'];
		$_SESSION['rowphone'] = $row['phone_number'];
		$_SESSION['rowaddress'] = $row['address'];
		$_SESSION['rowimage'] = $row['image'];
		$_SESSION['rowdocu'] = $row['add_docu'];

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
					<label>Photo</label>
					<input name='edit_image' type='file'>
					<label>Additional Document</label>
					<input name='edit_docu' type='file'>
				</div>
			</div>"
		;
	}
}
				
if(isset($_POST['edit'])){

    if (empty($_POST["edit_fullname"])) {
        $full_name = $_SESSION['rowname'];
    }

    else {
        $full_name = mysqli_real_escape_string($link, $_REQUEST['edit_fullname']);
    }

    if (empty($_POST["edit_birth_date"])) {
        $birth_date = $_SESSION['rowbday'];
    }
    else {
        $birth_date = mysqli_real_escape_string($link, $_REQUEST['edit_birth_date']);
    }

    if (empty($_POST["edit_phone_number"])) {
        $phone = $_SESSION['rowphone'];
    }
    else {
        $phone = mysqli_real_escape_string($link, $_REQUEST['edit_phone_number']);
    }

    if (empty($_POST["edit_address"])) {
        $address = $_SESSION['rowaddress'];
    }
    else {
        $address = mysqli_real_escape_string($link, $_REQUEST['edit_address']);
    }

    if(empty($_FILES['edit_image']['name'])) {
        $newfilename = $_SESSION['rowimage'];
    }
    else{
        $image = $_FILES['edit_image']['name'];
        $temp = explode(".", $_FILES["edit_image"]["name"]);
        $newfilename = $customer_id . '.' . end($temp);
        move_uploaded_file($_FILES["edit_image"]["tmp_name"], $_SERVER[ 'DOCUMENT_ROOT']."/uploads/" . $newfilename);
    }

    if(empty($_FILES['edit_image']['name'])) {
        $newdocuname = $_SESSION['rowdocu'];
    }
    else{
        $add_docu = $_FILES['edit_docu']['name'];
	    $docu = explode(".", $_FILES["edit_docu"]["name"]);
	    $newdocuname = $customer_id . '.' . end($docu);
	    move_uploaded_file($_FILES["edit_docu"]["tmp_name"], $_SERVER[ 'DOCUMENT_ROOT']."/add_docus/" . $newdocuname);
    }
    
	$customer_id = $_SESSION['customer_id'];

    $update = "UPDATE `customers` SET `fullname` = '$full_name', `birth_date` = '$birth_date', `phone_number` = '$phone', `address` = '$address' , `image` = '$newfilename', add_docu = '$newdocuname' WHERE `customers`.`customer_id` = '$customer_id'";

	if(mysqli_query($link, $update)){
		header('Location:/pages/view_cus.php?customer_id='.$customer_id.'');
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