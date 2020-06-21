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
	
	.just-for-style-class {
		height: 100vh;
		background: url('img/successfull-bg.jpg');
		background-size: cover;
		background-position: center;
	}

	#order-shipped {
		height: 100vh;
	}

	#name {
		text-transform: uppercase !important;
		font-weight: bolder !important;
	}

	#company-name {
		font-weight: bolder;
	}

	.cenjus {
		padding-top: 90px ;
	}
	</style>
</head>
<body>
	<div class="just-for-style-class">
		<div class="dark-overlay">
			<section id="order-shipped">
		<div class="container">
			<div class="cenjus">
				<p class="display-3 text-center text-primary">Hello <span id="name"><?php echo $_SESSION['username']?></span> </p>
			<p class="display-3 text-center text-primary">your order Shipped right away!! From our</p>
			<p class="display-3 text-center text-danger"><span id="company-name">Art-Gallery Inc. 2020 😊</span></p> 
			</div>
		</div>
		</div>
	</section>
	</div>
	<?php include "footer.php"; ?>

	<!-- Jquery and Bootstrap js with custom JS -->
	<script src="js/popper.js"></script>
	<script src="js/jquery/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/script.js"></script>
	<script src="js/order-confirmed.js"></script>
</body>
</html>


