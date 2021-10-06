<?php
// include 'config.php';
include 'header.php'; 
include 'config.php';?>
<!-- adding video to background -->
<?php 
if(isset($_POST['submit_contact']))
{ 
  $name=$_POST['name'];
  $email=$_POST['email'];
  $msg=$_POST['msg'];

  $res=mysqli_query($conn,"INSERT INTO contact ('name','email','msg') VALUES ('$name',$email','$msg')");
  if($res)
  {
    ?>
    <script>window.alert("Succesfully submitted");</script>
    <?php
  }
}

?>
<video autoplay muted loop id="myVideo">
  <source src="video.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>

<div class="content">
  <h1 class="text-center font-weight-bold">Welcome</h1>
  <p>Lorem ipsum dolor sit amet, an his etiam torquatos. Tollit soleat phaedrum te duo, eum cu recteque expetendis neglegentur. Cu mentitum maiestatis persequeris pro, pri ponderum tractatos ei. Id qui nemore latine molestiae, ad mutat oblique delicatissimi pro.</p>
  <div class="text-center">
  <?php
  if(isset($_SESSION['is_login'])){
    ?>
    <a href="./student/student_profile.php" class="btn btn-default btn-rounded mb-4">My Profile</a>
 <?php
  }else{
    ?>
     <a href="" class="btn btn-default btn-rounded mb-4"  data-toggle="modal" data-target="#exampleModal">Register</a>

    <?php
  }
   ?>  
   </div>
</div>
<br><br><br>
<!-- popular course -->
<div class="container shadow">
  <h1 class="text-center note note-primary">POPULAR COURSES</h1>
  <div class="album py-5 bg-white">
    <div class="container">
    <div class="row">
          <?php $sql = "SELECT * FROM course  LIMIT 6";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
              $course_id = $row['course_id'];

              echo '
                <div class="col-md-4">
                 <div class="card mb-4 box-shadow" style:="height:30%">
                 <img class="card-img-top" alt="' . $row['course_name'] . ' "
                 style="height: 225px; width: 100%; display: block;" src=" ' . str_replace('..', '.', $row['course_img']) . ' ">
                 <div class="card-body">
                 <h5 class="card-title">'. $row['course_name'].'</h5>
                 <p class="card-text">'. $row['course_desc'] .'</p>
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
    </div><div class="text-center">    <a class="btn btn-success btn-rounded " href="courses.php">View all</a></div>
  </div>
</div>

<!-- contact form  -->
<div class="container shadow my-5 px-5 py-5" >
<div class="header">
<p class="text-center font-weight-bold note note-primary" style="text-transform:uppercase">Contact us </p>
</div>
  <form acion=" " method="post">
    <div class="form-outline mb-4">
    <label class="form-label" for="form4Example1">Name</label>
   
      <input type="text" id="form4Example1" name="name" class="form-control" />
      </div>
    <div class="form-outline mb-4">
    <label class="form-label" for="form4Example2">Email address</label>
   
      <input type="email" id="form4Example2" name="email" class="form-control" />
      </div>
    <div class="form-outline mb-4">
    <label class="form-label" for="form4Example3">Message</label>
  
      <textarea class="form-control" id="form4Example3" name="msg" rows="4"></textarea>
       </div>
   
    <button type="submit"name="submit_contact" class="btn btn-primary btn-block mb-4">Send</button>

  </form>
</div>
<!-- slider feedback -->

<?php
include 'footer.php';
?>
