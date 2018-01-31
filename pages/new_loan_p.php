<?php $title='New Customer Loan' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>New Customer Loan</h4>
			<div id="loan_cus">
				<form id="loan_cus" action='/php/new_loan.php' method='post'>
					<div id="cus_cid">
						<label>Customer ID</label>
						<input type="text" name="cus_cid">
					</div>
					<button type="submit"  name="search">Search</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>