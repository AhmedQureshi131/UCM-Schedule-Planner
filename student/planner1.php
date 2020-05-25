<?php
//first we need to check the session otherwise we don't
//allow user to open this page
session_start();
include('../dbcon.php');
 //now here we need to check whether it is accessing or not
if(isset($_SESSION['user'])){

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
   top: -10%;
   left: calc(50% - 50px);
  }
  .search-box{
    position: absolute;
    top:22%;
    left:50%;
    transform: translate(-50%, -50%);
    background: #2f3640;
    height: 95px;
    border-radius: 30px;
    padding: 10px;
    color: white;

  }
  .contentBox{

    top:40%;
    left:50%;
    transform: translate(-50%, -50%);

    height: 80px;
    border-radius: 80px;
    padding: 10px;
    color: white;
  }

.a{
  margin-top:100px;
  text-align: center;
}
.container a{
  text-decoration: none;
  left:20%;

}
.container a:hover{
  background: black;

}
#myBtn{
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}
#myBtn:hover {
  background-color: black;
  color: white;
}
.container input[type="submit"]:hover{
  cursor: pointer;
  background:red;

}
.courses{
  position: absolute;
  top: 70%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: flex;
  margin: 0;
  padding: 0%;
}
.courses li{
  list-style: none;
  margin:0 5px;
}
.container h1{
  color: black;
  line-height: 50px;
  text-align: center;
}
.courses li a .fa{
  font-size: 10px;
  color: white;
  line-height: 0.5s;
  transition: 0.5s;
  padding-right: 14px;
}
.courses li a span{
  padding: 0;
  margin: 0;
  position: absolute;
  top: 30px;
  color: white;
  letter-spacing: 3px;
  transition: 0.5s;
}
.courses li a{
  text-decoration: none;
  display: absolute;
  display: block;
  width:180px;
  height:70px;
  background: black;
  text-align: left;
  padding-left: 10px;
  transform: rotate(-30deg) skewX(25deg) translate(0,0);
  transition: 1s;
  box-shadow: -20px 20px 10px rgba(0,0,0,0,5);
}
.courses li a:before{
content: '';
position: absolute;
top: 10px;
left: -20px;
height: 100%;
width: 20px;
background: black;
transform: 0.5s;
transform: rotate(0deg) skewY(-45deg);
}
.courses li a:after{
content: '';
position: absolute;
bottom: -20px;
left: -10px;
height: 20px;
width: 100%;
background: black;
transform: 0.5s;
transform: rotate(0deg) skewX(-45deg);
}
.courses li a:hover{
  transform: rotate(-30deg) skew(25deg) translate(20px, -15px);
  box-shadow: -50px 50px 50px rgba(0,0,0,0,5);
}
.courses li:hover .fa{
  color: black;
}
.courses li:hover span{
  color: black;
}
.courses li:hover a{
  background: red;
}
.courses li:hover a:before{
  background: red;
}
.courses li:hover a:after{
  background: #dd4b39;
}
  </style>
  </head>
  <body>
    <button onclick="topFunction()" id="myBtn" title="Go to top" >
      Go Top
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>


    <script type="text/javascript">
      window.onscroll = function()
      {
        scrollFunction()
      };

      function scrollFunction(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }

      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>

  <div class='container' style="padding-top: 20px;background-color: white;margin-top: 65px;margin-bottom:20px;width:820px;height:800px;left:22%; border-radius: 0%; position: absolute;">
  <img src="../images/ucm3.png" class="avatar"><br>
  <center><a href = "planner.php" style="color:red;">Go Back</a><center>
  <br><center><h1 > UCM SCHEDULE PLANNER </h1></center><br>
  <form action="planner1.php" method="POST">

     <div class="search-box" >
       Enter Your UCM 700#
       <input type="text" name="rollno" placeholder="700#"><br>
      Select Semester
    <select name="semester" >
      <option>--Semester</option>
    <option>Spring</option>
    <option>Summer</option>
    <option>Fall</option>

  </select><br>
  Select Year
    <select name="year">
      <option>--Year</option>
    <option>2019</option>
    <option>2020</option>
    <option>2021</option>
    <option>2022</option>
    <option>2023</option>
    <option>2024</option>
  <select><br>
    Category
      <select name="category">
        <option>--Select</option>
      <option>Core</option>
      <option>Elective</option>
      <option>GER</option>

    <select>


  </div>
 <h1 style="color:black; margin-top:100px;"> Add A Class In Your Planner</h1><br>
 <center><input type="text" name="course_code" placeholder="Enter a Course Code" style="width:150px; height:50px;  color:black; background: transparent; font-size: 14px;">
<input type="text" name="courseName" placeholder="Enter a Course Name" style="width:150px; height:50px;  color:black; background: transparent; font-size: 14px;">
<input type="submit" name="submit" Value="Add" style="border: none; height: 30px;width:150px; outline: none;background: #2f3640; color:white;  font-size: 20px;">

<br>
<input type="text" name="course_code2" placeholder="Enter a Course Code" style="width:150px; height:50px;  color:black; background: transparent; font-size: 14px;">
<input type="text" name="courseName2" placeholder="Enter a Course Name" style="width:150px; height:50px;  color:black; background: transparent; font-size: 14px;">

<input type="submit" name="submit1" Value="Add Both" style="border: none; height: 30px;width:150px; outline: none;background: #2f3640; color:white;  font-size: 20px;">

</form><br><br><br><br>
<ul class="courses">
  <li>
   <a href="planner2.php">
     <i class="fa fa-bars" aria-hidden="true"></i>
  <span> -Check Planner </span>
   </a>
 </li>
 <li>
  <a href="selection.php">
    <i class="fa fa-bars" aria-hidden="true"></i>
 <span> -Check Course </span>
  </a>
</li>
<li>
 <a href="selection2.php">
   <i class="fa fa-bars" aria-hidden="true"></i>
<span> -Check Availability </span>
 </a>
</li>



</ul>

  </div>

  </body>
  </html>
  <?php
  if(isset($_POST['submit'])){
    //we need to store this data into database
    include('../dbcon.php');

    //now we need to add query
    //but first store all the data into variables
    $enroll = $_POST['rollno'];
    $semester=$_POST['semester'];
    $year=$_POST['year'];
    $category=$_POST['category'];
    $course_code=$_POST['course_code'];
    $courseName = $_POST['courseName'];



    $qry=mysqli_query($con,"INSERT INTO `student`(`rollno`,`semester`,`year`,`category`,`course_abre`,`course_name`) VALUES('$enroll','$semester','$year','$category','$course_code','$courseName')");

   //now execute this query

   if($qry){
  ?>

     <script>
       alert('Course is added in your planner!!');
     </script>


  <?php
}else{
     ?>

        <script>
          alert('Please Enter Your Correct 700#');
        </script>


     <?php

   }
 }else if(isset($_POST['submit1'])){
   //we need to store this data into database
   include('../dbcon.php');

   //now we need to add query
   //but first store all the data into variables
   $enroll = $_POST['rollno'];
   $semester=$_POST['semester'];
   $year=$_POST['year'];
   $category=$_POST['category'];
   $course_code=$_POST['course_code'];
   $courseName = $_POST['courseName'];
   $course_code2=$_POST['course_code2'];
   $courseName2 = $_POST['courseName2'];


   $qry=mysqli_query($con,"INSERT INTO `student`(`rollno`,`semester`,`year`,`category`,`course_abre`,`course_name`) VALUES('$enroll','$semester','$year','$category','$course_code','$courseName')");
   $qry2=mysqli_query($con,"INSERT INTO `student`(`rollno`,`semester`,`year`,`category`,`course_abre`,`course_name`) VALUES('$enroll','$semester','$year','$category','$course_code2','$courseName2')");

  //now execute this query

  if($qry && $qry2){
 ?>

    <script>
      alert('Both Courses are added in your planner!!');
    </script>


 <?php
}else{
    ?>

       <script>
         alert('Please Enter Your Correct 700#');
       </script>


    <?php

  }
}


   ?>
