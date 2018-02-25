<?php
$customer_id = mysqli_real_escape_string($link, $_REQUEST['customer_id']);

$sql = "SELECT * FROM customers
	WHERE customer_id LIKE '%$customer_id%' ";

$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result)> 0) {

echo "
	<tr class='resultslabel'>
		<th>Customer ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Balance</th>
		<th>Options</th>
	</tr>"
;
	while($row = mysqli_fetch_assoc($result)) { 
		echo "
			<tr class='resultsrow'>
				<td>" . $row['customer_id'] . "</td>
				<td>" . $row['fname'] . "</td>
				<td>" . $row['lname'] . "</td>
				<td>₱ " . $row['balance'] . "</td>
				<td><a href='payment_cus.php?customer_id=". $row['customer_id'] ."'>New Loan</td>
			</tr>"
		;
	}
} 
else { 
	echo "<div class='alert alert-success' role='alert'><p>0 results</p></div>"; 
}
?>