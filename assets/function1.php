<?php

function email_exits($email,$con){
$row = mysqli_query($con,"SELECT `id` FROM `login` WHERE `email` ='$email'");

{
  if(mysqli_num_rows($row)==1){
    return true;
  }else{
    return false;
  }
}
}
function logged_in(){
  //if username has no value
  if(isset($_SESSION['user']) || isset($_COOKIE['name'])){
    return false;
  }else{
    return true;
  }
}



 ?>
