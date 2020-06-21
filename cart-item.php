<?php session_start(); ?>


<div class="card my-2">
    <h6 class="card-header text-center"><?php echo $_SESSION['cart']['art_name']; ?></h6>
    <div class="card-img-top">
        <img src="img/collections/<?php echo $_SESSION['cart']['art_img']; ?>" class="img-fluid">
    </div>
    <div class="card-body">
        <h6 class="card-title">
            <?php echo $_SESSION['cart']['art_name']; echo " "; echo $_SESSION['cart']['art_published_year']; ?>
        </h6>

        <h6 class="card-subtitle text-muted">
            <?php echo $_SESSION['cart']['art_type'];  ?>
        </h6>

        <div class="card-text">
            <p class="lead">
                <?php echo $_SESSION['cart']['art_description']; ?>
                <p class="badge badge-primary badge-pill text-white">Price <?php echo $_SESSION['cart']['art_price']; ?>
                    Rs/-</p>
            </p>
            <a href="cart.php?action=add&id=<?php echo $_SESSION['cart']['id']; ?>&code=<?php echo $row['art_code']; ?>"
                class="btn btn-danger text-white">Add to Cart</a>
        </div>
    </div>
</div>
</div>