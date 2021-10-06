<?php
if (!isset($_SESSION)) {
    session_start();
}
include '../config.php';
include "side_bar.php";

if (isset($_SESSION['is_admin_login'])) {

    $admin_email = $_SESSION['admin_email'];
} else {
    echo "<script> location.href='../index.php';</script>";
}



?>
<div class="col-sm-9 mt-5 mx-5">
    <form action="#" class="form-inline mt-3 d-print-none">
        <div class="form-group mr-3">
            <label for="">Enter Course ID:</label>
            <input type="text" class="form-control" id="checkid" name="checkid">
        </div>
        <button type="submit " class="btn btn-primary">Search</button>
    </form>

   <?php
 // searching the course
$sql="SELECT course_id FROM course";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    if(isset($_REQUEST['checkid']) && $_REQUEST['checkid']== $row['course_id']){ 
        $sql="SELECT * FROM course WHERE course_id ={$_REQUEST['checkid']}";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
      if(($row['course_id'])== $_REQUEST['checkid']){
          $_SESSION['course_id'] = $row['course_id'];
          $_SESSION['name']=$row['course_name'];


?>
<h3 class="mt-5 bg-dark text-white p-2">Course Id:<?php if(isset($row['course_id'])){
    echo $row['course_id'];}?>   course Name:<?php if(isset($row['course_name'])){
        echo $row['course_name'];}?>
        </h3>
        <!-- table data -->
        <?php
         $sql = "SELECT * FROM lesson WHERE course_id ={$_REQUEST['checkid']}";
         $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0) {
         ?> <table class="table">
                 <thead>
                     <tr>
     
                         <th scope="col">lesson ID</th>
                         <th scope="col">lesson Name</th>
                         <th scope="col">lesson Link</th>
                         <th scope="col">Action</th>
                     </tr>
                 </thead>
                 <tbody>
     
                     <?php
                     while ($row = mysqli_fetch_assoc($result)) {
     
                     ?>
                         <tr>
                             <th scope="row"><?php echo $row['course_id']; ?></th>
                             <td><?php echo $row['lesson_name']; ?></td>
                             <td><?php echo $row['lesson_link']; ?></td>
                             <td>
                             <form method="post" action="edit_lesson.php" class="d-inline">
                             <input type="hidden" name="id" value="<?php echo  $row['lesson_id']; ?>">
                             <button type="submit" class="btn btn-secondry" name="edit" value="edit"><i class="fas fa-pencil-alt"></i></button>
                             </form>
                                 <form method="post" class="d-inline">
                                     <input type="hidden" name="id" value="<?php echo  $row['lesson_id']; ?>">
                                     <button type="submit" class="btn btn-secondry" name="delete" value="Delete"><i class="far fa-trash-alt"></i>
                                     </button>
                                 </form>
                             </td>
                         </tr>
                     <?php
                     }
                     ?>
     
                 </tbody>
             </table>
         <?php
         } else {
             echo "no result";
         }
      }
    }
}
// code for deleting button 
if (isset($_REQUEST['delete'])) {
    $sql = "DELETE  FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
    if (mysqli_query($conn, $sql)) {
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
    } else {
        echo "unable to delete data";
    }
}
?>
</div>
<!-- add button -->
<div>
    <a class="btn btn-danger box" href="add_lesson.php">
    <i class="fa fa-plus" aria-hidden="true"></i>
</a>
</div> 

