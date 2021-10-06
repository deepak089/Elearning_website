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
// code for deleting button 
if (isset($_REQUEST['feedback_delete'])) {
    $sql = "DELETE  FROM feedback WHERE f_id = {$_REQUEST['id']}";
    if (mysqli_query($conn, $sql)) {
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
    } else {
        echo "unable to delete data";
    }
}
?>
<div class="col-sm-6 mt-5">
<!-- table -->
<p class="bg-dark text-white p-2">List of feedback</p>
<?php 
$sql="SELECT * FROM feedback";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    ?>
    <table class="table">
    <thead>
        <tr>

            <th scope="col">feedback Id</th>
            <th scope="col">content</th>
         
        </tr>
    </thead>
    <tbody>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {

        ?>
            <tr>
                <th scope="row"><?php echo $row['f_id']; ?></th>
                <td><?php echo $row['f_content']; ?></td>
                <td>
                    <form method="post" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo  $row['f_id']; ?>">
                        <button type="submit" class="btn btn-secondry" name="feedback_delete" value="Delete"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            <!-- deleting code -->

        <?php
        }
        ?>

    </tbody>
</table>
<?php
}
?>
</div>