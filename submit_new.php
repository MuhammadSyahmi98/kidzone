<?php
if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset'])
{
  $email=$_POST['student_email'];
   $pass=$_POST['student_passwod'];

    $key = $_POST['key'];
    $reset = $_POST['reset'];
  
  $result = mysqli_connect('localhost','root','', 'kidzone');


  // Validate password strength
  $uppercase = preg_match('@[A-Z]@', $pass);
  $lowercase = preg_match('@[a-z]@', $pass);
  $number    = preg_match('@[0-9]@', $pass);
  $specialChars = preg_match('@[^\w]@', $pass);

  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
      // echo 'Password should be at least 8 characters in length and should include at least one uletter, one number, and one special character.';
      echo "<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
        window.location.href = 'http://localhost/kidzone1/reEnterPassword.php?key=". $key ."&reset=". $reset ."';
            </script>";

  } else{

      $status = $result->query("update student set student_passwod='$pass' where Binary student_email='$email'");


     
      if ($status === false ) {
        die("Didn't Update"); 

      } else {
       echo '<script>alert("Success Update")
        window.location.href = "http://localhost/kidzone1/login.php";
        </script>'; 
        // header("Location: http://localhost/AttendanceSystem");
      }
  }

  

}
?> 