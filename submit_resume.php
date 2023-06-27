<?php
$con = mysqli_connect("localhost", "ma zejun", "mazejun2001", "mahila");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $company = $_POST['company'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $education = $_POST['education'];
  $work_experience = $_POST['work_experience'];
  $awards_honors = $_POST['awards_honors'];
  $hobbies_interests = $_POST['hobbies_interests'];
  $job = $_POST['Job'];
  $describe_yourself = $_POST['describe_yourself'];

  $createTableQuery = "CREATE TABLE IF NOT EXISTS resume (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company VARCHAR(255),
    name VARCHAR(255),
    email VARCHAR(255),
    education VARCHAR(255),
    work_experience VARCHAR(255),
    awards_honors VARCHAR(255),
    hobbies_interests VARCHAR(255),
    job VARCHAR(255),
    describe_yourself TEXT
  )";
  mysqli_query($con, $createTableQuery);

  $insertQuery = "INSERT INTO resume (company, name, email, education, work_experience, awards_honors, hobbies_interests, job, describe_yourself)
    VALUES ('$company', '$name', '$email', '$education', '$work_experience', '$awards_honors', '$hobbies_interests', '$job', '$describe_yourself')";
  mysqli_query($con, $insertQuery);
  $userId = mysqli_insert_id($con);

  mysqli_close($con);
}
?>
