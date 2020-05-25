<?php
//first we need to check the session otherwise we don't
//allow user to open this page
session_start();
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
  .search-txt{



  }




  </style>
  </head>
  <body>


  <div class='container' style="padding-top: 20px;background-color: white;margin-top: 65px;margin-bottom:20px;width:820px;height:650px;left:22%; border-radius: 20%; position: absolute;">
  <img src="../images/ucm3.png" class="avatar">
  <br><br><center><h1> Student Information </h1></center>
  <form action="studentupdate.php" method="POST">

     <div class="search-box">
    <input class="search-txt" type="text" name="standerd" placeholder="Enter 700#" required>
    <input class="search-txt" type="text" name="stuname" placeholder="Enter Last Name" required>
    <input type="submit" name="submit" value="Search" />
     </div>

</form>
<table  width="100%" border="1" style="margin-top:100px; left:20%;">
    <tr style="background-color:#000; color:#fff;left:20%;">
    <th>No</th>
    <th>Image</th>
    <th>700#</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>



    </tr>
    <?php
    if(isset($_POST['submit'])){
      //now we need to fetch the student data.
      include('../dbcon.php');
      $standerd = $_POST['standerd'];
      $name = $_POST['stuname'];
      //if someone search with same name it will get all the names that's why
      //we are using % % in name.
      $sql = "SELECT * FROM `login` WHERE `student_id` = '$standerd ' AND `l_name` LIKE '%$name%'";
       $run=mysqli_query($con,$sql);
       if(mysqli_num_rows($run) < 1){
         ?>
         <script> alert("No Reports Found!!")</script>
         <?php
       }else{
        $count = 0;
         while($data=mysqli_fetch_assoc($run)){
           $count++;
           ?>
           <tr align="center">
           <td><?php echo $count;?></td>
           <!-- in this way we can fetch and show the image -->
           <td><img src="../profileImg/<?php echo $data['img'];  ?>" style="max-width:100px; border-radius: 50px;"></td>
           <td><?php echo $data['student_id']; ?></td>
           <td><?php echo $data['f_name']; ?></td>
           <td><?php echo $data['l_name']; ?></td>
           <td><?php echo $data['email']; ?></td>




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
