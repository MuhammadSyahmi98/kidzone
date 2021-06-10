<?php

session_start();

echo '<script>alert("You have logged out.");</script>';
echo "<script>window.location.assign('../login2.php')</script>";
session_destroy();

?>