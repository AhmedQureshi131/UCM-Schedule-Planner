<?php
function user_exits($username,$con){
$row = mysqli_query($con,"SELECT `id` FROM `login` WHERE `student_id` ='$username'");

{
  if(mysqli_num_rows($row)==1){
    return true;
  }else{
    return false;
  }
}
}



 ?>
