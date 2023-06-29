<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "mahila";

$con = new mysqli($host, $username, $password, $database);
if (!$con)
{
die('Could not connect: ' . mysql_error());
}

$con->select_db($database);


$sql = "CREATE TABLE user_table(
    userid INT(10) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25),
    pass VARCHAR(50),
    tokenid INT(7),
    email VARCHAR(50)
)";

if ($con->query($sql) === TRUE) {
    echo "Table 'user_table' created successfully<br>";
} else {
    echo "Error creating table 'user_table': " . $con->error;
}


mysql_close($con);
?>