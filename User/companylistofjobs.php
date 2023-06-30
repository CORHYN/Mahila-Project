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
  <title>Jobs Page</title>
  <link rel="stylesheet" href="CSS/homepage.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="CSS/companylistofjobs.css?v=<?php echo time(); ?>">
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
    <div class="jobs">
      <div class="jobsbox">
        <?php
        if (!isset($_POST['company_id'])) {
        } else {
          $company_id = $_POST['company_id'];
          $con = mysqli_connect("localhost", "root", "", "mahila");
          $resultsc = mysqli_query($con, "SELECT jid,job_title,descp,pay,position FROM job_listing WHERE company_id=$company_id");
          echo "<ul>";
          if (mysqli_affected_rows($con) == 0) {
            echo "<p>No Jobs Listed For this Company</p>";
          } else {
            while ($row = mysqli_fetch_array($resultsc)) {
              echo "<li>
              <h4>$row[job_title]</h4>
              <p>$row[descp]</p>
              <p>Salary : $row[pay]</p>
              <p>Postion : $row[position]</p>";
              echo "<form action='apply.php' method='post'>";
              $applied_sql = "SELECT * FROM applied WHERE jid=$row[jid] AND company_id=$company_id AND userid=$userid; ";
              $check_if_applied = mysqli_query($con, $applied_sql);
              if (mysqli_affected_rows($con) == 0) {
                echo "<input type='submit' name='Apply' value='Apply'>";
                echo "<input type='hidden' name='company_id' value='$company_id'>
                      <input type='hidden' name='jid' value='$row[jid]'>";
              } else {
                echo "<p>Applied</p>";
              }
              echo "</form>";
              echo "</li>";
            }
          }
          echo "</ul>";
          mysqli_close($con);
        } ?>
      </div>
    </div>
</body>

</html>