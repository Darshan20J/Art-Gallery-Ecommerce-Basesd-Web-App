<?php 
$host = 'localhost';
	$dbusername = "root";
			$dbpassword = "";
			$dbname = "artgallery";
			
			// Create connection
    		$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
			
			if(mysqli_connect_errno()){
				echo "Error";
			}
			?>