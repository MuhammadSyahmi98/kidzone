<?php
session_start();
require 'resources/php/conn.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

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
    <link rel="stylesheet" href="css/layouts/aboutus.css" />

    <script src="https://kit.fontawesome.com/048645d981.js" crossorigin="anonymous"></script>

    <title>KIDZONE | About Us </title>


    <style type="text/css">
        .content {
            max-width: auto;
            margin: auto;
            background: white;
            padding: 10px;
        }

        .centered-wrapper {
            position: relative;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <?php include('header.php'); ?>
    </div>

    <div class="body">
        <div class="field" style="margin: 5%;">
            <h1 style="text-align: center;">ABOUT US</h1><br>

            <!--Hanis Details-->
            <div class="column" style="margin-bottom: 7%;">
                <div class="card">
                    <img src="img/hanis.jpeg" style="width:100%">
                    <h3>Nor Hanis Afifah binti Harun</h3>
                    <h6>Third Year Student of Software Development at UTeM</h6>
                </div>
            </div>
            <!--Hidayah Details-->
            <div class="column">
                <div class="card">
                    <img src="img/dayah.png" style="width:100%">
                    <h3>Nurhidayah binti Mohd Lazim</h3>
                    <h6>Third Year Student of Software Development at UTeM</h6>
                </div>
            </div>
            <!--Syahmi Details-->
            <div class="column">
                <div class="card">
                    <img src="img/syahmi.jpeg" style="width:100%">
                    <h3>Muhammad Syahmi bin Abdul Jalil</h3>
                    <h6>Third Year Student of Software Development at UTeM</h6>
                </div>
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
    <!-- Start of ChatBot (www.chatbot.com) code -->
    <script type="text/javascript">
        window.__be = window.__be || {};
        window.__be.id = "60d1623a1270440007224690";
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



</body>

</html>