<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php';
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $query = "SELECT * FROM users WHERE email = '$email' && pass = '$pass'";
    $result = mysqli_query($conn, $query);
    $data  = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['fname'] = $data['fname'];
        $_SESSION['lname'] = $data['lname'];

        echo "<script>location.href='index.php'</script>";
    } else {
        echo "<script>alert('Invalid User!!')</script>";
        echo "<script>location.href='login.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/headerFooter.css">

    <title>Log In</title>
</head>

<body>
    <?php
    require 'nav.php';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo 'echo <script>alert("Dont not try to access from URL!!")</script>;
                    echo <script>location.href="index.php"</script>;';
    } else {
        echo '
                <div class="content-wrap">
                    <div class="container">
                        <div class="header">
                            <h1>Log In</h1>
                        </div>
                        <form action="login.php" method="post" onsubmit="return loginValidation()">
                            <table>
                                <tr>
                                    <td><label for="email">Email</label></td>
                                    <td><input type="email" name="email" id="email"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: end;">
                                        <i class="err-icon fas fa-exclamation-circle" id="eei"></i>
                                        <small id="eemail"></small>
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
                <script src="../js/menu.js"></script>
                <script src="../js/validation.js"></script>';
    }
    ?>


</body>

</html>