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
  <link rel="stylesheet" href="homepage.css?v=<?php echo time(); ?>">
  <style>
   
    table {
      border-collapse: collapse;
      width: 100%;
    }
    
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    
    th {
      background-color: #f2f2f2;
    }
    
  
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 20px;
    }
    
    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .profile{
      width: 50px;
      margin: 0 auto;
      
    }

  </style>
</head>
<body>
  <div class="container">

  <img class="profile" src="profile.jpg" alt="">
    <table>
      <tr><th>Email</th><td><?php echo $row['email']; ?></td></tr>
      <tr><th>Address</th><td><?php echo $row['addr']; ?></td></tr>
      <ul>
      <?php
        $sql1 = "SELECT * FROM job_listing WHERE userid='$userid' AND jopen='true'";
        $result1 = mysqli_query($con,$sql1);
        while($row = mysqli_fetch_array($result1)){
          echo "<li>$row[job_title]</li>";
        }
      ?>
      </ul>
    </table>

  </div>
</body>
</html>
<?php
// Close the database connection
mysqli_close($con);
?>
