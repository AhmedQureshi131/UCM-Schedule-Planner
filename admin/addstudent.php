<?php
//first we need to check the session otherwise we don't
//allow user to open this page
session_start();
 //now here we need to check whether it is accessing or not
if(isset($_SESSION['uid'])){

}//if not then we will redirect it to login page.
else{
  //../ means if the session destroy and you are again accessing the
//admindash then it will redirect you to the login page to login first
  header('location:../login.php');
}

 ?>
 <?php
 //in order to use header file
 //we don't need to write in every file the basic code for html
include('header.php');

  ?>
  <!DOCTYPE html>
  <html>
  <head>
  <title> UCM Schedule Planner</title>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <style>
  .avatar{
   width: 130px;
   height: 100px;

   position: absolute;
   top: -13%;
   left: calc(50% - 50px);
  }
  .search-box{
    position: absolute;
    top:20%;
    left:50%;
    transform: translate(-50%, -50%);
    background: #2f3640;
    height: 50px;
    border-radius: 80px;
    padding: 10px;

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


  <div class='container' style="padding-top: 20px;background-color: white;margin-top: 65px;margin-bottom:20px;width:720px;height:650px;left:25%; border-radius: 10%; position: absolute;">
  <img src="../images/ucm3.png" class="avatar"><br>
  <center><a href = "studentinfo.php" style="color:red;">Go Back</a><center>

  <br><br><center><h1> Enroll New Student </h1></center>
  <form method="post" action="addstudent.php" enctype="multipart/form-data">

<!-- if you want to store the image remember type enctype -->

  <table width="100%" border="6" style="margin-top:100px; left:80%;">
     <tr >
       <th>700#</th>
       <td><input type="text" name="rollno" placeholder="Enter 700# Number" required style="width:100%;"></td>
     </tr>
     <tr >
       <th>First Name</th>
       <td><input type="text" name="fname" placeholder="Enter First Name" required style="width:100%;"></td>
     </tr>
     <tr>
       <th>Last Name</th>
       <td><input type="text" name="lname" placeholder="Enter Last Name" required style="width:100%;"></td>
     </tr>
     <tr>
       <th>Password</th>
       <td><input type="password" name="pw" placeholder="Enter the Password" required style="width:100%;"></td>
     </tr>
     <tr>
       <th>Email</th>
       <td><input type="text" name="email" placeholder="Email Address" required style="width:100%;"></td>
     </tr>

     <tr>
      <td colspan="4" height="30px;" align="center"><input type="submit" name="submit" value="Enroll" style="width:30%; height:30px; background-color:red;"></td>
     </tr>
  </table>

</form>
<center><a href="sendNotification.php" style="color:red;margin-top:100px;">Send Email Notification</a></center>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  //we need to store this data into database
  include('../dbcon.php');

  //now we need to add query
  //but first store all the data into variables
  $rollno =$_POST['rollno'];
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $pw=$_POST['pw'];
  $pw = base64_encode($pw);
  $email=$_POST['email'];
  //In order to access image use $_FILES
  //we use name and tmp_name in order to fetch the image
  //$image=$_FILES['simg']['name'];
  //we also have atemporary name for a file
//$tempname = $_FILES['simg']['tmp_name'];
//now we need to send the image to dataimg folder
//remember for unstructured data we always save at some place
//and just put the information on database
//move_uploaded_file($tempname,"../dataimg/$image");

  $qry="INSERT INTO `login`(`student_id`, `f_name`, `l_name`, `password`, `email`) VALUES ('$rollno','$fname','$lname','$pw','$email')";

 //now execute this query
 $run = mysqli_query($con, $qry);
 if($run){
?>

   <script>
     alert('Enrollment Successfull!!');
   </script>


<?php
 }else{
   echo'Error!!';

 }
}



 ?>
