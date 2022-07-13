<?php
include 'config.php';
session_start();
$titleErr = $priceErr = "";

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if (isset($_POST['id'])) {
        if (isset($_POST['update'])) {
            $uid = $_POST['id'];
            $title = $_POST['title'];
            $price = $_POST['price'];
            $image = $_FILES['image'];
            //temporary Location
            $imageLocation = $image['tmp_name'];
            $imageName = $image['name'];
            $imageDestination = "../img/" . $imageName;
            move_uploaded_file($imageLocation, $imageDestination);
            $update = "UPDATE courses SET title='$title', price='$price', image='$imageDestination', created_at= current_timestamp() WHERE id='$uid'";
            if (strlen($title) < 1) {
                $titleErr = "Field Can't be empty!!";
            } else if (strlen($price) < 1) {
                $priceErr = "Field Can't be empty!!";
            } else {
                if (!mysqli_query($conn, $update)) {
                    echo '<script>alert("Something went wrong")</script>';
                    echo '<script>location.href="addCourses.php"</script>';
                } else {
                    echo '<script>alert("Successfully Updated")</script>';
                    echo '<script>location.href="addCourses.php"</script>';
                }
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/headerFooter.css">
    <title>Update Course</title>
</head>

<body>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if (isset($_REQUEST['id'])) {
            $id = $_GET['id'];
            $dataFetchQuery = "SELECT * FROM `courses` WHERE id = $id";
            $record = mysqli_query($conn, $dataFetchQuery);
            $data  = mysqli_fetch_array($record);
            //echo $data["title"];
    ?>

            <div class="container-fluid">
                <div class="row justify-content-center mt-5 mb-5">
                    <div class="col-lg-4 col-md-5 col-sm-10  card p-4 bg-dark text-light mx-3">
                        <h1 class="text-center">Update Course Info</h1>
                        <hr>
                        <form action="update.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Course Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $data['title']; ?>">
                                <strong class="text-danger"><?php echo $titleErr; ?></strong>
                            </div>
                            <div class="form-group">
                                <label for="price">Course Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="<?php echo $data['price']; ?>">
                                <strong class="text-danger"><?php echo $priceErr; ?></strong>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image" value="<?php echo $data['image']; ?>">
                            </div>
                            <div class="form-group">
                                <img src="<?php echo $data['image']; ?>" width=150px>
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            </div>
                            <button type="submit" class="btn btn-secondary d-block col-12 mt-3" name="update">Update</button>
                        </form>
                    </div>
                </div>
            </div>
    <?php
        } else {
            echo "<script>alert('Do not try to access from URL!!')</script>";
            echo "<script>location.href='index.php'</script>";
        }
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
</body>

</html>