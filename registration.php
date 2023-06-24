<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <?php
    $con = mysqli_connect("localhost","root","");
    mysqli_select_db($con,"mahila");
    if ($_POST) {
        mysqli_select_db($con, "mahila");
        $username = trim($_POST['username']);
        $password = sha1(trim($_POST['password']));
        $email = trim($_POST['email']);
        $address = trim($_POST['addr']);
        $education = trim($_POST['education']);
        $experience = trim($_POST['experience']);
        $workhistory = trim($_POST['workhistory']);
        $socialmedia = trim($_POST['socialmedia']);

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
            $userid = rand(1000, 999999999);
            $sql = "INSERT INTO user_table(userid,username,pass,email,addr,education,yearsofexperiance,workhistory,socialmediaaccounts) 
            VALUES ('$userid','$username','$password','$email','$address','$education',$experience,'$workhistory','$socialmedia');";
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
        fuction resetform(){
            document.getElementById("f").reset();
        }
    </script>
    <link rel="stylesheet" href="CSS/registration.css">
</head>
<body>
    <div class="registration-form">
        <h2>User Registration</h2>
        <form action="registration.php" method="post" onsubmit="return validateForm();" id="f">
            <div class="username">
                <label for="username">Username:</label><br>
                <input type="text" name="username" id="username" class="text" required maxlength="25"><br><br>
            </div>
            <div class="email">
                <label for="email">Email:</label>
                <input type="email" name="email" class="text" required maxlength="50"><br><br>
            </div>
            <div class="password">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="text" required maxlength="50"><br><br>
            </div>
            <div class="retype-password">
                <label for="retype-password">Password:</label>
                <input type="password" name="retype-password" id="retype-password" class="text" required maxlength="50"><br><br>
            </div>
            <div class="address">
                <label for="addr">Address:</label>
                <input type="text" id="addr" name="addr" maxlength="35" class="text" required><br><br>
            </div>
            <div class="education">
                <label for="education">Education:</label>
                <textarea id="education" name="education" rows="5" cols="30" maxlength="150" class="text" required></textarea><br><br> 
            </div>
            <div class="experience">
                <label for="experience">Years of Experience:</label>
                <input type="number" id="experience" name="experience" min="0" max="99" class="scroll" required><br><br>
            </div>
            <div class="workhistory">
                <label for="workhistory">Work History:</label>
                <textarea id="workhistory" name="workhistory" rows="5" cols="30" maxlength="200" class="text" required></textarea><br><br>
            </div>
            <div class="socialmedia">
                <label for="socialmedia">Social Media Accounts:</label>
                <textarea id="socialmedia" name="socialmedia" rows="5" cols="30" maxlength="200" class="text" required></textarea><br><br>
            </div>
            <input type="submit" value="Register" class="register">
        </form>
    </div>
</body>
</html>