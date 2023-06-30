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
  <title>Companies</title>
  <link rel="stylesheet" href="CSS/homepage.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="CSS/listofcompanies.css?v=<?php echo time(); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Montserrat:ital@1&family=Sora:wght@300&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div class="boxnavbar">
      <div class="navbar">
        <a href="homepage.php"><img src="CSS/logo.png" alt="Logo" class="logo"></a>
        <ul>
          <li>
            <form action="search.php" method="post" class='search'>
              <input type="text" name="value" id="value" class="search" placeholder="Search...">
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
    <div class="companies">
      <div class="companiesbox">
        <?php
        $con = mysqli_connect("localhost", "root", "", "mahila");
        $resultsc = mysqli_query($con, "SELECT id,cname,year_of_founding,number_of_employees FROM company");
        ?>
        <ul>
          <?php
          while ($row = mysqli_fetch_array($resultsc)) {
            echo "<li>
              <form action='companylistofjobs.php' method='post'>
                <input type='submit' value='$row[cname]'>
                <input type='hidden' name='company_id' value='$row[id]'>
              </form>
              <p>Founded Year :$row[year_of_founding] </p>
              <p>Number of Employees:$row[number_of_employees]</p>
            </li>";
          }
          ?>
        </ul>
        <?php mysqli_close($con) ?>
      </div>
    </div>
</body>

</html>