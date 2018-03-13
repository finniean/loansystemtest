<?php
$customer_id = mysqli_real_escape_string($link, $_REQUEST['customer_id']);
$customer_fullname = mysqli_real_escape_string($link, $_REQUEST['customer_fullname']);

$sql = "SELECT * FROM `customers` WHERE customer_id = '$customer_id' ";

if (isset($customer_fullname)) {
	$sql .= "OR `fullname` = '$customer_fullname'";
}

$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result)> 0) {
	echo "
	<tr class='resultslabel'>
		<th>Customer ID</th>
		<th>Full Name</th>
	   	<th>Birthday</th>
	   	<th>Phone Number</th>
		<th>Balance</th>
		<th>Options</th>
	</tr>"
	;
	while($row = mysqli_fetch_assoc($result)) { 
		echo "
		<tr class='resultsrow'>
			<td>" . $row['customer_id'] . "</td>
			<td>" . $row['fullname']. "</td>
	       	<td>" . $row['birth_date']. "</td>
	       	<td>" . $row['phone_number']. "</td>
			<td>₱ " . $row['balance'] . "</td>
			<td><a href='/pages/payment_cus.php?customer_id=". $row['customer_id'] ."'>Payment</a></td>
		</tr>"
		;
	}
} 
else { 
	echo "<span class='error' style='font-size: 100%!important;'>
            0 Results
        </span>";
}
?>