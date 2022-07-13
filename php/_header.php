<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
echo  '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php"> <img src="../img/logo (3).png" alt="logo" id="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mx-2 mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="courses.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Courses
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                  $sql = "SELECT title, path FROM free_courses";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($result)){
                    echo '<a class="dropdown-item" href="'. $row['path'].'">'.$row['title'].'</a>';
                  }
                  echo '</div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contactUs.php">Contact Us</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="addCourses.php">Add Courses</a>
                </li>  
                <li class="nav-item">
                  <a class="nav-link" href="todo.php">Todo List</a>
                </li>       
              </ul>
                <p class = "text-light my-0 mx-2">Welcome '.$_SESSION['fname']. ' '.$_SESSION['lname']. ' </p></form>
                <a href="_logout.php" class="btn btn-outline-success m-2" >Logout</a>
                </div>
          </div>
    </nav>';
                }
