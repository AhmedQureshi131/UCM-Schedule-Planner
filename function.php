<?php

function showdetails($standerd, $rollno){
  include('dbcon.php');
  $sql = "SELECT * FROM `student` WHERE `rollno`='$rollno' AND `standerd` = '$standerd';";

  $run = mysqli_query($con,$sql);
  //it means if there is record available in the database then >0
  if(mysqli_num_rows($run)>0){

    $data = mysqli_fetch_assoc($run);
    ?>
     <table border="1" style="width:60%; margin-top:10%;" align="center">
     <tr>
        <th colspan="3">Student Details</th>

     </tr>
     <tr>
       <!-- Fetch the image  -->
          <td rowspan="5" align="center"> <img src="dataimg/<?php echo $data['image'];?>" style="max-height:140px; max-width:120px; padding: 4px;" ></td>
          <th>700#</th>
          <td><?php echo $data['rollno'];?></td>

     </tr>
     <tr>
          <th>Name</th>
          <td><?php echo $data['name'];?></td>

     </tr>
     <tr>
          <th>Year</th>
          <td><?php echo $data['standerd'];?></td>

     </tr>
     <tr>
          <th>Parents Contact Number</th>
          <td><?php echo $data['pcont'];?></td>

     </tr>
     <tr>
          <th>City</th>
          <td><?php echo $data['city'];?></td>

     </tr>


     </table>
    <?php

  }else{
    echo " No Student Found!!";
  }

}



 ?>
