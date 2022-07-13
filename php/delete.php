<?php
include 'config.php';
$success= false;
$error= false;
$id = $_GET['id'];
$delete = "DELETE FROM `courses` WHERE id = $id";

if(mysqli_query($conn, $delete)){
    echo '<script>alert("Successfully Deleted")</script>';
    echo '<script>location.href="addCourses.php"</script>';
} else{
    echo '<script>alert("Something went wrong")</script>';
    echo '<script>location.href="addCourses.php"</script>';
}
?>