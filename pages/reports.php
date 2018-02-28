<?php $title='Customer Loan' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Reports</h4>
			<?php
				include($_SERVER[ 'DOCUMENT_ROOT']. '/php/reports.php');
			?>
		    <div id='reports-form'>
		    	<form id="reports-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<?php echo $date_picker ?>
		    	</form>
		    </div>
			<?php
			echo $report_title;
			echo $report_header;
			echo $report_content;
			echo $report_footer;
			?>
			<script type="text/javascript">     
				function PrintDiv() {    
					var divToPrint = document.getElementById('divToPrint');
					var popupWin = window.open('', '_blank', 'width=500,height=500');
					popupWin.document.open();
					popupWin.document.write('<html><head><style type="text/css" media="print">tr.resultsrow td {border-bottom: black 1px solid;}th {text-align: left;}</style></head><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
					popupWin.document.close();
				}
			</script>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>