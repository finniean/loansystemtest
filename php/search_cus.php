<?php $title='Search Customer' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php'); require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');

$cus_cid=mysqli_real_escape_string($link, $_REQUEST['cus_cid']);
$sql="SELECT * FROM customers
WHERE cid LIKE '%$cus_cid%' ";
$result=mysqli_query($link, $sql);
?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Search Result</h4>
			<div class="form-result">
	        	<table>
	         	<?php 
	         	if (mysqli_num_rows($result)> 0) { echo "
					<tr>
					   <th>First Name</th>
					   <th>Middle Name</th>
					   <th>Last Name</th>
					</tr>";
				while($row = mysqli_fetch_assoc($result)) { echo "
	               	<tr class='resultsrow'>
	               		<td>" . $row['fname']. "</td>
	                   	<td>" . $row['mname']. "</td>
	                   	<td>" . $row['lname']. "</td>
	                   	<td><a href='view_cus.php?cid=". $row['cid'] ."'>View</td>
	               </tr>"; } } else { echo "<div class='alert alert-success' role='alert'><p>0 results</p></div>"; } ?>
	       		</table>
	       		<a href="/pages/search_cus_p.php">Search Again</a>
	        </div>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>