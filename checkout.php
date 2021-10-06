<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
include 'header.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title> Check Out Page</title>
    <meta name="GENERATOR" content="Evrsoft First Page">
</head>

<body>
    <h1>Elearning Payement page</h1>
    <pre>
	</pre>
    <div class="container mb-4">
        <div class=" shadow">
            <form method="post" action="pgRedirect.php">
                <table class="table table-striped">
                    <tbody class="table-secondary">

                        <tr>

                            <td><label>ORDER_ID::*</label></td>
                            <td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000, 99999999) ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><label>Student Email</label></td>
                            <td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $_SESSION['login_email']; ?>'"></td>
                        </tr>
                        <tr>
                            <td><label>Amount*</label></td>
                            <td>
                                <?php
                                include_once 'config.php';
                                $sql = "SELECT * FROM course";
                                $user = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($user)) {
                                    $price = $row['course_original_price'];
                                }
                                ?>
                                <input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php echo $price; ?>">
                            </td>

                        </tr>
                        <tr>
                            <td></td><td><button class="btn btn-secondary">Checkout</button></td>
                        </tr>

                    </tbody>
                </table>

            </form>
        </div>
    </div>

</body>

</html>
<?php

include 'footer.php';
?>