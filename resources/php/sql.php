<?php

function displayInstructor(){
  require 'conn.php';

	$sql = "SELECT * FROM instructor INNER JOIN content ON instructor.instructor_id = content.instructor_id;";
    // Connection to database
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
               window.location.href='class.php';
               </script>";
    } else {
    
        
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
    }

}

function displaySubject(){
  require 'conn.php';

  $sql = "SELECT * FROM content";
    // Connection to database
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo "<script>alert('SQL_Error_STUDENT_CLASS_DATA');
               window.location.href='class.php';
               </script>";
    } else {
    
        
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        return $resultl;
    }

}



  ?>