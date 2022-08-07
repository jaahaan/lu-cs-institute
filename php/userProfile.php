<?php
session_start();
include 'config.php';
require '_header.php';
$success = false;
$error = false;
$fnameErr = $lnameErr = $mobileErr = $oldpassErr = $newPassErr = $cpassErr = "";

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if (isset($_POST['update'])) {
        $id = $_SESSION['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $created_at = $_POST['created_at'];
        $np = '/[a-zA-z. ]+$/';
        $mp = '/(\+88)?0 ?1[3-9]\d{2}-?\d{6}/';
        $ep = "/(cse|eee|ce|arch|law|bba|eng|bng)_\d{10}@lus\.ac\.bd/";
        $pp = '/((?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%&*?><+_-])).{8,20}/';

        if (strlen($fname) < 3 || strlen($fname) > 20) {
            $fnameErr = "Length must be in between 3-20!!";
        } else if (!preg_match($np, $fname)) {
            $fnameErr = "Only Characters are allowed!!";
        } else if (strlen($lname) < 3 || strlen($lname) > 20) {
            $lnameErr = "Length must be in between 3-20!!";
        } else if (!preg_match($np, $lname)) {
            $lnameErr = "Only Characters are allowed!!";
        } else if (!preg_match($mp, $mobile)) {
            $mobileErr = "Please enter a Valid mobile number!!";
        } else {
            $update = "UPDATE users SET fname='$fname', lname='$lname', email='$email', mobile='$mobile',pass='$password', created_at = current_timestamp() WHERE id='$id'";
            if (mysqli_query($conn, $update)) {
                $success = 'Profile Info Updated Successfully!!';
            } else {
                $error = 'Something went wrong!!';
            }
        }
    }

    if (isset($_POST['changePass'])) {
        $id = $_SESSION['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $cpass = $_POST['cpass'];
        $created_at = $_POST['created_at'];

        $pp = '/((?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%&*?><+_-])).{8,20}/';

        if ($password !== $oldpass) {
            $error = "Incorrect old password";
        } else if (!preg_match($pp, $newpass)) {
            $error = "Password required 1 upper, 1 lower, 1 digit, 1 sp, length 8-12!!";
        } else if (!preg_match($pp, $cpass)) {
            $error = "Confirm password required 1 upper, 1 lower, 1 digit, 1 sp, length 8-12!!";
        } else if ($newpass !== $cpass) {
            $error = "Password and Confirm password Mismatch!!";
        } else {
            $update = "UPDATE users SET fname='$fname', lname='$lname', email='$email', mobile='$mobile',pass='$newpass', created_at = current_timestamp() WHERE id='$id'";
            if (mysqli_query($conn, $update)) {
                $success = 'Password Updated Successfully!!';
            } else {
                $error = 'Something went wrong!!';
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

    <title>Profile</title>
</head>

<body>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
        <div class="container mt-3 h-150">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-9 col-lg-7">
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        $id = $_SESSION['id'];
                        $dataFetchQuery = "SELECT * FROM `users` WHERE id = $id";
                        $record = mysqli_query($conn, $dataFetchQuery);
                        $data  = mysqli_fetch_array($record);
                        $fname = $data["fname"];
                        $lname = $data["lname"];
                        $email = $data['email'];
                        $mobile = $data['mobile'];
                        $password = $data["pass"];
                        $created_at = $data['created_at'];
                        //echo $data["title"];
                    ?>
                        <div class="card p-3 mt-3">
                            <h4 class="alert-success py-3 text-center ">
                                Profile
                            </h4>
                            <table class="table table-striped rounded text-center">
                                <tbody>
                                    <tr>
                                        <td>Name: <?php echo $fname . ' ' . $lname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email: <?php echo $email; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile No: <?php echo $mobile; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <?php
                        if ($success == true) {
                            echo '<div class="alert alert-success alert dismissiable fade show" role="alert">
                                    ' . $success . '
                                    <button type="button" class ="close" data-dismiss="alert" aria-label ="Close">
                                    <span aria-hidden ="true">&times;</span>
                                    </button>
                                </div>';
                        }
                        if ($error == true) {
                            echo '<div class="alert alert-danger alert dismissiable fade show" role="alert">
                                    ' . $error . '
                                    <button type="button" class ="close" data-dismiss="alert" aria-label ="Close">
                                    <span aria-hidden ="true">&times;</span>
                                    </button>
                                </div>';
                        }
                        ?>
                        <div class="container justify-content-center">
                            <nav id="tab">
                                <div class="m-auto nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link m-auto active" id="nav-up-tab" data-bs-toggle="tab" data-bs-target="#nav-up" type="button" role="tab" aria-controls="nav-up" aria-selected="false">Edit Info</button>
                                    <button class="nav-link m-auto" id="nav-cm-tab" data-bs-toggle="tab" data-bs-target="#nav-cm" type="button" role="tab" aria-controls="nav-cm" aria-selected="false">Change Password</button>
                                </div>
                            </nav>
                        </div>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active card p-4 bg-dark text-light" id="nav-up" role="tabpanel" aria-labelledby="nav-up-tab">
                                <h4 class="alert-danger py-3 text-center mt-5">
                                    Update Your Info
                                </h4>
                                <form action="userProfile.php" method="post">
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname; ?>">
                                        <strong class="text-danger"><?php echo $fnameErr; ?></strong>
                                    </div>
                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname; ?>">
                                        <strong class="text-danger"><?php echo $lnameErr; ?></strong>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile; ?>">
                                        <strong class="text-danger"><?php echo $mobileErr; ?></strong>
                                    </div>
                                    <button type="submit" class="btn btn-secondary d-block col-12 mt-3" name="update">Update</button>
                                    <input type="hidden" name="password" value="<?php echo $password; ?>">
                                    <input type="hidden" name="created_at" value="<?php echo $created_at; ?>">
                                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                                </form>
                            </div>

                            <div class="tab-pane fade card p-4 bg-dark text-light" id="nav-cm" role="tabpanel" aria-labelledby="nav-cm-tab">
                                <h4 class="alert-danger py-3 text-center mt-5">
                                    Change Password
                                </h4>
                                <form action="userProfile.php" method="post">
                                    <div class="form-group">
                                        <label for="oldpass">Old Password</label>
                                        <input type="password" class="form-control" id="oldpass" name="oldpass">
                                        <strong class="text-danger"><?php echo $oldpassErr; ?></strong>
                                    </div>
                                    <div class="form-group">
                                        <label for="newpass">New Password</label>
                                        <input type="password" class="form-control" id="newpass" name="newpass">
                                        <strong class="text-danger"><?php echo $newPassErr; ?></strong>
                                    </div>
                                    <div class="form-group">
                                        <label for="cpass">Old Password</label>
                                        <input type="password" class="form-control" id="cpass" name="cpass">
                                        <strong class="text-danger"><?php echo $cpassErr; ?></strong>
                                    </div>

                                    <button type="submit" class="btn btn-secondary d-block col-12 mt-3" name="changePass">Change Password</button>
                                    <input type="hidden" name="fname" value="<?php echo $fname; ?>">
                                    <input type="hidden" name="lname" value="<?php echo $lname; ?>">
                                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                                    <input type="hidden" name="mobile" value="<?php echo $mobile; ?>">
                                    <input type="hidden" name="password" value="<?php echo $password; ?>">
                                    <input type="hidden" name="created_at" value="<?php echo $created_at; ?>">
                                </form>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
    } else {
        echo "<script>alert('To add courses Please login first!!')</script>";
        echo "<script>location.href='index.php'</script>";
    }

    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <?php require '_footer.php'; ?>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->


</body>

</html>