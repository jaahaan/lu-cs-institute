<nav>
    <a href="index.php"> <img src="../img/logo (3).png" alt="logo" id="logo">
    </a>
    <i class="fa fa-bars" onclick="showMenu()" id="show"></i>
    <i class="fa fa-bars" onclick="hideMenu()" id="hide"></i>
    <div class="nav-lists" id="navLinks">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="courses.php">Courses <i class="fa fa-caret-down"></i></a>
                <ul>
                    <li><a href="oop.php">OOP</a></li>
                    <li><a href="java.php">JAVA</a></li>
                    <li><a href="toc.php">TOC</a></li>
                    <li><a href="js.php">JavaScript</a></li>
                    <li><a href="ml.php">ML</a></li>
                </ul>
            </li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
            <?php
            session_start();
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<li><a href="addCourses.php">Add Course</a></li>
                    <li><a href="todo.php">Todo List</a></li>

                            <li><a href="#" class="name">' . $_SESSION['fname'] . ' ' . $_SESSION['lname'] . ' <i class="fa fa-caret-down"></i></a>
                                    <ul>
                                    <li><a href="logout.php">Logout</a></li>
                                    </ul>
                            </li>
                            
                          ';
            } else {
                echo '<li><a href="registration.php">Registration</a></li>
                          <li><a href="login.php">Login</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>