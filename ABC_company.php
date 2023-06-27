<!DOCTYPE html>
<html>
<head>
  <title>ABC Company</title>
  <style>

    body {
      background-color: #f4f4f4;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      display: grid;
      justify-content: center;
      align-items: center;
      height: 100vh;
      grid-gap: 20px;
    }

    .content {
      background-color: #fff;
      border-radius: 8px;
    
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      text-align: center;
    }

    h2 {
      font-size: 24px;
      color: #333;
    }

    .company-image {
      max-width: 300px;
      margin-bottom: 5px;
      border-radius: 4px;
    }

    .job-list-container {
      max-height: 300px;
      overflow: auto;
    }

    .job-list {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .job-item {
      width: 200px;
      margin: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .job-title {
      font-weight: bold;
      margin-bottom: 5px;
    }

    .job-description{
        font-size: 14px;
        font-style: italic;

    }

    .job-info {
      font-size: 14px;
      
    }
  </style>
</head>
<body>

<div class="container">
   <!-- Company information -->
    <?php
<<<<<<< HEAD
    $conn = mysqli_connect("localhost", "root", "");
=======
    $conn = mysqli_connect("localhost", "ma zejun", "mazejun2001");
>>>>>>> b37e564f8b5cf493bed83b7d8e507a48f41045c6
    mysqli_select_db($conn, "mahila");
    $companyQuery = mysqli_query($conn, "SELECT * FROM company LIMIT 1");
    $companyData = mysqli_fetch_assoc($companyQuery);
    echo '<div class="content">';
    echo '<h2>Welcome to ' . $companyData['cname'] . '</h2>';
    echo '<img class="company-image" src="company1.jpg" alt="' . $companyData['cname'] . '">';
<<<<<<< HEAD
    echo '<p>Registration Number: ' . $companyData['registration_number'] . '</p>';
    echo '<p>company_id: ' . $companyData['company_id'] . '</p>';
=======
>>>>>>> b37e564f8b5cf493bed83b7d8e507a48f41045c6
    echo '<p>Email: ' . $companyData['email'] . '</p>';
    echo '<p>Year of Founding: ' . $companyData['year_of_founding'] . '</p>';
    echo '<p>Number of Employees: ' . $companyData['number_of_employees'] . '</p>';
    mysqli_close($conn);
    ?>
    <h2>Job_listing</h2>
    <?php
    $conn = mysqli_connect("localhost", "ma zejun", "mazejun2001");
    mysqli_select_db($conn, "mahila");
    echo '<div class="content">';
    $jobQuery = mysqli_query($conn, "SELECT * FROM job_listing");
    echo '<div class="job-list-container">';
    echo '<div class="job-list">';
    while ($jobData = mysqli_fetch_assoc($jobQuery)) {
      echo '<div class="job-item">';
      echo '<h3 class="job-title">' . $jobData['job_title'] . '</h3>';
      echo '<p class="job-description">' . $jobData['descp'] . '</p>';
      echo '<p class="job-info">Pay: ' . $jobData['pay'] . '</p>';
      echo '<p class="job-info">Position: ' . $jobData['position'] . '</p>';
      echo '<p class="job-info">Open Date: ' . $jobData['jopen'] . '</p>';
<<<<<<< HEAD
      echo '<p class="job-info">User ID: ' . $jobData['userid'] . '</p>';
=======
      ///echo '<p class="job-info">User ID: ' . $jobData['userid'] . '</p>';
>>>>>>> b37e564f8b5cf493bed83b7d8e507a48f41045c6
      echo '</div>';
    }
    echo '</div>';
    echo '</div>';

    mysqli_close($conn);
    ?>
  </div>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> b37e564f8b5cf493bed83b7d8e507a48f41045c6
