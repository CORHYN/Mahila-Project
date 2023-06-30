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

$sql = "CREATE TABLE resumes(
    userid INT(10) UNIQUE,
       resumes TEXT
    )";

if ($con->query($sql) === TRUE) {
    echo "Table 'resumes' created successfully<br>";
} else {
    echo "Error creating table 'resumes': " . $con->error;
}

mysql_close($con);
?>
