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

<head>
  <link rel="stylesheet" href="CSS/homepage.css?v=<?php echo time(); ?>">
  <style>
    .box {
      padding-top: 25px;
      padding-left: 25px;
      padding-bottom: 25px;
    }
  </style>
</head>
<div class="parent">
  <div class="div8">
    <div class="heading"></div>
  </div>
  <div class="div1">
    <form action="logout.php">
      <button type="submit" class="logout">Log out</button>
    </form>
  </div>
  <div class="div2">
    <button type="button" class="logout" onclick="window.location.href='personalinfo.php';">Profile</button>
  </div>
  <div class="div3">
    <button type="button" class="logout" onclick="window.location.href='homepage.php';">Home</button>
  </div>
  <div class="div4">
    <button type="button" class="logout"></button>
  </div>
  <div class="div5"></div>
  <div class="div6">
    <div class="box">
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
                echo "<li><form action='companyprofile.php' method='post'>
                    <input type='hidden' name='id' value='$row[id]'>
                    <input type='submit' value='$row[cname]' name='$row[cname]'>
                  </form></li>";
              }
            }
          }
        }
        ?>
      </ul>
    </div>
  </div>
  <div class="div7">
    <form action="search.php" method="post">
      <input type="text" name="value" id="value">
      <input type="hidden" name="searchb" value="true" onkeypress="sumbit()">
    </form>
  </div>
</div>
</div>

</html>
<?php
mysqli_close($con);
?>