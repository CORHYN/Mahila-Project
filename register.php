<?php
if($_POST){
    require_once("connectDB.php");
    mysqli_select_db($con,"mahila");
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $email = $_POST['email'];
    $userid = rand(1000,999999999);
    $sql = "INSERT INTO user_table(userid,username,pass,email) VALUES ('$userid','$username','$password','$email');";
    
    if(!mysqli_query($con,$sql)){
        die("Error : couldn't create and account" . mysqli_connect_error());
    }else{
        header("Location:login.html");
    }
}
mysqli_close($con);
?>