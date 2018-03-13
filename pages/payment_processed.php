<?php $title='Payment Processed' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');

if (empty($_SESSION['admin_id'])){
	header('Location:/index.php');
}
?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Successfully Processed</h4>
			<div class="customer_info">
				<div class='col2'>
					<label>Payment ID</label>
					<p><?php echo $_SESSION['payment_id']; ?></p>
					<label>Customer ID</label>
					<p><?php echo $_SESSION['customer_id']; ?></p>
					<label>Payment Amount</label>
					<p>₱ <?php echo $_SESSION['payment_amount']; ?></p>
				</div>
				<div class='col3'>
					<label>Current Balance</label>
					<p>₱ <?php echo $_SESSION['balance']; ?></p>
					<label>Payment Date</label>
					<p><?php echo $_SESSION['payment_date']; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>