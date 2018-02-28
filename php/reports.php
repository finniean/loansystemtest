<?php
require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');
$start_date = $end_date = $option = $history_date = $start_dateErr = $end_dateErr = $report_title = $report_header = $report_content = $report_footer = '';

$date_picker = "
<div class='form-group' style='margin-bottom: 10px;'>
	<label>History</label>
	<input type='radio' name='history' value='loan_history' checked> Loan History<br>
  	<input type='radio' name='history' value='payment_history'> Payment History
</div>
<div class='form-group'>
	<label>Start Date <span class='error'>* " .$start_dateErr. "</span></label>
	<input type='text' class='form-control' id='start_date' name='start_date'>
	<script>
	$(function() {
		$('#start_date').datepicker({ dateFormat: 'M/dd/yy' });
	});
	</script>
</div>
<div class='form-group'>
	<label>End Date <span class='error'>* " .$end_dateErr. "</span></label>
	<input type='text' class='form-control' id='end_date' name='end_date'>
	<script>
	$(function() {
		$('#end_date').datepicker({ dateFormat: 'M/dd/yy' });
	});
	</script>
</div>
<button type='submit' name='reports'>Seach</button>";

if (isset($_POST['reports'])) {
	$valid = true;
	if (empty($_POST["start_date"])) {
		$valid = false;
		$start_dateErr = "Date is required";
	}
	else {
		$start_date = mysqli_real_escape_string($link, $_REQUEST['start_date']);
	}
	if (empty($_POST["end_date"])) {
		$valid = false;
		$end_dateErr = "Date is required";
	}
	else {
		$end_date = mysqli_real_escape_string($link, $_REQUEST['end_date']);
	}
	if ($valid){
		if ($_POST['history'] == 'loan_history'){
			$sql = "SELECT * FROM `loans` WHERE `loan_date` BETWEEN '$start_date' AND '$end_date' ORDER BY `loan_date` DESC;" ;
			$result = mysqli_query($link, $sql);
			$report_title = "
			<form>
				<button type='submit' name='print' onclick='PrintDiv();'>Print Report</button>
			</form>
			<div id='divToPrint' class='form-result'>
				<table>
					<h1 align='center'>SME Loan System Loans History Report</h1>
					<h3 align='center'>Date From: " . $start_date . " To: " . $end_date . "</h3>
			";

			if (mysqli_num_rows($result)> 0) {
				$report_header = "
					<tr class='resultslabel'>
						<th>Loan ID</th>
						<th>Customer ID</th>
						<th>Loan Amount</th>
						<th>Loan Date</th>
						<th>Due Date</th>
					</tr>";
				while($row = mysqli_fetch_assoc($result)) {
				$report_content = "
					<tr class='resultsrow'>
						<td>" . $row["loan_id"] . "</td>
						<td>" . $row["customer_id"] . "</td>
						<td>₱ " . $row["loan_amount"] . "</td>
						<td>" . $row["loan_date"] . "</td>
						<td>" . $row["due_date"] . "</td>
					</tr>";
					}
			}
			$report_footer = "</table>
			</div>";
		}
		elseif ($_POST['history'] == 'payment_history'){
			$sql = "SELECT * FROM `payments` WHERE `payment_date` BETWEEN '$start_date' AND '$end_date' ORDER BY `payment_date` DESC;" ;
			$result = mysqli_query($link, $sql);
			$report_title = "
			<form>
				<button type='submit' name='print' onclick='PrintDiv();'>Print Report</button>
			</form>
			<div id='divToPrint' class='form-result'>
				<table>
					<h1 align='center'>SME Loan System Payments History Report</h1>
					<h3 align='center'>Date From: " . $start_date . " To: " . $end_date . "</h3>
			";

			if (mysqli_num_rows($result)> 0) {
				$report_header = "
					<tr class='resultslabel'>
						<th>Payment ID</th>
						<th>Customer ID</th>
						<th>Payment Amount</th>
						<th>Payment Date</th>
					</tr>";
				while($row = mysqli_fetch_assoc($result)) {
				$report_content = "
					<tr class='resultsrow'>
						<td>" . $row["payment_id"] . "</td>
						<td>" . $row["customer_id"] . "</td>
						<td>₱ " . $row["payment_amount"] . "</td>
						<td>" . $row["payment_date"] . "</td>
					</tr>";
					}
			}
			$report_footer = "</table>
			</div>";
		}
	}
}
?>