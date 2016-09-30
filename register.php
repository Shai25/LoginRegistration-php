<html>
<head>


<html>
<head>
	

<?php
include('db.php');

$fullname=@$_POST['fullname'];
$username=@$_POST['username'];
$password1=@$_POST['password1'];
$password2=@$_POST['password2'];
$submit=@$_POST['submit'];
$encpassword=md5($password1);

if($submit)
{
	if($fullname==true)
	{	if($username==true)
		{
			if($password1==true)
			{
				if($password1==$password2)
				{
					if(strlen($fullname)<50||strlen($username)<50)

				{
				
				
				if(strlen($password1)<50||strlen($password1)>6 )
				{
					  $pattern = ' ^.*(?=.{5,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$^ ';

                     if (preg_match($pattern,$password1))
				    {
					$insert=mysqli_query($db,"INSERT INTO users VALUES ('','$fullname','$username','$encpassword') ")
					or die("It didn't work");
					echo "You have been registered!";
					}
					else 
						echo "Password should be of length 5 to 50 contain one upper case letter, one lower case letter and one digit.";
				}
				
					
				
				else
					echo "Enter a password of length between 6 and 50";
			}
			else
				echo "Maximum length for username and fullname is 50 characters";
		}
		else
			echo "Passwords don't match";
	}
		else 
			echo" Please input a password";
	}
	else 
		echo" Please input a username";
	}
	else
		echo"Please enter full name";
	
		
};

?>

<style>
		@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}

</style>
</head>
<body>


<body>
<div class="login-page">
  <div class="form">
    <form class="register-form" method="post">
	
	<h1 color="white" align="center">REGISTER</h1>
      <input type="text" placeholder="fullname" name="fullname"/>
         <input type="text" placeholder="username" name="username" />
      <input type="password" placeholder="password" name="password1"/>
           <input type="password" placeholder="re-enter password" name="password2"/>
   
      <input type="submit" name="submit">
      <p class="message">Already registered? <a href="login.php">Sign In</a></p>
    </form>
   
  </div>
</div>

<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

</script>
</body>
</body>
</html>