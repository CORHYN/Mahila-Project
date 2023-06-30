<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="homepage.css?v=<?php echo time(); ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Montserrat:ital@1&family=Sora:wght@300&display=swap" rel="stylesheet">
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
        </div>



</body>

</html>