<?php
require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');
				
$fname = $mname = $lname = $birth_month = $birth_day = $birth_year = $phone = $address = $image = $fnameErr = $mnameErr = $lnameErr = $phoneErr = $birthErr = $addressErr = $imageErr = '';
if(isset($_POST['register'])){
    $valid = true;

    if (empty($_POST["cus_fname"])) {
        $valid = false;
        $fnameErr = "First Name is required";
    }

    else {
        $fname = mysqli_real_escape_string($link, $_REQUEST['cus_fname']);
    }

    if (empty($_POST["cus_mname"])) {
        $valid = false;
        $mnameErr = "Middle Name is required";
    }

    else {
        $mname = mysqli_real_escape_string($link, $_REQUEST['cus_mname']);
    }

    if (empty($_POST["cus_lname"])) {
        $valid = false;
        $lnameErr = "Last Name is required";
    }
    else {
        $lname = mysqli_real_escape_string($link, $_REQUEST['cus_lname']);
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
    if (empty($_POST["cus_phone_number"])) {
        $valid = false;
        $phoneErr = "Last Name is required";
    }
    else {
        $phone = mysqli_real_escape_string($link, $_REQUEST['cus_phone_number']);
    }
    if (empty($_POST["cus_address"])) {
        $valid = false;
        $addressErr = "Address is required";
    }
    else {
        $address = mysqli_real_escape_string($link, $_REQUEST['cus_address']);
    }
    if (empty($_POST["image"])) {
        $valid = false;
        $imageErr = "Photo is required";
    }
    else {
        $image = $_FILE['image']['name'];
    }
    $target = "/images/".basename($image);
    $customer_id = date('mdyis');
    $admin_id = $_SESSION['admin_id'];

    if ($valid){
        $birth_date =  $birth_month ."/". $birth_day ."/". $birth_year;
        $sql = "INSERT INTO `customers` (`customer_id`, `admin_id`, `fname`, `mname`, `lname`, `birth_date`, `phone_number`, `address`, `image`) VALUES ('$customer_id', '$admin_id', '$fname', '$mname', '$lname', '$birth_date', '$phone', '$address', '$image')";

        if(mysqli_query($link, $sql)){
            echo "<div class='alert alert-success'>
            <strong>Success!</strong> You have been registered. You can login now.
            </div>";
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