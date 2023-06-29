<?php
$servername = "localhost";
$username = "root";
$password = "";

$con = new mysqli($servername, $username, $password);

if ($con->connect_error) {
    die('Could not connect: ' . $con->connect_error);
}

$sql = "CREATE DATABASE mahila";

if ($con->query($sql) === TRUE) {
    echo "Database 'mahila' created successfully";
} else {
    echo "Error creating database: " . $con->error;
}

mysql_close($con);
?>