<?php
require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

$date_now = date('M/d/Y');

$sql = "SELECT * FROM `loans` WHERE due_date = '$date_now' AND date_paid = 'Not yet paid'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result)> 0) { 
	echo "
	<tr class='resultslabel'>
		<th>Loan ID</th>
	   	<th>Customer ID</th>
	   	<th>Loan Amount</th>
	   	<th>Loan Date</th>
	   	<th>Due Date</th>
	   	<th>Options</th>
	</tr>"
	;
	while($row = mysqli_fetch_assoc($result)) { 
		echo "
	   	<tr class='resultsrow'>
	   		<td>" . $row['loan_id'] . "</td>
	   		<td>" . $row['customer_id']. "</td>
	       	<td>₱ " . $row['loan_amount']. "</td>
	       	<td>" . $row['loan_date']. "</td>
	       	<td>₱ " . $row['due_date'] . "</td>
	       	<td><a href='payment_cus.php?customer_id=". $row['customer_id'] ."'>Pay</a></td>
	   	</tr>"
	   	;
	}
}
else {
	echo "<div class='alert alert-success' role='alert'><p>No due loans today!</p></div>"
	; 
}
?>