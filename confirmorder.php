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
    <title>Art Gallery | Confirm Order | Confirmation for Orders</title>
    <!-- Bootstrap and custom style sheets -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <style>
    </style>
</head>

<body>
    <section id="confirmorder">
        <div class="container">
            <h4 class="display-3 text-center text-primary">Order Details</h4>
            <table class="table table-light table-bordered table-sm table-striped table-hover ">
                <thead>
                    <th>Sl No</th>
                    <th>Description</th>
                    <th>Price in INR</th>
                </thead>

                <tbody>
                    <?php $i=1; foreach ($_SESSION['cart'] as $key => $value) : ?>
                    <?php if(!$key == 0) :  ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $value['art_name']; ?></td>
                        <td><?php echo $value['art_price'];  ?></td>
                        <?php $i +=1; ?>
                    </tr>
                    <?php  endif;  ?>
                    <?php endforeach; ?>
                    <tr>
                        <td> </td>
                        <td class="display-4 text-success">Total Price</td>
                        <td>
                            <h1 class="display-5 text-danger font-weight-bolder"><?php echo $TOTAL_PRICE; ?> Rs/-</h1>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6"><a href="cart.php" class="btn btn-primary d-block"><i
                            class="fa fa-caret-left"></i><i class="fa fa-caret-left"></i> Cart</a></div>
                <div class="col-md-6">

                    <div class="dropdown">
                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown"
                            id="dropdown1">
                            Select Payment Mode
                        </button>

                        <ul class="dropdown-menu">
                            <li><a href="payment-cod-successfull.php">Cash on Deleviry</a></li>
                            <li><a href="online-payment/index.php">Online Payment</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <?php include "footer.php"; ?>


    </section>

    <!-- Jquery and Bootstrap js with custom JS -->
    <script src="js/popper.js"></script>
    <script src="js/jquery/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/script.js"></script>
</body>

</html>