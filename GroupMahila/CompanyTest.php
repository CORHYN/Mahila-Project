<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mahila";

$con = new mysqli($servername, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

if ($con->connect_error) {
    die("Database connect fail : " . $con->connect_error);
}

$sql = "SELECT * FROM company WHERE email = '$email' AND pass = '$password'";
$result = $con->query($sql);

if ($result->num_rows == 1) {

    header("Location: homepage.php");
    exit();
} else {
      
}

$con->close();
?>
