
<?php
if (!isset($_SESSION)) {
  session_start();
}
include './config.php';

include 'header.php'; ?>
<!-- Background image -->
<div class="bg-image d-flex justify-content-center align-items-center" style="
      background-image: url('https://mdbootstrap.com/img/new/fluid/nature/015.jpg');
      height: 100vh;
    ">
  <h1 class="text-white">All Courses</h1>
</div>
<!-- Background image -->
 
  <!-- popular course -->
  <div class="note note-primary my-3">
  <h1 class="text-center ">All Courses</h1>
  </div>
      <div class="container shadow my-5 mb-5">
        <div class="row">
          <?php $sql = " SELECT * FROM course  LIMIT 6";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
              $course_id = $row['course_id'];

              echo '
                <div class="col-md-4 py-5">
                 <div class="card mb-4 box-shadow">
                 <img class="card-img-top" alt=' . $row['course_name'] . ' "
                 style="height: 225px; width: 100%; display: block;" src=" ' . str_replace('..', '.', $row['course_img']) . ' ">
                 <div class="card-body">
                 <h5 class="card-title">' . $row['course_name'] . '</h5>
                 <p class="card-text">' . $row['course_desc'] . ' </p>
                 </div>
                  <div class="card-footer">
                  <p class="card-text d-inline">Price:  <small><del>&#8377 ' . $row['course_price'] . ' </del> </small>
                  <span class="font-weight-bolder">&#8377 ' . $row['course_original_price'] . ' </span></p>
                
                  <a href="course_details.php?course_id=' . $row['course_id'] . '" class="btn btn-primary text-white font-weight-bolder float-right">Enroll</a>
                </div>
              </div>
              </div>
          
            ';
            }
          }
          ?>

        </div>
      </div>
    
 
 
 <?php include 'footer.php';
 ?>