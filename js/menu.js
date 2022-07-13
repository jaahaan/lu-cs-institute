var navLisks = document.getElementById("navLinks");
var show = document.getElementById("show");
var hide = document.getElementById("hide");

function showMenu() {
    show.style.display = "none";
    hide.style.display = "block";
    navLisks.style.display = "block";
}

function hideMenu() {
    show.style.display = "block";
    hide.style.display = "none";
    navLisks.style.display = "none";
}

var date = new Date();
document.getElementById("year").innerHTML = date.getFullYear();