<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Art Gallery | Home | Get Most Artworks here at one place</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand">Art Gallery</a>
            <button class="navbar-toggler" data-target="#navigation" data-toggle="collapse"><span
                    class="navbar-toggler-icon"></span></button>

            <div id="navigation" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <?php if(isset($_SESSION['username'])): ?>
                    <li class="nav-item"><a class="nav-link text-uppercase"><?php echo $_SESSION['username']; ?></a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item"><a href="cart.php?code=empty" class="nav-link text-uppercase">YOUR CART</a>
                    </li>
                    <li class="nav-item"><a class="nav-link text-uppercase" href="logout.php"
                            onclick="return confirm('are you sure you want to logout?');">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="notification">
        <div class="dark-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <marquee behavior="scroll" direction="up" scrollamount="2" class="text-secondary lead">

                            <ol class="list-group list-style-none">
                                <li class="lead mb-3"><span class="text-white">Get</span> an exiciting gifts for Two
                                    Young Girls at the Piano by <strong
                                        class="text-primary">Pierre-&nbsp;Auguste-&nbsp;Renoir&nbsp;</strong>
                                    during delivery!!!</li>

                                <li class="lead mb-3"><strong class="text-primary">Free</strong> shipping on <strong
                                        class="text-primary">Andy Warhol's</strong> Paintings...</li>

                                <li class="lead mb-3"><span class="text-white">Buy two </span><strong
                                        class="text-primary">Leonardo Da Vinci's</strong> painting and get a <span
                                        class="text-primary">gift</span> voucher worth <strong class="text-primary">Rs.
                                        500</strong> during delivery.</li>
                            </ol>
                        </marquee>
                    </div>

                    <div class="col-md-7 pl-3">
                        <div class="text-center brand-name">
                            <h2 class="text-large brand-name">ART</h2>
                            <span class=" rotatei display-1 mr-1">G</span>
                            <span class=" rotatei display-1 mr-1">a</span>
                            <span class=" rotatei display-1 mr-1">l</span>
                            <span class=" rotatei display-1 mr-1">l</span>
                            <span class=" rotatei display-1 mr-1">e</span>
                            <span class=" rotatei display-1 mr-1">r</span>
                            <span class=" rotatei display-1 mr-1">y</span>
                            <p class="lead text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-primary text-white mb-4">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="more" class="bg-light my-5">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-7 border-right border-success pr-4">
                    <div class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner rounded-sm">
                            <div class="carousel-item active">
                                <img src="img/img-1.jpeg" class="img-fluid">
                            </div>
                            <div class="carousel-item">
                                <img src="img/img-2.jpeg" class="img-fluid">
                            </div>
                            <div class="carousel-item">
                                <img src="img/img-1.jpeg" class="img-fluid">
                            </div>
                            <div class="carousel-item">
                                <img src="img/img-1.jpeg" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="text-center ml-2">
                        <h2 class="display-4">More Arts with amazing offer</h2>
                        <p class="lead">Buy More Arts on Our Site!!</p>

                        <a href="#" class="btn btn-outline-danger">Shop Now</a>
                        <a href="range.php" class="btn btn-outline-danger">Shop By Price</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include 'arts.php'; ?>
    <?php include 'about.php'; ?>
    <?php include 'footer.php'; ?>


    <!-- Jquery and Bootstrap js with custom JS -->
    <script src="js/jquery/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/script.js"></script>
</body>

</html>