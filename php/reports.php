<?php
$start_date = $end_date = $option = $history_date = $start_dateErr = $end_dateErr = $report_title = $report_header = $report_content = $report_footer = '';

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
		$history = mysqli_real_escape_string($link, $_REQUEST['history']);
		header('Location:/pages/reports_result.php');
	}
}
?>