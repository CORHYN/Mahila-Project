<!DOCTYPE html>
<html>

<head>
    <title>Create job</title>
    <link rel="stylesheet" href="homepage.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Montserrat:ital@1&family=Sora:wght@300&display=swap" rel="stylesheet">
    <style>
        :root{
    --page_font: Comfortaa, sans-serif;
}

body{
    margin: 0;
}

.container1{
    display: flex;
    margin: 0;
    justify-content: center;
    align-items: center;
    background-image: linear-gradient(rgba(0, 0, 0, .02), rgba(0, 0, 0, 0.5)), url(cyan-background.jpg);
    background-size: cover;
    background-position: center;
    overflow: scroll;
}

.registration-form{
    display: flex;
    justify-content: center;
    align-items: center;
    width: fit-content;
    height: fit-content;
    background-color: #f1f0f0;
    font-family: var(--page_font);
    padding: 60px;
    flex-direction: column;
}

img{
    width: auto;
    height: 100px;
}

.text {
    outline: none;
    width: 260px;
    height: 50px;
    margin-bottom: 20px;
}

.register{
    font-family: Comfortaa, sans-serif;
    margin: 0;
    padding: 0;
    border: none;
    border-radius: 30px;
    background: linear-gradient(to left, #ffffff67, rgba(255, 255, 255, 0.5));
    width: 80px;
    height: 32px;
    cursor: pointer;
}  

.register:hover{
    width: 86px;
    height: 35px;
}

    </style>
</head>

<body>

    <?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mahila";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("connect database fail: " . $conn->connect_error);
    }


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $company_id = $_SESSION['id'];
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
    <div class="container">
        <div class="boxnavbar">
            <div class="navbar">
                <ul>
                    <a href="homepage.php"><img src="logo.png" alt="Logo" class="logo"></a>
                    <li>
                        <form action="logout.php">
                            <button type="submit">Log Out</button>
                        </form>
                    </li>
                    <li>
                        <form action="creatNewJob.php">
                            <button type="submit">Creat Job</button>
                        </form>
                    </li>
                    <li>
                        <form action="viewAllJob.php">
                            <button type="submit">View Job</button>

                        </form>
                    </li>
                    <li>
                        <form action="viewAllapplicants.php">
                            <button type="submit">View Applicants</button>
                        </form>
                    </li>

                </ul>



                <br>


            </div>
        </div>
        <h2>Create job</h2>
        <div class="container1">
        <form method="post" class="registration-form">
            <label for="job_title">Job title:</label>
            <input type="text" name="job_title" id="job_title" class="text">

            <label for="descp">Description:</label>
            <input type="text" name="descp" id="descp" class="text">

            <label for="pay">Salary:</label>
            <input type="text" name="pay" id="pay" class="text">

            <label for="position">Position:</label>
            <input type="text" name="position" id="position" class="text">

            <input type="submit" value="Submit" class="register">
        </form>
        </div>
       
    </div>





</body>

</html>