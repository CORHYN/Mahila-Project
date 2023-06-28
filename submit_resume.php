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
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $cid = $_POST['cid'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $education = $_POST['education'];
  $work_experience = $_POST['work_experience'];
  $awards_honors = $_POST['awards_honors'];
  $hobbies_interests = $_POST['hobbies_interests'];
  $job = $_POST['Job'];
  $describe_yourself = $_POST['describe_yourself'];

  // $createTableQuery = "CREATE TABLE IF NOT EXISTS resume (
  //   id INT AUTO_INCREMENT PRIMARY KEY,
  //   company VARCHAR(255),
  //   name VARCHAR(255),
  //   email VARCHAR(255),
  //   education VARCHAR(255),
  //   work_experience VARCHAR(255),
  //   awards_honors VARCHAR(255),
  //   hobbies_interests VARCHAR(255),
  //   job VARCHAR(255),
  //   describe_yourself TEXT
  // )";
  // mysqli_query($con, $createTableQuery);

  $insertQuery = "INSERT INTO resume (company, name, email, education, work_experience, awards_honors, hobbies_interests, job, describe_yourself)
    VALUES ('$cid', '$name', '$email', '$education', '$work_experience', '$awards_honors', '$hobbies_interests', '$job', '$describe_yourself')";
  mysqli_query($con, $insertQuery);
  $userId = mysqli_insert_id($con);
  mysqli_close($con);
  header("Location:personalinfo.php");
  exit();
}
?>
