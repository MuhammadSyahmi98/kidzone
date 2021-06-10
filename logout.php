<?php

session_start();

echo '<script>alert("You have logged out.");</script>';
echo "<script>window.location.assign('student.php')</script>";
session_destroy();

?>