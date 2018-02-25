<?php
$history = "SELECT * FROM `loans` WHERE `loans`.`customer_id` = '$customer_id'";
$his = mysqli_query($link, $history);

if (mysqli_num_rows($his)> 0) {
	echo "
	<h4>Loan History</h4>
	"
	;
	while ($row = mysqli_fetch_array($his)) {
		echo "
			<tr>
				<td>
					<p>Loaned ₱ ".$row['loan_amount']." on the date ".$row['loan_date']." </p>
				</td>
			</tr>
		"
		;
	}
}
?>