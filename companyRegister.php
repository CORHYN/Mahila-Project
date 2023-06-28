<?php
$servername = "localhost";  
$username = "root";  
$password = ""; 
$dbname = "mahila";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("connect error: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $companyName = $_POST["name"];
    $registrationNo = $_POST["registrationNo"];
    $employeeCount = $_POST["employeeCount"];
    $foundingYear = $_POST["foundingYear"];


    $checkQuery = "SELECT * FROM company WHERE cname = '$companyName'";
    $checkResult = $conn->query($checkQuery);
    if ($checkResult->num_rows > 0) {
    
        echo "company already exists"; 
    } else {

        $insertQuery = "INSERT INTO company (cname, registration_number, number_of_employees, year_of_founding) 
                        VALUES ('$companyName', '$registrationNo', '$employeeCount', '$foundingYear')"; 

        if ($conn->query($insertQuery) === TRUE) {
            echo "registration successful"; 
        } else {
            echo "registration failed: " . $conn->error; 
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Company Registration</title>

    <link rel="stylesheet" href="CSS/company.css">
</head>

<body>

<div class="registration-form">
        <h2 class="title">Company Registration</h2>
        <form method="POST" action="companyRegister.php">
            <div class="name">
                <label for="name">Company name:</label><br>
                <input type="text" name="name" id="name" class="text" required maxlength="25"><br><br>
            </div>
            <div class="password">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="text" required maxlength="50"><br><br>
            </div>
            <div class="retype-password">
                <label for="retype-password">Password:</label>
                <input type="password" name="retype-password" id="retype-password" class="text" required maxlength="50"><br><br>
            </div>

            <div class="registrationNo">
                <label for="registrationNo">Registration No:</label>
                <input type="number" name="registrationNo" id="registrationNo" class="text" required maxlength="1000"><br><br>
            </div>

            <div class="employeeCount">
                <label for="employeeCount">Number of Employees:</label>
                <input type="number" name="employeeCount" id="employeeCount" class="text" required maxlength="100"><br><br>
            </div>
            <div class="foundingYear">
                <label for="foundingYear">Founding Year:</label>
                <input type="text" name="foundingYear" id="foundingYear" class="text" required maxlength="100"><br><br>
            </div>
            <input type="submit" value="Register" class="register">
        </form>
    </div>
</body>
</html>
