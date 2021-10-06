<?php 
if(!isset($_SESSION))
{
    session_start();
}
include '../config.php';
if(isset($_POST['admin_login']))
{ 
    $email=$_POST['admin_email'];
    $pass=$_POST['admin_pass'];

    $sql="SELECT admin_email,admin_pass FROM admin WHERE admin_email='$email' AND admin_pass='$pass'";
    $row=mysqli_query($conn,$sql);
    $res=mysqli_num_rows($row);
    if($res==1)
    {
        
        $_SESSION['is_admin_login']=true;
        $_SESSION['admin_email']=$email;
header("Location:./admin_dashboard.php");
    }
    else 
    { ?>
        <script>window.alert("invlaid login details")</script>
        <?php 
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./css/style.css"> -->

</head>
<body >
    <div class="container col-md-6" style="margin-top:200px">
        <div class="card shadow">
            <div class="card-title text-center font-weight-bold">
                <h1>Admin Login</h1>
            </div>
            <div class="col-lg-8" style="padding-left: 100px;">
                <form action="" method="post">
                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>

                        <input type="email" id="admin_email" name="admin_email" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Your email </label>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input type="password" id="admin_pass" name="admin_pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password </label><small id="login_status_msg2"></small>
                    </div>
                    <div class="form-group">
                        <small id="admin_status_msg1"></small>
                        <button class="btn btn-secondary" name="admin_login" id="admin_login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <!-- <script src="../js/admin.js"></script> -->

</body>
</html>