<?php $title='Customer Profile' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php'); require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Customer Profile</h4>
			<?php
			$customer_id = $_GET['customer_id'];

			$sql = "SELECT * FROM `customers`
				WHERE customer_id = '$customer_id'";
			$result = mysqli_query($link, $sql);

			if (mysqli_num_rows($result)> 0) {
				while ($row = mysqli_fetch_array($result)) {
					echo "
						<td>" . $row['fname']. "</td>
	                   	<td>" . $row['mname']. "</td>
	                   	<td>" . $row['lname']. "</td>
						<img src='/images/".$row['image']."' >
					";
		        }
		    }
		    ?>
		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>