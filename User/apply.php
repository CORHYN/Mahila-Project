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

if(isset($_POST['Apply'])){
    $resumes = mysqli_query($con,"SELECT resumes FROM resumes WHERE userid=$userid;");
    $row = mysqli_fetch_array($resumes);
    if(mysqli_affected_rows($con) == 0){
        echo '<script>
        alert("Please upload a resume first");
        window.location.href = "homepage.php";
               </script>';
    }else{
    $resume = $row['resumes'];
    $jid = $_POST['jid'];
    $company_id = $_POST['company_id'];
    $sql_apply = "INSERT INTO applied(jid,userid,company_id,resumes) VALUES ($jid,$userid,$company_id,'$resume')";
    mysqli_query($con,$sql_apply);
    mysqli_close($con);
    echo "<script>alert('You Have successfully Applied for this job\n,Please check you email for a reply');</script>";
    header("Location: listofcompanies.php");
    exit();
    }
}

mysqli_close($con);
?>