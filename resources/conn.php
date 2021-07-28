<?php
/* Database connection settings */
	$servername = "localhost";
    $username = "syahmi_user1";		//put your phpmyadmin username.(default is "root")
    $password = "XgZb8]?{Xn3s";			//if your phpmyadmin has a password put it here.(default is "root")
    $dbname = "syahmi_muhammad_kidzone";
    
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }
?>