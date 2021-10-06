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
   
    $cid=$_POST['course_id'];
    $cname = $_POST['course_name'];
    $cdescription = $_POST['course_desc'];
    $cauthor = $_POST['course_author'];
    $cduration = $_POST['course_duration'];
    $cprice = $_POST['course_price'];
    $coriginal_price = $_POST['course_original_price'];
    $cimg= '../image/'. $_FILES['course_img']['name'];

        $sql=" UPDATE course SET course_id='$cid' , course_name='$cname' , course_desc= '$cdescription' , course_author='$cauthor',
             course_img ='$cimg', course_duration='$cduration', course_price='$cprice', course_original_price='$coriginal_price'
              WHERE course_id= '$cid' ";
             
            $res= mysqli_query($conn,$sql);
   
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

$sql="SELECT * FROM course WHERE course_id ={$_REQUEST['id']}";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
}
?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">
        Update course
    </h3>
    <form action="#" method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label for="course ">course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="
            <?php if(isset($row['course_id'])){
                echo $row['course_id'];}
            ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course ">course name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="
            <?php if(isset($row['course_name'])){
                echo $row['course_name'];}
            ?>">
        </div>
        <div class="form-group">
            <label for="course name">course description</label>
            <input type="text" class="form-control" id="description" name="course_desc" value="
            <?php if(isset($row['course_desc'])){
                echo $row['course_desc'];}
            ?>">
        </div>
        <div class="form-group">
            <label for="course name">author</label>
            <input type="text" class="form-control" id="author" name="course_author" value="
            <?php if(isset($row['course_author'])){
                echo $row['course_author'];}
            ?>">
        </div>
       
        <div class="form-group">
            <label for="course name">duration</label>
            <input type="text" class="form-control" id="duration" name="course_duration" value="
            <?php if(isset($row['course_duration'])){
                echo $row['course_duration'];}
            ?>">
        </div>
        <div class="form-group">
            <label for="course name">price</label>
            <input type="text" class="form-control" id="price" name="course_price" value="
            <?php if(isset($row['course_price'])){
                echo $row['course_price'];}
            ?>">
        </div>
        <div class="form-group">
            <label for="course name">oirginal price</label>
            <input type="text" class="form-control" id="original_price" name="course_original_price" value="
            <?php if(isset($row['course_original_price'])){
                echo $row['course_original_price'];}
            ?>">
        </div>
        <div class="form-group">
            <label for="course name">image</label>
            <img src="<?php if(isset($row['course_img'])){ echo $row['course_img'];}?>" class="img-thumbnail">
            <input type="file" class="form-control" id="course_img" name="course_img">
           
        </div>
        <div class="form-group">
            <button class="btn btn-outline-dark" name="update">Update</button>
            <a href="courses.php">CLOSE</a>
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
