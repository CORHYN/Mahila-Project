<!DOCTYPE html>
<html>
<head>
    <title>Create job</title>
</head>
<body>
    <h1>Create job</h1>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mahila";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("connect database fail: " . $conn->connect_error);
    }
    

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $company_id = $_POST['company_id'];
        $job_title = $_POST['job_title'];
        $descp = $_POST['descp'];
        $pay = $_POST['pay'];
        $position = $_POST['position'];

        if (!empty($company_id) && !empty($job_title) && !empty($descp) && !empty($pay) && !empty($position)) {
            $sql = "INSERT INTO job_listing(company_id, job_title, descp, pay, position) VALUES 
            ('$company_id', '$job_title', '$descp', '$pay', '$position')";

            if ($conn->query($sql) === TRUE) {
                echo "The new position has been successfully inserted into the job list.";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Please fill in all the fields for the job.";
        }
    }

    $conn->close();
    ?>

    <form method="post">
        <label for="company_id">Company ID:</label>
        <input type="text" name="company_id" id="company_id">
        
        <label for="job_title">Job title:</label>
        <input type="text" name="job_title" id="job_title">
        
        <label for="descp">Description:</label>
        <input type="text" name="descp" id="descp">
        
        <label for="pay">Salary:</label>
        <input type="text" name="pay" id="pay">

        <label for="position">Position:</label>
        <input type="text" name="position" id="position">
    
        <input type="submit" value="Submit">
    </form>
</body>
</html>