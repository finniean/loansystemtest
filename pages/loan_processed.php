<?php $title='Loan Processed' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');

if (empty($_SESSION['admin_id'])){
	header('Location:/index.php');
}
// $_SESSION['loan_id'];
// $_SESSION['customer_id'];
// $_SESSION['fullname'];
// $_SESSION['loan_amount'] = $loan_amount;
// $_SESSION['interest'] = $interest;
// $_SESSION['loan_date'] = $date_now;
// $_SESSION['due_date'] = $due_date;
?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Successfully Processed</h4>
			<div class="customer_info">
				<div class='col2'>
					<label>Loan ID</label>
					<p><?php echo $_SESSION['loan_id']; ?></p>
					<label>Customer ID</label>
					<p><?php echo $_SESSION['customer_id']; ?></p>
					<label>Loan Amount</label>
					<p>₱ <?php echo $_SESSION['loan_amount']; ?></p>
				</div>
				<div class='col3'>
					<label>Interest (0.01%)</label>
					<p>₱ <?php echo $_SESSION['interest']; ?></p>
					<label>Loan Date</label>
					<p><?php echo $_SESSION['loan_date']; ?></p>
					<label>Due Date</label>
					<p><?php echo $_SESSION['due_date']; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');
unset($_SESSION['loan_id']);
unset($_SESSION['customer_id']);
unset($_SESSION['loan_amount']);
unset($_SESSION['interest']);
unset($_SESSION['loan_date']);
unset($_SESSION['due_date']);
?>