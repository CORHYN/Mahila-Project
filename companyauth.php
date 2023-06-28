<?php
session_start();
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "mahila"; 
include_once("connectDB.php");

if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM company WHERE email='$email';";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if ($row['pass'] == $password) {
            $_SESSION['company_id'] = $row['company_id'];
            $_SESSION['id'] = $row['id'];
            mysqli_close($con);
            header("Location: ABC_company.php");
            exit();
        } else {
            echo "email or password error";
            mysqli_close($con);
            header("Location: Companylogin.html");
            exit();
        }
    } 
}

mysqli_close($con);
?>
