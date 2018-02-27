<?php $title='New Registration' ; include($_SERVER[ 'DOCUMENT_ROOT']. '/required/header.php'); include($_SERVER[ 'DOCUMENT_ROOT']. '/required/navigation.php');?>

<!-- Content -->
<div class="wrapper">
	<div class="container">
		<div class="content">
			<h4>Register New Customer</h4>
			<?php
			require($_SERVER[ 'DOCUMENT_ROOT']. '/php/connect.php');
			if (isset($_POST['upload'])) {
			  	// Get image name
			  	$image = $_FILES['image']['name'];
			  	// Get text

			  	// image file directory
			  	$target = "images/".basename($image);

			  	$sql = "INSERT INTO `customers` (image) VALUES ('$image')";
			  	// execute query
			  	mysqli_query($link, $sql);

			  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			  		$msg = "Image uploaded successfully";
			  	}else{
			  		$msg = "Failed to upload image";
			  	}
			  }
			  $result = mysqli_query($link, "SELECT * FROM customers");
			?>
			<!DOCTYPE html>
			<html>
			<head>
			<title>Image Upload</title>
			<style type="text/css">
			   #content{
			   	width: 50%;
			   	margin: 20px auto;
			   	border: 1px solid #cbcbcb;
			   }
			   form{
			   	width: 50%;
			   	margin: 20px auto;
			   }
			   form div{
			   	margin-top: 5px;
			   }
			   #img_div{
			   	width: 80%;
			   	padding: 5px;
			   	margin: 15px auto;
			   	border: 1px solid #cbcbcb;
			   }
			   #img_div:after{
			   	content: "";
			   	display: block;
			   	clear: both;
			   }
			   img{
			   	float: left;
			   	margin: 5px;
			   	width: 300px;
			   	height: 140px;
			   }
			</style>
			</head>
			<body>
			<div id="content">
			  <?php
			    while ($row = mysqli_fetch_array($result)) {
			      echo "<div id='img_div'>";
			      	echo "<img src='/uploads/".$row['image']."' >";
			      echo "</div>";
					$months = date("M/d/Y", strtotime('+2 months'));
					echo $months;
			    }
			  ?>
			  <form method="POST" action="test.php" enctype="multipart/form-data">
			  	<input type="hidden" name="size" value="1000000">
			  	<div>
			  	  <input type="file" name="image">
			  	</div>
			  	<div>
			  		<button type="submit" name="upload">POST</button>
			  	</div>
			  </form>
			</div>
			</body>
			</html>

		</div>
	</div>
</div>
<!-- Content -->

<?php include($_SERVER[ 'DOCUMENT_ROOT']. '/required/footer.php');?>