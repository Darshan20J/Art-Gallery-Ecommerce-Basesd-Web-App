<?php
        

		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "artgallery";
			
		// Create connection
		$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
			
		 if (mysqli_connect_error()){
		 	die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
    		} else {
    			$query = "SELECT * FROM arts";

    			$result = mysqli_query($conn, $query);
    			
    		}

    ?>

<section id="arts" class="bg-light p-5">
    <div class="container">
        <h2 class="text-center">Modern Arts</h2>
        <div class="row">

            <?php while($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col-md-4">
                <div class="card my-2">
                    <h6 class="card-header text-center"><?php echo $row['art_name']; ?></h6>
                    <div class="card-img-top" id="image-modal">
                        <img src="img/collections/<?php echo $row['art_img']; ?>" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">
                            <?php echo $row['art_name']; echo " "; echo $row['art_published_year']; ?>
                        </h6>

                        <h6 class="card-subtitle text-muted">
                            <?php echo $row['art_type'];  ?>
                        </h6>

                        <div class="card-text">
                            <p class="lead">
                                <?php echo $row['art_description']; ?>
                                <p class="badge badge-primary badge-pill text-white">Price
                                    <?php echo $row['art_price']; ?> Rs/-</p>
                            </p>
                            <a href="cart.php?action=add&id=<?php echo $row['id']; ?>&code=<?php echo $row['art_code']; ?>"
                                class="btn btn-danger text-white">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>

        </div>
        <p class="text-center lead text-success">For more arts like classic and tech check it on shop more link on above
            page</p>
    </div>
</section>