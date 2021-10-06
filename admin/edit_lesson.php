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
// print_r($_POST);
if (isset($_POST['lesson_update'])) {
    if(($_REQUEST['lesson_name']=="") || ($_REQUEST['lesson_desc']=="") ||($_REQUEST['course_id']=="")||($_REQUEST['cousre_name']==""))
    {
        $msg = true;
    
    }
    else
    {
   
    $lid=$_POST['lesson_id'];
    $lname = $_POST['lesson_name'];
    $ldescription = $_POST['lesson_desc'];
    $course_id = $_POST['course_id'];
    $cname = $_POST['cousre_name'];
    $llink= '../link/'. $_FILES['lesson_link']['name'];

        $sql=" UPDATE lesson SET lesson_id='$lid' , lesson_name='$lname' , lesson_desc= '$ldescription' , course_id='$course_id',
             course_name ='$cname', lesson_link='$llink'
              WHERE lesson_id= '$lid' ";
             
            $res= mysqli_query($conn,$sql);
        
          if(mysqli_query($conn,$sql)){
              $img=true;
          }
          else
          {
              $error=true;
          }
        }
      
    }
// edit code///
print_r($_REQUEST);
if(isset($_REQUEST['edit'])){

$sql="SELECT * FROM lesson WHERE course_id = '{$_REQUEST['id']}'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
}
?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">
        Update lesson details
    </h3>
    <form action="#" method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label for="course ">lesson ID</label>
            <input type="text" class="form-control" id="lesson_id" name="lesson_id" value="
            <?php if(isset($row['lesson_id'])){
                echo $row['lesson_id'];}
            ?>" readonly>
        </div>

        <div class="form-group">
            <label for="course ">lesson name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name" value="
            <?php if(isset($row['lesson_name'])){
                echo $row['lesson_name'];}
            ?>">
        </div>
       
            <label for="course name">lesson description</label>
            <input type="text" class="form-control" id="lesson_desc" name="lesson_desc" value="
            <?php if(isset($row['lesson_desc'])){
                echo $row['lesson_desc'];}
            ?>">

        
        <div class="form-group">
        <label for="course">course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="
            <?php if(isset($row['course_id'])){
                echo $row['course_id'];}
            ?>" readonly>
        </div>
        <div class="form-group">
        <label for="">course name</label>
        <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($_SESSION['name'])){
            echo $_SESSION['name'];
        }?>" readonly>
    </div>

        <div class="form-group">
            <label for="lesson_link">lesson link</label>
            <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php if(isset($row['lesson_link'])){
                echo $row['lesson_link'];}?>" frameborder="0" allowfullscreen></iframe>
                </div>
                <input type="file" name="lesson_link" id="lesson_link" class="form-control">
            
        </div>
        <div class="form-group">
            <button class="btn btn-outline-dark" name="lesson_update">Update</button>
            <a href="lesson.php">CLOSE</a>
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
</div>
<!-- row -->
</div>
<!-- container -->
</div>
