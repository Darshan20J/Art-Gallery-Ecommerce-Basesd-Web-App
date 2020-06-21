<?php
session_start();
	include "connection.php";

	if( isset($_SESSION['id']) && isset($_SESSION['username']) ) {

		if(isset($_GET['action'])) {

		$action = $_GET['action'];

		if($action == 'clearcart'){
			$_SESSION['cart'] = NULL;
			$value[0]= NULL;
			
		}

		if($action == 'add')
		{
			$art_id = $_GET['id'];
			$art_code = $_GET['code'];
			
		
		 if (mysqli_connect_error()){ die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error()); } else{
	    			$query = "SELECT * FROM arts WHERE id='$art_id' AND art_code='$art_code'";
					$res = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($res);

					if(empty($_SESSION['cart'])){
						$_SESSION['cart'][0]= NULL;
					}
					$item = array(
						"id"=>$row['id'],
						"art_name"=>$row['art_name'],
						"art_description"=>$row['art_description'],
						"art_type"=>$row['art_type'],
						"art_published_year"=>$row['art_published_year'],
						"art_code"=>$row['art_code'],
						"art_img"=>$row['art_img'],
						"art_price"=>$row['art_price'],
						"artist_id"=>$row['artist_id']
					);

					array_push($_SESSION['cart'], $item);
				}
    		}

    		if($_GET['action'] == 'remove'){
    			
    			$Array_Index = $_GET['index'];
    			unset($_SESSION['cart'][$Array_Index]);
    		}
    	}

	}else {
		header("Location: login.php?alert=please login");
	}
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Art Gallery | Cart | All Your Favourite Art is here!!</title>
		<!-- Bootstrap and custom style sheets -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
		
		
	</head>
	<body>
		
		
		
		
		

		<div class="container">
			<div class="row">
				
					<?php if(isset($_SESSION['cart'])) { 
							foreach ($_SESSION['cart'] as $key => $value) {  if($key == 0) { } else{ ?>
							<div class="col-md-4">	
				<div class="card my-2">
					<h6 class="card-header text-center"><?php echo $value['art_name']; ?></h6>
					<div class="card-img-top">
						<img src="img/collections/<?php echo $value['art_img']; ?>" class="img-fluid">
					</div>

					<div class="card-body">
						<h6 class="card-title">
								<?php echo $value['art_name']; echo " "; echo $value['art_published_year']; ?>
						</h6>

						<h6 class="card-subtitle text-muted">
							<?php echo $value['art_type'];  ?>
						</h6>

							<div class="card-text">
								<p class="lead">
									<?php echo $value['art_description']; ?>
									<p class="badge badge-primary badge-pill text-white">Price <?php echo $value['art_price']; ?> Rs/-</p>
								</p>
	                            <a 
	                            href="cart.php?action=remove&id=<?php echo $value['id']; ?>&code=<?php echo $value['art_code']; ?>&index=<?php echo $key; ?>" class="btn btn-danger text-white">Remove from Cart</a>
							</div>
					</div>
				</div>



				</div>
								<?php }
							}
						} ?>
				</div>
				
					<div class="container my-3">
						<div class="row">
						<div class="col-md-4">
							<a href="userloginfinal.php" class="btn btn-outline-primary d-block"><i class="fa fa-caret-left"></i><i class="fa fa-caret-left"></i> Back</a>
						</div>	
						<div class="col-md-4"><a href="cart.php?action=clearcart" class="btn btn-outline-danger d-block">Clear Cart</a></div>
						<div class="col-md-4">
							<?php if(!empty($_SESSION['cart'])):  ?>
								<a href="confirmorder.php" class="btn btn-outline-primary d-block"><i class="fa fa-caret-right"></i><i class="fa fa-caret-right"></i> Confirm Order</a>
							<?php endif; ?>
						</div>				
					</div>
				</div>
			</div>
		</div>
		
		
		<!-- Jquery and Bootstrap js with custom JS -->
		<script src="js/jquery/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/script.js"></script>
	</body>
	</html>