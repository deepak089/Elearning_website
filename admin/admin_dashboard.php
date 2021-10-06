<?php include "side_bar.php";?>
<div class="col-sm-9 mt-5">
                <div class="row mx-5 text-center">
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-danger mb-3" style="max-width:18rem;">
                            <div class="card-header">Courses</div>
                            <div class="card-body">
                                <h4 class="card-title">5</h4>
                                <a href="course.php" class="btn text-white">view</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-success mb-3" style="max-width:18rem;">
                            <div class="card-header">Student</div>
                            <div class="card-body">
                                <h4 class="card-title">25</h4>
                                <a href="student.php" class="btn text-white">view</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-primary mb-3" style="max-width:18rem;">
                            <div class="card-header">Sold</div>
                            <div class="card-body">
                                <h4 class="card-title">5</h4>
                                <a href="#" class="btn text-white">view</a>
                            </div>
                        </div>
                    </div>
                </div>
    
        <div class="mx-5 mt-5 text-center">
            <!-- table -->
            <p class="bg-danger text-white p-2">Course Ordered</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">order Id</th>
                        <th scope="col">course id</th>
                        <th scope="col">student email</th>
                        <th scope="col">order date</th>
                        <th scope="col">amount</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">22</th>
                        <td>100</td>
                        <td>email@gmail.com</td>
                        <td>20/10/2020</td>
                        <td>2000</td>
                        <td><button type="submit" class="btn btn=secondry" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    </div>
    </div>
    <!-- <script src="javascript/login.js"></script> -->
</body>

</html>