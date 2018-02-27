<?php
$history = "SELECT * FROM `payments` WHERE `payments`.`customer_id` = '$customer_id' ORDER BY payment_date DESC LIMIT 0, 3";
$his = mysqli_query($link, $history);

if (mysqli_num_rows($his)> 0) {
	echo "
	<h4>Payment History</h4>
	"
	;
	while ($row = mysqli_fetch_array($his)) {
		echo "
			<tr>
				<td>
					<p>Paid ₱ ".$row['payment_amount']." on the date ".$row['payment_date']." </p>
				</td>
			</tr>
		"
		;
	}
}
?>