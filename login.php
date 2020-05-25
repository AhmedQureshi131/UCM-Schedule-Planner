<?php
//if you are going to open a new terminal and you already login
//then it should redirect you to the admin dash
//session will set when user login so use isset
session_start();
if(isset($_SESSION['uid'])){
  header('location:admin/admindash.php');
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Admin Login</title>

<link href = "css/adminStyle.css" rel="stylesheet" type="text/css">
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
  height: 450px;
  background: #000;
  top:50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #fff;
  box-sizing: border-box;
  padding: 70px 60px;
}
.avatar{
  width: 100px;
  height: 100px;
  border-radius: 50%;
  position: absolute;
  top: -60px;
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

</style>
</head>

<body>



    <div class="login-box">
    <img src="images/ucm1.png" class="avatar">
    <h1>Admin Login</h1>
    <form method = "POST" action="login.php">
    <p>Username</p>
    <input type="text" name="uname" placeholder="Enter Username"required>
    <p>Password</p>
    <input type="password" name="pass" placeholder="Enter Password"required>
    <input class="btn" type="submit" name="login" value="Sign in">
    <a href = "forgot.php">Forget Password? </a><br />
    <a href = "registration.php">Don't have an account? Sign up </a><br />

       <a href = "studentLogin.php">Are you an Student?</a><br />
    </div>
  </form>
</body>
</html>

<!-- now we need to add php code -->
<?php
//add database connection first
include('dbcon.php');
//when submit button click then process otherwise not
//so use if (isset) method
if(isset($_POST['login'])){
     //store username and password into a variables
     $username = $_POST['uname'];
     $password = $_POST['pass'];

     //now check whether they are match or not
     $qry = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password';";
     //now execute
     $run = mysqli_query($con,$qry);
     //if there is no data in the database then this one will give you zero row
     //so check the number of rows
     //it will return the number of rows in output
     //if there is no row then we dont need to login the admin
     $row = mysqli_num_rows($run);
     if($row < 1){
       ?>

       <script>alert('Username or Password not match');
       //redirect to the same page
       //_self means this page will referesh on this page only
       window.open('login.php','_self');
       </script>
       <?php
     }else{
       //if more than one then we will fetch the username and password
      $data = mysqli_fetch_assoc($run);
      //first we need the id of the admin
      //if the result is true then
      //it means whatever the result will come in data that will come in the associative
      //array so in data array there will be a key with name id
      $id = $data['id'];
      session_start();
      $_SESSION['uid'] = $id;
      //redirect
     header('location:admin/admindash.php');
     }

}


 ?>
