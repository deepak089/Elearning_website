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
$msg = false;
$img = false;
$error = false;
if (isset($_POST['lesson_submit'])) {
    if (($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "")) {
        $msg = true;
    } else {

        $lesson_name = $_POST['lesson_name'];
        $lesson_desc = $_POST['lesson_desc'];
        $course_id = $_POST['course_id'];
        $course_name = $_POST['course_name'];
        $lesson_link = $_FILES['lesson_link']['name'];
        $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
        $lesson_folder = '../link/' . $lesson_link;
        move_uploaded_file($lesson_link_temp, $lesson_folder);

        $sql = "INSERT INTO lesson ( lesson_name, lesson_desc, lesson_link, course_id, course_name) 
        VALUES ('$lesson_name','$lesson_desc','$lesson_folder','$course_id','$course_name')";

        if (mysqli_query($conn, $sql)) {
            $img = true;
        } else {
            $error = true;
        }
    }
}

?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">
        Add Lesson content
    </h3>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">course Id</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if (isset($_SESSION['course_id'])) {
                                                                                                echo $_SESSION['course_id'];
                                                                                            } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="">course name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if (isset($_SESSION['name'])) {
                                                                                                    echo $_SESSION['name'];
                                                                                                } ?>" readonly>
        </div>
        <div class="form-group">

            <label for="course ">lesson name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name">
        </div>
        <div class="form-group">
            <label for="course name">lesson description</label>
            <input type="text" class="form-control" id="ldescription" name="lesson_desc">
        </div>
        <div class="form-group">
            <label for="course name">link</label>
            <input type="file" class="form-control" id="l_link" name="lesson_link">
        </div>
        <div class="form-group">
            <button class="btn btn-outline-dark" name="lesson_submit">submit</button>
            <a href="lesson.php">CLOSE</a>
        </div>
        <?php if ($msg) {
            echo '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All fields required to fill</div>';
        }
        ?>
        <?php if ($img) {
            echo '<div class="alert alert-success col-sm-6 ml-5 mt-2">successully submitted</div>';
        }
        ?>
        <?php if ($error) {
            echo '<div class="alert alert-warning col-sm-6 ml-5 mt-2">some error occur</div>';
        }
        ?>
    </form>
</div>
<!-- row -->
</div>
<!-- container -->
</div>