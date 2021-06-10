<?php 
session_start();
require 'resources/php/conn.php';
?> 

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

  <link rel="stylesheet" href="css/global.css" />
  <link rel="stylesheet" href="css/components/card.css" />
  <link rel="stylesheet" href="css/components/stats.css" />
  <link rel="stylesheet" href="css/components/badge.css" />
  <link rel="stylesheet" href="css/components/input.css" />
  <link rel="stylesheet" href="css/components/header.css" />
  <link rel="stylesheet" href="css/components/button.css" />
  <link rel="stylesheet" href="css/components/heading.css" />
  <link rel="stylesheet" href="css/components/table.css" />
  <link rel="stylesheet" href="css/components/switch.css" />
  <link rel="stylesheet" href="css/components/hamburgers.css" />
  <link rel="stylesheet" href="css/components/form.css" />
  <link rel="stylesheet" href="css/layouts/slideshow.css" />

  <script src="https://kit.fontawesome.com/048645d981.js" crossorigin="anonymous"></script>
  <style>

    html {
      background-color: #d3d6db;
    }
    .middle {
      height: 500px;
    }

    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      width: 500px;
      margin: auto;
      text-align: center;
      background-color: white;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
      /*background-color: black; */
    }

    * {
      box-sizing: border-box;
    }

    /* Add padding to containers */
    .container {
      padding: 40px;
      background-color: #d3d6db;
      height: 113%;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password],
    input[type=email] {
      width: 400px;
      padding: 10px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: bold;
      background: #f1f1f1;
      text-align: left;
    }

    input[type=text]:focus,
    input[type=password]:focus,
    input[type=email]:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
      border: 1px solid #f1f1f1;
      margin-bottom: 25px;
    }

    /* Set a style for the submit button */
    .registerbtn {
      background-color: #4284f5;
      color: white;
      padding: 16px 20px;
      margin: 20px 0;
      border: none;
      cursor: pointer;
      width: 400px;
      opacity: 0.9;
      border-radius: 6px;
    }

    .registerbtn:hover {
      opacity: 1;
    }

    /* Add a blue text color to links */
    a {
      color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
      background-color: #f1f1f1;
      text-align: center;
    }

    @media (max-width: 1000px) {

      body {
        font-size: 80%;
      }

      .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        width: 500px;
        margin: auto;
        text-align: center;
        padding: 5px;
        margin-top: 0;
        margin-left: 0 !important;
        margin: auto !important;
      }

      .grid-container {
        display: block;
        grid-template-columns: auto auto;
        grid-gap: 0;
        padding: 0;
      }

      .grid-container>div {


        text-align: center;

      }

      .center {

        margin: auto;
        margin-top: 5% !important;
        justify-content: 0;
        align-items: 0;
        height: 200px;

      }

      .test {
        margin: auto;
      }

      .header-small {
        font-size: 25px !important;

      }

      .link {
        white-space: nowrap;
      }

      input[type=text],
      input[type=password],
      input[type=email] {
        width: 400px;

      }
    }

    @media (max-width: 800px) {

      .registerbtn {

        width: 300px;

      }

      input[type=text],
      input[type=password],
      input[type=email] {
        width: 300px;
        padding: 10px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: bold;
        background: #f1f1f1;
        text-align: left;
      }

      .card {
        width: 350px;
      }
    }

    @media (max-width: 580px) {
      .registerbtn {

        width: 200px;

      }

      input[type=text],
      input[type=password],
      input[type=email] {
        width: 200px;
        padding: 10px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: bold;
        background: #f1f1f1;
        text-align: left;
      }

      .card {
        width: 240px;
      }
    }
  </style>
</head>

<body>

  <div class="header">
  <?php include('header.php'); ?>

  </div>
  </div>
  </div>

  <div class="middle" align="center">
    <div class="container">
      <div class="card" style="margin-top: 10px">
        <form action="register.php" method="post">

          <br><br>
          <h1>Register Account</h1><br><br>

          <label style="float: left; padding-left:50px"><b>Email Address</b></label><br>
          <input type="email" placeholder="Enter Email Address" name="student_email" required><br>

          <label style="float: left; padding-left:50px"><b>Name</b></label><br>
          <input type="text" pattern="[a-zA-Z\s]+" title="Please enter alphabet only" placeholder="Enter Name" name="student_name" required><br>

          <label style="float: left; padding-left:50px"><b>IC Number</b></label><br>
          <input type="text" pattern="[0-9-]+" title="Please enter numeric only" placeholder="Enter IC Number" name="student_ic" required><br>

          <label style="float: left; padding-left:50px"><b>Password</b></label><br>
          <input type="password" placeholder="Enter Password" name="student_passwod" required><br>
          <button type="submit" class="registerbtn" name="submit">Register</button>
      </div>

      <!--<div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>-->
      </form>
    </div>
  </div>

  <!-- Start of ChatBot (www.chatbot.com) code -->
  <script type="text/javascript">
    window.__be = window.__be || {};
    window.__be.id = "60adc444ac852f0007859d3f";
    (function() {
      var be = document.createElement('script');
      be.type = 'text/javascript';
      be.async = true;
      be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(be, s);
    })();
  </script>
  <!-- End of ChatBot code -->

  <script>
    function openMenu() {
      var menu = document.getElementById("menu");
      var hamburger = document.getElementById("hamburger");
      if (menu.classList && hamburger.classList) {
        menu.classList.toggle("open");
        hamburger.classList.toggle("is-active");
      }
    }
  </script>

  <script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
  </script>
</body>

</html>

<?php  

//require('session.php');

 
if(isset($_POST['submit'])) {

  //Post variable from html $_POST['username']... to php

  $name = $_POST['student_name'];
  $email = $_POST['student_email'];
  $password = $_POST['student_passwod'];
  $ic = $_POST['student_ic'];
 
  
  
  if (strpos($email, ".com") == false)
  {
    echo "<script>alert('Invalid email');</script>";
    echo "<script>location.assign('register.php');</script>";
  }

  function getAgeFromDOB($idcard) {


  $dobYear = substr($idcard, 0, 2);
  $dobMonth = substr($idcard, 2, 2);
  $dobDay = substr($idcard, 4, 2);

  $dob =  mktime(0, 0, 0, $dobMonth, $dobDay, $dobYear);
  $curr = strtotime(date("M-d-Y")); 

  $diff = $curr - $dob;
  
  $years = floor($diff / (365*60*60*24));

  return $years;
}
  // Get Age from function
  $years = getAgeFromDOB($ic);
  $sql = "INSERT INTO `student`(`student_name`, `student_email`, `student_passwod`, `student_ic`) VALUES ('".$name."', '".$email."', '".$password."', '".$ic."');";

 if($years <= 12 && $years >= 7)
 {
  // check if the data insert tu database
  if ($conn->multi_query($sql) == TRUE) {
    // Success message
    echo "<script>alert('".$name." You are Successfully Registered in this System');</script>";
      echo "<script>window.location.assign('login.php')</script>"; //what page to assign to after this page
  }
    
  }
  else
  {
    echo "<script>alert('You must be 12 years old and below to register');</script>";
  }


}

?>

 <!-- if(($con->multi_query($sql) == TRUE) && ($years <= 12 && $years >= 7))  -->