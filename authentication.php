<?php
session_start();
include_once("connectDB.php");
mysqli_select_db($con,"mahila");
if($_POST){
    function isValid($teststring) {
        if (preg_match('/^[a-zA-Z0-9]+$/', $teststring)) {
            return true;
        }
        return false;
    }

    if(isValid(trim($_POST['username'])) && isValid(trim($_POST['password']))){
        $username = $_POST['username'];
        $password = sha1($_POST['password']);
        $sql = "SELECT username,pass,userid FROM user_table WHERE username='$username';";
        $results = mysqli_fetch_array(mysqli_query($con,$sql));
        if($results['pass'] == $password){
            $token = rand(1000,9999999);
            $sql = "UPDATE user_table SET tokenid=$token WHERE userid=$results[userid];";
            mysqli_query($con,$sql);
            $_SESSION['userid'] = $results['userid'];
            $_SESSION['token'] = $token;
            mysqli_close($con);
            header("Location:homepage.php");
            exit();
        }else{
            session_unset();
            session_destroy();
            echo "Password or username was incorrect";
            mysqli_close($con);
            header("Location:login.html");
            exit();
        }
    }
}
mysqli_close($con);
?>