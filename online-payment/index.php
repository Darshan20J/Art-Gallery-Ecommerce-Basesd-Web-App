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

<!-- Online Payment -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Art Gallery | Confirm Order | Confirmation for Orders</title>
    <!-- Bootstrap and custom style sheets -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
</head>

<body>
    <div class="container">
        <h1 class="display-4"><?php echo $_SESSION['id']; ?></h1>

        <h1 class="display-4"><?php echo $_SESSION['username'];?></h1>
        <h2 class="text-danger"><?php echo $TOTAL_PRICE; ?></h2>
        <h2 class="text-danger display-5"><?php  ?></h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 ">
                <div class="p-5">
                    <div class="text-center">
                        <a href="proceed-to-payment.php" class="btn btn-warning btn-lg">Pay <i
                                class="fa fa-dollar"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 ">
                <div class="p-5">
                    <div class="text-center">
                        <a href="register.php" class="btn btn-warning btn-lg">Register Here!! To Make a Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../footer.php"; ?>


    <!-- </section> -->

    <!-- Jquery and Bootstrap js with custom JS -->
    <script src="../js/popper.js"></script>
    <script src="../js/jquery/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>