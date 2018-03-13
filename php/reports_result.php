<?php
require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

$start_date = mysqli_real_escape_string($link, $_REQUEST['start_date']);
$end_date = mysqli_real_escape_string($link, $_REQUEST['end_date']);
$history = mysqli_real_escape_string($link, $_REQUEST['history']);

if ($history == 'loan_history'){
	$loanhis = "SELECT * FROM `loans` WHERE `loan_date` BETWEEN '$start_date' AND '$end_date' ORDER BY `loan_date` DESC";
	$loanhistory = mysqli_query($link, $loanhis);

	if (mysqli_num_rows($loanhistory)> 0) {
		echo "
			<h1 align='center'>SME Loan System Loans History Report</h1>
			<h3 align='center'>Date From: " . $start_date . " To: " . $end_date . "</h3>
			<tr class='resultslabel'>
				<th>Loan ID</th>
				<th>Customer ID</th>
				<th>Loan Amount</th>
				<th>Loan Date</th>
				<th>Due Date</th>
				<th>Date Paid</th>
			</tr>";
	while($row = mysqli_fetch_assoc($loanhistory)) {
		echo "
		<tr class='resultsrow'>
			<td>" . $row["loan_id"] . "</td>
			<td>" . $row["customer_id"] . "</td>
			<td>₱ " . $row["loan_amount"] . "</td>
			<td>" . $row["loan_date"] . "</td>
			<td>" . $row["due_date"] . "</td>
			<td>" . $row["date_paid"] . "</td>
		</tr>";
		}
	}
	else { 
		echo "<span class='error' style='font-size: 100%!important;'>
	            0 Results
	        </span>";
	}
}

elseif ($history == 'payment_history'){
	$paymenthis = "SELECT * FROM `payments` WHERE `payment_date` BETWEEN '$start_date' AND '$end_date' ORDER BY `payment_date` DESC";
	$payhis = mysqli_query($link, $paymenthis);

	if (mysqli_num_rows($payhis)> 0) {
		$report_header = "
			<tr class='resultslabel'>
				<th>Payment ID</th>
				<th>Customer ID</th>
				<th>Payment Amount</th>
				<th>Payment Date</th>
			</tr>";
		while($row = mysqli_fetch_assoc($payhis)) {
		$report_content = "
			<tr class='resultsrow'>
				<td>" . $row["payment_id"] . "</td>
				<td>" . $row["customer_id"] . "</td>
				<td>₱ " . $row["payment_amount"] . "</td>
				<td>" . $row["payment_date"] . "</td>
			</tr>";
		}
	}
	else {
		echo "<span class='error' style='font-size: 100%!important;'>
	            0 Results
	        </span>";
	}
}
?>