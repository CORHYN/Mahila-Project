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
<!DOCTYPE html>
<html>

<head>
  <title>Profile</title>
  <link rel="stylesheet" href="CSS/homepage.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="CSS/profile.css?v=<?php echo time(); ?>">
</head>

<body>
  <div class="container">
    <div class="boxnavbar">
      <div class="navbar">
        <ul>
          <li>
            <form action="search.php" method="post">
              <input type="text" name="value" id="value">
              <input type="hidden" name="searchb" value="true" onkeypress="sumbit()">
            </form>
          </li>
          <li><a href="profile.php">Resume</a></li>
          <li><a href="homepage.php">Home</a></li>
          <li><a href="listofcompanies.php">Companies</a></li>
          <li><a href="logout.php">Log out</a></li>
        </ul>
      </div>
    </div>
    <div class="profile">
      <div class="profilebox">
        <?php
          if(isset($_GET['error'])){
            echo "<p>$_GET[error]</p>";
          }
        ?>
        <?php
          $con = mysqli_connect("localhost", "root", "");
          mysqli_select_db($con, "mahila");
          $result_resume = mysqli_query($con,"SELECT resumes FROM resumes WHERE userid=$userid;");
          if(mysqli_affected_rows($con) == 1){
            $row = mysqli_fetch_array($result_resume);
            $path = "$row[resumes]";
            echo "<embed src='uploads/$path' width='100%' height='auto'  />";
          }else{
            echo "<p>No Resume Uploaded</p>";
          }
        ?>
        <form action="upload.php" method="post" enctype="multipart/form-data">
          Select Resume To Upload
          <input type="file" name="my_file" id="file">
          <input type="submit" name="submit" value="Upload">
        </form>
          <button><a href="delete.php">Delete</a></button>
      </div>
    </div>
  </div>


</body>

</html>