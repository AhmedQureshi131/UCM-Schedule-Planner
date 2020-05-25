<?php
//we need to destroy all the sessions
//and redirect to the login page
//two method first is using session_detroy and other one is unsset
//remeber whenever you are destroying the session first start the session
session_start();
session_destroy();
header('location:studentLogin.php');
setcookie('name','',time()-3000);
 ?>
