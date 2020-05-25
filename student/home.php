<?php
include('header.php');
include('../dbcon.php');
session_start();
include('../assets/function1.php');


if(logged_in()){
  header('location:../studentLogin.php');
}
else if(isset($_COOKIE['name'])){
  ?>

  <script> alert("You are logged in through Cookies!!") </script>
<?php
$username = $_COOKIE['name'];
 ?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=divice-width, initial-scal=1.0">
  <title>UCM Schedule Planner</title>
  <style>
   body{
     font-family: sans-serif;
     margin:0;
     padding: 0;
   }

   img{
     width: 14%;
     margin-left: 1.7rem;
     margin-top: -1%;
   }
   .section{
     width: 80%;
     margin: auto;
     overflow: hidden;
     margin-top: 4%;
   }
   .section h1{
     color: black;
     line-height: 50px;
   }
   .section p{
     color: white;
     background-color: gray;
     padding: 0.7rem 2rem;
     border: none;
     border-radius: 20px;
   }
   .features{
     margin-top:4%;
     margin-bottom: 2%;
   }
   showcase h1{
     margin-top: 5%;
     margin-bottom: 5%;
     text-align: center;
   }
   #courses{
    display: flex;
    text-align: center;
   }
   #courses img{
     width: 300px;
     height:200px;
     border-radius: 10px;
     border: 2px solid #000;
   }
   footer{
     background-color: #333;
     color:#fff;
     text-align: center;
     padding: 1.2rem;
     margin-top: 4%;
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
<div class="admintitle">

   <div class="section">
     <img src="../images/ucm3.png" class="avatar">

     <h1>WE ENSURE A BETTER EDUCATION <br> FOR A BETTER WORLD   </h1>
     <div class="features">
       <p>Take Online Classes</p>
       <p>Take On-Campus Classes</p>
       <p>Huge Library</p>
        <p>Practical Exposure</p>
     </div>

   </div>



</div>
     <showcase>
          <h1> POPULAR COURSES WE OFFER</h1>
          <div id="courses">
               <div class="cs">
                <h3>Computer Science</h3><br>
                <img src="../images/ucm4.jpg" width="50%" alt="cs">
               </div>
               <div class="business">
                <h3>Business Studies</h3><br>
                <img src="../images/ucm5.jpg" width="50%" alt="business">
               </div>
               <div class="accounting">
                <h3>Accounting</h3><br>
                <img src="../images/ucm6.jpg" width="50%" alt="accounting">
               </div>
               <div class="cyber">
                <h3>Cybersecurity</h3><br>
                <img src="../images/ucm7.jpg" width="50%" alt="cyber">
               </div>
          </div>
      </showcase>

      <footer>
        <p>Copyright &copy; 2020, Ahmed Ali Qureshi</p>
      </footer>
</body>
</html>
<?php
}else{
  ?>

  <script> alert("You are logged in through Sessions!!") </script>
<?php
  $username=$_SESSION['user'];
  ?>
  <!DOCTYPE HTML>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=divice-width, initial-scal=1.0">
    <title>UCM Schedule Planner</title>
    <style>
     body{
       font-family: sans-serif;
       margin:0;
       padding: 0;
     }

     img{
       width: 14%;
       margin-left: 1.7rem;
       margin-top: -1%;
     }
     .section{
       width: 80%;
       margin: auto;
       overflow: hidden;
       margin-top: 4%;
     }
     .section h1{
       color: black;
       line-height: 50px;
     }
     .section p{
       color: white;
       background-color: gray;
       padding: 0.7rem 2rem;
       border: none;
       border-radius: 20px;
     }
     .features{
       margin-top:4%;
       margin-bottom: 2%;
     }
     showcase h1{
       margin-top: 5%;
       margin-bottom: 5%;
       text-align: center;
     }
     #courses{
      display: flex;
      text-align: center;
     }
     #courses img{
       width: 300px;
       height:200px;
       border-radius: 10px;
       border: 2px solid #000;
     }
     footer{
       background-color: #333;
       color:#fff;
       text-align: center;
       padding: 1.2rem;
       margin-top: 4%;
     }

    </style>

  </head>
  <body>
  <div class="admintitle">

     <div class="section">
       <img src="../images/ucm3.png" class="avatar">

       <h1>WE ENSURE A BETTER EDUCATION <br> FOR A BETTER WORLD   </h1>
       <div class="features">
         <p>Take Online Classes</p>
         <p>Take On-Campus Classes</p>
         <p>Huge Library</p>
          <p>Practical Exposure</p>
       </div>

     </div>



  </div>
       <showcase>
            <h1> POPULAR COURSES WE OFFER</h1>
            <div id="courses">
                 <div class="cs">
                  <h3>Computer Science</h3><br>
                  <img src="../images/ucm4.jpg" width="50%" alt="cs">
                 </div>
                 <div class="business">
                  <h3>Business Studies</h3><br>
                  <img src="../images/ucm5.jpg" width="50%" alt="business">
                 </div>
                 <div class="accounting">
                  <h3>Accounting</h3><br>
                  <img src="../images/ucm6.jpg" width="50%" alt="accounting">
                 </div>
                 <div class="cyber">
                  <h3>Cybersecurity</h3><br>
                  <img src="../images/ucm7.jpg" width="50%" alt="cyber">
                 </div>
            </div>
        </showcase>

        <footer>
          <p>Copyright &copy; 2020, Ahmed Ali Qureshi</p>
        </footer>
  </body>
  </html>
 <?php
}


 ?>
