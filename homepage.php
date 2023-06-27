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
    header("Location:login.html");
    exit();
  }
} else {
  session_unset();
  session_destroy();
  header("Location:login.html");
  exit();
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Home Page</title>
  <link rel="stylesheet" href="CSS/homepage.css?v=<?php echo time(); ?>">
</head>
<!-- 
    
      
    -->

<body>
  <div class="parent">
    <div class="div1">
    <form action="personalInfo.php">
        <button type="submit" class="profile">Profile</button>
      </form>
      <form action="logout.php">
        <button type="submit" class="logout">Log out</button>
      </form>
    </div>
    <div class="div2"></div>
    <div class="div3"></div>
    <div class="div4"></div>
    <div class="div5"></div>
    <div class="div6">
      <div class="list-container">
        <ul class="scrollable-list">
          <?php
          $conn = mysqli_connect("localhost", "root", "");
          mysqli_select_db($conn, "mahila");
          $result = mysqli_query($conn, "SELECT * FROM company;");
          while ($row = mysqli_fetch_array($result)) {
            echo "<li><a href='https://www.google.com'>$row[cname]</a></li>";
          }
          mysqli_close($conn);
          ?>
        </ul>
      </div>
    </div>
    <div class="div7"></div>
  </div>
</body>
</html>
