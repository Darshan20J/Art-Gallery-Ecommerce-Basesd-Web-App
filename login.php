<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Art Gallery | Login | Get Most Artworks here at one place</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <style>
    body {
        background: url('img/img-2.jpeg');
    }

    .cover-window {
        background: rgba(10, 0, 0, 0.5);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /*			z-index: 9999;*/
    }

    header .fa {
        color: #008ed6;
        background-color: white;
        border-radius: 5px;
        padding: 5px;
    }
    </style>
</head>

<body>
    <div class="cover-window">
        <header>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-5">
                        <div class="container ">
                            <form action="" method="post" class="form p-3 bg-primary rounded-lg mt-5">
                                <div class="form-group">
                                    <label for="username" class="text-white">Username</label>
                                    <input class="form-control" type="text" name="username" placeholder="Username"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="Password" class="text-white">Password</label>
                                    <input class="form-control" type="password" name="password" placeholder="Password"
                                        id="pass-field" required>
                                </div>

                                <div class="form-group">
                                    <label for="" class="text-white">
                                        <input type="checkbox" onclick="passfun()" class="checkbox"> Show Password
                                    </label>
                                </div>

                                <button type="submit" name="login" class="btn btn-danger btn-block">Login</button>
                            </form>

                            <div class="text-center">
                                <a class="text-decoration-none" href="register.php">Don't have an account?</a>
                            </div>

                            <div class="text-center">
                                <a class="text-decoration-none" href="index.php">Back to homepage</a>
                            </div>
                        </div>
                    </div>
                    <div class="col d-none d-lg-block text-white">
                        <h2 class="text-center">Artist's <strong>gallery</strong></h2>
                        <div class="d-flex">
                            <div class="p-4 align-self-start">
                                <i class="fa fa-envelope fa-2x"></i>
                            </div>
                            <div class="p-4 align-self-end">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, veniam!</p>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="p-4 align-self-start">
                                <i class="fa fa-envelope fa-2x"></i>
                            </div>
                            <div class="p-4 align-self-end">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, veniam!</p>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="p-4 align-self-start">
                                <i class="fa fa-envelope fa-2x"></i>
                            </div>
                            <div class="p-4 align-self-end">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, veniam!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>




    <script src="js/jquery/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/script.js"></script>
</body>

</html>






<?php 
	session_start();
	if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
	

		if (!empty($username) || !empty($password) ) {
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
				$row  = mysqli_fetch_array($res);
				 
				 if ($count == 1) {
					$checkpass = "SELECT * From user_db Where username = '$username' and upassword = '$password'";
					$res1 = mysqli_query($conn, $checkpass);
					$count1 = mysqli_num_rows($res1);
					 
					    if ($count1 == 1) {
							$_SESSION["id"] = $row['id'];
									$_SESSION["username"] = $row['username'];
									$_SESSION['email'] = $row['email'];
							echo "<script type=\"text/javascript\">window.alert('Login Successful.');window.location.href= 'userloginfinal.php';</script>";
            } else {
                echo "<script type=\"text/javascript\">window.alert('Incorrect Password.');window.location.href= 'login.php';</script>";
            }

		} else {
			echo "<script type=\"text/javascript\">window.alert('User name does not exist!!');window.location.href= 'login.php';</script>";
        }
	}
		} else {
 echo "<script type=\"text/javascript\">window.alert('All fields are required!!');window.location.href= 'login.php';</script>";
}
	}
?>