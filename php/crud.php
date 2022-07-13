<?php
session_start();
include 'config.php';
include '_header.php';
$success = false;
$error = false;
$titleErr = $priceErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $title = $_POST['title'];
        $price = $_POST['price'];
        $image = $_FILES['image'];
        //temporary Location
        $imageLocation = $image['tmp_name'];
        $imageName = $image['name'];
        $imageDestination = "../img/" . $imageName;
        move_uploaded_file($imageLocation, $imageDestination);

        $insert = "INSERT INTO courses VALUES('', '$title', '$price', '$imageDestination', current_timestamp())";

        if (strlen($title) < 1) {
            $titleErr = "Field Can't be empty!!";
        } else if (strlen($price) < 1) {
            $priceErr = "Field Can't be empty!!";
        } else {
            if (mysqli_query($conn, $insert)) {
                $success = "Course Added Successfully!!";
            } else {
                $error = "Something Went Wrong!!";
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Add New Courses</title>
</head>

<body>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

        if ($success == true) {
            echo '<div class="alert alert-success alert dismissiable fade show" role="alert">
                <strong>Success!</strong> ' . $success . '
                <button type="button" class ="close" data-dismiss="alert" aria-label ="Close">
                <span aria-hidden ="true">&times;</span>
                </button>
            </div>';
        }
        if ($error == true) {
            echo '<div class="alert alert-danger alert dismissiable fade show" role="alert">
                <strong>Error!</strong> ' . $error . '
                <button type="button" class ="close" data-dismiss="alert" aria-label ="Close">
                <span aria-hidden ="true">&times;</span>
                </button>
            </div>';
        }

        echo '<div class="container-fluid">
                <div class="row justify-content-center mt-5 mb-2">
                    <div class="col-lg-4 col-md-5 col-sm-10  card p-4 bg-dark text-light mx-3">
                        <h1 class="text-center">Add New Course</h1>
                        <hr>
                        <form action="addCourses.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Course Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                                <strong class="text-danger">' . $titleErr . '</strong>
                            </div>
                            <div class="form-group">
                                <label for="price">Course Price</label>
                                <input type="text" class="form-control" id="price" name="price">
                                <strong class="text-danger">' . $priceErr . '</strong> 
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                            
                            <button type="submit" class="btn btn-secondary d-block col-12 mt-3" name="add">Add</button>
                        </form>
                    </div>
                </div>
            </div>
                                        
            <div class="container-fluid shadow-lg p-3 mb-5 bg-light rounded">
                <h1 class="text-center mt-3 border border-dark rounded">Courses</h1>
                <div class="row">';

        $allData = mysqli_query($conn, "SELECT * FROM courses");
        while ($row = mysqli_fetch_array($allData)) {
            $id = $row['id'];
            $image = $row['image'];
            $title = $row['title'];
            $price = $row['price'];
            echo '<div class="col-md-4 col-lg-3 my-2 justify-content-center">
                        <div class="card bg-dark text-light text-center">
                            <img src="' . $image . '" class="card-img-top" alt="..." style="height: 16rem;">
                            <div class="card-body">
                                <h5 class="card-title">' . $title . '</h5>
                                <p class="card-text">' . $price . '</p>
                                <a href="update.php? id=' . $id . '" class="btn btn-outline-success d-inline-block col-5 m-2">Update</a>
                                <a href="delete.php? id=' . $id . '" class="btn btn-outline-danger d-inline-block col-5 m-2">Delete</a>
                            </div>
                        </div>
                    </div>';
        }
        echo '</div></div>';
    } else {
        echo "<script>alert('To add courses Please login first!!')</script>";
        echo "<script>location.href='index.php'</script>";
    }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <?php require '_footer.php'; ?>

</body>

</html>