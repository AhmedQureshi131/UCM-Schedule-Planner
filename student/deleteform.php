<?php
//data query
include('../dbcon.php');
//we are receiving the sid in delete student form
$id = $_REQUEST['sid'];
//here we need to make changes instead of insert we need to update the data
$qry="DELETE FROM `student` WHERE `id`= '$id';";

//now execute this query
$run = mysqli_query($con, $qry);
if($run){
?>

 <script>
   alert('Class Drop Successfully!!');
   window.open('planner3.php','_self');
 </script>


<?php
}


 ?>
