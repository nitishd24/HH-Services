<?php
    session_start();
    require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
	  </head>
	<style>
	@import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";
body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: url(imgs/bg.jpg) no-repeat;
  background-size: cover;
}
.login-box{
  width: 280px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  color: white;
}
.login-box h1{
  float: left;
  font-size: 40px;
  border-bottom: 6px solid #4caf50;
  margin-bottom: 50px;
  padding: 13px 0;
}
.textbox{
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid #4caf50;
}
.textbox i{
  width: 26px;
  float: left;
  text-align: center;
}
.textbox input{
  border: none;
  outline: none;
  background: none;
  color: white;
  font-size: 18px;
  width: 80%;
  float: left;
  margin: 0 10px;
}
.btn{
  width: 100%;
  background: none;
  border: 2px solid #4caf50;
  color: white;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;
}
</style>
  <body>
  <div class="login-box">
  <form class="myform" method="post">
  <h1>Login</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input name="username" value="<?php if(isset($_COOKIE["username"])) {echo $_COOKIE["username"];} ?>" type="text" placeholder="Username" required/>
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input name="password" value="<?php if(isset($_COOKIE["password"])) {echo $_COOKIE["password"];}?>" type="password" placeholder="Password" required/>
  </div>
   <br><input type="checkbox" name="remember" <?php if(isset($_COOKIE["username"])) { ?> checked <?php }?>/>
   <label>Remember me</label><br/><br/>
  <input name="login" type="submit" class="btn" value="Sign in">
  <a href="register.php" ><input type="button" class="btn" value="Register"></a>
  </form>
  <?php
		if(isset($_POST['login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$query="select * from user WHERE username='$username' AND password='$password'";
			
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				if(!empty($_POST["remember"]))
                {
                  setcookie ("username", $username, time() + (10 * 24 * 60 * 60));
                  setcookie ("password", $password, time() + (10 * 24 * 60 * 60));
                }
                else
                {
                  if(isset($_COOKIE["username"]))
                  {
                    setcookie ("username", "");
                  }
                 if(isset($_COOKIE["password"]))
                  {
                    setcookie ("password", "");
                  }
                }
				//valid
				$_SESSION['username']=$username;
				header('location:homepage.php');
			}
			else
			{
				//invalid
				echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
			}
		}
		
		?>
</div>
  </body>
</html>
