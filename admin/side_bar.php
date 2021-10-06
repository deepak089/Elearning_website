<?php
// error_reporting(0);

if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <!-- <img
          src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"
          height="15"
          alt=""
          loading="lazy"
        /> -->
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Admin Area</a>
                    </li>

                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->

            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <!-- side bar -->
    <div class="container-fluid mb-5 " style="margin-top:10px;">
        <div class="row" >
            <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none ">
                <div class="sidebar-sticky bg-dark" style="height:100%;">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="admin_dashboard.php" class="nav-link">
                                <i class="fas fa-trackometer-alt">
                                    Dashboard</i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="course.php" class="nav-link">
                                <i class="fas fa-accessible-icon">
                                    Courses</i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="lesson.php" class="nav-link">
                                <i class="fas fa-accessible-icon">
                                    lessons</i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="student.php" class="nav-link">
                                <i class="fas fa-users">
                                    students</i>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-table">
                                    sell report</i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-table">
                                    payment status</i>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="admin_feedback.php" class="nav-link">
                                <i class="fas fa-table">
                                    feedback</i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_change_password.php" class="nav-link">
                                <i class="fas fa-key">
                                    change password</i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="fas fa-sign-out-alt">
                                    logout</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>