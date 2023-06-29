<!DOCTYPE html>
<html>

<head>
    <title>Create job</title>
</head>

<body>
    <h1>Create job</h1>
    <?php
    session_start();
    if (isset($_SESSION['company_id'])) {
        $company_id = $_SESSION['id'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mahila";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("connect database fail: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $job_title = $_POST['job_title'];
            $descp = $_POST['descp'];
            $pay = $_POST['pay'];
            $position = $_POST['position'];

            if (!empty($company_id) && !empty($job_title) && !empty($descp) && !empty($pay) && !empty($position)) {
                $sql = "INSERT INTO job_listing(company_id, job_title, descp, pay, position) VALUES 
            ('$company_id', '$job_title', '$descp', '$pay', '$position')";

                if (mysqli_query($conn,$sql)) {
                    echo "The new position has been successfully inserted into the job list.";
                } else {
                    echo "Error: " . $conn->error;
                }
            } else {
                echo "Please fill in all the fields for the job.";
            }
        }
    } else {
        session_unset();
        session_destroy();
        mysqli_close($conn);
        header("Location: Companylogin.html");
    }
    $conn->close();
    ?>

    <form method="post">

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
    <div>
    <button type="button" class="logout" onclick="window.location.href='ABC_company.php';">Home</button>
    </div>

</body>

</html>