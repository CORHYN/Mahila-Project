<?php
    if ($_POST) {
        require_once("connectDB.php");
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
            header("Location:registration.html");
            exit();
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

<!--

education
experience
workhistory
socialmedia

addr
education
yearsofexperiance
workhistory
socialmediaaccounts

-->