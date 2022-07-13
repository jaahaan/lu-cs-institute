<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/courses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/headerFooter.css">
    <title>OOP</title>
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
                <h1>What Is Object-Oriented Programming (OOP)?</h1>
                <p><b>Object-oriented programming (OOP)</b> is a programming paradigm based on the concept of "objects",
                    which
                    may
                    contain data, in the form of fields, often known as attributes; and code, in the form of procedures,
                    often
                    known
                    as methods.<br><br>
                    <b>For Example:</b> A person is an object which has certain properties such as height, gender, age, etc.
                    It
                    also has certain methods such as move, talk, and so on.
                </p>
                <hr>
                <h1>Object-oriented programming has several advantages over procedural programming:</h1>
                <p>
                <ul>
                    <li>OOP is faster and easier to execute</li>
                    <li>OOP provides a clear structure for the programs</li>
                    <li>OOP helps to keep the Java code DRY "Do not Repeat Yourself", and makes the code easier to maintain,
                        modify and debug</li>
                    <li>OOP makes it possible to create full reusable applications with less code and shorter development
                        time
                    </li>
                </ul>
                </p>
                <p>
                    <b style="color: rgb(62, 153, 62); display: inline;">Tip: </b><br>The "Do not Repeat Yourself" (DRY)
                    principle is about reducing the repetition of code. <br>You should extract out the codes that are common
                    for the application, and place them at a single place and reuse them
                    instead of repeating it.
                </p>
                <hr>
                <h1>OOPs (Object-Oriented Programming System)</h1>
                <p>Object means a real-world entity such as a pen, chair, table, computer, watch, etc. <br> Object-Oriented
                    Programming is a methodology or paradigm to design a program using classes and objects. <br> It
                    simplifies
                    software development and maintenance by providing some concepts:</p>
                <img src="../img/java-oops.png" alt="oops" id="oops">
                <hr>
                <button class="btn"><a href="https://www.w3schools.com/java/java_oop.asp">Learn More <i
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