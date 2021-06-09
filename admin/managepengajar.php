<?php
include "../resources/conn.php";

$name = $ic = $phone = $email = $qualification = $file_temp = '';
$displayError =  false;

$isAllOkay = true;


if (isset($_GET['id'])) {
    $instructor_id = $_GET['id'];
    $sql = "SELECT * FROM instructor WHERE instructor_id = " . $instructor_id . "";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['instructor_name'];
        $ic = $row['instructor_ic'];
        $phone = $row['instructor_phone_number'];
        $email = $row['instructor_email'];
        $qualification = $row['instructor_qualification'];
        $file_path = $row['instructor_path_file'];
    }
}



if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $ic = $_POST['ic'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $qualification = $_POST['qualification'];



    // Check file
    if (($_FILES['my_file']['name'] === "")) {
        if (!empty($name) && !empty($ic) &&  !empty($phone) &&  !empty($email) && !empty($qualification)) {
            $sql2 = "UPDATE instructor SET instructor_name = '" . $name . "', instructor_ic = '" . $ic . "', instructor_phone_number = '" . $phone . "', instructor_email = '" . $email . "', instructor_qualification = '" . $qualification . "', instructor_path_file = '" . $file_path . "'  WHERE instructor_id = " . $instructor_id . "";
            if ($conn->query($sql2) === TRUE) {
                echo "<script>alert('Success Update Instructor');
		       window.location.href='senaraipengajar.php';
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
    } else {
        $file_temp = 'True';
    }

    if (!empty($name) && !empty($ic) &&  !empty($phone) &&  !empty($email) && !empty($qualification) && !empty($file_temp)) {

        $target_dir = "../resources/data/file qualification/";
        $file = $_FILES['my_file']['name'];
        $path = pathinfo($file);
        // Can custome file name here
        $filename = $path['filename'] . '_' . $ic;
        $ext = $path['extension'];
        $temp_name = $_FILES['my_file']['tmp_name'];
        $path_filename_ext = $target_dir . $filename . "." . $ext;

        $document = $filename . "." . $ext;


        // Check file type 
        $allowed = array('docx', 'pdf');
        if (!in_array($ext, $allowed)) {
            $displayError = true;
            $isAllOkay = false;
        }

        if ($isAllOkay) {
            // Check if file already exists
            if (file_exists($path_filename_ext)) {
            }
            // file not exist
            else {
                move_uploaded_file($temp_name, $path_filename_ext);

                $sql2 = "UPDATE instructor SET instructor_name = '" . $name . "', instructor_ic = '" . $ic . "', instructor_phone_number = '" . $phone . "', instructor_email = '" . $email . "', instructor_qualification = '" . $qualification . "', instructor_path_file = '" . $document . "'  WHERE instructor_id = " . $instructor_id . "";
                if ($conn->query($sql2) === TRUE) {
                    echo "<script>alert('Success Update Instructor');
		       window.location.href='senaraipengajar.php';
		       </script>";
                } else {
                    echo "failed";
                }
            }
        }
    } else {
        // Field empty
        // Using javascript
        echo "<script> window.onload = function() {
            myFunction();
        }; </script>";
    }
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

                    </ul>
                </div>
            </div>
        </nav>


        <div class="hk-pg-wrapper">
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                <div class="hk-pg-header align-items-top">
                    <div>
                        <h2 class="hk-pg-title font-weight-600 mb-10">Update Instructor</h2>
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
                                    <div class="table-wrap">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="inputName">Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-user"></i></span>
                                                    </div>
                                                    <input id="name" type="text" name="name" class="form-control" id="inputName" placeholder="Full Name" value="<?php echo $name ?>">
                                                </div>
                                                <small id="name_feedback" class="custom-display" id="ic_feedback">Please fill in this space</small>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label mb-10" for="inputName">IC Number</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-user"></i></span>
                                                    </div>
                                                    <input id="ic" type="text" name="ic" class="form-control" id="inputName" placeholder="IC Number" value="<?php echo $ic ?>">
                                                </div>
                                                <small id="ic_feedback" class="custom-display" id="ic_feedback">Please fill in this space</small>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label mb-10" for="inputName">Phone Number</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-user"></i></span>
                                                    </div>
                                                    <input id="phone" type="text" name="phone" class="form-control" id="inputName" placeholder="Phone Number" value="<?php echo $phone ?>">
                                                </div>
                                                <small class="custom-display" id="phone_feedback">Please fill in this space</small>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label mb-10" for="inputName">Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-user"></i></span>
                                                    </div>
                                                    <input id="email" type="text" name="email" class="form-control" id="inputName" placeholder="Email Address" value="<?php echo $email ?>">
                                                </div>
                                                <small class="custom-display" id="email_feedback">Please fill in this space</small>


                                            </div>

                                            <div class="form-group">
                                                <label class="control-label mb-10" for="inputName">Academic Qualification</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-user"></i></span>
                                                    </div>
                                                    <input id="qualification" type="text" name="qualification" class="form-control" id="inputName" placeholder="Academic qualification" value="<?php echo $qualification ?>">
                                                </div>
                                                <small id="qualification_feedback" class="custom-display" id="ic_feedback">Please fill in this space</small>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label mb-10" for="inputName">Proof of Academic Qualifications </label>
                                                <div style="margin-bottom:15px;">
                                                    Document: <a href="../resources/data/file qualification/<?php echo $file_path ?>">Download</a>
                                                </div>
                                                <div class="alert alert-danger alert-dismissible form-group" role="alert" style="<?php if ($displayError) {
                                                                                                                                        echo 'display: block;';
                                                                                                                                    } else {
                                                                                                                                        echo 'display: none;';
                                                                                                                                    } ?>">
                                                    Wrong format

                                                </div>

                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>

                                                    <div class="form-control text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                    <span class="input-group-append">
                                                        <span class=" btn btn-primary btn-file"><span class="fileinput-new">Find File</span><span class="fileinput-exists">Change</span>
                                                            <input id="file" type="file" name="my_file">
                                                        </span>
                                                        <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    </span>
                                                </div>
                                                <small id="file_feedback" class="custom-display">Please fill in this space</small>
                                            </div>

                                            <input id="file_temp" type="hidden" name="file_temp" value="<?php echo $file_temp ?>">




                                            <div style="float: right;" class="mt-20">
                                                <button type="submit" name="update" class="btn btn-primary mr-10">Submit</button>
                                                <button type="submit" name="cancel" class="btn btn-light">Cancel</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>
                    </div>

                </div>

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

                        var inpObj = document.getElementById("qualification");
                        if (inpObj.value.length == 0) {
                            document.getElementById("qualification_feedback").style.display = "block";
                        } else {
                            document.getElementById("qualification_feedback").style.display = "none";
                        }

                       
                    }
                </script>


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