<?php $title='Dashboard' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php'); require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

if (empty($_SESSION['admin_id'])){
	header('Location:/index.php');
}
?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Due Loans</h4>
			<div class="form-result">
	        	<table>
	         	<?php
	         		include($_SERVER[ 'DOCUMENT_ROOT']. '/php/due_loans.php');
	           	?>
	       		</table>
	        </div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>