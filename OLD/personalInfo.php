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

// Fetch the user's profile information based on the user ID
$query = "SELECT * FROM user_table WHERE userid = '$userid'";
$result = mysqli_query($con, $query);

// Check if a user with the given ID exists
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
} else {
  echo "User not found.";
}


?>

<!DOCTYPE html>
<html>

<head>
  <title>User Profile</title>
  <style>
    .parent {
  grid-template-columns: repeat(12, 1fr);
  grid-template-rows: repeat(12, 1fr);
  grid-column-gap: 0px;
  grid-row-gap: 0px;
  display: grid;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  width: 100vw;
  height: 100vh;
}

.div8{
  grid-area: 1/1/2/13;
}


.div1 {
  grid-area: 1 / 11 / 2 / 13;
}

.div2 {
  grid-area: 1 / 1 / 2 / 3;
}

.div3 {
  grid-area: 1 / 3 / 2 / 5;
}

.div4 {
  grid-area: 1 / 5 / 2 / 7;
}

.div5 {
  grid-area: 3 / 2 / 13 / 6;
}

.div6 {
  grid-area: 2 / 7 / 13 / 13;
}

.div7 {
  grid-area: 1 / 7 / 2 / 11;
}



.list-container {
  max-height: 100svh;
  /* Set the maximum height of the container */
  overflow-y: auto;
  /* Enable vertical scrolling */
}

.scrollable-list {
  list-style-type: none;
  /* Remove default bullet points */
  padding: 0;
  margin: 0;
}

.scrollable-list li {
  padding-top: 10px;
  padding-left: 50px;
  padding-bottom: 10px;
  padding-right: 10px;
  margin: 15px 5px 1px 5px;
}


li input {
  display: inline-block;
  padding-top: 10px;
  padding-left: 50px;
  padding-bottom: 10px;
  padding-right: 10px;
  margin: 1px 1px 1px 1px;
  width: 450px;
  height: 30px;
  border-radius: 60px;
  border: 2px solid #A9A9A9;
  background: #FFF;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  text-decoration: none;
}

a:visited {
  text-decoration: none;
  display: inline-block;
  padding-top: 10px;
  padding-left: 50px;
  padding-bottom: 10px;
  padding-right: 10px;
  margin: 15px 5px 1px 5px;
  width: 450px;
  height: 30px;
  border-radius: 60px;
  border: 2px solid #A9A9A9;
  background: #FFF;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}


.logout {
  width: 191px;
  height: 58px;
  border-radius: 33px;
  border: 1px solid #C0C0C0;
  background: linear-gradient(360deg, rgba(176, 176, 176, 0.44) 0%, rgba(221, 221, 221, 0.432) 100%);
  box-shadow: 0px 4px 45px 0px rgba(0, 0, 0, 0.25);
}

.logout:hover {
  background: linear-gradient(360deg, rgba(176, 176, 176, 0.8) 0%, rgba(149, 149, 149, 0.522) 100%);
}

.box {
  width: 100%;
  height: 100%;
  flex-shrink: 0;
  border-radius: 40px 0px 0px 40px;
  border: 1px solid #A9A9A9;
  background: #D9D9D9;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  margin: 5px 1px 5px 1px;
  padding-top: 25px;
  padding-left: 25px;
  padding-bottom: 25px;
}

.heading{
  text-align: center;
  font-size: 48px;
  font-family: Kumar One; 
  background: linear-gradient(to left,#DF9BEA, #500A5B);
  -webkit-text-fill-color: transparent;
  -webkit-background-clip: text;
  width: 100%;
  height: 100%;
  z-index: -1;
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
        <table>
          <tr> 
            <td><?php echo $row['email'];?></td>
          </tr>
          <tr> <td>Address :<?php echo $row['addr'];?></td> </tr>
          <tr> <td>Education :<?php echo $row['education'];?></td> </tr>
          <tr> <td>Years of Experience :<?php echo $row['yearsofexperiance'];?></td> </tr>
          <tr> <td>Work History :<?php echo $row['workhistory'];?></td> </tr>
        </table>
          
        <div class="list-container">
          <ul>
            <?php
            $sql1 = "SELECT * FROM job_listing WHERE userid='$userid' AND jopen=1";
            $result1 = mysqli_query($con, $sql1);
            while ($row = mysqli_fetch_array($result1)) {
              echo "<li>$row[job_title]</li>";
            }
            ?>
          </ul>
          <form action="changeworkhistory.php" method="post">
            <input type="text" name='newworkhis'>
            <input type="submit" value="CHANGE HISTORY">
          </form>
        </div>
      </div>
    </div>
    <div class="div7">
      <form action="search.php" method="post">
        <input type="text" name="value" id="value">
        <input type="hidden" name="searchb" value="true" onkeypress="sumbit()">
      </form>
    </div>
  </div>

  </ul>
</body>

</html>
<?php

mysqli_close($con);
?>