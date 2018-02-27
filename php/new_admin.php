<?php
require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');
				
$usernameErr = $passwordErr = $fname = $mname = $lname = $birth_month = $birth_day = $birth_year = $phone = $address = $image = $fnameErr = $mnameErr = $lnameErr = $phoneErr = $birthErr = $addressErr = $imageErr = '';
if(isset($_POST['admin_register'])){
    $valid = true;

    if (empty($_POST["admin_username"])) {
        $valid = false;
        $usernameErr = "Username is required";
    }

    else {
        $username = mysqli_real_escape_string($link, $_REQUEST['admin_username']);
    }

    if (empty($_POST["admin_password"])) {
        $valid = false;
        $passwordErr = "Password is required";
    }

    else {
        $password = mysqli_real_escape_string($link, $_REQUEST['admin_password']);
    }

    if (empty($_POST["admin_fname"])) {
        $valid = false;
        $fnameErr = "First Name is required";
    }

    else {
        $fname = mysqli_real_escape_string($link, $_REQUEST['admin_fname']);
    }

    if (empty($_POST["admin_mname"])) {
        $valid = false;
        $mnameErr = "Middle Name is required";
    }

    else {
        $mname = mysqli_real_escape_string($link, $_REQUEST['admin_mname']);
    }

    if (empty($_POST["admin_lname"])) {
        $valid = false;
        $lnameErr = "Last Name is required";
    }
    else {
        $lname = mysqli_real_escape_string($link, $_REQUEST['admin_lname']);
    }
    if (empty($_POST["birth_month"])) {
        $valid = false;
        $birthErr = "Birth Month is required";
    }
    else {
        $birth_month = mysqli_real_escape_string($link, $_REQUEST['birth_month']);
    }
    if (empty($_POST["birth_day"])) {
        $valid = false;
        $birthErr = "Birth Day is required";
    }
    else {
        $birth_day = mysqli_real_escape_string($link, $_REQUEST['birth_day']);
    }
    if (empty($_POST["birth_year"])) {
        $valid = false;
        $birthErr = "Birth Year is required";
    }
    else {
        $birth_year = mysqli_real_escape_string($link, $_REQUEST['birth_year']);
    }
    if (empty($_POST["admin_phone_number"])) {
        $valid = false;
        $phoneErr = "Last Name is required";
    }
    else {
        $phone = mysqli_real_escape_string($link, $_REQUEST['admin_phone_number']);
    }
    if (empty($_POST["admin_address"])) {
        $valid = false;
        $addressErr = "Address is required";
    }
    else {
        $address = mysqli_real_escape_string($link, $_REQUEST['admin_address']);
    }
    
    $image = $_FILES['image']['name'];
    $target = $_SERVER[ 'DOCUMENT_ROOT']."/uploads/".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    $add_docu = $_FILES['add_docu']['name'];
    $docutarget = $_SERVER[ 'DOCUMENT_ROOT']."/add_docus/".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $docutarget);
    $admin_id = date('mdyis');

    if ($valid){
        $birth_date =  $birth_month ."/". $birth_day ."/". $birth_year;
        $sql = "INSERT INTO `admins` (`admin_id`, `username`, `password`, `fname`, `mname`, `lname`, `birth_date`, `phone_number`, `address`, `image`) VALUES ('$admin_id', '$username', '$password', '$fname', '$mname', '$lname', '$birth_date', '$phone', '$address', '$image')";

        if(mysqli_query($link, $sql)){
            header('Location:/index.php');
        }
    }

    else {
        echo "<div class='alert alert-danger'>
        <strong>Sorry!</strong> Please fill the required fields.
        </div>";
    }
    
    mysqli_close($link);
}
?>