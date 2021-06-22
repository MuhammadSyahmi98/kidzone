<?php

require 'resources/php/conn.php';
session_start();

if (isset($_POST['login'])) {

  $email = $_POST['student_email'];
  $password = $_POST['student_passwod'];
  $status = true;

  $sql = "SELECT * FROM staff WHERE staff_email = '$email' AND staff_password = '$password'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $staff_id = $row['staff_id'];
    $_SESSION['staff_id'] = $staff_id;

    echo '<script>alert("Welcome to KIDZONE!");</script>';
    echo "<script>window.location.assign('admin/')</script>";
  } else {
    $status = false;
  }

  if ($status === false) {
    $status = true;
    $sql = "SELECT * FROM instructor WHERE instructor_email = '$email' AND instructor_password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $instructor_id = $row['instructor_id'];

      $_SESSION['instructor_id'] = $instructor_id;
      echo '<script>alert("Welcome to KIDZONE!");</script>';
    echo "<script>window.location.assign('instructor/')</script>";
    } else {
      $status = false;
    }
  }

  if($status === false) {
    echo '<script>alert("Wrong Credentials. Please try again.");</script>';
    echo "<script>window.location.assign('login2.php')</script>";
  }



}

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


    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      width: 500px;
      margin: auto !important;
      text-align: center;
      padding: 5px;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
      /*background-color: black; */
      background-color: #d3d6db;
    }

    * {
      box-sizing: border-box;
    }

    /* Add padding to containers */
    .container {
      padding: 40px;

      height: auto;


    }

    /* Full-width input fields */
    input[type=email],
    input[type=password] {
      width: 400px;
      padding: 10px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: bold;
      background: #f1f1f1;
      text-align: left;
    }

    input[type=email]:focus,
    input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
      border: 1px solid #f1f1f1;
      margin-bottom: 25px;
    }

    /* Set a style for the submit button */
    .loginbtn {
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

    .loginbtn:hover {
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


    .grid-container {
      display: grid;
      grid-template-columns: auto auto;
      grid-gap: 10px;
      padding: 10px;
    }

    .grid-container>div {


      text-align: center;

    }

    .center {
      margin-top: auto;
      margin-bottom: auto;
      margin-right: auto;
      justify-content: center;
      align-items: center;
      height: 200px;

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

      input[type=email],
      input[type=password] {
        width: 400px;

      }
    }

    @media (max-width: 800px) {

      .loginbtn {

        width: 300px;

      }

      input[type=email],
      input[type=password] {
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
      .loginbtn {

        width: 200px;

      }

      input[type=email],
      input[type=password] {
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


    /*.bottom {
  background-color: black;
  height: 40%;
  margin-left: 0%;
  margin-top: 0%;
  color: white;
}*/
  </style>
</head>

<body>

  <div class="header">
    <?php include('header.php'); ?>

  </div>
  </div>

  <div>

    <div style="margin-top: 5%;">
      <div>
        <div class="card" style="margin-top: 20px;">

          <form method="post">

            <br><br>
            <h1>Login Instructor/Staff</h1><br><br>
            <label style="float: left; padding-left:45px"><b>Email Address</b></label><br>
            <input id="username" type="email" placeholder="Enter Email Address" name="student_email" required><br>
            <label style="float: left; padding-left:45px"><b>Password</b></label><br>
            <input id="password" type="password" placeholder="Enter Password" name="student_passwod" required><br>
            <button type="submit" name="login" class="loginbtn">Login</button>
            <p>Forgot password? <a href="forgotPassword2.php">Click Here</a></p>
          </form>
          <button style="width: 50%;" onclick="btn1()" class="loginbtn" >Staff 1</button>
          <button style="width: 50%;" onclick="btn2()" class="loginbtn" >Instructor 1</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function btn1() {
      document.getElementById("username").value = "syahmijalil12@gmail.com";
      document.getElementById("password").value = "QTJMUiVa";
    }
    function btn2() {
      document.getElementById("username").value = "aishah95@gmail.com";
      document.getElementById("password").value = "aish123";
    }
  </script>



  <!-- Start of ChatBot (www.chatbot.com) code -->
<script type="text/javascript">
    window.__be = window.__be || {};
    window.__be.id = "60d1623a1270440007224690";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
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