<?php
$message="";
$message1="";
$message2="";
$nonce="";
if(count($_POST)>0) {
$conn = mysqli_connect("127.0.0.1","Shailee","bonzai7");


if (!$conn) {
    die("Database connection failed: " . mysqli_error());
}

$db_select = mysqli_select_db($conn,"nsplab");
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}

//$fullname=@$_POST['fullname'];

$username=@$_POST['username'];

$password1=@$_POST['password1'];

$encpassword=md5($password1);

$keyval="50505";


$usernameresult= mysqli_query($conn,"SELECT * FROM users WHERE users.username='$username'");
$fullcount  = mysqli_num_rows($usernameresult);
if($fullcount==0) 
	{
	 $message = "Invalid user!";
	}
else {
$message = "Your identity (full name) exists in the database!";

$nonce=time();
$x=$keyval+$nonce;
	$enc= md5($x);
$insert=mysqli_query($conn,"INSERT INTO keytable VALUES ('$keyval','$enc') ");

	$res = mysqli_query($conn,"SELECT * FROM keytable WHERE keytable.key='$keyval' and keytable.timeval = '$enc'");
	$c = mysqli_num_rows($res);
if($c==0) {
$message1 = "Your identity could not authenticate you to the server(by Challenge Response protocol)!";

//echo message1;
} else {
 $message1 = " Your identity is successfully authenticated to the server (by Challenge Response protocol)!";
 //echo message1;
}
	 



$result = mysqli_query($conn,"SELECT * FROM users WHERE users.username='$username' and users.password = '$encpassword'");

$count  = mysqli_num_rows($result);
if($count==0) {
$message2 = "Invalid Password!";
 //echo message2;
} else {
$message2 = "Passwords match. You are successfully authenticated!";
//echo message2;
}
}
}



/*
Here a keyed hash function is used to implement challenge response protocol. 

As per the protocol, User sends his identity (fullname) along with timestamp and hash of symmetric key and timestamp to the database. 
At the database, the timestamp's hash is calculated and matched witht he received hash value to authenticate the User. 

Here, the User is first authenticated by his/her fullname. 
The key value stands for the symmetric key which is matched to signify that both the User and database are using the same key for this session.
The hash of time stamp and key value is matched with the already stored hash at the database (hash is already stored as computing hash within the database would be tedious).

Thus Challenge Response Protocol has been applied successfully.
*/

?>




<html>
<head>
<title>User Login</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script>

function functionA()
{
	window.open(http://localhost/LoginandRegister/register.php);
}

</script>

</head>
<body>


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
  display: none;
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
<div class="login-page">
  <div class="form">
   
    <form class="login-form" method="post"  >
	<div class="message"><?php if($message!="") { echo $message; } 
if($message1!="") { echo $message1; } 
if($message2!="") { echo $message2; } 


?></div>
	<h1 color="white" align="center"> LOGIN </h1>
      <input type="text" placeholder="username" name="username"/> 
      <input type="password" placeholder="password" name="password1"/>
      <input type="submit" name="submit" value="Login">
      <p class="message">Not registered? <a href="register.php">Create an account</a></p>
    </form>
  </div>
</div>

<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

</script>

</body></html>