<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="homepage.css?v=<?php echo time(); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Montserrat:ital@1&family=Sora:wght@300&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .jobs {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .jobsbox {
      margin-top: 20px;
      padding-top: 25px;
      padding-bottom: 25px;
      padding-left: 25px;
      padding-right: 25px;
      width: 800px;
      height: auto;
      background-color: #ffffff67;
      font-family: Comfortaa, sans-serif;
    }

    .jobsbox ul li {
      list-style: none;
      margin: 30px 20px;
    }

    .jobsbox ul li form input[type="submit"] {
      font-family: var(--page_font);
      margin: 0;
      padding: 0;
      border: none;
      outline: none;
      background-color: transparent;
      /* border-radius: 30px;
    background: linear-gradient(to left, #ffffff67, rgba(255,255,255,0.5));
    width: 80px;
    height: 32px; */
      font-size: x-large;
      cursor: pointer;
    }

    .jobsbox ul li form p {
      font-family: var(--page_font);
      margin: 0;
      padding: 0;
      border: none;
      outline: none;
      background-color: transparent;
      /* border-radius: 30px;
    background: linear-gradient(to left, #ffffff67, rgba(255,255,255,0.5));
    width: 80px;
    height: 32px; */
      font-size: x-large;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="boxnavbar">
      <div class="navbar">
        <ul>
          <a href="homepage.php"><img src="logo.png" alt="Logo" class="logo"></a>
          <li>
            <form action="logout.php">
              <button type="submit">Log Out</button>
            </form>
          </li>
          <li>
            <form action="creatNewJob.php">
              <button type="submit">Creat Job</button>
            </form>
          </li>
          <li>
            <form action="viewAllJob.php">
              <button type="submit">View Job</button>

            </form>
          </li>
          <li>
            <form action="viewAllapplicants.php">
              <button type="submit">View Applicants</button>
            </form>
          </li>

        </ul>



        <br>


      </div>
    </div>
    <h2>Job_listing</h2>
    <div class="jobs">
      <div class="jobsbox">


        <?php
        $company_id = $_SESSION['id'];
        $conn = mysqli_connect("localhost", "root", "");
        mysqli_select_db($conn, "mahila");
        echo '<div class="content">';
        $jobQuery = mysqli_query($conn, "SELECT * FROM job_listing WHERE company_id=$company_id");
        echo '<div class="job-list-container">';
        echo '<div class="job-list">';
        echo "<ul>";
        while ($jobData = mysqli_fetch_assoc($jobQuery)) {
          echo "<li>";
          echo "<p>" . 'Job ID:         ' . $jobData['jid'] . "</p>" . '<br>';
          echo "<p>" . 'Job Title:      ' . $jobData['job_title'] . "</p>" . '<br>';
          echo "<p>" . 'Job Description:' . $jobData['descp'] . "</p>" . '<br>';
          echo "<p>" . 'Pay:            ' . $jobData['pay'] . "</p>" . '<br>';
          echo "<p>" . 'Position :      ' . $jobData['position'] . "</p>" . '<br>';
          echo "</li>";
          echo "<hr>";
        }
        echo "</ul>";
        ?>
      </div>
    </div>
  </div>

</body>

</html>