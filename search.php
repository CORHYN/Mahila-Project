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
?>
<html>

<body>
  <button type="reset" onclick="window.location.href='homepage.php';">HOMEPAGE</button>
  <ul>
  <?php
  if (isset($_POST['searchb'])) {
    if (!empty($_POST['value'])) {
      $search = $_POST['value'];
      $result = '';
      $sql = "SELECT * FROM company WHERE cname='$search'";
      if ($result = mysqli_query($con, $sql)) {
        $num = mysqli_affected_rows($con);
        echo "<p>found this many : $num </p>";
        while ($row = mysqli_fetch_array($result)) {
          echo "<li><a href='https://www.google.com'>$row[cname]</a></li>";
        }
      }

    }
  } ?>
  </ul>
</body>

</html>