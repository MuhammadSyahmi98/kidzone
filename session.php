<?php

session_start();

if(!isset($_SESSION['email']))
{
	echo '<script>alert("Please login");</script>';
	echo "<script>window.location.assign('login.php')</script>";
}


?> 