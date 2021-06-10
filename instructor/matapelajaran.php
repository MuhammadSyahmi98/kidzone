<?php
include "../resources/conn.php";
session_start();

if(!isset($_SESSION['instructor_id'])){
    echo '<script>alert("Please Login");</script>';
    echo "<script>window.location.assign('../login2.php')</script>";
}


// if true file input have data
$file_temp = false;

// Temporary
$instructor_id = $_SESSION['instructor_id'];


$sql100 = "SELECT * FROM instructor WHERE instructor_id = " . $instructor_id . "";
$result100  = $conn->query($sql100);

if ($result100->num_rows > 0) {
    $row100 = $result100->fetch_assoc();
    $name100 = $row100['instructor_name'];
    $path100 = $row100['instructor_pic_path'];
}

$today_date = date('Y-m-d');





// Default 
// Get content id
if (isset($_GET['id'])) {
    // Get data from link
    $content_id = $_GET['id'];

    // Check folder exist or not 
    $pathFolder = "../resources/data/user/" . $instructor_id;

    if (!is_dir($pathFolder)) {
        mkdir($pathFolder);
    }

    // Check folder exist or not 
    $pathFolder = "../resources/data/user/" . $instructor_id . "/" . $content_id;

    if (!is_dir($pathFolder)) {
        mkdir($pathFolder);
    }
}

// Check button click submit
if (isset($_POST['submitMaterial$i'])) {

    // Get data from post and file type to variable
    $section_id = $_POST['section_id$i'];
    $description = $_POST['description$i'];
    $date = date('Y-m-d');

    // Get file data
    $name       = $_FILES['my_file$i']['name'];
    $temp_name  = $_FILES['my_file$i']['tmp_name'];

    // / Check file empty or not
    if (($name === "")) {
    } else {
        $file_temp = 'True';
    }

    // Check the value for each varible
    if (!empty($section_id) && !empty($description) && !empty($date) && $file_temp) {
        // All data complete not have empty field

        // Check folder exist or not 
        $pathFolder = "../resources/data/user/" . $instructor_id . "/" . $content_id . "/" . $section_id;

        if (!is_dir($pathFolder)) {
            mkdir($pathFolder);
        }

        // File codes
        $target_dir = "../resources/data/user/" . $instructor_id . "/" . $content_id . "/" . $section_id . "/";
        $file = $name;
        $path = pathinfo($file);
        // Can custome file name here
        $filename = $path['filename'] . '_' . $section_id;
        $ext = $path['extension'];
        $temp_name = $temp_name;
        $path_filename_ext = $target_dir . $filename . "." . $ext;

        $document = $filename . "." . $ext;


        // Check if file already exists
        if (file_exists($path_filename_ext)) {
        }
        // file not exist
        else {
            // Upload file
            move_uploaded_file($temp_name, $path_filename_ext);
        }

        // Create User and store data in database
        $stmt = $conn->prepare("INSERT INTO resources (resource_path, resource_description, resource_created, section_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $document, $description, $date, $section_id);
        $stmt->execute();
        $stmt->close();

        // Update content date
        $sql = "UPDATE content SET content_updated = '". $today_date ."' WHERE content_id = ". $content_id ."";
        $conn->query($sql);

        echo "<script>alert('Success Add New Material');
		       window.location.href='matapelajaran.php?id=" . $content_id . "';
		       </script>";
    }
}





// Count total section
$sql = "SELECT COUNT(*) AS totalSection  FROM section WHERE content_id = " . $content_id . "";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalSection = $row['totalSection'];
}



$section_number = $totalSection + 1;
$section_name = '';
$section_id = '';


if (isset($_POST['submitSection'])) {
    $section_name = $_POST['section_name'];

    if (!empty($section_name)) {
        $date = date('Y-m-d');

        // Add new section

        // Create User and store data in database
        $stmt = $conn->prepare("INSERT INTO section (section_name, section_number, section_created, content_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sisi", $section_name, $section_number, $date, $content_id);
        $stmt->execute();
        $stmt->close();
      

        // Update content date
        $sql = "UPDATE content SET content_updated = '". $today_date ."' WHERE content_id = ". $content_id ."";
        $conn->query($sql);

        echo "<script>alert('Success New Section');
        </script>";
        header("Refresh:0");
    }
}


if (isset($_POST['delete$m'])) {
    $resource_id = $_POST['resource_id$m'];

    $sql = "DELETE FROM resources WHERE resource_id = " . $resource_id . "";

    if ($conn->query($sql) === TRUE) {
        // Update content date
        $sql = "UPDATE content SET content_updated = '". $today_date ."' WHERE content_id = ". $content_id ."";
        $conn->query($sql);
        echo "<script>alert('Success Delete Resource');
        </script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

if (isset($_POST['delete_section$i'])) {
    $section_id = $_POST['section_ids$i'];

    $sql = "DELETE FROM section WHERE section_id = " . $section_id . "";

    if ($conn->query($sql) === TRUE) {
        // Update content date
        $sql = "UPDATE content SET content_updated = '". $today_date ."' WHERE content_id = ". $content_id ."";
        $conn->query($sql);
        echo "<script>alert('Success Delete Section');
        </script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}




if (isset($_POST['save'])) {
    header('location: matapelajaran.php');
}
?>






<style>
    .display {
        display: none;
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

    <!-- Data Table CSS -->
    <link href="../resources/vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../resources/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="../resources/dist/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>
    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-alt-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar hk-navbar-alt">

            <a class="nav-link-hover" style="padding-left:10px;" href="index.php"><i class="material-icons" style="color: red; line-height: 40px;">arrow_back_ios</i></a>

            <nav class="navbar navbar-light ">
                <span class="navbar-brand mb-0 h4">Back</span>
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
                <li>

                    <button name="save" class="btn btn-primary" style="margin-right: 10px; height: 50%;">Preview</button>

                </li>
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


        <div class="hk-pg-wrapper">
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                <div class="hk-pg-header align-items-top">
                    <div>
                        <h2 class="hk-pg-title font-weight-600 mb-10">Manage Syllabus</h2>
                        <!-- <p>Questions about onboarding lead data? <a href="#">Learn more.</a></p> -->
                    </div>

                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h4>Syllabus</h4>
                            <hr>
                            <p class="mb-25">Click "Add New Section" to add new Section and Click "Add Marerial" to add new material for particular section</p>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-sm">

                                            <?php

                                            // Get all data from database by each section
                                            // Count total section
                                            $sql = "SELECT *  FROM section WHERE content_id = " . $content_id . "";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                $i = 1;
                                                while ($row = $result->fetch_assoc()) { ?>



                                                    <div style="background-color: #f4f6f7; margin-bottom:30px;">

                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-sm">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h6>Section <?php echo $i; ?>: <?php echo $row['section_name']; ?></h6>
                                                                            <hr>
                                                                            <?php
                                                                            $sql2 = "SELECT * FROM resources WHERE section_id = " . $row['section_id'] . "";
                                                                            $result2 = $conn->query($sql2);
                                                                            if ($result2->num_rows > 0) {
                                                                                $m = 1;
                                                                                while ($row2 = $result2->fetch_assoc()) { ?>
                                                                                    <h6 style="margin-bottom: 10px;">Subtopic <?php echo $m; ?></h6>

                                                                                    <div>
                                                                                        <video width="320" height="240" controls>
                                                                                            <source src="../resources/data/user/<?php echo $instructor_id ?>/<?php echo $content_id ?>/<?php echo $row2['section_id'] ?>/<?php echo $row2['resource_path'] ?>" type="video/mp4">
                                                                                            <source src="../resources/data/user/<?php echo $instructor_id ?>/<?php echo $content_id ?>/<?php echo $row2['section_id'] ?>/<?php echo $row2['resource_path'] ?>" type="video/mkv">
                                                                                            Your browser does not support the video tag.
                                                                                        </video>

                                                                                    </div>


                                                                                    <p style="margin-top: 20px;">Video Description</p><br>

                                                                                    <p><?php echo $row2['resource_description']; ?></p>
                                                                                    <form method="POST">
                                                                                        <input type="hidden" name="resource_id$m" value="<?php echo $row2['resource_id'] ?>">
                                                                                        <button OnClick="return confirm('Confirm to delete this data?');" name="delete$m" class="btn btn-danger mt-15">Delete</button>
                                                                                    </form>
                                                                                    <hr>


                                                                            <?php
                                                                                    $m++;
                                                                                }
                                                                            }
                                                                            ?>


                                                                        </div>
                                                                    </div>
                                                                    <form method="POST" enctype="multipart/form-data">
                                                                    
                                                                        <div id="material#<?php echo $i; ?>" class="card" style="display: none;">
                                                                            <div class="card-body">
                                                                                <input type="hidden" name="section_id$i" value="<?php echo $row['section_id']; ?>">

                                                                                <label class="control-label mb-10" for="inputName">Section <?php echo $i; ?>: <?php echo $row['section_name']; ?></label>
                                                                                <hr>
                                                                                <div class="form-group">
                                                                                    <label class="control-label mb-10" for="inputName">Material</label>
                                                                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text">Upload</span>
                                                                                        </div>
                                                                                        <div class="form-control text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                                                        <span class="input-group-append">
                                                                                            <span class=" btn btn-primary btn-file"><span class="fileinput-new">Find file</span><span class="fileinput-exists">Change</span>
                                                                                                <input type="file" id="my_file$i" name="my_file$i">
                                                                                            </span>
                                                                                            <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label mb-10" for="inputName">Topics Description</label>
                                                                                    <textarea name="description$i" class="form-control" rows="5"></textarea>
                                                                                </div>



                                                                                <div style="margin-top: 20px;" class="mt-20">
                                                                                    <button type="submit" name="submitMaterial$i" class="btn btn-primary mr-10">submit</button>
                                                                                    <button onclick="removematerial(<?php echo $i; ?>)" type="submit" name="cancel" class="btn btn-light">Cancel</button>
                                                                                </div>


                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                    <button class="btn btn-primary mt-20" onclick="addmaterial(<?php echo $i; ?>)"> Add Material</button>
                                                                    <form style="display: inline !important;" method="POST">
                                                                        <input type="hidden" name="section_ids$i" value="<?php echo  $row['section_id']; ?>">
                                                                        <button OnClick="return confirm('Confirm to delete this data?');" name="delete_section$i" class="btn btn-danger  mt-20"> Delete Section</button>
                                                                    </form>



                                                                </div>


                                                            </div>

                                                        </div>

                                                    </div>

                                            <?php
                                                    $i++;
                                                }
                                            }

                                            ?>

                                            <div id="section" class="display" style="background-color: #f4f6f7; margin-bottom:30px;">

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <form method="POST">
                                                                        <div class="form-group">
                                                                            <label class="control-label mb-10" for="inputName">Section <?php echo $section_number; ?></label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">

                                                                                </div>
                                                                                <input type="text" name="section_name" class="form-control" id="inputName" placeholder="Section Name" value="<?php $section_name; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div style="float: right;" class="mt-20">
                                                                            <button tyzpe="submit" name="submitSection" class="btn btn-primary mr-10">Submit</button>
                                                                            <button onclick="removesection()" type="submit" name="cancelSection" class="btn btn-light">Cancel</button>
                                                                        </div>
                                                                    </form>


                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>

                                                </div>

                                            </div>


                                        </div>
                                    </div>


                                </div>
                            </div>
                            <button class="btn btn-primary" onclick="addsection()">Add New Section</button>
                        </section>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function addsection() {
            if (document.getElementById("section").style.display != "none") {
                //its visible
                document.getElementById("section").style.display = "block";
            }
        }

        function removesection() {
            if (document.getElementById("section").style.display === "block") {
                //its visible
                document.getElementById("section").style.display = "none";
            }
        }

        function addmaterial(number) {
            var name = "material#" + number;

            if (document.getElementById(name).style.display === "none") {

                //its visible
                document.getElementById(name).style.display = "block";
            }
        }

        function removematerial(number) {
            var name = "material#" + number;
            if (document.getElementById(name).style.display != "none") {

                //its visible
                document.getElementById(name).style.display = "none";
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

    <!-- Toastr JS -->
    <script src="../resources/vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="../dist/js/jquery.slimscroll.js"></script>

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