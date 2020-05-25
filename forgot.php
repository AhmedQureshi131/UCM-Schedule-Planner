<?php

include('assets/function1.php');

$msg='';$msg1='';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'dbcon.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
if(isset($_POST["email"])){
  // Instantiation and passing `true` enables exceptions
  $emailTo = $_POST["email"];
  $code = uniqid(true);
  $query = mysqli_query($con,"INSERT INTO resetPasswords(code,email) VALUES('$code','$emailTo')");
  if(!$query){
    exit("Error");
  }
  $mail = new PHPMailer(true);

  try {
      //Server settings
                           // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'axq02670@ucmo.edu';                     // SMTP username
      $mail->Password   = 'ahmed131';                               // SMTP password
      $mail->SMTPSecure = "ssl";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      //Recipients
      $mail->setFrom('axq02670@ucmo.edu', 'UCM Schedule Planner');
      $mail->addAddress("$emailTo");     // Add a recipient
      $mail->addReplyTo('n-reply@ucmo.edu', 'University of Central Missouri');


      // Content
      $url = "http://" . $_SERVER["HTTP_HOST"]. dirname($_SERVER["PHP_SELF"]). "/resetPassword.php?code=$code";
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'UCM Reset Password Request';
      $mail->Body    = "<center><h2>University of Central Missouri <br>Go Mules and Jennes!!<br>You requested a password reset</h2></center>
                        Click <a href='$url'>this link</a> to reset your UCM Schedule Planner Password";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      ?>

      <script> alert("Reset Password link has been sent to your email!!") </script>
<?php
  } catch (Exception $e) {
      ?>
      <script> alert("Error!! Please make sure that your security access is on") </script>
      <?php
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
		  height: 400px;
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
		<h1> Forgot Password </h1>

		<form class="logincontainer" method="POST">
			<p>UCM 700#</p>
			<input type="text" name="num" placeholder="Enter Your 700#" >
      <?php echo $msg; ?>
    	<p> Email </p>
			<input type="email" name="email" placeholder="Enter Your Email" autocomplete="off">
      <?php echo $msg1; ?>


       <input type="submit" name="submit" value="Submit">
		 <center><a href="studentLogin.php"> <p>Sign in</p></a></center>
		</form>
	</div>
</body>

</html>
