<?php
include "../resources/conn.php";
session_start();

if(!isset($_SESSION['instructor_id'])){
    echo '<script>alert("Please Login");</script>';
    echo "<script>window.location.assign('../login2.php')</script>";
}



$instructor_id = $_SESSION['instructor_id'];

$sql100 = "SELECT * FROM instructor WHERE instructor_id = ". $instructor_id ."";
$result100  = $conn->query($sql100 );

if ($result100->num_rows > 0) {
    $row100 = $result100->fetch_assoc();
    $name100 = $row100['instructor_name'];
    $path100 = $row100['instructor_pic_path'];
}


$year = $subject = $description = '';

if(isset($_POST['save'])){
    $year = $_POST['year'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];

    if(!empty($year) && !empty($subject) && !empty($description)) {
        $date = date('Y-m-d');
        $status = 'Not Completed';

        // Temporary instructor_id 
        $instructor_id = 1;

        // Create User and store data in database
        $stmt = $conn->prepare("INSERT INTO content (content_subject_name, content_level, content_description, content_created, content_status, instructor_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $subject, $year, $description, $date, $status, $instructor_id);
        $stmt->execute();
        $stmt->close();
       


        $sql = "SELECT * FROM content WHERE content_description = '". $description ."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row=$result->fetch_assoc();
            $content_id = $row['content_id'];
        }

        echo "<script>alert('Success Add Subject');
		       window.location.href='matapelajaran.php?id=". $content_id ."';
		       </script>";


    } else{
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
                <form method="POST">
                        <button name="save" class="btn btn-primary" style="margin-right: 10px; height: 50%;">Save</button>
                    
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
                        <h2 class="hk-pg-title font-weight-600 mb-10">Add Subject</h2>
                        <!-- <p>Questions about onboarding lead data? <a href="#">Learn more.</a></p> -->
                    </div>

                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h4>General Information</h4>
                            <hr>
                            <p class="mb-25">Please fill in the fields below.</p>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        
                                            <div class="form-group">
                                                <label class="control-label mb-10">Standard</label>
                                                <select id="year" name="year" class="form-control custom-select" value>
                                                    <option value="">Choose year</option>
                                                    <option value="1" <?php if($year === '1'){echo "selected";} ?>>1</option>
                                                    <option value="2" <?php if($year === '2'){echo "selected";} ?>>2</option>
                                                    <option value="3" <?php if($year === '3'){echo "selected";} ?>>3</option>
                                                    <option value="4" <?php if($year === '4'){echo "selected";} ?>>4</option>
                                                    <option value="5" <?php if($year === '5'){echo "selected";} ?>>5</option>
                                                    <option value="6" <?php if($year === '6'){echo "selected";} ?>>6</option>
                                                </select>
                                                <small id="year_feedback" class="custom-display">Please select one option</small>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label mb-10">Subject</label>
                                                <select id="subject" name="subject" class="form-control custom-select">
                                                    <option value="">Choose subject</option>
                                                    <option value="Mathematics" <?php if($subject === 'Mathematics'){echo "selected";} ?>>Mathematics</option>
                                                    <option value="Science" <?php if($subject === 'Science'){echo "selected";} ?>>Science</option>
                                                    <option value="Bahasa Melayu" <?php if($subject === 'Bahasa Melayu'){echo "selected";} ?>>Bahasa Melayu</option>
                                                    <option value="English" <?php if($subject === 'English'){echo "selected";} ?>>English</option>
                                                </select>
                                                <small id="subject_feedback" class="custom-display">Please select one option</small>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label mb-10">Description</label>
                                                <textarea id="description" name="description" class="form-control" rows="5"><?php echo $description; ?></textarea>
                                                <small id="description_feedback" class="custom-display">Please fill in this space</small>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
                    function myFunction() {

                        var inpObj = document.getElementById("year");
                        if (inpObj.value.length == 0) {
                            document.getElementById("year_feedback").style.display = "block";
                        } else {
                            document.getElementById("year_feedback").style.display = "none";
                        }

                        var inpObj = document.getElementById("subject");
                        if (inpObj.value.length == 0) {
                            document.getElementById("subject_feedback").style.display = "block";
                        } else {
                            document.getElementById("subject_feedback").style.display = "none";
                        }

                        var inpObj = document.getElementById("description");
                        if (inpObj.value.length == 0) {
                            document.getElementById("description_feedback").style.display = "block";
                        } else {
                            document.getElementById("description_feedback").style.display = "none";
                        }

                    }
                </script>



    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="../dist/js/feather.min.js"></script>

    <!-- Toastr JS -->
    <script src="../vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>

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