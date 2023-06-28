<?php
include_once("connectDB.php");
session_start();
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "mahila");
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

$jid = $_POST['jid'];
$cid = $_POST['cid'];
$sql = "UPDATE job_listing SET jopen=1,userid='$userid' WHERE jid=$jid  AND company_id=$cid; ";
mysqli_query($con,$sql);
mysqli_close($con);
header("Location:applyjob.php");
exit();
?>
