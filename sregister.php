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
.list{
	width: 85%;
	overflow: hidden;
	font-size: 20px;
	margin-left: 20px;
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
	
	    <form class="myform" action="sregister.php" method="post" name="loginForm">
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
			 <div class="textbox">
             <i class="fas fa-toolbox"></i>
	         <select name="type" type="text" class="list">
			 <option value="plumber">Plumber</option>
			 <option value="painter">Painter</option>
			 <option value="carpenter">Carpenter</option>
			 <option value="electrician">Electrician</option>
			 <option value="mason">Mason</option>
			 <option value="cleaner">Cleaner</option>
			 </select>
			 </div>
			 <div class="textbox">
             <i class="fas fa-phone"></i>
	         <input name="contact" type="int" class="inputvalues" placeholder="Your contact" required/>
			 </div>
			 <input name="submit_btn" type="submit" class="btn" onclick="myFunction(document.loginForm.password,document.loginForm.username,document.loginForm.contact)" value="Sign Up"/><br>
			 <a href="index.php"><input type="button" class="btn" value="Back"/></a>
		</form>
		
		<script>
            function myFunction(x,y,z) {
                // If x is not an alphabet or number
                var letters = /^[A-Za-z0-9]{8,15}$/;
				var mob = /^[0-9]{10,10}$/;
				var f=0;
                if(x.value.match(letters))
                {
					if(z.value.match(mob))
					{
                        return true;
					}
					else
						f=1;
                }
                if(!(x.value.match(letters)) || f==1)
                {
                	y.value=" ";
					if(f==0)
                        alert('Please input valid password in range 8-15 character');
				    else
						alert('Please input valid mobile no.');
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
				$type = $_POST['type'];
				$contact = $_POST['contact'];
				if($username!=" ")
				{
			    if($password==$cpassword)
				{
					$query= "select * from service WHERE username ='$username'";
				
				    $query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						//there is already a user with same username
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					else
					{
						$query = "insert into service value('$username','$password','$type','$contact')";
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