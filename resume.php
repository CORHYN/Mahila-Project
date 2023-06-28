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
  <title>Resume Form</title>
  <style>
    body {
      background-color: #f2f2f2;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    form {
      max-width: 500px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="text"],input[type="email"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 10px;
    }

    button[type="submit"] {
      background-color: #9D58A8;
      color: black;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <h1>Resume Form</h1>
  
  <form action="submit_resume.php" method="post">

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="education">Education Background:</label>
    <input type="text" id="education" name="education" required>

    <label for="work_experience">Work Experience:</label>
    <input type="text" id="work_experience" name="work_experience" required>

    <label for="awards_honors">Awards and Honors:</label>
    <input type="text" id="awards_honors" name="awards_honors" required>

    <label for="hobbies_interests">Hobbies and Interests:</label>
    <input type="text" id="hobbies_interests" name="hobbies_interests" required>

    <label for="Job">Job:</label>
    <input type="text" id="Job" name="Job" required>

    <label for="describe_yourself">Describe yourself:</label>
    <textarea id="describe_yourself" name="describe_yourself" rows="6" required></textarea>

    <button type="submit">Submit</button>
    <?php echo "<input type='hidden' name='cid' value='$_POST[cid]'>"; ?>
  </form>
</body>
</html>
<?php
mysqli_close($con);
?>