<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location: login.php");
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
               <h3>Hello, <?php echo $_SESSION['userid']?>!</h3>
               <p>Please select an option below.</p>
               <br>
            </div>
              <div class="row justify-content-between p-2 m-2">
                <div class="col-sm-6 p-1">
                    <a href="addPost.php" class="btn btn-primary btn-md btn-block">Add Post</a>
                </div>
                <div class="col-sm-6 p-1">
                    <a href="viewblog.php" class="btn btn-primary btn-md btn-block">View Blog</a>
                </div>
              </div>
              <div class="row justify-content-center p-1 m-1" style="text-align: center; color: white;"> 
                  <div class="col-sm">
                    <a class="btn btn-secondary btn-sm btn-block" href="logout.php">Logout</a>
                  </div>
               </div>
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

 <!-- Bootstrap core JavaScript
 ================================================== -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
