<?php
 include 'header.php';
include 'config.php';
if(isset($_POST['submit_contact']))
{ 
  $name=$_POST['name'];
  $email=$_POST['email'];
  $msg=$_POST['msg'];

  $res=mysqli_query($conn,"INSERT INTO contact ('name','email','msg') VALUES ('$name',$email','$msg')");
  if($res)
  {
    ?>
    <script>window.alert("SUccesfully submitted");</script>
    <?php
  }
}

?>
<div class="container shadow my-5 px-5 py-5" >
<div class="header">
<p class="text-center font-weight-bold note note-primary" style="text-transform:uppercase">Contact us </p>
</div>
  <form acion=" " method="post">
    <div class="form-outline mb-4">
    <label class="form-label" for="form4Example1">Name</label>
      <input type="text" id="form4Example1" name="name" class="form-control"/>
      </div>
    <div class="form-outline mb-4">
    <label class="form-label" for="form4Example2">Email address</label>
      <input type="email" id="form4Example2" name="email" class="form-control"/>
      </div>
    <div class="form-outline mb-4">
    <label class="form-label" for="form4Example3">Message</label>
      <textarea class="form-control" id="form4Example3" name="msg" rows="4"></textarea>
       </div>
    <button type="submit"name="submit_contact" class="btn btn-primary btn-block mb-4">Send</button>
  </form>
</div>
<?php include 'footer.php'?>