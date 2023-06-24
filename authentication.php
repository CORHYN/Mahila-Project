<?php
session_start();
include_once("connectDB.php");
mysqli_select_db($con,"mahila");
if($_POST){
    $username = trim($_POST['username']);
    $password = sha1(trim($_POST['password']));
    $sql = "SELECT username,pass,userid FROM user_table WHERE username='$username';";
    $results = mysqli_fetch_array(mysqli_query($con,$sql));
    if($results['pass'] == $password){
        $token = rand(1000,9999999);
        $sql = "UPDATE user_table SET tokenid=$token WHERE userid=$results[userid];";
        mysqli_query($con,$sql);
        $_SESSION['userid'] = $results['userid'];
        $_SESSION['token'] = $token;
        header("Location:homepage.php");
        exit();
    }else{
        session_unset();
        session_destroy();
        echo "Password or username was incorrect";
        header("Location:login.html");
    }
}
mysqli_close($con);
?>