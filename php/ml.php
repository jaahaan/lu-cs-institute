<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/courses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/headerFooter.css">
    <title>Machine Learning</title>
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
                <h1>Machine Learning</h1>
                <p><b>Machine Learning</b> is making the computer learn from studying data and statistics.
                    <br>
                    Machine Learning is a step into the direction of artificial intelligence (AI).
                    <br>
                    Machine Learning is a program that analyses data and learns to predict the outcome.
                </p>
                <hr>
                <h1>Where To Start?</h1>
                <p>
                    In this tutorial we will go back to mathematics and study statistics, and how to calculate important
                    numbers based on data sets.
                    <br>
                    We will also learn how to use various Python modules to get the answers we need.
                    <br>
                    And we will learn how to make functions that are able to predict the outcome based on what we have
                    learned.
                </p>
                <hr>
                <h1>Data Set</h1>
                <p>
                    In the mind of a computer, a data set is any collection of data. It can be anything from an array to a
                    complete database.
                    <br><br>
                    Example of an array:
                    <br>[99,86,87,88,111,86,103]
                </p>
                <hr>
                <h1>Data Types</h1>
                <p>
                    To analyze data, it is important to know what type of data we are dealing with.
    
                    We can split the data types into three main categories:
                <ul>
                    <li>Numerical</li>
                    <li>Categorical</li>
                    <li>Ordinal</li>
                </ul>
                </p>
                <hr>
                <button class="btn"><a href="https://www.w3schools.com/python/python_ml_getting_started.asp">Learn More <i
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