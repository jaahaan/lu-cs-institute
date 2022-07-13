<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/courses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/headerFooter.css">
    <title>JavaScript</title>
</head>

<body>
<?php
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
            echo '<nav>
            <a href="index.html"> <img src="../img/logo (3).png" alt="logo" id="logo">
            </a>
            <i class="fa fa-bars" onclick="showMenu()" id="show"></i>
            <i class="fa fa-bars" onclick="hideMenu()" id="hide"></i>
            <div class="nav-lists" id="navLinks">
                <ul>
                    <li><a href="index.php"><i class="fa fa-home"></i></a></li>
                    <li><a href="oop.php">OOP</a> </li>
                    <li><a href="java.php">JAVA</a></li>
                    <li><a href="toc.php">TOC</a></li>
                    <li><a href="js.php">JavaScript</a></li>
                    <li><a href="ml.php">ML</a></li>
                </ul>
            </div>
        </nav>
        <div class="content-wrap">
            <div class="content">
                <h1>What is JavaScript?</h1>
                <p><b>JavaScript</b> is a lightweight, interpreted programming language with object-oriented capabilities
                    that allows you to build interactivity into otherwise static HTML pages.
    
    
                <blockquote>JavaScript code is not compiled but translated by the translator. This translator is embedded
                    into the browser and is responsible for translating javascript code.</blockquote>
                <br>
                <ul>
                    <li>It is Lightweight, interpreted programming language.</li>
                    <li>It is designed for creating network-centric applications.</li>
                    <li>It is complementary to and integrated with Java.</li>
                    <li>It is complementary to and integrated with HTML</li>
                    <li>Database connection</li>
                    <li>It is an open and cross-platform</li>
                </ul>
                </p>
                <hr>
                <h1>JavaScript Statements</h1>
                <p>
                    JavaScript statements are the commands to tell the browser to what action to perform. Statements are
                    separated by semicolon (;).
    
                    <br><br>JavaScript statement constitutes the JavaScript code which is translated by the browser line by
                    line.
                </p>
                <hr>
                <button class="btn"><a href="https://www.w3schools.com/js/js_intro.asp">Learn More <i
                            class="fa-solid fa-arrow-right"></i></a></button>
            </div>
    
            <div class="content">
                <h2>COLOR PICKER</h2>
                <a href="https://www.w3schools.com/colors/colors_picker.asp"><img src="../img/colorpicker2000.png"
                        alt="color picker"></a>
    
                <hr>
                <h2>Top Tutorials</h2>
                <p>
                <ul>
                    <li><a href="https://www.w3schools.com/html/default.asp">HTML Tutorial</li></a>
                    <li><a href="https://www.w3schools.com/css/default.asp">CSS Tutorial</li></a>
                    <li><a href="https://www.w3schools.com/js/default.asp">JavaScript Tutorial</li></a>
                    <li><a href="https://www.w3schools.com/sql/default.asp">SQL Tutorial</li></a>
                    <li><a href="https://www.w3schools.com/php/default.asp">PHP Tutorial</li></a>
                </ul>
                </p>
    
                <hr>
                <div class="box">
                    <h2>Get certified by completing a course today!</h2>
                    <img src="../img/large.webp" alt="w3schools" id="w3">
                    <button class="btn"><a href="https://courses.w3schools.com/">Get Started</a></button>
                </div>
            </div>
        </div>
        <footer class="bottom-container">
            <ul>
                <li><a href="https://www.facebook.com/jaaahaaan"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="https://www.linkedin.com/in/-jaahaan-/"><i class="fa-brands fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="https://github.com/jaahaan"><i class="fa-brands fa-github"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>
            <p>Copyright &copy; Nargish Jahan <span id="year"></span></p>
        </footer>
        <script src="../js/menu.js"></script>';
        } else{
            echo '<script>alert("To Access Courses Login First")</script>';
            echo "<script>location.href='index.php'</script>";
        } 
    ?>

</body>

</html>