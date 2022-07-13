<?php
    session_start();
    include 'config.php';
    require '_header.php'; 
    $success= false;
    $error= false;
    $titleErr  = "";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['add'])){
            $title = $_POST['todo_input'];
    
            $insert = "INSERT INTO todo VALUES('', '$title', 'No', '', current_timestamp(), '')";
    
            if(strlen($title)<1){
                $titleErr = "Field Can't be empty!!";
            } else {
                if(mysqli_query($conn, $insert)){
                    $success = "Task Added Successfully!!";
                } else{
                    $error = "Something Went Wrong!!";
                }
            }
        } 
        if(isset($_POST['check'])){
            $uid = $_POST['id'];
            $title = $_POST['title'];
            $completed = 'Yes';
            $completed_at = $_POST['completed_at'];
            $created_at = $_POST['created_at'];
            $updated_at = $_POST['updated_at'];

            
            $update = "UPDATE todo SET title='$title', completed= '$completed', completed_at= current_timestamp(), created_at='$created_at' ,  updated_at= '$update_at' WHERE id='$uid'";
            if(!mysqli_query($conn, $update)){
                $error = "Something Went Wrong!!";
                echo '<script>location.href="todo.php"</script>';
            } else{
                $success = "Task Updated Successfully!!";
                echo '<script>location.href="todo.php"</script>';
            }
        } 
        if(isset($_POST['uncheck'])){
            $uid = $_POST['id'];
            $title = $_POST['title'];
            $completed = 'No';
            $completed_at = $_POST['completed_at'];
            $created_at = $_POST['created_at'];
            $updated_at = $_POST['updated_at'];

            $update = "UPDATE todo SET title='$title', completed= '$completed', completed_at= '', created_at='$created_at' ,  updated_at= '$update_at' WHERE id='$uid'";
            if(!mysqli_query($conn, $update)){
                $error = "Something Went Wrong!!";
                echo '<script>location.href="todo.php"</script>';
            } else{
                $success = "Task Updated Successfully!!";
                echo '<script>location.href="todo.php"</script>';
            }
        } 
        if(isset($_POST['update'])){
            $uid = $_POST['id'];
            $title = $_POST['edit_input'];
            $completed = $_POST['completed'];
            $completed_at = $_POST['completed_at'];
            $created_at = $_POST['created_at'];
            
            $update = "UPDATE todo SET title='$title', completed= '$completed', completed_at= '$completed_at', created_at='$created_at',  updated_at= current_timestamp() WHERE id='$uid'";
            if(!mysqli_query($conn, $update)){
                $error = "Something Went Wrong!!";
                echo '<script>location.href="todo.php"</script>';
            } else{
                $success = "Task Updated Successfully!!";
                echo '<script>location.href="todo.php"</script>';
            }
        } if(isset($_POST['delete'])){
            $id = $_POST['id'];
            $delete = "DELETE FROM `todo` WHERE id = $id";
            if(!mysqli_query($conn, $delete)) {
                $error="Something went wrong";
                echo '<script>location.href="todo.php"</script>';
            } else {
                $error = "Successfully deleted!!";
                echo '<script>location.href="todo.php"</script>';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="../css/style.css">
    
    <title>Todo</title>
</head>

<body>
<div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card p-5">
                    <div class="card-header text-center text-info">
                        <h4>Todo List</h4>
                    </div>
                    <div class="card-body">
                    <form action="todo.php" method="post">
                        <div class="input-group bg-dark">
                            <input type="text" placeholder="Write Your Task.." class="form-control"
                                    name="todo_input">
                            <div class="m-auto d-block">
                                <button type="submit" class="btn btn-dark " name="add"><i
                                        class="fa-solid fa-calendar-plus"></i></button>
                            </div>
                        </div>
                        <div>
                            <strong class="text-danger float-start"><?php echo $titleErr; ?></strong>
                            <a href="todo.php" class="link-danger float-end" style="text-decoration:none" name="clear">Clear</a>
                        </div>
                    </form> 
                    </div> 
                    <?php
                        if($success==true){
                            echo '<div class="alert alert-success alert dismissiable fade show" role="alert">
                                    '.$success.'
                                    <button type="button" class ="close" data-dismiss="alert" aria-label ="Close">
                                    <span aria-hidden ="true">&times;</span>
                                    </button>
                                </div>';
                        }
                        if($error==true){
                            echo '<div class="alert alert-danger alert dismissiable fade show" role="alert">
                                    '. $error .'
                                    <button type="button" class ="close" data-dismiss="alert" aria-label ="Close">
                                    <span aria-hidden ="true">&times;</span>
                                    </button>
                                </div>';
                        }
                    ?>
                    <div class="container justify-content-center">
                        <nav id="tab">
                            <div class="m-auto nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link m-auto active" id="nav-up-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-up" type="button" role="tab" aria-controls="nav-up"
                                    aria-selected="false">Upcoming Tasks</button>
                                <button class="nav-link m-auto" id="nav-cm-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-cm" type="button" role="tab" aria-controls="nav-cm"
                                    aria-selected="false">Completed Tasks</button>
                            </div>
                        </nav>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-up" role="tabpanel" aria-labelledby="nav-up-tab">
                            <h4 class="alert-danger py-3 text-center mt-5">
                                Upcoming Tasks
                            </h4>
                            <table class="table table-striped rounded">

                                <thead>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Action</th>
                                </thead>
                                <tbody>
                                <?php
                                    $allData = mysqli_query($conn, "SELECT * FROM todo");
                                    while($row = mysqli_fetch_array($allData)){
                                            $id = $row['id'];
                                            $title = $row['title'];
                                            $completed = $row['completed'];
                                            $created_at = $row['created_at'];
                                            $updated_at = $row['updated_at'];

                                            echo '<tr>';
                                            if($completed=='No'){
                                            if(isset($_REQUEST['id']) && $_REQUEST['id']==$id && isset($_REQUEST['edit'])){
                                                $id = $_POST['id'];
                                                $dataFetchQuery = "SELECT * FROM `todo` WHERE id = $id";
                                                $record = mysqli_query($conn, $dataFetchQuery);
                                                $data  = mysqli_fetch_array($record);
                                                ?>
                                                <div>
                                                <form action="todo.php" method="post">
                                                    <td>
                                                        <input type="text" class="form-control" name="edit_input" value= "<?php echo $data['title']; ?>">
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="submit" class="btn btn-sm text-success" name="update"><i class="fa-solid fa-square-check"></i></button>
                                                        <button type="submit" class="btn btn-sm text-danger" name="reset"><i class="fa-solid fa-xmark"></i></button>
                                                        <input type="hidden" name ="id" value="<?php echo $data['id']; ?>">
                                                        <input type="hidden" name ="completed" value="<?php echo $data['completed']; ?>">
                                                        <input type="hidden" name ="completed_at" value="<?php echo $data['completed_at']; ?>">
                                                        <input type="hidden" name ="created_at" value="<?php echo $data['created_at']; ?>">
                                                    <input type="hidden" name ="update_at" value="<?php echo $data['update_at']; ?>">
                                                    </td>
                                                </form>
                                                </div>
                                            <?php
                                        
                                            } else {
                                            ?>
                                            <div>
                                            <form action="todo.php" method="post">
                                                <td>
                                                    <button type="submit" class="btn btn-sm text-dark" name="check"><i class="fa-solid fa-circle-check  me-3"></i></button>
                                                    <?php echo $title; ?>
                                                    </td>
                                                    <td class="text-center">
                                                    <button type="submit" class="btn btn-sm text-info" name="edit"><i class="fa-solid fa-pen-to-square"></i></button>
                                                    <button type="submit" class="btn btn-sm text-danger" name="delete"><i class="fa-solid fa-trash-can"></i></button>
                                                    <input type="hidden" name ="id" value="<?php echo $id; ?>">
                                                    <input type="hidden" name ="title" value="<?php echo $title; ?>">
                                                    <input type="hidden" name ="completed" value="<?php echo $completed; ?>">
                                                    <input type="hidden" name ="created_at" value="<?php echo $created_at; ?>">
                                                    <input type="hidden" name ="update_at" value="<?php echo $data['update_at']; ?>">
                                                </td>
                                            </form>
                                            </div>
                                            
                                            <?php
                                            }
                                        }
                                        echo '</tr>';
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="nav-cm" role="tabpanel" aria-labelledby="nav-cm-tab">
                            <h4 class="alert-success py-3 text-center mt-5">
                                Completed Tasks
                            </h4>
                            <table class="table table-dark table-striped">
                                <thead>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Action</th>
                                </thead>
                                <tbody>
                                <?php
                                    $allData = mysqli_query($conn, "SELECT * FROM todo");
                                    while($row = mysqli_fetch_array($allData)){
                                            $id = $row['id'];
                                            $title = $row['title'];
                                            $completed = $row['completed'];
                                            $created_at = $row['created_at'];
                                            $updated_at = $row['updated_at'];

                                            echo '<tr>';
                                            if($completed=='Yes'){
                                            ?>
                                            <div>
                                            <form action="todo.php" method="post">
                                                <td>
                                                    <button type="submit" class="btn btn-sm text-info" name="uncheck"><i class="fa-solid fa-circle-check  me-3"></i></button>
                                                    <?php echo $title; ?>
                                                    </td>
                                                    <td class="text-center">
                                                    <button type="submit" class="btn btn-sm text-danger" name="delete"><i class="fa-solid fa-trash-can"></i></button>
                                                    <input type="hidden" name ="id" value="<?php echo $id; ?>">
                                                    <input type="hidden" name ="title" value="<?php echo $title; ?>">
                                                    <input type="hidden" name ="completed" value="<?php echo $completed; ?>">
                                                    <input type="hidden" name ="created_at" value="<?php echo $created_at; ?>">
                                                    <input type="hidden" name ="update_at" value="<?php echo $update_at; ?>">
                                                </td>
                                            </form>
                                            </div>
                                            <?php
                                            }
                                        
                                        echo '</tr>';
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <?php require '_footer.php'; ?>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>