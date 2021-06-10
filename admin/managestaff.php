<?php
include "../resources/conn.php";
session_start();

$name = $ic_number = $phone_number = $email = '';


if (isset($_GET['id'])) {
    $staff_id = $_GET['id'];
    $sql = "SELECT * FROM staff WHERE staff_id = ". $staff_id ."";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $name = $row['staff_name'];
        $ic_number = $row['staff_ic'];
        $phone_number  = $row['staff_phone_number'];
        $email = $row['staff_email'];
    }
}

// check variable set or not
if (isset($_POST['update'])) {
    // Get all dara from form
    $name = $_POST['name'];
    $ic_number = $_POST['ic_number'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    // Validate empty field
    if (!empty($name) && !empty($ic_number) && !empty($phone_number) && !empty($email)) {
        // Field not empty
        // Update data
        $sql2 = "UPDATE staff SET staff_name= '". $name ."' , staff_ic = '". $ic_number ."' , staff_phone_number = '". $phone_number ."' , staff_email = '". $email ."'  WHERE staff_id = ". $staff_id ."";
        if ($conn->query($sql2) === TRUE) { 
            echo "<script>alert('Success Update Staff');
		       window.location.href='senaraistaff.php';
		       </script>";
        } else {
            echo "failed";
        }
 
    } else {
        // Field empty
        // Using javascript
        echo "<script> window.onload = function() {
            myFunction();
        }; </script>";
    }
}


if(isset($_POST['cancel'])){
    header('location: senaraistaff.php');
}



?>

<style>
    .custom-display {
        display: none;
        color: red;
    }
</style>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>KIDZONE</title>
    <meta name="description" content="KIDZONE" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="">
    <link rel="icon" href="" type="image/x-icon">

    <!-- vector map CSS -->
    <link href="../resources/vendors/vectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />

    <!-- Toggles CSS -->
    <link href="../resources/vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="../resources/vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">

    <!-- Toastr CSS -->
    <link href="../resources/vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="../resources/dist/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>
    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-vertical-nav">

        <!-- Top Navbar -->
        <?php include('header.php') ?>
        <!-- /Top Navbar -->

        <nav class="hk-nav hk-nav-light ">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php">
                                <span class="feather-icon"><i data-feather="activity"></i></span>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="senaraistaff.php">
                                <span class="feather-icon"><i data-feather="activity"></i></span>
                                <span class="nav-link-text">Manage Staff</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="senaraipengajar.php">
                                <span class="feather-icon"><i data-feather="activity"></i></span>
                                <span class="nav-link-text">Manage Instructor</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="senaraipelajar.php">
                                <span class="feather-icon"><i data-feather="activity"></i></span>
                                <span class="nav-link-text">Student</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>


        <div class="hk-pg-wrapper">
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                <div class="hk-pg-header align-items-top">
                    <div>
                        <h2 class="hk-pg-title font-weight-600 mb-10">Update Staff</h2>
                        <!-- <p>Questions about onboarding lead data? <a href="#">Learn more.</a></p> -->
                    </div>

                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">

                            <p class="mb-25">Please fill in the fields below:</p>
                            <div class="row">
                                <div class="col-sm">
                                    <form method="POST">
                                        <div class="form-group">
                                            <div class="table-wrap">
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="inputName">Name</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="icon-user"></i></span>
                                                        </div>
                                                        <input id="name" type="text" name="name" class="form-control" id="inputName" placeholder="Full Name" value="<?php echo $name ?>">

                                                    </div>
                                                    <small id="name_feedback" class="custom-display">Please fill in this space</small>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="inputName">IC Number</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="icon-user"></i></span>
                                                        </div>
                                                        <input id="ic" type="text" name="ic_number" class="form-control" id="inputName" placeholder="IC Number" value="<?php echo $ic_number ?>">
                                                    </div>
                                                    <small class="custom-display" id="ic_feedback">Please fill in this space</small>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="inputName">Phone Number</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="icon-user"></i></span>
                                                        </div>
                                                        <input id="phone" type="text" name="phone_number" class="form-control" id="inputName" placeholder="Phone Number" value="<?php echo $phone_number ?>">
                                                    </div>
                                                    <small id="phone_feedback" class="custom-display">Please fill in this space</small>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="inputName">Email</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="icon-user"></i></span>
                                                        </div>
                                                        <input id="email" type="text" name="email" class="form-control" id="inputName" placeholder="Email Address" value="<?php echo $email ?>">
                                                    </div>
                                                    <small id="email_feedback" class="custom-display">Please fill in this space</small>
                                                </div>




                                                <div style="float: right;">
                                                    <button type="submit" name="update" class="btn btn-primary mr-10">Update</button>
                                                    <button type="submit" name="cancel" class="btn btn-light">Cancel</button>
                                                </div>


                                            </div>
                                    </form>
                                </div>

                            </div>
                    </div>

                </div>





                <!-- jQuery -->
                <script src="../resources/vendors/jquery/dist/jquery.min.js"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src="../resources/vendors/popper.js/dist/umd/popper.min.js"></script>
                <script src="../resources/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

                <!-- FeatherIcons JavaScript -->
                <script src="../resources/dist/js/feather.min.js"></script>

                <!-- Toggles JavaScript -->
                <script src="../resources/vendors/jquery-toggles/toggles.min.js"></script>
                <script src="../resources/dist/js/toggle-data.js"></script>

                <!-- EChartJS JavaScript -->
                <script src="../resources/vendors/echarts/dist/echarts-en.min.js"></script>
                <script src="../resources/dist/js/barcharts-data.js"></script>

                <!-- Toastr JS -->
                <script src="../resources/vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>

                <!-- Slimscroll JavaScript -->
                <script src="../resources/dist/js/jquery.slimscroll.js"></script>

                <!-- Init JavaScript -->
                <script src="../resources/dist/js/init.js"></script>
                <script src="../resources/dist/js/dashboard-data.js"></script>

                <script>
                    function myFunction() {

                        var inpObj = document.getElementById("ic");
                        if (inpObj.value.length == 0) {
                            document.getElementById("ic_feedback").style.display = "block";
                        } else {
                            document.getElementById("ic_feedback").style.display = "none";
                        }

                        var inpObj = document.getElementById("name");
                        if (inpObj.value.length == 0) {
                            document.getElementById("name_feedback").style.display = "block";
                        } else {
                            document.getElementById("name_feedback").style.display = "none";
                        }

                        var inpObj = document.getElementById("phone");
                        if (inpObj.value.length == 0) {
                            document.getElementById("phone_feedback").style.display = "block";
                        } else {
                            document.getElementById("phone_feedback").style.display = "none";
                        }

                        var inpObj = document.getElementById("email");
                        if (inpObj.value.length == 0) {
                            document.getElementById("email_feedback").style.display = "block";
                        } else {
                            document.getElementById("email_feedback").style.display = "none";
                        }
                    }
                </script>

</body>

</html>