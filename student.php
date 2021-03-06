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
    <link rel="stylesheet" href="css/layouts/slideshow.css" />

    <script src="https://kit.fontawesome.com/048645d981.js" crossorigin="anonymous"></script>

    <title>KIDZONE | Main Page </title>




</head>

<body>
    <div class="header">
        <?php include('header.php'); ?>
    </div>

    <div class="body">
        <br><br>
        <!-- Slideshow container -->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <img src="img/intro.png" style="width:100%">
            </div>

            <div class="mySlides fade">

                <img src="img/intro2.png" style="width:100%">

            </div>

            <div class="mySlides fade">

                <img src="img/intro3.png" style="width:100%">

            </div>


        </div>
        <br>

        <!-- The dots/circles -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

        <!-- Body Content -->
        <div class="body">
            <div class="content">

                <form action="/settings.php" method="post">
                    <div class="group">
                        <div class="card">
                            <div class="content">
                                <div class="field">
                                    <h2 class="heading">
                                        WELCOME TO KIDZONE!
                                    </h2>
                                    <img src="img/kiddo.png" style="width:60%; margin: 20%;"></h2>
                                    <div class="subheading">
                                        Education is one of the most vital aspect in one???s life. Everyone should be given a chance to pursue their education. However, some of the kids have an unfortunate event in their life which causing them to have a poor education and worst, not having education at all.</div>

                                </div>
                            </div>
                        </div>


                        <div>
                            <div class="card">
                                <div class="content">
                                    <div class="fields-row">
                                        <div class="field">
                                            <h2>BACKGROUND <img src="img/classroom.png" style="width:5%"></h2>
                                            <br>
                                            <div class="subheading">KidZone is a web-based application that will be built specifically for kids to learn. Many kids have been living in poverty and thus resulting in dropping out of their lessons. Therefore, KidZone will serve as a platform for all the kids to learn so that they will get a proper education.
                                                <br><br>


                                                If you're ready to make the commitment to learning, but don't want the expense and time commitment of a traditional education, online education may be just for you. It offers similar coursework at a zero cost without sacrificing quality.<br><br>

                                                Online education has had a positive impact. One major benefit is that there is interaction with the instructor and their feedback helps improve the quality of your work. Even distance learning can be beneficial if done appropriately and efficiently which can offer flexibility in your schedule, especially if you would rather spend time with family or doing other activities outside school.<br><br>

                                                One downside is that it does not provide you with the tactile experience that an in-person classroom does when you are taking notes or solving problems hands-on.
                                            </div><br><br>

                                            <h2>BENEFITS OF JOINING US</h2><br>

                                            <p>Personal Ability Advancement</p>
                                            <li>Throughout their studies, students are expected to complete a variety of projects, discussions, classes, and other activities. As a result, they grow up with a fantastic skill set that they will apply in the workforce. Furthermore, extracurricular activities teach students arts, athletics, and other skills that can support them personally in life and engage with others.
                                            </li><br>



                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                </form>
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

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>
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