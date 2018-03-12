<?php
$history = "SELECT * FROM `loans` WHERE `loans`.`customer_id` = '$customer_id' ORDER BY loan_date DESC LIMIT 0, 3";
$his = mysqli_query($link, $history);
if (mysqli_num_rows($his)> 0) {
	echo "
	<h4>Loan History</h4>
	"
	;
	while ($row = mysqli_fetch_array($his)) {
		$paid_date = $row['date_paid'];
		$paid = '';
		if ($paid_date != 'Not yet paid') {
			$paid = " fully paid on the date ".$row['date_paid']."";
		}
		else {
			$paid = " is not yet paid";
		}
		echo "
			<tr class='resultsrow'>
				<td>
					<p>Loaned ₱ ".$row['loan_amount']." on the date ".$row['loan_date'].$paid.".</p>
				</td>
			</tr>
		"
		;
	}
}
?>