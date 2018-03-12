<?php
require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');
				
$usernameErr = $passwordErr = $fname = $mname = $lname = $birth_month = $birth_day = $birth_year = $phone = $address = $image = $fnameErr = $mnameErr = $lnameErr = $phoneErr = $birthErr = $addressErr = $imageErr = '';
if(isset($_POST['admin_register'])){
    $valid = true;

    if (empty($_POST["admin_username"])) {
        $valid = false;
        $usernameErr = "required";
        $usernameError = "error";
    }

    else {
        $username = mysqli_real_escape_string($link, $_REQUEST['admin_username']);
    }

    if (empty($_POST["admin_password"])) {
        $valid = false;
        $passwordErr = "required";
        $passwordError = "error";
    }

    else {
        $password = mysqli_real_escape_string($link, $_REQUEST['admin_password']);
    }

    if (empty($_POST["admin_fname"])) {
        $valid = false;
        $fnameErr = "required";
        $fnameError = 'error';
    }

    else {
        $fname = mysqli_real_escape_string($link, $_REQUEST['admin_fname']);
    }

    if (empty($_POST["admin_mname"])) {
        $valid = false;
        $mnameErr = "required";
        $mnameError = 'error';
    }

    else {
        $mname = mysqli_real_escape_string($link, $_REQUEST['admin_mname']);
    }

    if (empty($_POST["admin_lname"])) {
        $valid = false;
        $lnameErr = "required";
        $lnameError = 'error';
    }
    else {
        $lname = mysqli_real_escape_string($link, $_REQUEST['admin_lname']);
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

    if (empty($_POST["admin_phone_number"])) {
        $valid = false;
        $phoneErr = "required";
        $phoneError = 'error';
    }
    else {
        $phone = mysqli_real_escape_string($link, $_REQUEST['admin_phone_number']);
    }

    if (empty($_POST["admin_address"])) {
        $valid = false;
        $addressErr = "required";
        $addressError = "error";
    }
    else {
        $address = mysqli_real_escape_string($link, $_REQUEST['admin_address']);
    }
    
    if(empty($_FILES['admin_image']['name'])) {
        $valid = false;
        $imageErr = "required";
        $imageError = "error";
    }
    else{
        $image = $_FILES['admin_image']['name'];
        $target = $_SERVER[ 'DOCUMENT_ROOT']."/uploads/".basename($image);
        move_uploaded_file($_FILES['admin_image']['tmp_name'], $target);
    }

    $admin_id = date('mdyis');

    if ($valid){
        $exist = "SELECT * FROM `admins` WHERE fname = '$fname' AND mname = '$mname' AND lname = '$lname'";
        $existed = mysqli_query($link, $exist);

        if(mysqli_num_rows($existed) < 0){
            $birth_date =  $birth_month ."/". $birth_day ."/". $birth_year;

            $sql = "INSERT INTO `admins` (`admin_id`, `username`, `password`, `fname`, `mname`, `lname`, `birth_date`, `phone_number`, `address`, `image`) VALUES ('$admin_id', '$username', '$password', '$fname', '$mname', '$lname', '$birth_date', '$phone', '$address', '$image')";

            if(mysqli_query($link, $sql)){
                header('Location:/index.php');
            }
        }
        else {
            echo "<span class='error' style='font-size: 100%!important;'>
            Customer already exists.
            </span>";
        }   
    }

    else {
        echo "<span class='error' style='font-size: 100%!important;'>
        Sorry! Please fill the <strong>REQUIRED</strong> fields.
        </span>";
    }
}