<?php
include "../resources/conn.php";
session_start();

$name = $ic = $email = $phone = $quote = $path = '';

$isAllOkay = true;

$instructor_id = 1;


$sql100 = "SELECT * FROM instructor WHERE instructor_id = ". $instructor_id ."";
$result100  = $conn->query($sql100 );

if ($result100->num_rows > 0) {
    $row100 = $result100->fetch_assoc();
    $name100 = $row100['instructor_name'];
    $path100 = $row100['instructor_pic_path'];
}





$sql = "SELECT * FROM instructor WHERE instructor_id = " . $instructor_id . "";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['instructor_name'];
    $ic = $row['instructor_ic'];
    $email = $row['instructor_email'];
    $phone = $row['instructor_phone_number'];
    $quote = $row['instructor_quotes'];
    $path  = $row['instructor_pic_path'];
}

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $ic = $_POST['ic'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $quote = $_POST['quote'];

    if (($_FILES['profile_pic']['name'] === "")) {
        if (!empty($name) && !empty($ic) && !empty($email) && !empty($phone) && !empty($quote)) {
            $sql2 = "UPDATE instructor SET instructor_name = '". $name ."', instructor_ic = '". $ic ."', instructor_email = '". $email ."', instructor_phone_number = '". $phone ."', instructor_quotes = '". $quote ."'  WHERE instructor_id = " . $instructor_id . "";
                if ($conn->query($sql2) === TRUE) {
                    echo "<script>alert('Success Update Profle');
                    window.location.href='profile.php';
                    </script>";
                } else {
                    echo "failed";
                }
        }
    } else {

        $target_dir = "../resources/img/profile/";
        $file = $_FILES['profile_pic']['name'];
        $path = pathinfo($file);
        // Can custome file name here
        $filename = $path['filename'] . '_' . $ic;
        $ext = $path['extension'];
        $temp_name = $_FILES['profile_pic']['tmp_name'];
        $path_filename_ext = $target_dir . $filename . "." . $ext;

        $document = $filename . "." . $ext;


        // Check file type 
        $allowed = array('jpg', 'png');
        if (!in_array($ext, $allowed)) {
            $isAllOkay = false;
        }

        if (!empty($name) && !empty($ic) && !empty($email) && !empty($phone) && !empty($quote) && $isAllOkay) {
            // Check if file already exists
            if (file_exists($path_filename_ext)) {
            }
            // file not exist
            else {
                move_uploaded_file($temp_name, $path_filename_ext);

                if (!empty($name) && !empty($ic) && !empty($email) && !empty($phone) && !empty($quote)) {
                    $sql2 = "UPDATE instructor SET instructor_name = '". $name ."', instructor_ic = '". $ic ."', instructor_email = '". $email ."', instructor_phone_number = '". $phone ."', instructor_quotes = '". $quote ."', instructor_pic_path = '". $document ."'  WHERE instructor_id = " . $instructor_id . "";
                        if ($conn->query($sql2) === TRUE) {
                            echo "<script>alert('Success Update Profle');
                            window.location.href='profile.php';
                            </script>";
                        } else {
                            echo "failed";
                        }
                }
           
            }
        }
    }
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
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar hk-navbar-alt">
            <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>

            <nav class="navbar navbar-light ">
                <span class="navbar-brand mb-0 h3" style="font-weight: bold;">KIDZONE</span>
            </nav>

            <div class="collapse navbar-collapse" id="navbarCollapseAlt">
                <!-- <ul class="navbar-nav">
                    <li class="nav-item">
                        <a style="font-weight: bold;" class="nav-link" href="../index.php">
                                Dashboard
                        </a>
                       
                    </li>
                    <li class="nav-item">
                        <a tyle="font-weight: bold;" class="nav-link" href="../index.php">
                                Status
                        </a>
                       
                    </li>
                </ul> -->

            </div>
            <ul class="navbar-nav hk-navbar-content">



                <li class="nav-item dropdown dropdown-authentication">

                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="../resources/img/profile/<?php echo $path100; ?>" alt="user" class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="media-body">
                                <span><?php echo $name100; ?><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href="profile.php"><i class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a>
                       
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php"><i class="dropdown-icon zmdi zmdi-power"></i><span>Log out</span></a>
                    </div>
                </li>
            </ul>
        </nav>
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
                    </ul>
                </div>
            </div>
        </nav>


        <div class="hk-pg-wrapper">
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                <div class="hk-pg-header align-items-top">
                    <div>
                        <h2 class="hk-pg-title font-weight-600 mb-10">Profile</h2>
                        <!-- <p>Questions about onboarding lead data? <a href="#">Learn more.</a></p> -->
                    </div>

                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <form method="POST" enctype="multipart/form-data">
                            <section class="hk-sec-wrapper">

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="media pa-20 rounded" style="padding-bottom: 0 !important;">
                                            <label for="file-input" style="margin-right:auto !important; margin-left:auto !important;">
                                                <img class="mr-15 circle d-130" src="../resources/img/profile/<?php echo $path; ?>" alt="Generic placeholder image">
                                            </label>
                                            <input type="hidden" name="pic_hidden" value="<?php echo $path; ?>">

                                            <input style="display: none;" id="file-input" name="profile_pic" type="file" />


                                        </div>


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="media rounded">
                                            <small style="margin-right:auto !important; margin-left:auto !important;">Please click picture above to change new profile picture</small>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="media pa-20 rounded">
                                            <div class="media-body mt-15" style="font-size:110%;">
                                                <table class="table table-md pb-30 table-flush">

                                                    <tbody>

                                                        <tr>
                                                            <td style="width: 25%;">Nama: </td>
                                                            <td>
                                                                <input name="name" placeholder="Name" class="form-control <?php echo $name_feedback; ?>" type="text" value="<?php echo $name ?>">
                                                                <div class="invalid-feedback">
                                                                    Sila isi ruang ini
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 25%;">Email: </td>
                                                            <td>
                                                                <input placeholder="Email Address" name="email" class="form-control  <?php echo $email_feedback; ?>" type="text" value="<?php echo $email ?>">
                                                                <div class="invalid-feedback">
                                                                    Sila isi ruang ini
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 25%;">Phone No.: </td>
                                                            <td>
                                                                <input name="phone" placeholder="Phone Number" class="form-control  <?php echo $phone_feedback; ?>" type="text" value="<?php echo $phone ?>">
                                                                <div class="invalid-feedback">
                                                                    Sila isi ruang ini
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 25%;">IC No.: </td>
                                                            <td>
                                                                <input name="ic" placeholder="IC Number" class="form-control  <?php echo $ic_feedback; ?>" type="text" value="<?php echo $ic ?>">
                                                                <div class="invalid-feedback">
                                                                    Sila isi ruang ini
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 25%;">Quote : </td>
                                                            <td>
                                                                <input name="quote" placeholder="Quote" class="form-control  <?php echo $quote_feedback; ?>" type="text" value="<?php echo $quote ?>">
                                                                <div class="invalid-feedback">
                                                                    Sila isi ruang ini
                                                                </div>
                                                            </td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                                <button name="update" class="btn btn-primary mt-15" style="float: right;">Update</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </section>
                        </form>

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