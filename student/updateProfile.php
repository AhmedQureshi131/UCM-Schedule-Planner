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
  top: -10%;
  left: calc(50% - 50px);
}
.container a{
  text-decoration: none;
}
.container a:hover{
  background: black;
}
.container1{
  text-align: center;
  margin-top: 30px;
}
.btn{
  border: 1px solid red;
  background: none;
  padding: 10px 20px;
  font-size: 20px;
  font-family: "montserrat";
  cursor: pointer;
  transition: 0.8s;
}
.btn1{
  color:red;
}
.btn1:hover{
  color: black;
}
</style>
 </head>
 <body>


<div class='container' style="padding-top: 20px;background-color: #fff;margin-top: 65px;margin-bottom:20px;width:820px;height:800px;left:22%; border-radius: 5%; position: absolute;">
<img src="../images/ucm3.png" class="avatar"><br>
<h2 align='center'>Welcome <?php echo ucfirst($firstname)." ".ucfirst($lastname)?></h2><br>
<center><img src="../profileImg/<?php echo $image;?>" style="width:300px; height:350px; border-radius: 50%"></center>

<br><center><h1> Update Your Profile Info </h1></center>

<form method="post" action="updateProfile.php" enctype="multipart/form-data">

<!-- if you want to store the image remember type enctype -->

<table width="100%" border="6" style="margin-top:20px; left:80%;">
  <tr >
    <th>Please Enter Your 700#</th>
    <td><input type="text" name="enrollno" placeholder="<?php echo ($studentId)?>" style="width:100%;"></td>
  </tr>
   <tr >
     <th>Update Your First Name</th>
     <td><input type="text" name="fname" placeholder="<?php echo ($firstname)?>" style="width:100%;"></td>
   </tr>
   <tr>
     <th>Update Your Last Name</th>
     <td><input type="text" name="lname" placeholder="<?php echo ($lastname)?>" required style="width:100%;"></td>
   </tr>
   <tr>
     <th>Update Your Password</th>
     <td><input type="password" name="pw" placeholder="<?php echo ($password)?>" required style="width:100%;"></td>
   </tr>
   <tr>
    <th>Update Your Profile Image</th>
    <td><input type="file" name = "simg" value="Upload Your Image" >  </td>
   </tr>
   <tr>
     <th>Update Your Email</th>
     <td><input type="text" name="email" placeholder="<?php echo ($email)?>" required style="width:100%;"></td>
   </tr>

   <tr>
    <td colspan="4" height="30px;" align="center"><input type="submit" name="submit" value="Update My Profile" style="width:30%; height:30px; background-color:red;"></td>
   </tr>
</table>
<br><br><br><br>

</form>
<div class="container1">

</div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  //we need to store this data into database
  include('../dbcon.php');

  //now we need to add query
  //but first store all the data into variables
  $enroll = $_POST['enrollno'];
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $pw=$_POST['pw'];
  $pw = base64_encode($pw);
  $email=$_POST['email'];
  //In order to access image use $_FILES
  //we use name and tmp_name in order to fetch the image
  $image=$_FILES['simg']['name'];
  //we also have atemporary name for a file
$tempname = $_FILES['simg']['tmp_name'];
//now we need to send the image to dataimg folder
//remember for unstructured data we always save at some place
//and just put the information on database
move_uploaded_file($tempname,"../profileImg/$image");

  $qry=mysqli_query($con,"UPDATE `login` SET `f_name` = '$fname', `l_name` = '$lname', `password`='$pw',`email`='$email',`img`='$image' WHERE `student_id` = '$enroll'");

 //now execute this query

 if($qry){
?>

   <script>
     alert('Your Profile is Updated!!');
   </script>


<?php
header("location:profile.php");
 }else{
   ?>

      <script>
        alert('Please Enter Your Correct 700#');
      </script>


   <?php

 }
}



 ?>
