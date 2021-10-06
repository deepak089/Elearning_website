<?php 
include 'header.php';
session_start();

?>

<div class="container mt-5 ml-4">
<div class="row">
<div class="jumbotron">
    <div class="text-center">
    <h4 class="text-center">All courses</h4>
    <?php 
    include 'config.php';
    if(isset($_SESSION['login_email'])){
       $sql="SELECT co.order_id ,c.course_id,c.course_name,c.course_duration,c.course_desc,c.course_img,c.course_author,c.coursE_original_price,c.course_price FROM courseorder AS co JOIN course AS c ON c.course_id = co.course_id WHERE co.stu_email ='{$_SESSION['login_email']}'";
       $res=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_array($res))
       {
           ?>
           <div class="bg-light mb-3">
           <h5 class="card-header"><?php echo $row['course_name'];?></h5>
           <div class="row">
           <img src="<?php $row['course_img'];?>" alt="">
           
           </div>
           <div class="col-sm-6 mb-3">
           <div class="card-body">
               <p class="card-title">
               <?php echo $row['course_desc'];?></p>
               <small class="card-text">Duration<?php echo $row['course_duration'];?></small>
               
               <small class="card-text">Teacher:<?php echo $row['course_author'];?></small>
               
               <small class="card-text">Price:&#8377<?php echo $row['course_price'];?></small>
               <a href="watch_course.php?course_id<?php echo $row['course_id'];?>">Watch course</a>

           </div>
           </div>
           </div>
           <?php
       }
    }
?>
</div>
</div>
</div>
</div>

<?php
include 'footer.php';

?>