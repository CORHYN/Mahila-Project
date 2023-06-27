<?php
session_start();
include_once("connectDB.php");
mysqli_select_db($con, "mahila");
if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT email,pass,company_id  FROM company WHERE email='$email';";
    $results = mysqli_fetch_array(mysqli_query($con, $sql));
    if ($results['pass'] == $password) {
        mysqli_query($con, $sql);
        $_SESSION['company_id'] = $results['company_id'];
        mysqli_close($con);
        header("Location:companyprofile.php");
        exit();
    } else {
        session_unset();
        session_destroy();
        echo "Password or email was incorrect";
        mysqli_close($con);
        header("Location:Companylogin.html");
        exit();
    }
}
mysqli_close($con);
