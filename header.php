<?php
$currentPath1 = explode('?', $_SERVER['REQUEST_URI'], 2);

$currentPath = $currentPath1[0];
?>



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
            
            
            
            
            <?php
            if (isset($_SESSION['student_id'])) {
                $student_id = $_SESSION['student_id'];

                $sql100 = "SELECT * FROM student WHERE student_id = ". $student_id ."";
                $result100 = $conn-> query ($sql100); 

                if ($result100->num_rows > 0) {
                    $row100 = $result100->fetch_assoc();

                    $name100 = $row100['student_name'];
                }


            ?>
                <div class="menu">
            <div class="left">
                <span class="header-small" style="color: white; font-size: 50px;"><a href="student.php">KIDZONE</a></span>
                <div id="hamburger" class="hamburger hamburger--spin" onclick="openMenu()">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </div>
                <nav id="menu">
                    <ul>
                        <li><a href="student.php" class="<?php if($currentPath === '/student.php'){echo "active";} ?>">Home</a></li>
                        <li><a href="instructor.php" class="<?php if($currentPath === '/instructor.php'){echo "active";} ?>">Instructor</a></li>
                        <li>
                            <a class="<?php if($currentPath === '/year.php'){echo "active";} if($currentPath === '/content.php'){echo "active";} if($currentPath === '/course1.php'){echo "active";}  if($currentPath === '/course2.php'){echo "active";}   if($currentPath === '/course3.php'){echo "active";}  if($currentPath === '/course4.php'){echo "active";} if($currentPath === '/course5.php'){echo "active";} if($currentPath === '/course6.php'){echo "active";}?>" href="course.php">Course <i class="fas fa-caret-down"></i> </a>
                            <div class="submenu">
                                <ul>
                                    <li>
                                        <a  href="year.php">Year</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li style="white-space: nowrap;" ><a class="<?php if($currentPath === '/aboutus.php'){echo "active";} ?>" href="aboutus.php">About Us</a></li>
                    </ul>
                </nav>
            </div>


            <div class="right link" >

                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn"><?php echo $name100;?> <i class="fas fa-caret-down"></i></button>
                    <div id="myDropdown" class="dropdown-content" >
                        <a style="z-index: 100;"  href="profile.php">My Profile</a>
                        <a style="z-index: 100;"  href="logout.php">Logout</a>
                    </div>
                </div>

            </div>
            </nav>
        </div>


            <?php


            } else {
            ?>
                <div class="menu">
                    <div class="left">
                        <span class="header-small" style="color: white; font-size: 50px;"><a href="student.php">KIDZONE</a></span>
                        <div id="hamburger" class="hamburger hamburger--spin" onclick="openMenu()">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </div>
                        <nav id="menu">
                            <ul>
                                <li><a href="student.php" class="<?php if($currentPath === '/student.php'){echo "active";} ?>">Home</a></li>
                                <li><a href="instructor.php" class="<?php if($currentPath === '/instructor.php'){echo "active";} ?>">Instructor</a></li>
                                <li>
                                    <a class="<?php if($currentPath === '/year.php'){echo "active";} if($currentPath === '/content.php'){echo "active";} if($currentPath === '/course1.php'){echo "active";}  if($currentPath === '/course2.php'){echo "active";}   if($currentPath === '/course3.php'){echo "active";}  if($currentPath === '/course4.php'){echo "active";} if($currentPath === '/course5.php'){echo "active";} if($currentPath === '/course6.php'){echo "active";}?>" href="#">Course <i class="fas fa-caret-down"></i> </a>
                                    <div class="submenu">
                                        <ul>
                                            <li>
                                                <a href="year.php">Year</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li style="white-space: nowrap;" ><a class="<?php if($currentPath === '/aboutus.php'){echo "active";} ?>" href="aboutus.php">About Us</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="right link">
                        <button class="button white"><a href="login.php">Login</a></button>&nbsp;
                        <button class="button white"><a href="register.php">Register</a></button>
                    </div>
                </div>

                </div>
                </div>
            <?php
            }
            ?>


<script>
        /* When the user clicks on the button, toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>