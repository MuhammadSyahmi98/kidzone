<?php
/* Database connection settings */
	$servername = "localhost";
    $username = "muhammad_user1";		//put your phpmyadmin username.(default is "root")
    $password = "H89EPXkT^^m4";			//if your phpmyadmin has a password put it here.(default is "root")
    $dbname = "muhammad_kidzone";
    
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }
?>