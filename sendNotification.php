<?php
//first we need to check the session otherwise we don't
//allow user to open this page
session_start();
 //now here we need to check whether it is accessing or not
if(isset($_SESSION['uid'])){
  header('location:admin/sendNotification.php');

}//if not then we will redirect it to login page.
else{
  //../ means if the session destroy and you are again accessing the
//admindash then it will redirect you to the login page to login first
  header('location:login.php');
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../dbcon.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
if(isset($_POST["emailto"])&&isset($_POST['emailfrom'])){
  // Instantiation and passing `true` enables exceptions
  $emailTo = $_POST["emailto"];
  $emailFrom = $_POST['emailfrom'];
  $mail = new PHPMailer(true);

  try {
      //Server settings
                           // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = "$emailFrom";                     // SMTP username
      $mail->Password   = 'ahmed131';                               // SMTP password
      $mail->SMTPSecure = "ssl";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      //Recipients
      $mail->setFrom("$emailFrom", 'UCM Schedule Planner');
      $mail->addAddress("$emailTo");     // Add a recipient
      $mail->addReplyTo('n-reply@ucmo.edu', 'University of Central Missouri');


      // Content
      $url = "http://" . $_SERVER["HTTP_HOST"]. "SMS/student_Login.php";
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'UCM Schedule Planner';
      $mail->Body    = "<center><h2>University of Central Missouri <br>Go Mules and Jennes!!<br>You Are Invited To Join<br>UCM Schedule Planner </h2></center>
                        Click <a href='$url'>this link</a> to go to UCM Schedule Planner";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      ?>

      <script> alert("Invitation Link Sent!!") </script>
<?php
  } catch (Exception $e) {
      ?>
      <script> alert("Error!! Please make sure that your security access is on") </script>
      <?php
  }


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
  .container a{
    text-decoration: none;


  }
  .container a:hover{
    background: black;
  }




  </style>
  </head>
  <body>


  <div class='container' style="padding-top: 20px;background-color: white;margin-top: 65px;margin-bottom:20px;width:720px;height:650px;left:25%; border-radius: 10%; position: absolute;">
  <img src="/images/ucm3.png" class="avatar">
  <br><br><center><h1> Send Email Notification </h1></center>
  <form method="POST" action="sendNotification.php">

<!-- if you want to store the image remember type enctype -->

  <table width="100%" border="6" style="margin-top:100px; left:80%;">
     <tr >
       <th>To:</th>
       <td><input type="text" name="emailto" placeholder="Student Email address" required style="width:100%;"></td>
     </tr>
     <tr >
       <th>From</th>
       <td><input type="text" name="emailfrom" placeholder="Your Email Address" required style="width:100%;"></td>
     </tr>





     <tr>
      <td colspan="4" height="30px;" align="center"><input type="submit" name="submit" value="Send Invitation" style="width:30%; height:30px; background-color:red;"></td>
     </tr>
  </table>

</form>
</body>
</html>
