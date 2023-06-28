<?php
include_once("connectDB.php");
session_start();
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "mahila");
$cid = $_POST['id'];
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
<!DOCTYPE html>
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

<body>
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
        <?php
        $sql2 = "SELECT * FROM company WHERE id='$cid'";
        $r = mysqli_query($con, $sql2);
        $row = mysqli_fetch_array($r);
        echo "<p>COMPANY : $row[cname]</p>";
        echo "<p>CONTACT : $row[email]</p>";
        echo "<p>YEAR OF FOUNDING : $row[year_of_founding]</p>";
        echo "<p>NUMBER OF EMPLOYEES : $row[number_of_employees]</p>";
        ?>
        <form action="applyjob.php" method="post">
          <input type="submit" value="APPLY" class="logout" name="submit">
          <?php echo "<input type='hidden' name='cid' value='$cid'>" ?>
        </form>
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
</body>