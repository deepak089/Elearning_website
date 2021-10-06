<?php

include '../config.php';
include "side_bar.php";

if(isset($_SESSION['is_admin_login'])){

    $admin_email=$_SESSION['admin_email'];
}
else
{
    echo "<script> location.href='../admin_login.php';</script>";
}
// code for deleting button 
if (isset($_REQUEST['delete'])) {
    $sql = "DELETE  FROM course WHERE course_id = {$_REQUEST['id']}";
    if (mysqli_query($conn, $sql)) {
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
    } else {
        echo "unable to delete data";
    }
}

?>

<div class="col-sm-9 mt-5">
    <!-- tbale -->
    <p class="bg-dark text-white p-2">list of courses
    </p>
    <?php
    $sql = "SELECT * FROM course";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    ?> <table class="table">
            <thead>
                <tr>

                    <th scope="col">course id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {

                ?>
                    <tr>
                        <th scope="row"><?php echo $row['course_id']; ?></th>
                        <td><?php echo $row['course_name']; ?></td>
                        <td><?php echo $row['course_author']; ?></td>

                        <td>
                        <form method="post" action="edit_course.php" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo  $row['course_id']; ?>">
                        <button type="submit" class="btn btn-secondry" name="edit" value="edit"><i class="fas fa-pencil-alt"></i></button></form>
                            <form method="post" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo  $row['course_id']; ?>">
                                <button type="submit" class="btn btn-secondry" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>
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
    } else {
        echo "no result";
    }
    ?>

</div>
</div>
<!-- row closed -->
</div>

<div>
    <a class="btn btn-danger box" href="add_course.php">
    <i class="fa fa-plus" aria-hidden="true"></i>
</a>
</div>
</div>
<!-- container div closed -->
</div>