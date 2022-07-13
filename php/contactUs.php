<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contactus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/headerFooter.css">

    <title>Contact Us</title>
</head>

<body>
<?php require 'nav.php'; ?>

    <div class="contact-wrap">
        <div class="content">
            <h1>Get in touch</h1>
            <h2><i class="fa fa-phone" aria-hidden="true"></i>Phone</h2>
            <p>+880 1759-486292</p>
            <h2><i class="fa fa-envelope" aria-hidden="true"></i>Email</h2>
            <p>njlisa25@gmail.com</p>
            <h2><i class="fa-solid fa-location-dot"></i>Address</h2>
            <address>Master Quarter, Habiganj.</address>
            <h2><i class="fas fa-clock"></i>Mon - Fri</h2>
            <p>8:00 AM to 5:00 PM</p>

        </div>
        <div class="content">
            <h1>Give Your Feedback</h1>
            <form action="#" method="post" onsubmit="return check()">
                <input type="text" name="fname" id="fname" placeholder="Full Name" class="content-input">
                <i class="err-icon fas fa-exclamation-circle" id="efi"></i>
                <small id="efname"></small>
                <input type="email" name="email" id="email" placeholder="Email" class="content-input">
                <i class="err-icon fas fa-exclamation-circle" id="eei"></i>
                <small id="eemail"></small>
                <textarea placeholder="Write Your Opinions..." name="tarea" id="tarea" cols="15" rows="5"
                    class="content-textarea"></textarea> </td>
                <i class="err-icon fas fa-exclamation-circle" id="eti"></i>
                <small id="etarea"></small>
                <input type="submit" name="submit" id="submit" value="SUBMIT" class="content-btn">
            </form>
        </div>
        <div class="content">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1817.0487683483407!2d91.41163325793636!3d24.377910139143662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37514457a7b02043%3A0x30fc6e74b733af84!2sMaster%20Quarter%20Rd%2C%20Habiganj!5e0!3m2!1sen!2sbd!4v1652184838828!5m2!1sen!2sbd"
                width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
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
    <script src="../js/validation.js"></script>
</body>

</html>