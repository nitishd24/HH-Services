<?php
    require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" href="css/style.css">
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
		<h1>Sign-Up</h1>
	
	    <form class="myform" action="register.php" method="post" name="loginForm">
		     <div class="textbox">
             <i class="fas fa-user"></i>
	         <input name="username" type="text" class="inputvalues" placeholder="Your username" required/>
			 </div>
		     <div class="textbox">
             <i class="fas fa-lock"></i>
		     <input name="password" type="password" class="inputvalues" placeholder="Your Password"required/>
			 </div>
			 <div class="textbox">
             <i class="fas fa-lock"></i>
		     <input name="cpassword" type="password" class="inputvalues" placeholder="Confirm Password"required/>
			 </div>
			 <input name="submit_btn" type="submit" class="btn" onclick="myFunction(document.loginForm.password,document.loginForm.username)" value="Sign Up"/><br>
			 <a href="index.php"><input type="button" class="btn" value="Back"/></a>
		</form>
		
		<script>
            function myFunction(x,y) {
                // If x is not an alphabet or number
                var letters = /^[A-Za-z0-9]{8,15}$/;
                if(x.value.match(letters))
                {
                    return true;
                }
                else
                {
                	y.value=" ";
                    alert('Please input valid password in range 8-15 character');
                    return false;
                }
            }
        </script>
		
		<?php
		    if(isset($_POST['submit_btn']))
			{
				//echo '<script type="text/javascript"> alert("Sign Up Button clicked") </script>';
			
			    $username = $_POST['username'];
			    $password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				if($username!=" ")
				{
			    if($password==$cpassword)
				{
					$query= "select * from user WHERE username ='$username'";
				
				    $query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						//there is already a user with same username
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					else
					{
						$query = "insert into user value('$username','$password')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!!!") </script>';
						}
					}
				}
				else
				{
					echo '<script type="text/javascript"> alert("Password does not match") </script>';
				}
				}
			
			
			}
		?>
	</div>
</body>
</html>