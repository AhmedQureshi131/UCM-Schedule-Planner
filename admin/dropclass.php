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
   top: -8%;
   left: calc(50% - 50px);
  }
  .search-box{
    position: absolute;
    top:15%;
    left:50%;
    transform: translate(-50%, -50%);
    background: #2f3640;
    height: 70px;
    border-radius: 80px;
    padding: 10px;
    color: white;

  }
  .search-txt{



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

  <div class='container' style="padding-top: 20px;background-color: white;margin-top: 65px;margin-bottom:20px;width:820px;height:1100px;left:22%; border-radius: 0%; position: absolute;">
  <img src="../images/ucm3.png" class="avatar"><br>
  <center><a href = "studentplanner.php" style="color:red;">Go Back</a><center>
  <br><center><h1>  Drop The Course</h1></center>
  <form action="dropclass.php" method="POST">

    <div class="search-box" >
      Enter The Course Code
      <input type="text" name="course" placeholder="e.g: CS 1110">

   <select name="major" >
     <option>Select Your Major</option>
   <option>Computer Science</option>
   <option>Cyber Security</option>
   <option>Software Development</option>

   </select>
   <select name="option">
     <option>--Option</option>
   <option>Computer Science</option>
   <option>Networking</option>
   <option>Data Science</option>
   <option>Software Development</option>

 </select>

    <input type="submit" name="submit" value="Search" style="width:90px;" />
     </div>

</form>
<table  width="90%" border="1" style="margin-top:140px; left:20%;">
    <tr style="background-color:#000; color:#fff;left:20%;">
    <th>Course Code</th>
    <th>Course Name</th>
    <th>Credits</th>
    <th>Category</th>
    <th>Spring</th>
    <th>Fall</th>
    <th>Drop</th>






    </tr>
    <?php
    if(isset($_POST['submit'])){
      //now we need to fetch the student data.
      include('../dbcon.php');
      $code = $_POST['course'];
      $major = $_POST['major'];
      $option = $_POST['option'];

      //if someone search with same name it will get all the names that's why
      //we are using % % in name.
      $sql = "SELECT * FROM `course` WHERE `course_abrv` = '$code ' AND `major` ='$major' AND `minor` = '$option'";
       $run=mysqli_query($con,$sql);
       if(mysqli_num_rows($run) < 1){
         ?>
         <script> alert("Error!! Please Search Again")</script>
         <?php
       }else{
        $count = 0;
         while($data=mysqli_fetch_assoc($run)){
           $count++;
           ?>
           <tr align="center">

           <!-- in this way we can fetch and show the image -->

           <td><?php echo $data['course_abrv']; ?></td>
           <td><?php echo $data['course_name']; ?></td>
           <td><?php echo $data['credit_hours']; ?></td>
           <td><?php echo $data['category']; ?></td>
           <td><?php echo $data['spring']; ?></td>
           <td><?php echo $data['fall']; ?></td>
          <td><a href="deleteform1.php?sid=<?php echo $data['course_id']; ?>" style="color:red;">Drop</a></td>



           </tr>
           <?php
         }
       }


    }


     ?>
</table>

  </div>

  </body>
  </html>
