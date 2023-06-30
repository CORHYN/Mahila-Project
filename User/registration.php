<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
    <?php
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "mahila");
    if ($_POST) {
        mysqli_select_db($con, "mahila");
        $username = $_POST['username'];
        $password = sha1($_POST['password']);
        $email = trim($_POST['email']);

        $sql1 = "SELECT username FROM user_table";
        $result = mysqli_query($con, $sql1);
        $test = false;
        while ($row = mysqli_fetch_array($result)) {
            if ($username == $row['username']) {
                $test = true;
            }
        }

        // Check if the username already exists
        if ($test) {
            // Username is not unique
            echo "Username is already taken. Please choose a different username.";
        } else {
            $sql = "INSERT INTO user_table(username,pass,email) 
            VALUES ('$username','$password','$email');";
            if (!mysqli_query($con, $sql)) {
                die("Error : couldn't create and account" . mysqli_connect_error());
            } else {
                header("Location:login.html");
                exit();
            }
        }
    }
    mysqli_close($con);
    ?>
    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var retypePassword = document.getElementById("retype-password").value;
            if (password !== retypePassword) {
                alert("Passwords do not match. Please re-enter your passwords.");
                document.getElementById("password").value = "";
                document.getElementById("retype-password").value = "";
                return false;
            }
            return true;
        }
    </script>
    <link rel="stylesheet" href="CSS/registration.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Montserrat:ital@1&family=Sora:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
            <div class="registration-form">
                <h2>User Registration</h2>
                <form action="registration.php" method="post" onsubmit="return validateForm();" id="f">
                    <div class="username">
                        <label for="username">Username:</label><br>
                        <input type="text" name="username" id="username" class="text" required maxlength="25"><br><br>
                    </div>
                    <div class="email">
                        <label for="email">Email:</label><br>
                        <input type="email" name="email" class="text" required maxlength="50"><br><br>
                    </div>
                    <div class="password">
                        <label for="password">Password:</label><br>
                        <input type="password" name="password" id="password" class="text" required maxlength="50"><br><br>
                    </div>
                    <div class="retype-password">
                        <label for="retype-password">Confirm Password:</label><br>
                        <input type="password" name="retype-password" id="retype-password" class="text" required maxlength="50"><br><br>
                    </div>
                    <input type="submit" value="Register" class="register">
                </form>
            </div>
    </div>
</body>

</html>