<?php

require 'resources/php/conn.php';
session_start();


if (isset($_POST['reset'])) {
  $email = $_POST['email'];

  $password =  $name = '';

  $sql = "SELECT * FROM staff WHERE staff_email = '$email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['staff_name'];
    $password = $row['staff_password'];
    email($name, $email, $password);
  } else {
    $sql = "SELECT * FROM instructor WHERE instructor_email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $name = $row['instructor_name'];
      $password = $row['instructor_password'];
      email($name, $email, $password);
    } else {
      echo '<script>alert("Failed");</script>';
    }
  }

}

// send email to user
function email($name, $email, $password)
{

  $subject = "RESET PASSWORD";

  $password = md5($password);

  $htmlContent = '
      <html> 
      <head> 
          <title>Reset Password</title> 
      </head> 
      <body>
      <div>
      <center>
      <div style="background-color:#CDA3D5; border-color:#71347C; border-style: solid; height: 100px; width: 50%; padding-top: 20px;">
          <h1 style=" font-weight: strong;"> Forgot Your Password? </h1>
      </div>
      <div style="background-color:white; border-color: #71347C; border-style: solid;height: 300px; width: 50%; padding-top: 20px;">
          <h2>Hi, ' . $name . '</h2><br>
          We have received your request to reset your password.<br>
          Click the link below to set a new password.
          <br>
          <br>
          <a style="color:blue" href="https://kidzone1.test/reEnterPassword2.php?key=' . $email . '&reset=' . $password . '">Reset Your Password</a>
    

      </div>
      
      </center>
  </div>
          <p>-KIDZONE=</p>
      </body> 
      </html> 
  ';

  // Set content-type header for sending HTML email 
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


  // Send email 
  if (mail($email, $subject, $htmlContent, $headers)) {
    echo "<script>alert('Please Check Your Email');
         window.location.href='login2.php';
         </script>";
    echo "sdsds";
  } else {
    return false;
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
            <h1>Forgot Password</h1><br><br>
            <label style="float: left; padding-left:45px"><b>Email Address</b></label><br>
            <input id="username" type="email" placeholder="Enter Email Address" name="email" required><br>

            <button type="submit" name="reset" class="loginbtn">Reset</button>
            <p style="margin-bottom: 20px;">Login <a href="login2.php">Click Here</a></p>
          </form>

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