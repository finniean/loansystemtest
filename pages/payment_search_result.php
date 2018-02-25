<?php $title='Search Customer' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php'); require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Search Result</h4>
			<div class="form-result">
	        	<table>
	         	<?php
	         		include($_SERVER[ 'DOCUMENT_ROOT']. '/php/payment_search_result.php');
	           	?>
	       		</table>
	       		<form>
	       			<button><a href="/pages/payment_new.php">Search Again</a></button>
	       		</form>
	        </div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>