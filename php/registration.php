<?php
$success = false;
$error = false;
$fnameErr = $lnameErr = $emailErr = $mobileErr = $passErr = $cpassErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php';
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $np = '/[a-zA-z. ]+$/';
    $mp = '/(\+88)?0 ?1[3-9]\d{2}-?\d{6}/';
    $ep = "/(cse|eee|ce|arch|law|bba|eng|bng)_\d{10}@lus\.ac\.bd/";
    $pp = '/((?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%&*?><+_-])).{8,20}/';
    $query = "SELECT * FROM users WHERE email = '$email'";

    $duplicate = mysqli_query($conn, $query);

    if (strlen($fname) < 3 || strlen($fname) > 20) {
        $fnameErr = "Length must be in between 3-20!!";
    } else if (!preg_match($np, $fname)) {
        $fnameErr = "Only Characters are allowed!!";
    } else if (strlen($lname) < 3 || strlen($lname) > 20) {
        $lnameErr = "Length must be in between 3-20!!";
    } else if (!preg_match($np, $lname)) {
        $lnameErr = "Only Characters are allowed!!";
    } else if (!preg_match($ep, $email)) {
        $emailErr = "Please enter your institutional email!!";
    } else if (mysqli_num_rows($duplicate) > 0) {
        $emailErr = 'Email already exist!!';
    } else if (!preg_match($mp, $mobile)) {
        $mobileErr = "Please enter a Valid mobile number!!";
    } else if (!preg_match($pp, $pass)) {
        $passErr = "1 upper, 1 lower, 1 digit, 1 sp, length 8-12!!";
    } else if (!preg_match($pp, $cpass)) {
        $cpassErr = "1 upper, 1 lower, 1 digit, 1 sp, length 8-12!!";
    } else if ($pass !== $cpass) {
        $passErr = "Password Mismatch!!";
        $cpassErr = "Password Mismatch!!";
    } else {
        $insert = mysqli_query($conn, "INSERT INTO users VALUES('', '$fname', '$lname', '$email', '$mobile', '$pass', current_timestamp())");
        if ($insert) {
            $success = 'Successfully Registered!!';
        } else {
            $error = 'Something went wrong!!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/headerFooter.css">

    <title>Registration</title>
</head>

<body>
    <?php
    include 'nav.php';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo 'echo <script>alert("Dont not try to access from URL!!")</script>;
                    echo <script>location.href="index.php"</script>;';
    } else {
        if ($success == true) {
            echo '<h1 class="success"> ' . $success . ' </h1>';
        }
        if ($error == true) {
            echo '<h1 class="error">' . $error . '</h1>';
        }
    ?>
        <div class="content-wrap">

            <div class="container">
                <div class="header">
                    <h1>Registration</h1>
                </div>
                <form action="registration.php" method="post" onsubmit="return formValidation()">
                    <table>
                        <tr>
                            <td><label for="fname">First Name</label></td>
                            <td><input type="text" name="fname" id="fname" value="<?php if (isset($_REQUEST['fname'])) {
                                                                                        echo $_POST['fname'];
                                                                                    } ?>"></td>
                        </tr>

                        <tr>
                            <td colspan="2" style="text-align: end;">
                                <i class="err-icon fas fa-exclamation-circle" id="efi"></i>
                                <small id="efname"></small>
                                <small><?php echo $fnameErr; ?></small>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="lname">Last Name</label></td>
                            <td><input type="text" name="lname" id="lname" value="<?php if (isset($_REQUEST['lname'])) {
                                                                                        echo $_POST['lname'];
                                                                                    } ?>"></td>
                        </tr>

                        <tr>
                            <td colspan="2" style="text-align: end;">
                                <i class="err-icon fas fa-exclamation-circle" id="eli"></i>
                                <small id="elname"></small>
                                <small><?php echo $lnameErr; ?></small>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="email">Email</label></td>
                            <td><input type="email" name="email" id="email" value="<?php if (isset($_REQUEST['email'])) {
                                                                                        echo $_POST['email'];
                                                                                    } ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: end;">
                                <i class="err-icon fas fa-exclamation-circle" id="eei"></i>
                                <small id="eemail"></small>
                                <small><?php echo $emailErr; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="mobile">Mobile</label></td>
                            <td><input type="number" name="mobile" id="mobile" value="<?php if (isset($_REQUEST['mobile'])) {
                                                                                            echo $_POST['mobile'];
                                                                                        } ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: end;">
                                <i class="err-icon fas fa-exclamation-circle" id="emi"></i>
                                <small id="emobile"></small>
                                <small><?php echo $mobileErr; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="pass">Password</label></td>
                            <td><input type="password" name="pass" id="pass"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: end;">
                                <i class="err-icon fas fa-exclamation-circle" id="epi"></i>
                                <small id="epass"></small>
                                <small><?php echo $passErr; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="cpass">Confirm Password</label></td>
                            <td><input type="password" name="cpass" id="cpass"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: end;">
                                <i class="err-icon fas fa-exclamation-circle" id="ecpi"></i>
                                <small id="ecpass"></small>
                                <small><?php echo $cpassErr; ?></small>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"> <input type="submit" name="submit" id="submit" value="SUBMIT" class="btn">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <?php include '_footer.php'; ?>

        <script src="../js/menu.js"></script>
        <script src="../js/validation.js"></script>
    <?php
    }
    ?>
</body>

</html>