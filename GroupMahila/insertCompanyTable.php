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

$sql1 = "CREATE TABLE company (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cname VARCHAR(255),
    registration_number VARCHAR(50),
    email VARCHAR(255),
    pass VARCHAR(255),
    year_of_founding YEAR,
    number_of_employees INT
)";

if ($con->query($sql1) === TRUE) {
    echo "Table 'company' created successfully<br>";
} else {
    echo "Error creating table 'company': " . $con->error;
}

mysql_close($con);
?>
