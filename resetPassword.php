<?php
include('dbcon.php');

if(!isset($_GET["code"])){
  exit("Can't find the page");
}
$code = $_GET["code"];
$getEmailQuery = mysqli_query($con,"SELECT email FROM resetPasswords WHERE code='$code'");
if(mysqli_num_rows($getEmailQuery)==0){
  exit("Can't find page");
}
if(isset($_POST["password"])){
  $pw = $_POST["password"];
  $pw = base64_encode($pw);
  $row = mysqli_fetch_array($getEmailQuery);
  $email = $row["email"];
  $query = mysqli_query($con,"UPDATE login SET password='$pw' WHERE email='$email'");

  if($query){
    $query = mysqli_query($con,"DELETE FROM resetPasswords WHERE code='$code'");
    ?>
   <script>alert("Password reset Successfully!!")  </script>
    <?php
  }else{
    exit("Something went wront");
  }
}
 ?>
 <html>
 <head>
 		<title> Forgot Password </title>
 		<style>
 		body{
 		  font-family: sans-serif;
 		  margin: 0;
 		  padding: 0;
 		  background: url("https://www.i-studentglobal.com/usa/mo/ucmo/mini-guide/chinese/html5/assets/images/mobile/ucmo-students-on-campus.jpg");
 		  background-size: cover;
 		  background-position: center;
 		  background-attachment: fixed;
 		}
 		.login-box{
 		  width:360px;
 		  position: absolute;
 		  height: 300px;
 		  background: #000;
 		  top:50%;
 		  left: 50%;

 		  transform: translate(-50%, -50%);
 		  color: #fff;
 		  box-sizing: border-box;
 		  padding: 70px 30px;
 		}
 		.avatar{
 		  width: 100px;
 		  height: 100px;
 		  border-radius: 50%;
 		  position: absolute;
 		  top: -50px;
 		  left: calc(50% - 50px);
 		}
 		h1{
 		margin: 0;
 		padding: 0 0 20px;
 		text-align: center;
 		top: -30px;
 		font-size: 22px;
 		}
     h2{
       background-color: black;

     }
 		.login-box p{
 		  margin: 0;
 		  padding: 0;
 		  font-weight: bold;
 		}
 		.login-box input{
 		  width: 100%;
 		  margin-bottom: 20px;

 		}
 		.login-box input[type="text"],input[type="password"],input[type="email"],input[type="file"]{
 		  border: none;
 		  border-bottom: 1px solid #fff;
 		  background: transparent;
 		  outline: none;
 		  height: 40px;
 		  color: #fff;
 		  font-size: 16px;
 		}
 		.login-box input[type="submit"]{
 		  border: none;
 		  outline: none;
 		  height: 30px;
 		  background: #fb2525;
 		  color: #fff;
 		  font-size: 18px;
 		  border-radius: 20px;
 		}
 		.login-box input[type="submit"]:hover{
 		  cursor: pointer;
 		  background: #ffc107;
 		  color: #000;
 		}
 		.login-box a{
 		  text-decoration: none;
 		  font-size: 12px;
 		  line-height: 20px;
 		  color: darkgrey;
 		}
 		.login-box a:hover{
 		  color: #ffc107;
 		}
    .error{
 		 color:red;
 	 }
 	 .success{
 		 color:red;
 		 font-weight: bold;
 	 }
 		</style>
 		</head>

 <body>

 <!-- Form -->
 <div class="login-box">
 <img src="images/ucm1.png" class="avatar">
 		<h1> Reset Your Password </h1>

 		<form class="logincontainer" method="POST">
 			<p>New Password</p>
 			<input type="password" name="password" placeholder="Enter Your New Password" >

        <input type="submit" name="submit" value="Update Password">
 		 <center><a href="studentLogin.php"> <p>Sign in</p></a></center>
 		</form>
 	</div>
 </body>

 </html>
