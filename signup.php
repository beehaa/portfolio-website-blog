<?php
if (isset($_POST['submit'])){

    // success page
// used to store data into database
//redirects to login.html to login against database info

  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'testdb';

  // $host   =   "dbprojects.eecs.qmul.ac.uk"  ;
  // $user   =   "bvh30"  ;
  // $pass   =   "Rwx5vAXAnV2VB"  ;
  // $db   =   "bvh30"  ;

  // https://webprojects.eecs.qmul.ac.uk/info/details.php
  // username :bvh30
  // password :Rwx5vAXAnV2VB
  // database :bvh30
  // server   :dbprojects.eecs.qmul.ac.uk
  // port:    :3306

  $conn = new mysqli($host,$user, $pass, $db);
  
  $message = "";

  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $fname = $_POST['first'];
      $sname = $_POST['last'];
      $email = $_POST['email'];
      $pass = $_POST['pass'];
      // $pass2 = $_POST['pass2'];
  
      $sql = "INSERT INTO USERS (firstName, lastName, email, password) VALUES ('$fname', '$sname', '$email', '$pass')";
        if(mysqli_query($conn, $sql)){
          echo "<script>alert('Sign Up Successful. Please login.');</script>";
          echo "<script>window.location.href='login.php';</script>";
          // echo "Insert successful";
          
          // $message = "SUCCESS";
          //header("location: success.php");
        } else {
          $message = "Sign Up Unsuccessful. Please try again.";
          // echo "ERROR: could not execute";
          header('location: signup.php');
        }
      // } 
      // else {
      //   $_SESSION['message'] = "The two passwords do not match";
      // }
      
        $conn->close();
     }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blog Sign Up</title>

   <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="ex6.js" charset="utf-8"></script>

</head>

<body>

<div class="container rounded">
   <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
         <div id="login">
            <div class="page-header">
               <h3>User Registration Form</h3>
               <p><?php echo $message ?></p>
               <br>
            </div>
            <form role="form" action="signup.php" method="post" onsubmit="return validate();">
              <div class="form-group row">
                <div class="col-sm">
                  <input type="text" class="form-control" id="inputFirst" name="first" placeholder="First Name" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm">
                  <input type="text" class="form-control" id="inputLast" name="last" placeholder="Last Name" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm">
                  <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm">
                  <!-- <input type="password" class="form-control" id="pw" name="pw" placeholder="Password"> -->
                  <label class="form-group d-block mb-0">
                    <span class="text-secondary d-block font-weight-semibold mb-1"></span>
                    <input type="password" id="txtNewPassword" name="pass" class="form-control" placeholder="Password" required>     
                  </label>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm">
                  <!-- <input type="password" class="form-control" id="cpw" name="cpw" placeholder="Confirm Password"> -->
                  <label class="form-group d-block mb-0">
                    <span class="text-secondary d-block font-weight-semibold mb-1"></span>
                    <input class="form-control" name="pass2" type="password" id="txtConfirmPassword" placeholder="Confirm Password" onkeyup="checkPasswordMatch();" required>   
                  </label>
                </div>
              </div>
              <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
              <button type="submit" name="submit" class="btn btn-primary btn-block">Complete Registration</button>
              <br>
            </form>
         </div>
      </div>
      <div class="col-md-2">
      </div>
   </div>
</div>


<style>
html, body {
  background-color: #08a8bd;
}

.container{
  background-color: white;
  border: black solid 1pt;
  text-align: center;
  margin-top: 10%;
  padding: 15px;
}

.form-group{
  text-align: center;
}

form {
  text-align: center;
}

.text-success {
    color: #28a745;
}
.text-danger {
    color: #dc3545;
}
</style>

<script>

function checkPasswordMatch() {
  var password = $("#txtNewPassword").val();
  var confirmPassword = $("#txtConfirmPassword").val();
  if (password != confirmPassword){
    $("#divCheckPasswordMatch").html("Passwords do not match!").addClass('text-danger').removeClass('text-success');
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