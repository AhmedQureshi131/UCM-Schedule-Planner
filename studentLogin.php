<?PHP

  session_start();
  include('dbcon.php');
  include('assets/function2.php');


  $msg='';$msg1=''; $username='';$password='';
  if(isset($_POST["Login"])){
     $username=$_POST['username'];
     $password=$_POST['password'];
     $checkbox=isset($_POST['check']);
     if(empty($username)){
       $msg='<div class="error">Please Enter Your UCM 700#</div>';
     }else if(empty($password)){
       $msg1='<div class="error">Please Enter Your Passoword</div>';
     }else if(user_exits($username,$con)){
           $pass=mysqli_query($con, "SELECT `password` FROM `login` WHERE `student_id` = '$username'");
           $pass_w=mysqli_fetch_array($pass);
           $dpass = $pass_w['password'];
           $password=base64_encode($password);
           if($password!==$dpass){
             $msg1='<div class="error">Wrong Password</div>';

           }else{
             $_SESSION['user'] = $username;
             if($checkbox=='on'){
               setcookie('name',$username,time()+3000);
             }
             header("location:student/home.php");
           }
     }else {
       $msg='<div class="error">700# Does Not Exists</div>';

     }
  }
  ?>





  <!DOCTYPE HTML>
<html>
<head>

	<title> UCM Schedule Planner</title>
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
    width:320px;
    position: absolute;
    height: 500px;
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
  .login-box input[type="text"],input[type="password"],input[type="email"]{
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
     color: red;
   }
  </style>

</head>

<body>

<!-- Form -->

        <div class="login-box">
          <img src="images/ucm1.png" class="avatar">
		<h1> Student Login </h1>
    <form method="POST" class="logincontainer" enctype="multipart/form-data">
			<p> UCM 700# </p>
			<input type="text" name="username" placeholder="Enter Your 700#" value="<?php echo $username; ?>">
     <?php echo $msg;?>
      <p> Password </p>
			<input type="password" name="password" placeholder="Enter Password" value="<?php echo $password; ?>">
      <?php echo $msg1;?>
      <center><input type="checkbox" name="check" style="margin-left: auto; margin-right: auto;">
      <p>Keep me Logged in</p></center>
      <input type="submit" name="Login" value="Login">
      <a href = "forgot.php">Forget Password? </a><br />
      <a href = "registration.php">Don't have an account? Sign up </a><br />
      <a href = "login.php">Are you an Administrator?</a><br />
    </div>
      </form>


</body>

</html>
