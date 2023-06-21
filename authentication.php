<?php
include_once("connectDB.php");
if($_POST){
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $sql = "SELECT * FROM users WHERE username='$username'";
    $results = mysqli_fetch_array(mysqli_query($con,$sql));
    if($results['passwords'] == $password){
        session_start();
        $_SESSION['login'] = $results['access'];
        header("Location:homepage.php");
    }else{
        echo "Password or username was incorrect";
    }
}
mysqli_close($con);
?>