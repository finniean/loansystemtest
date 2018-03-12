<?php
$customer_id = mysqli_real_escape_string($link, $_REQUEST['customer_id']);
$customer_fname = mysqli_real_escape_string($link, $_REQUEST['customer_fname']);
$customer_mname = mysqli_real_escape_string($link, $_REQUEST['customer_mname']);
$customer_lname = mysqli_real_escape_string($link, $_REQUEST['customer_lname']);

$sql = "SELECT * FROM `customers` WHERE customer_id = '$customer_id' ";

// if (isset($customer_fname)) {
// 	$sql .= "OR `fname` = '$customer_fname'";
// }
// if (isset($customer_mname)) {
// 	$sql .= "OR `mname` LIKE '$customer_mname'";
// }
// if (isset($customer_lname)) {
// 	$sql .= "OR `lname` LIKE '$customer_lname'";
// }

$result = mysqli_query($link, $sql);



if (mysqli_num_rows($result)> 0) { 
	echo "
	<tr class='resultslabel'>
		<th>Customer ID</th>
	   	<th>First Name</th>
	   	<th>Middle Name</th>
	   	<th>Last Name</th>
	   	<th>Balance</th>
	   	<th>Options</th>
	</tr>"
	;
	while($row = mysqli_fetch_assoc($result)) { 
		echo "
	   	<tr class='resultsrow'>
	   		<td>" . $row['customer_id'] . "</td>
	   		<td>" . $row['fname']. "</td>
	       	<td>" . $row['mname']. "</td>
	       	<td>" . $row['lname']. "</td>
	       	<td>₱ " . $row['balance'] . "</td>
	       	<td><a href='view_cus.php?customer_id=". $row['customer_id'] ."'>View</a></td>
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