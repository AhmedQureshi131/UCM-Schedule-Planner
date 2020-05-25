<?php
include('header.php');
include('../dbcon.php');
session_start();

$username = $_SESSION['user'];
$result=mysqli_query($con,"SELECT `student_id`, `f_name`, `l_name`, `password`, `email`, `img` FROM `login` WHERE `student_id` = '$username'");
$retrive = mysqli_fetch_array($result);
//with the help of print_r($retrive); you can check the query
$studentId = $retrive['student_id'];
$firstname = $retrive['f_name'];
$lastname = $retrive['l_name'];
$password = $retrive['password'];
$email = $retrive['email'];
$image = $retrive['img'];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
<title> Profile Page</title>
<style>
.avatar{
  width: 130px;
  height: 100px;

  position: absolute;
  top: -13%;
  left: calc(50% - 50px);
}
.container a{
  text-decoration: none;

}
.container a:hover{
  background: black;
}
</style>
 </head>
 <body>


<div class='container' style="padding-top: 20px;background-color: #fff;margin-top: 65px;margin-bottom:20px;width:820px;height:650px;left:22%; border-radius: 20%; position: absolute;">
<img src="../images/ucm3.png" class="avatar">
<h2 align='center'>Welcome <?php echo ucfirst($firstname)." ".ucfirst($lastname)?></h2><br>
<center><img src="../profileImg/<?php echo $image;?>" style="width:350px; height:400px; border-radius: 50%"></center>
<h2 align='center'>Student 700#: <?php echo ($studentId)?></h2>
<h2 align='center'>First Name: <?php echo ($firstname)?></h2>
<h2 align='center'>Last Name: <?php echo ($lastname)?></h2>
<h2 align='center'>Email: <?php echo ($email)?></h2>
<h2 align='center'>Password: <?php echo base64_decode($password)?></h2>
<center><a href="updateProfile.php" style="color:red;">Update Your Profile</a></center>

</div>
</body>
</html>
