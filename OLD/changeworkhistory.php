<?php
include_once("connectDB.php");
session_start();
if (isset($_SESSION['userid'])) {
  $userid = $_SESSION['userid'];
  $token = $_SESSION['token'];
  $result = mysqli_query($con, "SELECT tokenid FROM user_table WHERE userid='$userid'");
  $row = mysqli_fetch_array($result);
  if ($row['tokenid'] == $token) {
  } else {
    session_unset();
    session_destroy();
    mysqli_close($con);
    header("Location:login.html");
    exit();
  }
} else {
  session_unset();
  session_destroy();
  mysqli_close($con);
  header("Location:login.html");
  exit();
}

// Fetch the user's profile information based on the user ID
$query = "SELECT * FROM user_table WHERE userid = '$userid'";
$result = mysqli_query($con, $query);

// Check if a user with the given ID exists
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
} else {
  echo "User not found.";
}

if($_POST){
    $add = $_POST['newworkhis'];
    $sql = "UPDATE user_table
    SET workhistory='$add'
    WHERE userid='$userid'; ";
    mysqli_query($con,$sql);
    mysqli_close($con);
    header("Location:personalinfo.php");
}
mysqli_close($con);
exit();
?>