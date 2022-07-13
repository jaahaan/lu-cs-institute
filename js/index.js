
function printTime() {
    var now = new Date();
    var currDate = now.getDate();
    var currDay = now.getDay();
    var currMonth = now.getMonth();
    var currYear = now.getFullYear();
    var days = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var monthName = months[currMonth];
    var dayname = days[currDay];
    document.getElementById("date").innerHTML = dayname + ", " + monthName + " " + currDate + ", " + currYear;

    var hour = now.getHours();
    var min = now.getMinutes();
    var sec = now.getSeconds();
    document.getElementById("year").innerHTML = " " + currYear;
    document.getElementById("clock").innerHTML = hour + " : " + min + " : " + sec;

}
setInterval("printTime()", 1000);

var i = 0;
var img = new Array("../img/stop.png", "../img/Coffee.png", "../img/learncode.png", "../img/grow.png", "../img/spring1.png", "../img/discover.png");

function swapImage() {
    document.slide.src = img[i];
    if (i < img.length - 1) i++;
    else i = 0;
    setTimeout("swapImage()", 3000);
}
window.onload = swapImage;