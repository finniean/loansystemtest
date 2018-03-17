<?php $title='Customer Loan' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');

if (empty($_SESSION['admin_id'])){
	header('Location:/index.php');
}
?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Customer Loan</h4>
			<div id="loan_cus">
				<form id="loan_cus" action='/pages/loan_search_result.php' method='post'>
					<div id="customer_id" class="form-group">
						<label>Customer ID</label>
						<input type="text" name="customer_id">
					</div>
					<div id="cus_cid" class="form-group">
						<label>Full Name</label>
						<input type="text" name="customer_fullname">
					</div>
					<button type="submit"  name="search">Search</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>