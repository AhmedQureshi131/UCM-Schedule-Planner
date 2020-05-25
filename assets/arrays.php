<?php
//Open file
$myfile = fopen("name.txt","r") or die("Unable to open");

//check end of file
while(!feof($myfile)){
  echo fgets($myfile);
}
fclose($myfile);




 ?>
