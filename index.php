<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Management System</title>
  <link href = "../css/style.css" rel="stylesheet" type="text/css">
  <style>
  body{
  	font-family: Arial, Geneva, sans-serif;
  	margin: 0;
  	padding: 0;
  	background: url("https://www.i-studentglobal.com/usa/mo/ucmo/mini-guide/chinese/html5/assets/images/mobile/ucmo-students-on-campus.jpg");
  	background-size: cover;
  	background-position: center;
    background-attachment: fixed;
  }
  </style>
</head>
<body>
<h3 align="right" style="margin-right:20px"><a href = "login.php">Admin Login</a></h3>
<h1 align = "center">Welcome to Student Management System </h1>

<!--In order to take an input we need to make a form -->
<form method="POST" action="index.php" >
<!-- table for alignment -->
<table style="width:30%;" align="center" border="1">
   <tr>
    <td colspan="2" align="center"> Student Information </td>
   </tr>
      <tr>
     <td align ="left">Choose Year In College</td>
     <td>
        <select name="std" required>
         <option value = "Freshman">Freshman</option>
         <option value = "Sophomore">Sophomore</option>
         <option value = "Junior">Junior</option>
         <option value = "Senior">Senior</option>


        </select>
     </td>

      </tr>
      <tr>
       <td align="left">Enter Your 700#</td>
         <td>
        <input type="text" name="rollno" required></td>
      </tr>
      <tr>
      <td colspan="2" align="center"> <input type="submit" name="submit" value="Show info"</td>
    </tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  $standerd = $_POST['std'];
  $rollno = $_POST['rollno'];
  include('dbcon.php');
  include('function.php');
  //create a function
  showdetails($standerd,$rollno);




}

 ?>
