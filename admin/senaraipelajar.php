<?php
include "../resources/conn.php";
session_start();


if (isset($_POST['add'])) {
    header('location: tambahpengajar.php');
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

    <!-- Data Table CSS -->
    <link href="../resources/vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../resources/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />

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
                        <h2 class="hk-pg-title font-weight-600 mb-10">List of Student</h2>
                        <!-- <p>Questions about onboarding lead data? <a href="#">Learn more.</a></p> -->
                    </div>

                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">

                            <p class="mb-25">Here are list of the students:</p>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        
                                        <table id="datable_6" class="table table-hover w-100  pb-30">
                                            <thead>
                                                <tr>
                                                <th>Name</th>
                                                    <th>IC No.</th>
                                                    <th>Email</th>
                                                    <th>Date</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM student";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) { ?>
                                                        <tr>
                                                        <td><?php echo $row['student_name'] ?></td>
                                                            <td><?php echo $row['student_ic'] ?></td>
                                                            <td><?php echo $row['student_email'] ?></td>
                                                            <?php
                                                            $orgDate = $row['student_date'];
                                                            $newDate = date("d-m-Y", strtotime($orgDate));
                                                           
                                                            ?>
                                                            <td><?php echo $newDate ?></td>

                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
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

    <!-- Toastr JS -->
    <script src="../resources/vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="../resources/dist/js/jquery.slimscroll.js"></script>

    <!-- Data Table JavaScript -->
    <script src="../resources/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../resources/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../resources/vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="../resources/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../resources/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="../resources/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../resources/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="../resources/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../resources/dist/js/dataTables-data - Copy.js"></script>

    <!-- Init JavaScript -->
    <script src="../resources/dist/js/init.js"></script>
    <script src="../resources/dist/js/dashboard-data.js"></script>

</body>

</html>