<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Art Gallery | Register and get Artist's Artwork</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="css/stylesheet.css">

</head>

<body>
	<section id="register" class="p-5">
		<div class="container">
			<div class="row">
			<div class="col">
			<h2 class="display-3 bg-black text-center text-muted">Art Gallery</h2>
				<marquee behavior="scroll" direction="up" scrollamount="5" class="p-5">
					<ol class="list-unstyled text-secondary">
						<li class="p-2 m-1 lead">Get a <strong class="text-primary">exiciting</strong> gifts for Two Young Girls at the Piano by <strong class="text-primary">Pierre-Auguste
												Renoir</strong> during delivery!!!</li>
						<li class="p-2 m-1 lead"><strong class="text-primary">Free shipping</strong> on ,<strong class="text-primary">Andy Warhol's </strong>Paintings...</li>
						<li class="p-2 m-1 lead">Buy two <strong class="text-primary">Leonardo Da Vinci's</strong> painting and get a gift voucher worth<span class="text-white"> Rs. 500</span> during delivery .</li>
					</ol>
				</marquee>
			</div>
				<div class="col-md-5">

					<div class="continer">
						<h2 class="display-4 text-center text-light reg-text"> Register Here</h2>
						<form action="register.php" method="post" class="mb-3 p-3 rounded-sm" id="register-form">

							<div class="form-group">
								<input class="form-control" type="text" name="username" placeholder="User name" required>
							</div>

							<div class="form-group">
								<input class="form-control" name="password" type="password" name="password" placeholder="Password" id="pass-field" onkeyup="this.value = this.value.toLowerCase();" required>
							</div>

							<div class="form-group">
								<label for="">
									<input  type="checkbox" onclick="passfun()" class="checkbox"><span class="text-white"> Show Password</span></label>
							</div>

							
							<div class="form-group">
								<input class="form-control" type="email" name="email" placeholder="User email" onkeyup="this.value = this.value.toLowerCase();" required>
							</div>

							<div class="text-center">
								<button class="btn btn-primary btn-block" type="submit" name="getregister">Register</button>
							</div>
						</form>

						<div class="text-center">
							<p class="text-white">Already Registered? <a class="text-decoration-none" href="login.php">Login</a></p>
						</div>

						<div class="text-center">
							<a class="text-decoration-none" href="index.php">Back to homepage</a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<footer id="footer" class="bg-dark text-secondary p-5">
		<div class="container">
			<div class="row">
				<div class="col-md-4 ">
					<div class="d-flex flex-column">
						<div id="contact">
							<h6 >Contat Us</h6>
							<ul class="list-unstyled">
								<li><i class="fa fa-phone pr-3"></i> 9866579842</li>
								<li><i class="fa fa-envelope pr-3"></i>  jdoe@mail.com</li>
							</ul>
						</div>
					</div>
					
				</div>
				<div class="col-md-4">
					<div class="d-flex flex-column">
						<div id="address">
							<h6 >Address</h6>
							<p>SDM College Honnavar 581334</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="d-flex flex-column">
						<div id="developer">
							<h6 >Developer</h6>
							<p>Darshan Hulswar </p>
						</div>
					</div>
				</div>
			</div>
			<p class="text-sm-center text-secondary">Copyright &copy; reserved to Darshan. Designed with <i class="fa fa-heart text-danger"></i></p>
		</div>
	</footer>
	<script src="js/jquery/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/script.js"></script>
</body>
</html>





<?php
if(isset($_POST['getregister']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if (!empty($username) || !empty($password) || !empty($email)  )
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "artgallery";
    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_errno() .') '
        . mysqli_connect_error());
    } else {
        
        $checkuser = "SELECT * From user_db Where username = '$username'";
        $res = mysqli_query($conn, $checkuser);
        $count = mysqli_num_rows($res);
         if ($count == 0) {
            $totable = "INSERT INTO user_db (username, upassword, email) VALUES ('$username', '$password', '$email')";
            mysqli_query($conn, $totable);
	   
            echo "<script type=\"text/javascript\">window.alert('Registration Successful. For Security Confirmation You have to Login to your account');window.location.href= 'login.php';</script>"; 
           
        } else {
		echo "<script type=\"text/javascript\">window.alert('User name already exists!!');window.location.href= 'register.php';</script>"; 
        }
    }
}

else {
    echo "<script type =\"text/javascript\">;
    window.alert('All fields are required!!');
    window.location.href= 'register.php';
    </script>";
}
}
?>
