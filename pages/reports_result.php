<?php $title='Customer Loan' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');

if (empty($_SESSION['admin_id'])){
	header('Location:/index.php');
}
?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content clearfix">
			<h4>Reports Results</h4>
			<form>
				<button type='submit' name='print' onclick='PrintDiv();'>Print Report</button>
			</form>
		    <div id='divToPrint' class='form-result'>
				<table>
					<?php
						include($_SERVER[ 'DOCUMENT_ROOT']. '/php/reports_result.php');
					?>
				</table>
			</div>
			<script type="text/javascript">     
				function PrintDiv() {    
					var divToPrint = document.getElementById('divToPrint');
					var popupWin = window.open('Test', '_blank', 'width=500,height=500');
					popupWin.document.open();
					popupWin.document.write('<html><head><title>SME Loan System - Print Report</title><style type="text/css" media="print">table {width: 100%; border-collapse: collapse;}tr.resultsrow td,tr.resultslabel th {border: black 1px solid; padding: 5px 10px;}th {text-align: left;}</style></head><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
					popupWin.document.close();
				}
			</script>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>