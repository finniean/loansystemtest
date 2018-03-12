<?php $title='Customer Loan' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');

if (empty($_SESSION['admin_id'])){
	header('Location:/index.php');
}
?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content clearfix">
			<h4>Reports</h4>
		    <div id='reports-form'>
		    	<form id="reports-form" action="/pages/reports_result.php" method="post">
					<div class='form-group' style='margin-bottom: 10px;'>
						<label>History</label>
						<input type='radio' name='history' value='loan_history' checked> Loan History<br>
					  	<input type='radio' name='history' value='payment_history'> Payment History
					</div>
					<div class='form-group'>
						<label>Start Date</label>
						<input type='text' class='form-control' id='start_date' name='start_date'>
					</div>
					<div class='form-group'>
						<label>End Date</label>
						<input type='text' class='form-control' id='end_date' name='end_date'>
					</div>
					<button type='submit' name='reports'>Seach</button>
		    	</form>
		    </div>
			<script type="text/javascript">     
				$(function() {
					$('#start_date').datepicker({ dateFormat: 'M/dd/yy' });
				});
				$(function() {
					$('#end_date').datepicker({ dateFormat: 'M/dd/yy' });
				});
			</script>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>