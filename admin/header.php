<?php

if (!isset($_SESSION['staff_id'])) {
    echo '<script>alert("Please Login");</script>';
    echo "<script>window.location.assign('../login2.php')</script>";
}


$staff_id = $_SESSION['staff_id'];

$sql100 = "SELECT * FROM staff WHERE staff_id = " . $staff_id . "";
$result100 = $conn->query($sql100);
if ($result100->num_rows > 0) {
}
$row100 = $result100->fetch_assoc();
$name100 = $row100['staff_name'];
$pic_profile = $row100['staff_pic_path'];
?>



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
                            <img src="../resources/img/profile/<?php echo $pic_profile; ?>" alt="user" class="avatar-img rounded-circle">
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