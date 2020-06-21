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
    
    $id = $_SESSION['id'];
 ?>


<?php 
    if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
        
        $conn = new mysqli('localhost', 'root', '', 'artgallery');
        if($conn) {
            $query = "SELECT balance FROM online_txn WHERE userid = '$id'";

            if($result = mysqli_query($conn, $query)) {
                $row = mysqli_fetch_assoc($result);
                echo 'Balance frm DB'.$row['balance'];
            } else {
                echo "Error";
            }

        } else {
            echo "Error";
        }
    
    }

 ?>