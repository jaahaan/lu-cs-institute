<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/courses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/headerFooter.css">
    <title>JAVA</title>
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
                            <h1>What is Java?</h1>
                            <p><b>Java</b> is a popular programming language, created in 1995.

                                It is owned by Oracle, and more than 3 billion devices run Java.<br><br>
                                <b>For Example:</b> A person is an object which has certain properties such as height, gender, age, etc.
                                It
                                also has certain methods such as move, talk, and so on.<br><br>
                                It is used for:
                            <ul>
                                <li>Mobile applications (specially Android apps)</li>
                                <li>Desktop applications</li>
                                <li>Web applications</li>
                                <li>Web servers and application servers</li>
                                <li>Games</li>
                                <li>Database connection</li>
                                <li>And much, much more!</li>
                            </ul>
                            </p>
                            <hr>
                            <h1>Why Use Java?</h1>
                            <p>
                            <ul>
                                <li>Java works on different platforms (Windows, Mac, Linux, Raspberry Pi, etc.)</li>
                                <li>It is one of the most popular programming language in the world</li>
                                <li>It is easy to learn and simple to use</li>
                                <li>It is open-source and free</li>
                                <li>It is secure, fast and powerful</li>
                                <li>It has a huge community support (tens of millions of developers)</li>
                                <li>Java is an object oriented language which gives a clear structure to programs and allows code to be
                                    reused, lowering development costs</li>
                                <li>As Java is close to C++ and C#, it makes it easy for programmers to switch to Java or vice versa
                                </li>
                            </ul>
                            </p>
                            <hr>
                            <h1>Get Started</h1>
                            <p>It is not necessary to have any prior programming experience.</p>
                            <button class="btn"><a href="https://www.w3schools.com/java/java_getstarted.asp">Get Started <i
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