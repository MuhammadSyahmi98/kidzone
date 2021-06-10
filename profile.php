<?php

session_start();
require 'resources/php/conn.php';


// require ('session.php');

$student_id = $_SESSION['student_id'];

// echo $_SESSION['student_email'];
// echo $_SESSION['student_name'];
// $_SESSION['student_id']=$student_id;
//   $res = $con->query("SELECT * FROM student where student_id =$student_id ");
//   $row = $res->fetch_assoc();

//   $email = $row['student_email'];
// $name = $row['student_name'];
//    $ic= $row['student_ic'];
//    $pass = $row['student_passwod'];

// if(isset($_POST['login'])) {

// echo $_SESSION['student_email'];
// echo $_SESSION['student_name'];
// echo $_SESSION['student_ic'];
// echo $_SESSION['student_passwod'];
//}


if (isset($_POST['update'])) {
    $student_id = $_POST['id'];
    $student_name = $_POST['name'];
    $student_email = $_POST['email'];
    $student_ic = $_POST['ic'];

    $sql = "UPDATE student SET student_name = '" . $student_name . "', student_email = '" . $student_email . "', student_ic = '" . $student_ic . "' WHERE student_id = " . $student_id . "";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Success Update.");</script>';
        echo "<script>window.location.assign('profile.php')</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}




?>

<!DOCTYPE html>
<html lang="en">

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
    <!-- <link rel="stylesheet" href="css/components/table.css" /> -->
    <link rel="stylesheet" href="css/components/switch.css" />
    <link rel="stylesheet" href="css/components/hamburgers.css" />
    <link rel="stylesheet" href="css/components/form.css" />
    <link rel="stylesheet" href="css/layouts/instructor.css" />

    <script src="https://kit.fontawesome.com/048645d981.js" crossorigin="anonymous"></script>

    <title>KIDZONE | Instructor </title>

    <style>
        .dropbtn {
            background-color: #3498DB;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover,
        .dropbtn:focus {
            background-color: #2980B9;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            z-index: 50;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);

        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            background-color: white;
            z-index: 99;

        }

        .dropdown a:hover {
            background-color: #ddd;
        }

        .show {
            display: block;
        }
    </style>

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

</head>

<body>
    <div class="header">
        <?php include('header.php'); ?>
    </div>

    <?php
    $sql = "SELECT * FROM student WHERE student_id = " . $student_id . "";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['student_id'];
            $name = $row['student_name'];
            $email = $row['student_email'];
            $ic = $row['student_ic'];




    ?>

            <div class="body">
                <div class="card">
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div style="margin-bottom: 10px;">
                            <label><b>Name: <input name="name" value="<?php echo $name; ?>"></b></label><br>
                        </div>

                        <div style="margin-bottom: 10px;">
                            <label style="margin-bottom: 10px;"><b>Email: <input name="email" value=" <?php echo $email; ?>"></b></label><br>

                        </div>

                        <div style="margin-bottom: 10px;">
                            <label style="margin-bottom: 10px;"><b>IC Number: <input name="ic" value="<?php echo $ic; ?>"></b></label><br>

                        </div>

                        <button name="update" style="margin-bottom: 10px;">Update</button>
                    </form>
                </div>


            <?php
        }
    } else {
            ?>
        <?php
    }
        ?>




            </div>
</body>

</html>