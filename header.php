<?php 
session_regenerate_id(false);
// error_reporting(0);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<link rel="stylesheet" href="./css/style.css">
  
</head>
<body>
    
    <!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light ">

<!-- Navbar brand -->
<a class="navbar-brand" href="index.php">Elearning</a>

<!-- Collapse button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
  aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<!-- Collapsible content -->
<div class="collapse navbar-collapse" id="basicExampleNav">

  <!-- Links -->
  <ul class="navbar-nav mr-auto px-5">
    
    <!-- <li class="nav-item">
      <a class="nav-link" href="#">Home</a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" href="
      <?php 
      if(isset($_SESSION['login_email'])){ echo 'student/student_profile.php';}?>"> My Profile</a> 
    </li>
    <li class="nav-item">
      <a class="nav-link" href="courses.php">Courses</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="checkout.php">Payment Status</a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" href="#">Feedback</a>
      </li> -->

      <li class="nav-item">
      <a class="nav-link" href="contact.php">Contact</a>
    </li>      <?php 
    if($_SESSION['login_email'])
    { ?>
     <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
    <?php 

    }
    else
    { ?>
    <li class="nav-item">
      <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLoginForm">login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"  data-toggle="modal" data-target="#exampleModal">Signup</a>
    </li>
    <?php 
    }
    ?>
   
  </ul>
  <!-- Links -->

  <form class="form-inline">
    <div class="md-form my-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
    </div>
  </form>
</div>
<!-- Collapsible content -->

</nav>
<!--/.Navbar-->
