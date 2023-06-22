<?php
$con = mysqli_connect("localhost","root","");

if(!$con){
    die("Error connecting to databse". mysqli_connect_errno());
}

if(!mysqli_query($con,"CREATE DATABASE mahila")){
    die("Error : Can't create databse mahila". mysqli_connect_errno());
}else{
    echo "mahila DATABSE CREATED";
}


mysqli_select_db($con,"mahila");

$sql = "CREATE TABLE user_table(
    userid VARCHAR(10),
    username VARCHAR(25) ,
    pass VARCHAR(50),
    tokenid INT(7),
    email VARCHAR(50),
    addr VARCHAR(35),
    education VARCHAR(150),
    yearsofexperiance INT(2),
    workhistory VARCHAR(200),
    socialmediaaccounts VARCHAR(200),
    PRIMARY KEY (userid),
    UNIQUE (username)
);";

if(!mysqli_query($con,$sql)){
    die("Error : Can't create table user_table". mysqli_connect_errno());
}else{
    echo "user_table CREATED";
}

mysqli_close($con);
?>