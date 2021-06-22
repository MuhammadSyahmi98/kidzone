<?php
 session_start();
 require 'resources/php/conn.php';
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
        <link rel="stylesheet" href="css/layouts/buttongroup.css" />

        <script src="https://kit.fontawesome.com/048645d981.js" crossorigin="anonymous"></script>

        <title>KIDZONE | Year </title>

        <!-- Start of ChatBot (www.chatbot.com) code -->
<script type="text/javascript">
    window.__be = window.__be || {};
    window.__be.id = "60d1623a1270440007224690";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
</script>
<!-- End of ChatBot code -->

    </head>
    <body>
        <div class="header">
        <?php include('header.php'); ?>
        </div>

        <div class="body" style="margin-top: 10%;">
                <div class="btn-group">
                <div class="center">
                  <a href="course1.php"><button class="button white">Year 1</button></a> &nbsp;
                  <a href="course2.php"><button class="button white">Year 2</button></a> &nbsp;
                  <a href="course3.php"><button class="button white">Year 3</button></a> &nbsp;
                  <a href="course4.php"><button class="button white">Year 4</button></a> &nbsp;
                  <a href="course5.php"><button class="button white">Year 5</button></a> &nbsp;
                  <a href="course6.php"><button class="button white">Year 6</button></a> &nbsp;
                </div>
                </div>
                
                       
        </div>

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
