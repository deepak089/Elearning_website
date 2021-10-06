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
// print_r($_SESSION);
$admin_email = $_SESSION['admin_email'];
if (isset($_REQUEST['admin_pass_update'])) {
    if ($_REQUEST['admin_pass'] === ""){
        // msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill all the Fields</div>';
    } else {
        $sql = "SELECT * FROM admin WHERE admin_email= '$admin_email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $admin_pass = $_REQUEST['admin_pass'];
            $sql = " UPDATE admin SET admin_pass ='$admin_pass' WHERE admin_email ='$admin_email'";
            if (mysqli_query($conn, $sql)) {
                // below msg display o=n form submit success
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated successfully</div>';
            }
        }
    }
}
?>
<div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-6">
            <form action="#" class="mt-5 mx-5">
                <div class="form-group"><label for="email">email</label>
                    <input type="email" class="form-control" readonly value="<?php echo  $admin_email; ?>">

                </div>
             
                <div class="form-group"><label for="email">password</label>
                    <input type="password" class="form-control" name="admin_pass" placeholder="Enter new password">

                </div>
             
             <button type="submit" name="admin_pass_update" class="btn btn-outline-dark">update</button>
             <button type="reset" class="btn btn-primary">Reset</button>
             <?php if(isset($passmsg)){echo $passmsg;}?>
            </form>
        </div>
    </div>
</div>

