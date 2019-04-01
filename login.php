<?php 

if (isset($_POST['submit'])){

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'testdb';

 // $host   =   "dbprojects.eecs.qmul.ac.uk"  ;
  // $user   =   "bvh30"  ;
  // $pass   =   "Rwx5vAXAnV2VB"  ;
  // $db   =   "bvh30"  ;

$conn = new mysqli($host,$user, $pass, $db) or die("Unable to connect");

if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}  
$sql = "SELECT email, password FROM USERS";
$result = $conn->query($sql);

  $email = $_POST['email'];
  $pass = $_POST['pass'];
  // $pass2 = $_POST['pass2'];
  
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          if(($email == $row['email']) and ($pass == $row['password'])){
            // echo "success. found a match";
            session_start();
            $_SESSION['userid'] = $email;
            if(isset($_SESSION['userid'])){
                header("location: welcome.php");
            } else {
              // VULNERABLE CODE
              // If client shuts off JS, then they can bypass this and go straight to welcome page
              echo "<script>alert('Login unsuccessful. Please try again.');</script>";
              echo "<script>window.location.href='login.php';</script>";
            }
            die();
          } else {
            echo "<script>alert('Login unsuccessful. Please try again.');</script>";
            echo "<script>window.location.href='login.php';</script>";
          } 
      }
     
  } else {
      echo "0 results";
  }
  $conn->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blog Login</title>

   <!-- animation -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" />
  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
    <link rel="manifest" href="/icons/site.webmanifest">
    <link rel="mask-icon" href="/icons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
   <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>

<div class="container">
   <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
         <div id="login" class="animated bounceInDown">
            <div class="page-header" style="text-align:center;">
               <h3>Welcome to Brian's Blog</h3>
               <p>Please login or sign up below</p>
               <br>
            </div>
            <form role="form" method="POST" action="login.php">
              <div class="form-group row justify-content-center">
                <!-- <label class="col-sm-3 col-form-label">Email</label> -->
                <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group row justify-content-center">
                <!-- <label class="col-sm-3 col-form-label">Password</label> -->
                <div class="col-sm-10">
                  <input type="password" name="pass" id="txtNewPassword" class="form-control" id="inputPassword3" placeholder="Password" required>
                </div>
              </div>
              <div class="form-group row justify-content-center">
                <!-- <label class="col-sm-3 col-form-label">Password</label> -->
                <div class="col-sm-10">
                  <input type="password" name="pass2" id="txtConfirmPassword" class="form-control" id="inputPassword3" placeholder="Confirm Password" onkeyup="checkPasswordMatch();" required>
                </div>
              </div>
              <div class="registrationFormAlert" style="text-align:center;" id="divCheckPasswordMatch"></div>
              <br>
              
              <div class="row justify-content-between">
              <div class="col-sm-5 p-1 m-2">
                    <a href="signup.php" class="btn btn-secondary btn-md btn-block">Sign Up</a>
                </div>
                <div class="col-sm-5 p-1 m-2">
                    <button type="submit" name="submit" class="btn btn-primary btn-md btn-block">Log In</button>
                </div>
                
              </div>
            </form>
         </div>
      </div>
      <div class="col-md-2">
      </div>
   </div>
</div>

<style>

body { background-color: #333333; }

div#login { background-color: white;
  padding: 2em;
  margin-top: 2em;
}

</style>

<script>
function checkPasswordMatch() {
  var password = $("#txtNewPassword").val();
  var confirmPassword = $("#txtConfirmPassword").val();
  if (password != confirmPassword){
    $("#divCheckPasswordMatch").html("Passwords do not match.").addClass('text-danger').removeClass('text-success');
  } 
  else {
    $("#divCheckPasswordMatch").html("Passwords match.").addClass('text-success').removeClass('text-danger');
  }
}
function validate(){
  return ($("#txtNewPassword").val() === $("#txtConfirmPassword").val());
}
</script>
 <!-- Bootstrap core JavaScript
 ================================================== -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
