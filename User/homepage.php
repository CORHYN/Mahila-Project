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
    <div class="welcome">
      <div class="welcomebox">
        <h2>Welcome to Mahila</h2>
        <p>Empowering Women in the Job Market</p> <br>
        <div class="homepage_images">
          <img src="images/istockphoto-612854434-612x612.jpg" alt="">
          <img src="images/istockphoto-1125595211-612x612.jpg" alt="">
        </div>
        <p>At Mahila we believe in creating equal opportunities for women in the workforce. Our platform is dedicated to helping women find meaningful employment, develop their careers, and break through any barriers they may face.</p>
        <p>Whether you're a recent graduate, a seasoned professional, or someone looking to make a career change, we provide a supportive environment where you can explore job opportunities, connect with employers who value diversity and inclusion, and access valuable resources to enhance your skills.</p>
        <h3>Why Choose Mahila?</h3>
        <ol>
          <li>Exclusive Job Listings: We partner with companies that are committed to fostering gender diversity, providing you with a curated list of job openings that value your talents and experience.</li> <br>
          <li>Confidentiality and Privacy: We prioritize your privacy and ensure that your personal information remains secure throughout the job application process.</li>
        </ol>
      </div>
    </div>
</body>
</html>