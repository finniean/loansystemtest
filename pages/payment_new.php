<?php $title='Customer Payment' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');

if (empty($_SESSION['admin_id'])){
	header('Location:/index.php');
}
?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Customer Payment</h4>
			<div id="payment_cus">
				<form id="payment_cus" action='/pages/payment_search_result.php' method='post'>
					<div id="cus_cid" class="form-group">
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