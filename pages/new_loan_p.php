<?php $title='New Customer Loan' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>New Customer Loan</h4>
			<div id="loan_cus">
				<form id="loan_cus" action='/php/loan_search_result.php' method='post'>
					<div id="customer_id">
						<label>Customer ID</label>
						<input type="text" name="customer_id">
					</div>
					<button type="submit"  name="search">Search</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>