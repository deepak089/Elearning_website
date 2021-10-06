<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Admin login</title>
  </head>
  <body>
  <div class="wrapper">
  <section class="form login">
  <header>Admin login</header>
  <form action="#" method="post">
  <div class="error-txt"></div>
  <!-- <div class="name-details">
  <div class="field input"><label for="">first name</label>
<input type="text" placeholder="First name" name="name" id="name">
  </div>
  <div class="field input">
  <label for="">Last name</label>
  <input type="text" placeholder="Last name" name="lname" id="lname">
  </div></div> -->

  <div class="field input">
  <label for="">Email address</label>
  <input type="email" placeholder="Enter your email" name="email" id="email">
  </div>
  <div class="field input">
  <label for="">password</label>
  <input type="password" placeholder="Enter your password" name="password" id="password">
  <i class="fas fa-eye"></i>
  
  </div>
  <!-- <div class="field image">
  <label for="">select image</label>
  <input type="file" placeholder="Select an image">
  </div> -->

  <div class="field button">
    <input type="submit" value="continue to chat" id="btn">
    </div>
<div class="link">Dont have account?<a href="signup.php">singup now</a></div>
  </div>
  </form>
    </section>
    </div>
       <script>
       $(document).ready(function(){
   $("#btn").click(function(e){
    e.preventDefault();

    var email=$('#email').val();
    var password=$('#password').val();

    $.ajax({
        url:"../php/admin.php",
        type:"post",
        data:{
            email:email,
            password:password,
        },
        success:function(data){
            // console.log(data);
            if(data){
                $(".error-txt").html(data).display="block";
                
            }
            else 
            {
             $(".error-txt").hide();
            }
           
        }
    })

   });
    });
       </script>
  </body>
</html>