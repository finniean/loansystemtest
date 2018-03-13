<?php
require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');
				
$fname = $mname = $lname = $birth_month = $birth_day = $birth_year = $phone = $address = $image = $fnameErr = $mnameErr = $lnameErr = $phoneErr = $birthErr = $addressErr = $imageErr = $fnameError = $mnameError = $lnameError = $birthError = $phoneError = $addressError = $imageError = '';
if(isset($_POST['register'])){
    $valid = true;

    if (empty($_POST["cus_fname"])) {
        $valid = false;
        $fnameErr = "required";
        $fnameError = 'error';
    }

    else {
        $fname = mysqli_real_escape_string($link, $_REQUEST['cus_fname']);
    }

    if (empty($_POST["cus_mname"])) {
        $valid = false;
        $mnameErr = "required";
        $mnameError = 'error';
    }

    else {
        $mname = mysqli_real_escape_string($link, $_REQUEST['cus_mname']);
    }

    if (empty($_POST["cus_lname"])) {
        $valid = false;
        $lnameErr = "required";
        $lnameError = 'error';
    }
    else {
        $lname = mysqli_real_escape_string($link, $_REQUEST['cus_lname']);
    }

    if (empty($_POST["birth_month"])) {
        $valid = false;
        $birthErr = "required";
        $birthError = 'error';
    }
    else {
        $birth_month = mysqli_real_escape_string($link, $_REQUEST['birth_month']);
    }

    if (empty($_POST["birth_day"])) {
        $valid = false;
        $birthErr = "required";
        $birthError = 'error';
    }
    else {
        $birth_day = mysqli_real_escape_string($link, $_REQUEST['birth_day']);
    }

    if (empty($_POST["birth_year"])) {
        $valid = false;
        $birthErr = "required";
        $birthError = 'error';
    }
    else {
        $birth_year = mysqli_real_escape_string($link, $_REQUEST['birth_year']);
    }

    if (empty($_POST["cus_phone_number"])) {
        $valid = false;
        $phoneErr = "required";
        $phoneError = 'error';
    }
    else {
        $phone = mysqli_real_escape_string($link, $_REQUEST['cus_phone_number']);
    }

    if (empty($_POST["cus_address"])) {
        $valid = false;
        $addressErr = "required";
        $addressError = "error";
    }
    else {
        $address = mysqli_real_escape_string($link, $_REQUEST['cus_address']);
    }
    
    if(empty($_FILES['cus_image']['name'])) {
        $valid = false;
        $imageErr = "required";
        $imageError = "error";
    }
    else{
        $image = $_FILES['cus_image']['name'];
        $target = $_SERVER[ 'DOCUMENT_ROOT']."/uploads/".basename($image);
        move_uploaded_file($_FILES['cus_image']['tmp_name'], $target);
    }
    
    $add_docu = $_FILES['add_docu']['name'];
    $docutarget = $_SERVER[ 'DOCUMENT_ROOT']."/add_docus/".basename($add_docu);
    move_uploaded_file($_FILES['add_docu']['tmp_name'], $docutarget);

    $customer_id = date('mdyis');
    $admin_id = $_SESSION['admin_id'];

    if ($valid){
        $birth_date =  $birth_month ."/". $birth_day ."/". $birth_year;
        $fullname =  $fname ." ". $mname ." ". $lname;

        $exist = "SELECT * FROM `customers` WHERE fullname = '$fullname' AND birth_date = '$birth_date'";
        $existed = mysqli_query($link, $exist);

        if(mysqli_num_rows($existed) != 1){
        $sql = "INSERT INTO `customers` (`customer_id`, `admin_id`, `fullname`, `birth_date`, `phone_number`, `address`, `image`, `add_docu`) VALUES ('$customer_id', '$admin_id', '$fullname', '$birth_date', '$phone', '$address', '$image', '$add_docu')";

            if(mysqli_query($link, $sql)){
                header('Location:/pages/view_cus.php?customer_id='.$customer_id.'');
            }
        }
        else {
            echo "<span class='error' style='font-size: 100%!important;'>
            Customer already exists.
            </span>";
        }
    }

    else {
        echo "<span class='error' style='font-size: 100%;!important;'>
        Sorry! Please fill the <strong>REQUIRED</strong> fields.
        </span>";
    }
    
    mysqli_close($link);
}
?>