<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userid'])) {

  header("Location: login.html");
  exit();
}

// Retrieve user ID 
$userid = $_SESSION['userid'];

$conn = mysqli_connect("localhost", "ma zejun", "mazejun2001", "mahila");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Fetch the user's profile information based on the user ID
$query = "SELECT * FROM user_table WHERE userid = '$userid'";
$result = mysqli_query($conn, $query);

// Check if a user with the given ID exists
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
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
      <tr><th>User ID</th><td><?php echo $row['userid']; ?></td></tr>
      <tr><th>Username</th><td><?php echo $row['username']; ?></td></tr>
      <tr><th>Email</th><td><?php echo $row['email']; ?></td></tr>
      <tr><th>Address</th><td><?php echo $row['addr']; ?></td></tr>
      <!-- add more information -->
    </table>

  </div>
</body>
</html>

<?php
} else {
  echo "User not found.";
}

// Close the database connection
mysqli_close($conn);
?>
