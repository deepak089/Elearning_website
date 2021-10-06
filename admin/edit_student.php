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
// update code
$msg = false;
$img=false;
$error=false;
if (isset($_POST['update'])) {
    
    $sid= $_POST['id'];
    $sname = $_POST['name'];
    $semail = $_POST['email'];
    $spassword = $_POST['password'];
  
        $sql=" UPDATE signup SET id = '$sid' , name='$sname' , email = '$semail' , password = '$spassword'  WHERE id = '$sid' ";
             
            $res= mysqli_query($conn,$sql);
        //     echo var_dump($res);
          if(mysqli_query($conn,$sql)){
              $img=true;
          }
          else
          {
              $error=true;
          }
        }
      
    

// edit code///
if(isset($_REQUEST['edit'])){

$sql="SELECT * FROM signup WHERE id ={$_REQUEST['id']}";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
}
?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">
        Update student
    </h3>
    <div class="wrapper">
  <section class="form signup">
  <form action="#" method="post">   
  <div class="name-details">
  <div class="field input">
  <label for="user_id">Student Id</label>
  <input type="text" name="id" readonly value="<?php   if(isset($row['id'])){
      echo $row['id'];}?>"><br>
  <label for="">first name</label>
<input type="text" placeholder="First name" name="name" id="name" value=" <?php 
  if(isset($row['name'])){
      echo $row['name'];}?>">
  </div>
  
  <div class="field input">
  <label for="">Email address</label>
  <input type="email" placeholder="Enter your email" name="email" id="email"  value="<?php   if(isset($row['email'])){
      echo $row['email'];}?>">
  </div>
  <div class="field input">
  <label for="">password</label>
  <input type="password" placeholder="Enter your password" name="password" id="password"  value="<?php   if(isset($row['password'])){
      echo $row['password'];}?>">
  <i class="fas fa-eye"></i>
  
  </div>
  <div class="field input">
  <label for="">Occupation</label>
  <input type="text" placeholder="Enter your occupation" name="stu_occ" id="stu_occ"  value="<?php   if(isset($row['stu_occ'])){
      echo $row['stu_occ'];}?>">
  <i class="fas fa-eye"></i>
  
  </div>

  <div class="field button">
  <button name="update" class="btn btn-outline-dark" id="update">Update</button>

  <a href="student.php" class="btn btn-secondry" >Close</a>
</div>
        <?php 
        if($msg) {
            echo '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All fields required to fill</div>';
        }
         ?>
         <?php
         if($img)
         {
            echo '<div class="alert alert-success col-sm-6 ml-5 mt-2">update successully </div>';
         }
         ?>
         <?php
         if($error)
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
