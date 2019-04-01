<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Brian's Blog</title>

   <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link href="blog.css" type="text/css" rel="stylesheet">

</head>

<body>
<?php
session_set_cookie_params(0);
session_start();

if(!isset($_SESSION['userid'])){
    header("location: login.php");
}

?>

 <!-- Bootstrap core JavaScript
 ================================================== -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Brian's Blog</title>
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

  <!-- Custom styles for this template -->
  <link href="css/blog-post.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="img/avatar.jpg" style="border: black solid 0.1pt; border-radius: 50%; height: 37px; width: 37px; padding: 0; margin: 0;" alt="Avatar"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive" style="text-align: center;">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link">Hi, <?php echo $_SESSION['userid'] ?>
              <!-- <span class="sr-only">(current)</span> -->
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addPost.php">Add Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Back to Homepage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-secondary" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- first blog post as a side bar, everything else after doesnt  -->
  <!-- Page Content -->
  <div class="container pt-5 animated ">
   
    <!-- /.row -->

    <?php
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
    $sql = "SELECT author, date, title, message FROM BLOG";
    $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              // echo "date: " . $row['date'] . "<br>";
              // echo "title: " . $row['title'] . "<br>";
              // echo "text: " . $row['text'] . "<br>";
              $mysqldate = $row['date'];
            $phpdate = strtotime( $mysqldate );
            // $mysqldate = date( 'Y-m-d H:i:s', $phpdate );
            $mysqldate = date( 'F j, Y, g:i a', $phpdate );
            echo "<div class='row animated bounceInDown'>";
            echo "<div class='col-lg-8'>";
            echo "<h2 class='mt-4'>" . $row['title'] ."</h2><hr>";
            echo "<p class='font-weight-light font-italic'> by " . $row['author'] . "</p><hr>";
            echo "<p>Posted on " . $mysqldate ."</p>";
            // echo "<p>Posted on " . $row['date'] ."</p>";
            echo "<p>" . $row['message'] . "</p><hr>";
            echo "</div> ";
            echo "<div class='col-md-4'></div>";
            echo "</div>";
          }
  
      } else {
        echo "No entries";
      }
    // }
    $conn->close();
    

    ?>

    <!-- <div class="row">
      <div class="col-lg-8">
        <h1 class="mt-4">Post Title</h1>

        <p class="lead">
          by
          <a href="#">Start Bootstrap</a>
        </p>
        <hr>

        <p>Posted on January 1, 2019 at 12:00 PM</p>
        <hr>

        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>
        <hr>
      </div>

      <div class="col-md-4">
      </div>
    </div> -->





  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="pb-5 bg-dark">
  <div class="icons">
                <a class="fb-ic" target="_blank" href="https://www.facebook.com/brianhha"><i
                        class="fab fa-facebook fa-2x" style="color: white;"> </i></a>
                <a class="gh-ic" target="_blank" href="https://github.com/brianvoha"><i
                        class="fab fa-github fa-lg fa-2x" style="color: white;"> </i></a>
                <a class="li-ic" target="_blank" href="https://www.linkedin.com/in/brian-ha/"><i
                        class="fab fa-linkedin fa-lg fa-2x" style="color: white;"> </i></a>
                <a class="ins-ic" target="_blank" href="https://www.instagram.com/brianhha/"><i
                        class="fab fa-instagram fa-lg fa-2x" style="color: white;"> </i></a>
            </div>
            <small>Copyright &copy; 2019 Brian Ha. All rights reserved.</small>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
