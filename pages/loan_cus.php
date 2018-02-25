<?php $title='Customer Loan' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Customer Loan</h4>
			<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/php/loan_cus.php');?>
		    <div id='loan_form'>
		    	<form id='loan' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
		    		<?php echo $customer_info; ?>
		    	</form>
		    </div>
		    <div class="clearfix">
			    <div class="loan_history">
				    <?php include($_SERVER[ 'DOCUMENT_ROOT']. '/php/loan_history.php');?>
				</div>
				<div class="payment_history">
				    <?php include($_SERVER[ 'DOCUMENT_ROOT']. '/php/payment_history.php');?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>