<?php $title='Search Customer' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Search Customer</h4>
			<div id="search_cus">
				<form id="search_cus" action='/pages/cus_search_result.php' method='post'>
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