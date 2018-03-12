<?php $title='Customer Profile' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');

if (empty($_SESSION['admin_id'])){
	header('Location:/index.php');
}
?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Customer Profile</h4>
			<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/php/view_cus.php');?>
		    <div id='customer_profile'>
		    	<form id='customer_profile' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
		    		<?php 
		    			echo $customer_info;
		    		?>
		    	</form>
		    </div>
		    <div class="clearfix">
			    <div class="loan_history">
			    	<table>
			    		<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/php/loan_history.php');?>
			    	</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>