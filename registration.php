<!-- This is the student registeration page -->

<?php
session_start();

include('dbcon.php');
include('assets/function1.php');
include('assets/function2.php');
$msg='';$msg1=''; $msg2=''; $msg3='';$msg4='';$msg5='';$msg6='';$msg7='';$msg8='';
$username='';$fName='';$lName='';$email='';$password='';$c_password='';$image='';

if(isset($_POST["register"])){


		   $username =mysqli_real_escape_string($con,$_POST["num"]);
		   $fName =mysqli_real_escape_string($con,$_POST["fName"]);
		   $lName =mysqli_real_escape_string($con,$_POST["lName"]);
		   $email =mysqli_real_escape_string($con,$_POST["email"]);
			 $password =$_POST["password"];
			 $c_password =$_POST["cpassword"];
			 $image =$_FILES['image']['name'];
			 $tmp_image =$_FILES['image']['tmp_name'];
       $size_image=$_FILES['image']['size'];
			 $checkbox =isset($_POST['check']);
		   //Security reason encrypt password

			 if(strlen($username)<9){
	 			$msg = '<div class="error"> 700# must be at least 9 characters </div>';
      }else if(user_exits($username,$con)){
	 			$msg = '<div class="error"> 700# already taken </div>';
      }else if(strlen($fName)<3){
				$msg1 = '<div class="error"> First name must be at least 3 characters </div>';
		  }else if(strlen($lName)<3){
				$msg2 = '<div class="error"> Last name must be at least 3 characters </div>';

		  }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$msg3 = '<div class="error"> Enter a valid email </div>';
		  }else if(email_exits($email,$con)) {
				$msg3 = '<div class="error"> Email already exits </div>';
		  }else if(empty($password)){
				$msg4 = '<div class="error"> Please enter your password </div>';

		  }else if(strlen($password)<5){
				$msg4 = '<div class="error"> Password must be at least 5 characters </div>';

		  }else if($password !== $c_password){
				$msg5 = '<div class="error"> Enter the correct password </div>';

		  }else if($image==''){
				$msg6 = '<div class="error"> Please Upload Your Profile Image </div>';

		  }else if($size_image>=1000000){
				$msg6 = '<div class="error"> Please Upload Image less than 1 MB </div>';

		  }else if($checkbox==''){
				$msg7 = '<div class="error"> Please agree our terms and conditions </div>';

		  }else{
				$password = base64_encode($password);
        $img_ext=explode(".",$image);
				$image_ext = $img_ext['1'];
				$image=rand(1,1000).rand(1,1000).time().".".$image_ext;
				if($image_ext == 'jpg' || $image_ext == 'png'|| $image_ext == 'PNG' ||$image_ext == 'JPG'   ){

        move_uploaded_file($tmp_image,"profileImg/$image");
				$query = "INSERT INTO `login`(`student_id`, `f_name`, `l_name`, `password`, `email`,`img`) VALUES ('$username','$fName', '$lName','$password','$email','$image')";

			  $run = mysqli_query($con,$query);
				//$msg8 = '<div class="success">Registered!! Go Mules and Jennes!! </div>';
        ?>
        <script>alert("Registered Successfully!!");</script>
				<?php
				$msg8 = '<div class="success"><center>Go Mules and Jennies!! </center></div>';
				$username='';$fName='';$lName='';$email='';$password='';$c_password='';$image='';
			}else{
				$msg6 = '<div class="error"> Please Upload a Image file (.jpg)(.png)(.PNG)(.JPG) </div>';

			}
			}
}
?>

<html>
<head>
		<title> Registeration </title>
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
		  height: 820px;
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
		  top: -20px;
		  left: calc(50% - 50px);
		}
		h1{
		margin: 0;
		padding: 0 0 20px;
		text-align: center;
		top: -20px;
		font-size: 22px;
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
		<h1> Registeration </h1>
	<?php echo $msg8;  ?>
		<form class="logincontainer" method="POST" enctype="multipart/form-data">
			<p>UCM 700#</p>
			<input type="text" name="num" placeholder="Enter your 700#" value="<?php echo $username; ?>">
     <?php echo $msg;  ?>
			<p> First Name </p>
			<input type="text" name="fName" placeholder="First name" value="<?php echo $fName; ?>">
      <?php echo $msg1;  ?>
			<p> Last Name </p>
			<input type="text" name="lName" placeholder="Last name" value="<?php echo $lName; ?>" >
     <?php echo $msg2;  ?>
			<p> Email </p>
			<input type="email" name="email" placeholder="Enter an email" value="<?php echo $email; ?>">
      <?php echo $msg3;  ?>
			<p> Password </p>
			<input type="password" name="password" placeholder="Enter a password" value="<?php echo $password; ?>">
      <?php echo $msg4;  ?>
			<p> Re-enter Password </p>
			<input type="password" name="cpassword" placeholder="Re-enter Your password" value="<?php echo $c_password; ?>">
     <?php echo $msg5;  ?>
			<p> Profile Image </p>
 		 <input type="file" name = "image" value="<?php echo $image; ?>" >
		 <?php echo $msg6;  ?>
     <div style="text-align: center; vertical-align: middle;">
		 <input type="checkbox" name="check" style="text-align: center; vertical-align: middle;">
		 <p>I Agree the terms and conditions</p>
     <?php echo $msg7;  ?>
	 </div>

			 <input type="submit" name="register" value="Register Now">
		 <center><a href="studentLogin.php"> <p>Already Registered?Sign in</p></a></center>
		</form>
	</div>
</body>

</html>
