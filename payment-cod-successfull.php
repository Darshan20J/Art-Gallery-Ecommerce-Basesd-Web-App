<?php session_start(); 
$TOTAL_PRICE = 0; ?>



<?php 
	if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
		
		foreach ($_SESSION['cart'] as $key => $value) {
			$TOTAL_PRICE = $value['art_price'] + $TOTAL_PRICE;
			 
		}	$set =1;
	} else {
		header("Location: login.php?alert=please login");
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Art Gallery | Successfull | Cash On Delivery</title>
	<!-- Bootstrap and custom style sheets -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<link rel="stylesheet" type="text/css" href="css/order-confirmation.css">
	<style>
	</style>
</head>
<body>
	<section id="order-confirmed">
		<div class="container">
			<h4 class="display-3 text-center text-primary">Fill Out the Address</h4>
			

			<form action="order-on-the-way.php" method="post">
				<div class="form-group">
					<label for="address">City</label>
					<input class="form-control" type="text" name="city" id="city" required>
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input class="form-control" type="text" name="address" id="address" required>
				</div>

				<div class="form-group">
					<label for="zip">ZIP</label>
					<input class="form-control" type="text" name="zip" id="zip" required>
				</div>

				<input type="submit" value="Submit" class="btn btn-primary" id="confirm-order-btn">
			</form>
		</div>

		

		
	</section>
	<?php include "footer.php"; ?>

	<!-- Jquery and Bootstrap js with custom JS -->
	<script src="js/popper.js"></script>
	<script src="js/jquery/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/script.js"></script>
	<script src="js/order-confirmed.js"></script>
</body>
</html>


