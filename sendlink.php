<?php


include "resources/php/conn.php"; session_start();

if(isset($_POST['submit_email']) && $_POST['email'])
{

    $email = $_POST['email'];

    $res = mysqli_query($conn, "SELECT * FROM student WHERE student_email = '$email'");
    $row = $res -> fetch_assoc();
  
    $student_id = $row['student_id'];
    $email = $row['student_email'];
    $pass = $row['student_passwod'];


    $salt_pass = md5($pass);

    if ($email == $email && $pass == $pass)
    {
        
        $_GET['student_email'] = $email;
        $_GET['student_passwod'] = $pass;
        
        // Send email
          require_once('PHPMailerAutoload.php');
            $mail = new PHPMailer();
            $mail->CharSet =  "utf-8";
            $mail->IsSMTP();
            // enable SMTP authentication
            $mail->SMTPAuth = true;                  
            // GMAIL username
            $mail->Username = "kidzonesystem@gmail.com"; // letak email sendiriS
            // GMAIL password
            $mail->Password = "Kidzone123"; // Letak password email
            $mail->SMTPSecure = "tls";  
            // sets GMAIL as the SMTP server
            $mail->Host = "smtp.gmail.com";
            // set the SMTP port for the GMAIL server
            $mail->Port = 587;
            $mail->From='kidzonesystem@gmail.com';
            $mail->FromName='kidzonesystem';
            $mail->AddAddress("$email"); // Email user
            $mail->Subject  =  'Kidzone System Reset Password';
            $mail->IsHTML(true);
           //$link = "http://localhost/kidzonee/reEnterPassword.php?user_email=".$email.";"   
            $mail->Body    = '<div>
                                    <center>
                                    <div style="background-color:#CDA3D5; border-color:#71347C; border-style: solid; height: 100px; width: 50%; padding-top: 20px;">
                                        <h1 style=" font-weight: strong;"> Forgot Your Password? </h1>
                                    </div>
                                    <div style="background-color:white; border-color: #71347C; border-style: solid;height: 300px; width: 50%; padding-top: 20px;">
                                        <h2>Hi, '.$email.'</h2><br>
                                        We have received your request to reset your Smart Aid for Shopper password.<br>
                                        Click the link below to set a new password.
                                        <br>
                                        <br>
                                        <a style="color:blue" href="localhost/kidzone1/reEnterPassword.php?key='.$email.'&reset='.$salt_pass.'">Reset Your Password</a>

                                    </div>
                                    
                                    </center>
                                </div>';
            

            if ($mail->Send()) {
                // to login page
                header('location: login.php');
            }

            //  echo '<script> alert("Account Verified!");</script>';
            // echo "<script>window.location.assign ('resetpassword.php?matricno=$matricno')</script>";
        
          }
  
    }

    else
    {
        echo '<script> alert("Email is not exist!");</script>';
        echo "<script>window.location.assign ('login.php')</script>";
    }

    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>
    </title>
</head>
<body>
   <!--  <?php 

        echo '<script> alert("Your request has been send to your email. Check email for reset the password.");</script>';
        echo "<script>window.location.assign ('index.php')</script>";


     ?> -->

</body>
</html>
