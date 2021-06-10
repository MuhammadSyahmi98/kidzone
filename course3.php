<?php 

require 'resources/php/conn.php';
session_start();
$contentid= "";
$contentimage= "";
$contentname= "";
$contentdesc= "";


$sql = "SELECT * FROM content where content_level = '3'";
$result = $conn -> query ($sql); 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"
        />

        <link rel="stylesheet" href="css/global.css" />
        <link rel="stylesheet" href="css/components/card.css" />
        <link rel="stylesheet" href="css/components/stats.css" />
        <link rel="stylesheet" href="css/components/badge.css" />
        <link rel="stylesheet" href="css/components/input.css" />
        <link rel="stylesheet" href="css/components/header.css" />
        <link rel="stylesheet" href="css/components/button.css" />
        <link rel="stylesheet" href="css/components/heading.css" />
        <link rel="stylesheet" href="css/components/table.css" />
        <link rel="stylesheet" href="css/components/switch.css" />
        <link rel="stylesheet" href="css/components/hamburgers.css" />
        <link rel="stylesheet" href="css/components/form.css" />
        <link rel="stylesheet" href="css/layouts/instructor.css" />

        <script src="https://kit.fontawesome.com/048645d981.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <title>KIDZONE | Course </title>

        <!-- Start of ChatBot (www.chatbot.com) code -->
        <script type="text/javascript">
            window.__be = window.__be || {};
            window.__be.id = "60adc444ac852f0007859d3f";
            (function () {
                var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
                be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
            })();
        </script>
        <!-- End of ChatBot code -->

        <style>
          html {
          box-sizing: border-box;
        }

        *, *:before, *:after {
          box-sizing: inherit;
        }

        .column {
          float: left;
          width: 33.3%;
          margin-bottom: 16px;
          padding: 0 8px;

        }

        @media screen and (max-width: 650px) {
          .column {
            width: 100%;
            display: block;
          }
        }

        .card {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }


        .title {
          color: black;
        }


</style> 

    </head>
    <body>
        <div class="header">
        <?php include('header.php'); ?>
        </div>

        <center><h1 style="color: #000080; font-family:  helvetica; margin-top: 5%">Course </h1></center>
          <br>       
              
          <?php 

            if ($result->num_rows > 0) 
            {
              while ($row = $result->fetch_assoc())
              {   

                $contentid= $row['content_id'];
                $contentimage= $row['content_img'];
                $contentname= $row['content_subject_name'];
                $contentdesc= $row['content_description'];
               
          ?>
          
         
            <div class="row" style="display: inline-block;">
              <div class="column" >
                <div style="width: 450px; padding: 10px 5px; border-radius: 30px;" class="card">
                 
                     <tr><td><center><a href="content.php?content=<?php echo $contentid; ?>"><img src="img/subject/year3/<?php  echo $row['content_img']; ?>" style="width: 150px; height: 200px; "></a></center></td></tr><br>
                    
                    <tr><td><input type="text" style="border: none; text-align: center; font-size: 30px; width: 100%;" name="contentname" value="<?php echo $contentname; ?>" disabled></td></tr>
                    <td><textarea disabled rows="6" name="contentdesc" style="border: none; width: 100%;"><?php echo $contentdesc; ?></textarea> </td>
                    <br><br>

                </div>
                <br><br>
              </div>
            </div>
          <?php 
              }
            }
          ?>   


         <script>
            $(document).ready(function(){
              $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
              });
            });
        </script>

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


    </body>
</html>
