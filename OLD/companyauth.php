<?php
session_start();
include_once("connectDB.php");

if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM company WHERE email='$email';";
    $result = mysqli_query($con, $sql);

}

mysqli_close($con);
?>
