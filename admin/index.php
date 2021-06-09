<?php
include "../resources/conn.php";
session_start();


$totalStaff = $totalInstructor = $totalStudent = '';

$sql = "SELECT COUNT(*) AS totalStaff FROM staff";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalStaff = $row['totalStaff'];
}

$sql = "SELECT COUNT(*) AS totalInstructor FROM instructor";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalInstructor = $row['totalInstructor'];
}

$sql = "SELECT COUNT(*) AS totalStudent FROM student";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalStudent = $row['totalStudent'];
}





?>
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

                    </ul>
                </div>
            </div>
        </nav>


        <div class="hk-pg-wrapper">
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                <div class="hk-pg-header align-items-top">
                    <div>
                        <h2 class="hk-pg-title font-weight-600 mb-10">Dashboard</h2>
                        <!-- <p>Questions about onboarding lead data? <a href="#">Learn more.</a></p> -->
                    </div>

                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hk-row">
                            <div class="col-md-4">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Total Staff</span>
                                                <span class="d-block display-6 font-weight-400 text-dark"><?php echo $totalStaff; ?></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Total Instructor</span>
                                                <span class="d-block display-6 font-weight-400 text-dark"><?php echo $totalInstructor; ?></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Total Student</span>
                                                <span class="d-block display-6 font-weight-400 text-dark"><?php echo $totalStudent; ?></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <section class="hk-sec-wrapper">
                    <h6 class="hk-sec-title">Pecentage</h6>
                    <div class="row">
                        <div class="col-sm">
                            <div id="e_chart_4" class="echart" style="height:400px;"></div>
                        </div>
                    </div>
                </section>
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

</body>

</html>