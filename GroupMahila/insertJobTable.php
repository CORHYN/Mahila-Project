<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "mahila";

$con = new mysqli($host, $username, $password, $database);
if (!$con)
{
die('Could not connect: ' . mysqli_connect_error());
}

$con->select_db($database);

$sql = "CREATE TABLE job_listing (
    jid INT AUTO_INCREMENT PRIMARY KEY,
    company_id INT,
    job_title VARCHAR(255),
    descp TEXT,
    pay DECIMAL(10, 2),
    position VARCHAR(255)
)";

if ($con->query($sql) === TRUE) {
    echo "Table 'job_listing' created successfully<br>";
} else {
    echo "Error creating table 'job_listing': " . $con->error;
}

mysqli_close($con);
?>