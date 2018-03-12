<?php $title='Loan Processed' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');

if (empty($_SESSION['admin_id'])){
	header('Location:/index.php');
}
?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Successfully Processed</h4>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>