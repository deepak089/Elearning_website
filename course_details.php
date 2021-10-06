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
  <h1 class="text-white">Course Details</h1>
</div>
<!-- Background image -->
 

  <!--  course   banner -->
  <div class="container mt-5 mb-5">
    <?php if (isset($_GET['course_id'])) {
      $course_id = $_GET['course_id'];
      $_SESSION['course_id']= $course_id;
      $sql = " SELECT * FROM course WHERE course_id ='$course_id' ";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
    }
    ?>
    <div class="row">
      <div class="col-md-4">
        <img src="<?php echo  str_replace('..', '.', $row['course_img']); ?>" alt="" style="height:300px;width:100%;object-fit:cover;box-shadow:10px">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Course Name: <?php echo $row['course_name']; ?></h5>
          <p class="card-text">Description:<?php echo $row['course_desc']; ?></p>
          <p class="card-text">Duration:<?php echo $row['course_duration']; ?> </p>
          <form action="checkout.php" method="post">

            <p class="card-text d-inline">Price:<small><del>&#8377 <? echo $row['course_price']; ?></del></small><span class="font-weight-bolder">&#8377 <?php echo $row['original_price']; ?> </span></p>
            <input type="hidden" name="id" vlaue="<?php echo $row['course_original_price'];?>">
            <button type="submit" class="btn btn-primary" name="buy">Buy Now</button>
          </form>
        </div>

      </div>
    </div>
    <!-- </div> -->
  </div>

  <!-- lesson ka table -->
  <div class="container">
    <div class="row">
    <table class="table table-striped" >
                 <thead  align="center">
                     <tr>
                         <th style="font-weight: bold"  scope="col">lesson No</th>
                         <th style="font-weight: bold" scope="col">lesson Name</th>
                     </tr>
                 </thead>
                 <tbody> 
                 <?php 
                      $sql="SELECT * FROM lesson";
                      $result=mysqli_query($conn,$sql);
                      if(mysqli_num_rows($result)>0){
                        $num=0;
                      while ($row = mysqli_fetch_assoc($result)){ 
                        if($course_id == $row['course_id']){
                          $num++;    
                      
                  ?> 
                         <tr align="center">
                             <th scope="row"><?php echo $num;?></th>
                             <td><?php echo $row['lesson_name'];?></td>
                         </tr>
                         <?php
                      }
                    }
                  }
                    ?>
                 </tbody>
             </table>
  </div>
  </div>
 
<?php
include 'footer.php';
?>

                     