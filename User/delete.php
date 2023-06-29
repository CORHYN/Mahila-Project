<?php
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
mysqli_close($con);
?>
<?php
 $con = mysqli_connect("localhost","root","","mahila");
 $results = mysqli_query($con, "SELECT * FROM resumes WHERE userid=$userid");
 if (mysqli_affected_rows($con) > 0) {
     $row = mysqli_fetch_array($results);
     $img_location = "$row[resumes]";
     if (!unlink("uploads/".$img_location)) {
         $em = "File is missing from the server";
         header("Location:profile.php?error=$em");
     }else{}
     mysqli_query($con,"DELETE FROM resumes WHERE userid=$userid;");
 }
 mysqli_close($con);
 header("Location:profile.php");
 exit();
?>