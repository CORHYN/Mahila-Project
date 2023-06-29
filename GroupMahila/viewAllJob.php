
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Job_listing</h2>
<?php
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "mahila");
    echo '<div class="content">';
    $jobQuery = mysqli_query($conn, "SELECT * FROM job_listing");
    echo '<div class="job-list-container">';
    echo '<div class="job-list">';
    while ($jobData = mysqli_fetch_assoc($jobQuery)) {
      echo 'Job ID:         '. $jobData['jid'].'<br>' ;
      echo 'Job Title:      '. $jobData['job_title'].'<br>' ;
      echo 'Job Description:' . $jobData['descp'].'<br>';
      echo 'Pay:            ' . $jobData['pay'] .'<br>';
      echo 'Position :      ' . $jobData['position'].'<br>' ;
    }

    ?>
</body>
</html>

