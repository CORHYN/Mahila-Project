<?php
$con = mysqli_connect("localhost","root","");

mysqli_query($con,"CREATE DATABASE mahila");

mysqli_select_db($con,"mahila");

$sql = "CREATE TABLE users(
    username VARCHAR(25),
    passwords VARCHAR(50),
    access BOOLEAN
);";

mysqli_query($con,$sql);
mysqli_select_db($con,"mahila");
 
$pass1 = sha1("12345");
$pass2 = sha1("54321");
$pass3 = sha1("01234");

mysqli_query($con,"INSERT INTO users VALUES ('user1','$pass1',1);");
mysqli_query($con,"INSERT INTO users VALUES ('user2','$pass2',1);");
mysqli_query($con,"INSERT INTO users VALUES ('company1','$pass3',2);");

mysqli_close($con);
?>