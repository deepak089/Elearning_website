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
if (isset($_POST['course_submit'])) {
   
    $name = $_POST['course_name'];
    $description = $_POST['course_desc'];
    $author = $_POST['course_author'];
    $duration = $_POST['course_duration'];
    $price = $_POST['course_price'];
    $original_price = $_POST['course_original_price'];
    $image=$_FILES['course_img']['name'];
    $image_temp=$_FILES['course_img']['tmp_name'];
    $img_folder='../image/'.$image;
    move_uploaded_file($image_temp,$img_folder);

        $sql="INSERT INTO  course  ( course_name, course_desc, course_author, course_img, course_duration , course_price , course_original_price) 
               VALUES ('$name' , '$description','$author', '$img_folder','$duration',$price,$original_price)";
              
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
        add new course
    </h3>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course">course name</label>
            <input type="text" required class="form-control" id="name" name="course_name">
        </div>
        <div class="form-group">
            <label for="course name">course description</label>
            <input type="text" required class="form-control" id="description" name="course_desc">
        </div>
        <div class="form-group">
            <label for="course name">author</label>
            <input type="text" required class="form-control" id="author" name="course_author">
        </div>
        
        <div class="form-group">
            <label for="course name">duration</label>
            <input type="text" required class="form-control" id="duration" name="course_duration">
        </div>
        <div class="form-group">
            <label for="course name">price</label>
            <input type="text" required class="form-control" id="price" name="course_price">
        </div>
        <div class="form-group">
            <label for="course name">oirginal price</label>
            <input type="text" required class="form-control" id="original_price" name="course_original_price">
        </div>
        <div class="form-group">
            <label for="course name">image</label>
            <input type="file" required class="form-control" id="image" name="course_img">
        </div>
        <div class="form-group">
            <button class="btn btn-outline-dark" name="course_submit">submit</button>
            <a href="course.php">CLOSE</a>
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