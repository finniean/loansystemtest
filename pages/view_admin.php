<?php $title='Profile' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');

if (empty($_SESSION['admin_id'])){
	header('Location:/index.php');
}
?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Admin Profile</h4>
			<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/php/view_admin.php');?>
		    <div id='admin_profile'>
		    	<form id='admin_profile' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
		    		<?php echo $admin_info; ?>
		    	</form>
		    </div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>