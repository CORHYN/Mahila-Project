<?php
session_start();
if($_SESSION['login'] == 1 || $_SESSION['login'] == 2){

}else{
  header("Location:login.html");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
  <link rel="stylesheet" href="homepage.css">
</head>
<body>
  <h1>Choose a company that interests you</h1>

  <div class="company">
    <img class="company-image" src="company1.jpg" alt="Company 1">
    <div class="company-description">
      <h2>Xinxing Technology</h2>
      <p>Xinxing Technology Co., LTD., founded in 2010, is headquartered in Innovation Technology City. 
        Emerging Technologies is a technology company focused on software development and innovative solutions.</p>
      <a href="company1.html">Learn More</a>
    </div>
  </div>

  <div class="company">
    <img class="company-image" src="company2.jpg" alt="Company 2">
    <div class="company-description">
      <h2>Greenland Environmental Protection</h2>
      <p>Greenland Environmental Protection Co., LTD., Greenland Environmental Protection is a company focused on environmental protection and sustainable development.
         We are committed to providing green solutions and environmental consulting services.</p>
      <a href="company2.html">Learn More</a>
    </div>
  </div>

  <div class="company">
    <img class="company-image" src="company3.jpg" alt="Company 3">
    <div class="company-description">
      <h2>Eule Health Technology Limited</h2>
      <p>Eule Health Technology Limited, Eule Health Technology is a leading health technology company 
        focused on developing innovative health management and telemedicine solutions</p>
      <a href="company3.html">Learn More</a>
    </div>
  </div>

  <!-- Add more companies -->

</body>
</html>
