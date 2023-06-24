<?php
if($_POST){
    require_once("connectDB.php");
    mysqli_select_db($con,"mahila");
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $email = $_POST['email'];
    $address = $_POST['addr'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];
    $workhistory = $_POST['workhistory'];
    $socialmedia = $_POST['socialmedia'];

    $stmt = $pdo->prepare("SELECT username FROM user_table WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Check if the username already exists
    if ($stmt->rowCount() > 0) {
        // Username is not unique
        echo "Username is already taken. Please choose a different username.";
        header("Location:registration.html");
        exit();
    } else {
        $userid = rand(1000,999999999);
        $sql = "INSERT INTO user_table(userid,username,pass,email,addr,education,yearsofexperiance,workhistory,socialmediaaccounts) 
        VALUES ('$userid','$username','$password','$email','$address','$education',$experience,'$workhistory','$socialmedia');";
        if(!mysqli_query($con,$sql)){
            die("Error : couldn't create and account" . mysqli_connect_error());
        }else{
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