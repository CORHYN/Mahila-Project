<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "mahila";

$con = new mysqli($servername, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$Cname = $_POST['cname'];
$RegistrationNo = $_POST['registrationNo'];
$Company_id = $_POST['company_id'];
$Email = $_POST['email'];
$Password = $_POST['password'];
$FoundYear = $_POST['foundYear'];
$EmployeeNumber = $_POST['employeeNumber'];

$checkQuery = "SELECT * FROM company WHERE cname = '$Cname'";
$checkResult = $con->query($checkQuery);
if ($checkResult->num_rows > 0) {
    echo '<script>
        alert("Company already exists");
        window.location.href = "CompanyRegister.html";
    </script>';
} else {
    $sql = "INSERT INTO company (cname, registration_number, company_id, email, pass, year_of_founding, number_of_employees)
    VALUES ('$Cname', '$RegistrationNo', '$Company_id', '$Email', '$Password', '$FoundYear', '$EmployeeNumber')";

    if ($con->query($sql) === true) {
        echo '<script>
            alert("Congratulation company inserted successfully.");
            window.location.href = "CompanyLogin.html";
        </script>';
    } else {
        $errorMessage = "Error: " . $sql . "<br>" . $con->error;
        echo '<script>
            alert("' . $errorMessage . '");
            window.location.href = "CompanyRegister.html";
        </script>';
    }
}
$con->close();
?>

