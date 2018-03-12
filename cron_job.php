<?php
require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

$sql = "SELECT * FROM loans WHERE due_date != 'No existing loan balance'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result)) {

	while($row = mysqli_fetch_array($result)) {
		$loan_date = $row['loan_date'];
		$loan_amount = $row['loan_amount'];
		$current_date = date('05/12/Y');

		$datetime1 = new DateTime($loan_date) ;
		$datetime2 = new DateTime($current_date) ;

		$interval = $datetime1->diff($datetime2);
	    $diff = $interval->format('%m');
		if($diff >= 1) {
			$calc = $loan_amount * 0.01;
			echo $calc."/";
		}
	}
}
?>