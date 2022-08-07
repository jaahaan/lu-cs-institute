<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

    <title>Courses</title>
</head>

<body>
    <?php
    session_start();
    include 'config.php';
    require '_header.php'; ?>

    <!-- Slider starts here -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/2400x600/?coding,programming" class="d-block w-100" height="200px" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x600/?code,programming" class="d-block w-100" height="200px" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x600/?code,programming" class="d-block w-100" height="200px" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container my-3">
        <h1 class="text-center mt-3 border border-dark rounded">Free Courses</h1>
        <div class="row my-4">
            <!-- fetch all the courses -->
            <?php
            $sql = "SELECT * FROM free_courses";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $title = $row['title'];
                $desc = $row['description'];
                $path = $row['path'];

                echo '<div class="col-md-6 col-lg-4 my-2 justify-content-center">
                            <div class="card bg-dark text-light">
                                <img src="https://source.unsplash.com/500x400/?programming,code,coding" class="card-img-top" alt="..." style="height: 16rem;">
                                <div class="card-body">
                                    <h4 class="card-title text-center">' . $title . '</h4>
                                    <p class="card-text">' . substr($desc, 0, 75) . '...</p>
                                    <a href="' . $path . '" class="btn btn-outline-success d-block">View More</a>
                                    </div>
                            </div>
                        </div>';
            }
            ?>
            <!-- use a for loop to iterate through categories -->


        </div>
    </div>

    <!-- paid courses container -->
    <div class="container my-3">
        <h1 class="text-center mt-3 border border-dark rounded">Paid Courses</h1>
        <div class="row my-4">
            <!-- fetch all the courses -->
            <?php
            $sql = "SELECT * FROM courses";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $image = $row['image'];

                echo '<div class="col-md-4 col-lg-3 my-2 justify-content-center">
               <div class="card bg-dark text-light text-center">
                   <img src="' . $image . '" class="card-img-top" alt="..." style="height: 16rem;">
                   <div class="card-body">
                       <h4 class="card-title">' . $title . '</h4>
                       <p class="card-text">' . $price . '</p>
                       <a href="#' . $id . '" class="btn btn-outline-success d-block">Enroll Now</a>
                   </div>
               </div>
           </div>';
            }
            ?>

        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>