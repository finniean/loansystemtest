<?php
	session_start();
	require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

	$username = $password = $invalidErr = '';

	if(isset($_POST['login'])){
        $valid = true;

        if (empty($_POST['username'])) {
            $valid = false;
            $invalidErr = 'Please input your credentials.';
        }

        else {
            $username = mysqli_real_escape_string($link, $_REQUEST['username']);
        }

        if (empty($_POST['password'])) {
            $valid = false;
            $invalidErr = 'Please input your credentials.';
        }

        else {
            $password = mysqli_real_escape_string($link, $_REQUEST['password']);
        }

        if ($valid) {
            $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($result);
            

            if(mysqli_num_rows($result)> 0) {
            	$_SESSION['admin_id'] = $row['admin_id'];
            	$_SESSION['firstname'] = $row['fname'];
                header('Location:/pages/search_cus.php');
            }

            else {
                $invalidErr = 'Email or Password is incorrect.';
            }
        }
	}
?>