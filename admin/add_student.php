<?php
if(!isset($_SESSION)){
    session_start();
}
include '../config.php';
include "side_bar.php";

if(isset($_SESSION['is_admin_login'])){

    $admin_email=$_SESSION['admin_email'];
}
else
{
    echo "<script> location.href='../index.php';</script>";
}
$msg = false;
$img=false;
$error=false;
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
        $sql="INSERT INTO  signup ( name,  email , password ) 
               VALUES ('$name'  ,'$email' , $password)";
              
          if(mysqli_query($conn,$sql)){
              $img=true;
          }
          else
          {
              $error=true;
          }
        }
      
    
?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">

    <h3 class="text-center">
        Add new student
    </h3>
    
    <div class="wrapper">
  <section class="form signup">
  <form action="#" method="post">   
  <div class="name-details">
  <div class="field input"><label for="">first name</label>
<input type="text" placeholder="First name" name="name" id="name">
  </div>
  </div>
  <div class="field input">
  <label for="">Email address</label>
  <input type="email" placeholder="Enter your email" name="email" id="email">
  </div>
  <div class="field input">
  <label for="">password</label>
  <input type="password" placeholder="Enter your password" name="password" id="password">
  <i class="fas fa-eye"></i>
  
  </div>
  
  <div class="field input">
  <label for="">Occupation</label>
  <input type="password" placeholder="Enter your password" name="stu_occ" id="stu_occ">
  <i class="fas fa-eye"></i>
  
  </div>
  
  <div class="field button">
  <button name="submit" class="btn btn-outline-dark" id="submit">Submit</button>

  <a href="student.php" class="btn btn-secondry" >Close</a>
</div>
        <?php if($msg) {
            echo '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All fields required to fill</div>';
        }
         ?>
         <?php if($img)
         {
            echo '<div class="alert alert-success col-sm-6 ml-5 mt-2">successully submitted</div>';
         }
         ?>
         <?php if($error)
         {
            echo '<div class="alert alert-warning col-sm-6 ml-5 mt-2">some error occur</div>';
         }
         ?>
    </form>
</div>
<!-- row -->
</div>
<!-- container -->
</div>