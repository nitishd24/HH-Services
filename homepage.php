<?php
session_start();
if(!isset($_SESSION['username']))
{
	header('location:login.php');
}	
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
  </head>
  <style>
  *{
  margin: 0;
  padding: 0;
  font-family: "montserrat",sans-serif;
}
.header{
  height: 100px;
  background: #34495e;
  padding: 0 20px;
  color: #fff;
}
.logo{
  line-height: 100px;
  float: left;
  text-transform: uppercase;
}

.menu{
  float: right;
  line-height: 100px;
}
.menu a{
  color: #fff;
  text-transform: uppercase;
  text-decoration: none;
  padding: 0 10px;
  transition: 0.4s;
}
.show-menu-btn,.hide-menu-btn{
  transition: 0.4s;
  font-size: 30px;
  cursor: pointer;
  display: none;
}
.show-menu-btn{
  float: right;
}
.show-menu-btn i{
  line-height: 100px;
}
.menu a:hover,
.show-menu-btn:hover,
.hide-menu-btn:hover{
  color: #3498db;
}

#chk{
  position: absolute;
  visibility: hidden;
  z-index: -1111;
}

.content{
  padding: 0 20px;
}
.content img{
  width: 100%;
  max-width: 700px;
  margin: 20px 0;
}
.content p{
  text-align: justify;
}

@media screen and (max-width:800px) {
  .show-menu-btn,.hide-menu-btn{
    display: block;
  }
  .menu{
    position: fixed;
    width: 100%;
    height: 100vh;
    background: #333;
    right: -100%;
    top: 0;
    text-align: center;
    padding: 80px 0;
    line-height: normal;
    transition: 0.7s;
  }
  .menu a{
    display: block;
    padding: 20px;
  }
  .hide-menu-btn{
    position: absolute;
    top: 40px;
    right: 40px;
  }
  #chk:checked ~ .menu{
    right: 0;
  }
}
.services-section{
  background: url(imgs/bg1.jpg);
  background-size: cover;
  padding: 60px 0;
}
.inner-width{
  width: 100%;
  max-width: 1200px;
  margin: auto;
  padding: 0 20px;
  overflow: hidden;
}
.section-title{
  text-align: center;
  color: #ddd;
  text-transform: uppercase;
  font-size: 30px;
}
.border{
  width: 160px;
  height: 2px;
  background: #82ccdd;
  margin: 40px auto;
}
.services-container{
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.service-box{
  max-width: 33.33%;
  padding: 10px;
  text-align: center;
  color: #ddd;
  cursor: pointer;
}

.service-icon{
  display: inline-block;
  width: 70px;
  height: 70px;
  border: 3px solid #82ccdd;
  color: #82ccdd;
  transform: rotate(45deg);
  margin-bottom: 30px;
  margin-top: 16px;
  transition: 0.3s linear;
}
.service-icon i{
  line-height: 70px;
  transform: rotate(-45deg);
  font-size: 26px;
}
.service-box:hover .service-icon{
  background: #82ccdd;
  color: #ddd;
}
.service-title{
  font-size: 18px;
  text-transform: uppercase;
  margin-bottom: 10px;
}
.service-desc{
  font-size: 14px;
}

@media screen and (max-width:960px) {
  .service-box{
    max-width: 45%;
  }
}

@media screen and (max-width:768px) {
  .service-box{
    max-width: 50%;
  }
}

@media screen and (max-width:480px) {
  .service-box{
    max-width: 100%;
  }
}
</style>
  <body>

  <div class="header">
    <h2 class="logo">HH-Services</h2>
    <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
      <i class="fas fa-ellipsis-h"></i>
    </label>

    <ul class="menu">
      <a href="homepage.php">Home</a>
      <a href="aboutus.php">About</a>
      <a href="#">Contact</a>
	  <a href="logout.php">Log Out</a>
      <label for="chk" class="hide-menu-btn">
        <i class="fas fa-times"></i>
      </label>
    </ul>
  </div>


<div class="services-section">
      <div class="inner-width">
        <h1 class="section-title">Our Services</h1>
        <div class="border"></div>
		<h2 class="section-title">Welcome <?php echo $_SESSION['username']; ?></h2>
        <div class="services-container">

          <div class="service-box">
            <a href="paint.php">
			<div class="service-icon">
              <i class="fas fa-paint-roller"></i>
            </div>
			</a>
            <div class="service-title">Painter</div>
            <div class="service-desc">
              All kinds of painting related services are available.
            </div>
          </div>

          <div class="service-box">
		    <a href="carpenter.php">
            <div class="service-icon">
              <i class="fas fa-hammer"></i>
            </div>
			</a>
            <div class="service-title">Carpenter</div>
            <div class="service-desc">
              All types of wooden furnishing services are available.
            </div>
          </div>

          <div class="service-box">
            <a href="plumber.php">
			<div class="service-icon">
              <i class="fas fa-shower"></i>
            </div>
			</a>
            <div class="service-title">Plumber</div>
            <div class="service-desc">
              All types of plumbing related services are available.
            </div>
          </div>

          <div class="service-box">
            <a href="elec.php">
			<div class="service-icon">
              <i class="fas fa-screwdriver"></i>
            </div>
			</a>
            <div class="service-title">Electrician</div>
            <div class="service-desc">
              All types of Electrical and wiring services are available.
            </div>
          </div>

          <div class="service-box">
            <a href="mason.php">
			<div class="service-icon">
              <i class="fas fa-vector-square"></i>
            </div>
			</a>
            <div class="service-title">Mason</div>
            <div class="service-desc">
              Masons are available for construction as required.
            </div>
          </div>

          <div class="service-box">
            <a href="cleaner.php">
			<div class="service-icon">
              <i class="fab fa-water"></i>
            </div>
			</a>
            <div class="service-title">Cleaner</div>
            <div class="service-desc">
              Services available for house cleaning with best results.
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
