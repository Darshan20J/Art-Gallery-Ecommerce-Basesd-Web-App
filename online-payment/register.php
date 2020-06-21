<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Art Gallery | Login | Get Most Artworks here at one place</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.css">
    <style>
    .information {
        width: 30rem !important;
    }
    </style>
</head>

<body>

    <div class="container">
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" ; method="post">
            <div class="information">
                <div class="form-group">
                    <label for="Username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>

                <div class="form-group">
                    <label for="atmno">ATM No</label>
                    <input type="text" name="atmno" id="atmno" class="form-control">
                </div>

                <div class="form-group">
                    <label for="cardno">Card No</label>
                    <input type="text" name="cardno" id="userncardnoame" class="form-control">
                </div>

                <div class="form-group">
                    <label for="expdate">Expiration Date</label>
                    <input type="date" name="expdate" id="expdate" class="form-control">
                </div>

                <div class="form-group">
                    <label for="balance">Balance</label>
                    <input type="text" name="balance" id="ba;ance" class="form-control">
                </div>
                <div class="text-center">
                    <input type="submit" name="submit" value="Submit" class="btn btn-danger">
                </div>
            </div>
        </form>

        <div class="text-center">
            <a href="../index.php" class="btn btn-secondary"><i class="fa fa-home"></i></a>
            <a href="../index.php" class="btn btn-secondary"><i class="fa fa-exit"></i></a>
        </div>
    </div>


    <script src="../js/jquery/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>

<!-- PHP -->

<?php 
    session_start();

    if(isset($_POST['submit']))  {
        $username = $_POST['username'];
        $atmno = $_POST['atmno'];
        $cardno = $_POST['cardno'];
        $expdate = $_POST['expdate'];
        $balance = $_POST['balance'];

        echo $username;
        echo $atmno;
        echo $cardno;
        echo $expdate;
        echo $balance;

            $id = $_SESSION['id'];

        $conn = new mysqli('localhost', 'root', '', 'artgallery');
        $query = "SELECT * FROM user_db Where username = '$username'"; 
        if($rawResult = mysqli_query($conn, $query)) {
          $rows = mysqli_num_rows($rawResult);
          $result = mysqli_fetch_assoc($rawResult);
        //   echo var_dump($result);

        //   echo var_dump($_SESSION);

        //   Register the User Details
        $conn = new mysqli('localhost', 'root', '', 'artgallery');
            $query = "INSERT INTO online_txn VALUES('','$id', '$atmno', '$cardno', '$expdate', '$balance' )";

            if(mysqli_query($conn, $query)) {
                include 'registered.php';
            } else {
                echo "Hey Invalid Data";
                echo var_dump($_SESSION['id']);
                echo $_SESSION['id'];
            }
        } else {
            echo "Error";
        }

        
    }
?>