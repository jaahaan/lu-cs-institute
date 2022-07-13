//contactUs
function check() {
    var name = document.getElementById("fname").value;
    var email = document.getElementById("email").value;
    var tarea = document.getElementById("tarea").value;
    var np = /^[a-zA-z. ]+$/
    var ep = /(cse|eee|ce|arch|law|bba|eng|bng)_\d{10}@lus\.ac\.bd/

    if (name.length < 1) {
        document.getElementById("efi").style.display = "inline-block";
        document.getElementById("efname").innerHTML = "Enter your Name";
        return false;
    } if (!name.match(np)) {
        document.getElementById("efi").style.display = "inline-block";
        document.getElementById("efname").innerHTML = "**Only Characters are allowed!!";
        return false;
    } else {
        document.getElementById("efi").style.display = "none";
        document.getElementById("efname").innerHTML = "";

    }

    if (!email.match(ep)) {
        document.getElementById("eei").style.display = "inline-block";
        document.getElementById("eemail").innerHTML = "Please enter your institutional email!!";
        return false;
    } else {
        document.getElementById("eei").style.display = "none";
        document.getElementById("eemail").innerHTML = "";
    }

    if (tarea.length < 1) {
        document.getElementById("eti").style.display = "inline-block";
        document.getElementById("etarea").innerHTML = "Please write something!!";
        return false;
    } else {
        document.getElementById("eti").style.display = "none";
        document.getElementById("etarea").innerHTML = "";
    }
}

//Registration form
function formValidation() {
    var fname = document.getElementById('fname').value.trim();
    var lname = document.getElementById('lname').value.trim();
    var email = document.getElementById('email').value.trim();
    var mobile = document.getElementById('mobile').value.trim();
    var pass = document.getElementById('pass').value.trim();
    var cpass = document.getElementById('cpass').value.trim();

    var np = /[a-zA-z. ]+$/
    var mp = /(\+88)?0 ?1[3-9]\d{2}-?\d{6}/
    var ep = /(cse|eee|ce|arch|law|bba|eng|bng)_\d{10}@lus\.ac\.bd/
    var pp = /((?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%&*?><+_-])).{8,20}/

    if (fname.length < 3 || fname.length > 20) {
        document.getElementById("efi").style.display = "inline-block";
        document.getElementById("efname").innerHTML = "**Length must be in between 3-20!!";
        return false
    } if (!fname.match(np)) {
        document.getElementById("efi").style.display = "inline-block";
        document.getElementById("efname").innerHTML = "**Only Characters are allowed!!";
        return false
    } else {
        document.getElementById("efi").style.display = "none";
        document.getElementById("efname").innerHTML = "";
    }

    if (lname.length < 3 || lname.length > 20) {
        document.getElementById("eli").style.display = "inline-block";
        document.getElementById("elname").innerHTML = "**Length must be in between 3-20!!";
        return false
    } else if (!lname.match(np)) {
        document.getElementById("eli").style.display = "inline-block";
        document.getElementById("elname").innerHTML = "**Only Characters are allowed!!";
        return false
    } else {
        document.getElementById("eli").style.display = "none";
        document.getElementById("elname").innerHTML = "";
    }

    if (!email.match(ep)) {
        document.getElementById("eei").style.display = "inline-block";
        document.getElementById("eemail").innerHTML = "**Please enter your institutional email!!";
        return false
    } else {
        document.getElementById("eei").style.display = "none";
        document.getElementById("eemail").innerHTML = "";
    }

    if (!mobile.match(mp)) {
        document.getElementById("emi").style.display = "inline-block";
        document.getElementById("emobile").innerHTML = "**Please enter a Valid mobile number!!";
        return false
    } else {
        document.getElementById("emi").style.display = "none";
        document.getElementById("emobile").innerHTML = "";
    }

    if (!pass.match(pp)) {
        document.getElementById("epi").style.display = "inline-block";
        document.getElementById("epass").innerHTML = "**1 upper, 1 lower, 1 digit, 1 sp, length 8-12!!";
        return false
    } else {
        document.getElementById("epi").style.display = "none";
        document.getElementById("epass").innerHTML = "";
    }
    if (!cpass.match(pp)) {
        document.getElementById("ecpi").style.display = "inline-block";
        document.getElementById("ecpass").innerHTML = "**1 upper, 1 lower, 1 digit, 1 sp, length 8-12!!";
        return false
    } else {
        document.getElementById("ecpi").style.display = "none";
        document.getElementById("ecpass").innerHTML = "";
    }
    if (pass !== cpass) {
        document.getElementById("epi").style.display = "inline-block";
        document.getElementById("ecpi").style.display = "inline-block";
        document.getElementById("epass").innerHTML = "**Password Mismatch!!";
        document.getElementById("ecpass").innerHTML = "**Password Mismatch!!";
        return false
    } else {
        document.getElementById("epi").style.display = "none";
        document.getElementById("ecpi").style.display = "none";
        document.getElementById("epass").innerHTML = "";
        document.getElementById("ecpass").innerHTML = "";

    }
}


//Login Validation

function loginValidation() {
    var email = document.getElementById('email').value.trim();
    var pass = document.getElementById('pass').value.trim();

    var ep = /(cse|eee|ce|arch|law|bba|eng|bng)_\d{10}@lus\.ac\.bd/
    var pp = /((?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%&*?><+_-])).{8,20}/

    if (!email.match(ep)) {
        document.getElementById("eei").style.display = "inline-block";
        document.getElementById("eemail").innerHTML = "**Please enter your institutional email!!";
        return false
    } else {
        document.getElementById("eei").style.display = "none";
        document.getElementById("eemail").innerHTML = "";
    }

    if (!pass.match(pp)) {
        document.getElementById("epi").style.display = "inline-block";
        document.getElementById("epass").innerHTML = "**1 upper, 1 lower, 1 digit, 1 sp, length 8-12!!";
        return false
    } else {
        document.getElementById("epi").style.display = "none";
        document.getElementById("epass").innerHTML = "";
    }
}
