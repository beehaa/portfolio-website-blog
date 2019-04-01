<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location: login.php");
}

?>

    
<?php

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
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  // $conn = mysqli_connect($host, $user, $pass, $db);
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // if(isset($_POST['submit'])){
      $author = $_SESSION['userid'];
      $title = $_POST['title'];
      $text = $_POST['text'];

      // if($pass == $pass2){
        $sql = "INSERT INTO BLOG (author, date, title, message) VALUES ('$author', NOW(), '$title', '$text')";
        if(mysqli_query($conn, $sql)){
          // echo "Insert successful";
          // $_SESSION['message'] = "You are now logged in.";
          // $_SESSION['fname'] = $fname;
          echo "yes";
          header("location: viewblog.php");
        } else {
          echo "ERROR: could not execute";
        }
      // } 
      // else {
      //   $_SESSION['message'] = "The two passwords do not match";
      // }
      
        $conn->close();
     }

  ?>


</body>
</html>





<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Post</title>
    
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
         <div id="login" class="animated BounceInLeft">
            <div class="page-header" style="text-align:center;">
               <h3>Welcome,  <?php echo $_SESSION['userid']?>!</h3>
               <p>Add a Blog Post</p>
               <br>
            </div>
            <form role="form" method="POST" action="addPost.php">
              <div class="form-group row">
        
                <div class="col-sm">
                  <input type="text" name="title" class="form-control" placeholder="Title" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm">
                    <textarea name="text" class="form-control" rows="5" placeholder="Enter your text here" required></textarea>
                </div>
              </div>
              <br>
              <div class="container">
                    <div class="row justify-content-center" style="text-align: center; color: white;">
                            <div class="col-sm-6 p-2">
                                <!-- <button type="submit" onclick="doclear()" name="clear" class="btn btn-secondary">Clear</button> -->
                                <a class="btn btn-secondary btn-md btn-block" onclick="doclear()">Clear</a>
                            </div>
                            <div class="col-sm-6 p-2">
                            <a class="btn btn-secondary btn-md btn-block btn-light" href="logout.php">Logout</a>

                            </div>
                          </div>
                          <div class="row justify-content-center" style="text-align: center; color: white;"> 
                          <div class="col-sm p-2">
                          <button type="submit" name="submit" class="btn btn-primary btn-md btn-block">Post</button>
                            </div>
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

function doclear() {

    if (confirm("Are you sure you want to clear the form?")){
        document.forms[0].reset();
    } else {
        alert('You cancelled your request to clear the form.');
    }

}

</script>

 <!-- Bootstrap core JavaScript
 ================================================== -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
