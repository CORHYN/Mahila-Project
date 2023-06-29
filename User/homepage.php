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
  <title>Home Page</title>
  <link rel="stylesheet" href="CSS/homepage.css?v=<?php echo time(); ?>">
</head>

<body>
  <div class="container">
    <div class="boxnavbar">
      <div class="navbar">
        <ul>
          <li>
            <form action="search.php" method="post">
              <label for="value">Search :</label>
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
    <div class="welcome">
      <div class="welcomebox">
      <h2>Welcome to Mahila</h2>
        <div id="welcome-message">
          <script>
            // JavaScript code to display the welcome message
            var welcomeMessage = "\
  \nEmpowering Women in the Job Market\
  \n\
  \nAt Mahila, we believe in creating equal opportunities for women in the workforce. Our platform is dedicated to helping women find meaningful employment, develop their careers, and break through any barriers they may face.\
  \n\
  \nWhether you're a recent graduate, a seasoned professional, or someone looking to make a career change, we provide a supportive environment where you can explore job opportunities, connect with employers who value diversity and inclusion, and access valuable resources to enhance your skills.\
  \n";
            // Display the welcome message in the welcome-message div
            document.getElementById("welcome-message").innerText = welcomeMessage;
          </script>
        </div>
      </div>
    </div>

</body>
</html>
