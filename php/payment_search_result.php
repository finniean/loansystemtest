<?php $title='Search Customer' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php'); require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

$customer_id = mysqli_real_escape_string($link, $_REQUEST['customer_id']);

$sql = "SELECT * FROM customers
WHERE customer_id LIKE '%$customer_id%' ";
$result = mysqli_query($link, $sql);
?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Search Result</h4>
			<div class="form-result">
	        	<table>
	         	<?php 
	         	if (mysqli_num_rows($result)> 0) { 
	         		echo "
					<tr>
					   <th>Customer ID</th>
					   <th>Middle Name</th>
					   <th>Last Name</th>
					</tr>";
					while($row = mysqli_fetch_assoc($result)) { 
						echo "
		               	<tr class='resultsrow'>
		               		<td>" . $row['customer_id']. "</td>
		                   	<td>" . $row['fname']. "</td>
		                   	<td>" . $row['lname']. "</td>
		                   	<td>" . $row['balance']. "</td>
		                   	<td><a href='cus_payment.php?customer_id=". $row['customer_id'] ."'>New Loan</td>
		               </tr>";
		           	}
	           	} 
	           	else { 
	           		echo "<div class='alert alert-success' role='alert'><p>0 results</p></div>"; 
	           	}
	           	?>
	       		</table>
	       		<a href="/pages/new_loan_p.php">Search Again</a>
	        </div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>