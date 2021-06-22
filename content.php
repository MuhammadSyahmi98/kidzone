<?php
include "resources/conn.php";
session_start();

$instructor_id = 1;

$student_id = '';


$subject_enrolled_completed = '';

if (!isset($_SESSION['student_id'])) {
  echo '<script>alert("Please Login");</script>';
  echo "<script>window.location.assign('student.php')</script>";
} else {
  $student_id = $_SESSION['student_id'];
}


if (isset($_GET['content'])) {
  $_SESSION['content'] = $_GET['content'];

  $sql = "SELECT * FROM subject_enrolled WHERE student_id = " . $student_id . " AND content_id = " . $_SESSION['content'] . "";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  } else {
    // Insert Data
    $temp =  $_SESSION['content'];
    $date = date('Y-m-d');
    $status = 'Not Completed';
    $num = '1';
    $stmt = $conn->prepare("INSERT INTO subject_enrolled (subject_enrolled_created, subject_enrolled_status, subject_enrolled_completed, student_id , content_id ) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $date, $status, $num, $student_id, $temp);
    $stmt->execute();
    $stmt->close();
  }
}







if (isset($_GET['id'])) {

  $section_vid = $_GET['id'];
  $video_path = $_GET['id2'];
  $subject_enrolled_completed = $_GET['id3'];
  $subject_enrolled_id = $_GET['id4'];

  // Update subject enrolled
  $i = $subject_enrolled_completed + 1;
  $sql = "UPDATE subject_enrolled SET subject_enrolled_completed = '" . $i . "' WHERE subject_enrolled_id = " . $subject_enrolled_id . "";
  $conn->query($sql);



  echo "<script> window.onload = function() {
    display_div();
}; </script>";
}



?>


<!DOCTYPE html>
<html style=" background-color: #ffffff !important;">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

  <link rel="stylesheet" href="resources/css/global.css" />
  <link rel="stylesheet" href="resources/css/components/card.css" />
  <link rel="stylesheet" href="resources/css/components/stats.css" />
  <link rel="stylesheet" href="resources/css/components/badge.css" />
  <link rel="stylesheet" href="resources/css/components/input.css" />
  <link rel="stylesheet" href="resources/css/components/header.css" />
  <link rel="stylesheet" href="resources/css/components/button.css" />
  <link rel="stylesheet" href="resources/css/components/heading.css" />
  <link rel="stylesheet" href="resources/css/components/table.css" />
  <link rel="stylesheet" href="resources/css/components/switch.css" />
  <link rel="stylesheet" href="resources/css/components/hamburgers.css" />
  <link rel="stylesheet" href="resources/css/components/form.css" />
  <script src="https://kit.fontawesome.com/048645d981.js" crossorigin="anonymous"></script>


  <title>KIDZONE | Course Content </title>

  <style>
    .isDisabled {
      pointer-events: none;
      color: black;
    }

    .middle {
      background-color: #d3d6db;
      height: auto;
    }

    .bottom {
      background-color: white;

      padding-top: 30px;
      padding-bottom: 10%;
    }

    hr {
      border: 1px solid #f1f1f1;
      margin-bottom: 25px;
      margin-left: 10%;
      margin-right: 10%;

    }

    .imgcontainer {
      padding: 40px;
      align-items: middle;
    }

    .accordion {
      background-color: #eee;
      color: #444;
      cursor: pointer;
      padding: 20px;
      width: 70%;
      border: none;
      text-align: left;
      outline: none;
      font-size: 15px;
      transition: 0.4s;
      margin-left: 15%;

    }

    .active,
    .accordion:hover {
      background-color: #ccc;
    }

    .accordion:after {
      content: '\002B';
      color: #777;
      font-weight: bold;
      float: right;
      margin-left: 5px;
      font-size: 30px;
    }

    .active:after {
      content: "\2212";
    }

    .panel {
      padding: 0 18px;
      background-color: white;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.2s ease-out;
    }

    .centerdiv {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>

<body>

  <body>
    <div class="header">
      <?php include('header.php'); ?>

    </div>



    <div id="video" class="middle" style="display: none;">
      <div>
        <video style="margin: auto; width: 90% !important; height: auto !important; display:block; padding-bottom: 22px; padding-top: 22px;" controls>
          <source src="resources/data/user/<?php echo $instructor_id ?>/<?php echo $_SESSION['content'] ?>/<?php echo $section_vid ?>/<?php echo $video_path ?>" type="video/mp4">
          <source src="resources/data/user/<?php echo $instructor_id ?>/<?php echo $_SESSION['content'] ?>/<?php echo $section_vid ?>/<?php echo $video_path ?>" type="video/mkv">
         
        </video>
    

      </div>
    </div>
    <div class="bottom">
      <br><label style="font-size: 20px; margin-left: 10%; font-weight: bold;">Course Content</label>
      <br>
      <hr style="height:2px;border-width:0;color:gray;background-color:gray">

      <?php
      $sql = "SELECT * FROM subject_enrolled WHERE content_id = " . $_SESSION['content'] . " AND student_id = " . $student_id . "";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $subject_enrolled_id = $row['subject_enrolled_id'];
        $subject_enrolled_completed = $row['subject_enrolled_completed'];
      }





      $sql = "SELECT * FROM section WHERE content_id = " . $_SESSION['content'] . "";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $i = 1;
        $z = 1;
        while ($row = $result->fetch_assoc()) {
      ?>



          <button class="accordion">Section <?php echo $i; ?>: <?php echo $row['section_name']; ?><p></p></button>
          <div class="panel" style="margin-left: 15%; margin-right: 15%"><br>
            <?php
            $setion_id = $row['section_id'];
            $sql2 = "SELECT * FROM resources WHERE section_id = " . $setion_id . "";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
              $m = 1;
              while ($row2 = $result2->fetch_assoc()) {
            ?>

                <input disabled <?php if($z<$subject_enrolled_completed){echo "checked";} ?> type="checkbox" id="lesson$m" name="lesson$m">
                <a class="<?php if ($z > $subject_enrolled_completed) {
                            echo "isDisabled";
                          } ?>" href="content.php?id=<?php echo $row['section_id']; ?>&&id2=<?php echo  $row2['resource_path'] ?>&&id3=<?php echo $subject_enrolled_completed ?>&&id4=<?php echo $subject_enrolled_id; ?>"><label for="lo$m"> <?php echo $row2['resource_description'];   ?></label></a><br><br>

            <?php
                $m++;
                $z++;
              }
            }

            ?>


          </div>

      <?php
          $i++;
        }
      }
      ?>


      <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
              panel.style.maxHeight = null;
            } else {
              panel.style.maxHeight = panel.scrollHeight + "px";
            }
          });
        }
      </script>

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

      <script>
        var acc = document.getElementsByClassName("centerdiv");
        var i;

        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
              panel.style.maxHeight = null;
            } else {
              panel.style.maxHeight = panel.scrollHeight + "px";
            }
          });
        }
      </script>

      <!-- <script>
            function openMenu() {
                var centerdiv = document.getElementById("centerdiv");
                if (centerdiv.classList) {
                    centerdiv.classList.toggle("open");
                }
            }
        </script> -->

      <script>
        function openMenu() {
          var menu = document.getElementById("menu");
          var hamburger = document.getElementById("hamburger");
          if (menu.classList && hamburger.classList) {
            menu.classList.toggle("open");
            hamburger.classList.toggle("is-active");
          }
        }
      </script>

      <script>
        function display_div() {
          if (document.getElementById("video").style.display === "none") {
            //its visible
            document.getElementById("video").style.display = "block";
          }
        }
      </script>


  </body>

</html>