<?php
session_start();
require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Index Page</title>
<link rel="stylesheet" href="css/webpage.css">
</head>
<body style="background-image:url('imgs/bg.jpg');background-size:cover">
<div>
<div class="container" style="position:absolute;left:20%;">
  <a href="login.php"><img src="imgs/user.jpg" alt="Avatar" class="image">
  <div class="overlay" id="user">
    <div class="text" style="color:#F8EFBA"><font face="Comic Sans MS">Consumer</font></div>
  </div>
  </a>
</div>
<div class="container" style="position:absolute;right:20%">
  <a href="slogin.php"><img src="imgs/admin.jpg" alt="Avatar" class="image">
  <div class="overlay" id="admin">
    <div class="text" style="color:#2C3A47;"><font face="Comic Sans MS">Service</font></div>
  </div>
  </a>
</div>
	</div>

</body>
</html>