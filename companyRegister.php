<!DOCTYPE html>
<html>
<head>
    <title>Company Registration</title>
    <?php
    $con = mysqli_connect("localhost","ma zejun","mazejun2001");
    mysqli_select_db($con,"mahila");
    if ($_POST) {
        mysqli_select_db($con, "mahila");
        $name = trim($_POST['name']);
        $foundingYear = trim($_POST['foundingYear']);
        $registrationNo = trim($_POST['registrationNo']);
        $employeeCount = trim($_POST['employeeCount']);

    }
    mysqli_close($con);
    ?>
    


    <link rel="stylesheet" href="company.css">
</head>

<body>
<div class="registration-form">
        <h2 class="title">Company Registration</h2>
        <form method="POST" action="registration.php">
            <div class="name">
                <label for="name">Company name:</label><br>
                <input type="text" name="name" id="name" class="text" required maxlength="25"><br><br>
            </div>

            <div class="registrationNo">
                <label for="registrationNo">Registration No:</label>
                <input type="text" name="registrationNo" class="text" required maxlength="10"><br><br>
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
