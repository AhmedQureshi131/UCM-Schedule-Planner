<?php
include('header.php');
include('../dbcon.php');


 ?>
<!DOCTYPE html>
<html>
<head>
<title> UCM Schedule Planner</title>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
.avatar{
 width: 130px;
 height: 100px;

 position: absolute;
 top: -13%;
 left: calc(50% - 50px);
}


.courses{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: flex;
  margin: 0;
  padding: 0%;
}
.courses li{
  list-style: none;
  margin:0 9px;
}
.container h1{
  color: black;
  line-height: 50px;
  text-align: center;
}
.courses li a .fa{
  font-size: 40px;
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
  width:185px;
  height:60px;
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


<div class='container' style="padding-top: 20px;background-color: white;margin-top: 65px;margin-bottom:20px;width:820px;height:650px;left:22%; border-radius: 20%; position: absolute;">
<img src="../images/ucm3.png" class="avatar">
<br><br><h1> COLLEGE OF EDUCATION </h1>
<ul class="courses">
  <li>
   <a href="core.php">
     <i class="fa fa-bars" aria-hidden="true"></i>
  <span> -Undergrade </span>
   </a>
 </li>
 <li>
  <a href="core1.php">
    <i class="fa fa-bars" aria-hidden="true"></i>
 <span> -Master </span>
  </a>
</li>




</ul>

</div>
</body>
</html>
