<?php
session_start();
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
$row = mysqli_fetch_array($result);
if ($result->num_rows == 1) {
    $_SESSION['id'] = $row['id'];
    header("Location: homepage.php");
    exit();
} else {
    echo '<script>
    alert("Plese Enter Correct Email And Password.");
    window.location.href = "CompanyLogin.html";
           </script>';
}

$con->close();
?>
