<?php $title='Edit Customer Profile' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');

if (empty($_SESSION['admin_id'])){
	header('Location:/index.php');
}
?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Edit Customer Profile</h4>
			<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/php/edit_cus.php');?>
		    <div id='customer_profile'>
		    	<form id='customer_profile' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
		    		<?php 
		    			echo $customer_info;
		    		?>
		    		<button type="submit"  name="delete" style="background: red !important;">Delete</button>
		    		<button type="submit"  name="edit">Edit</button>
		    	</form>
		    </div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>