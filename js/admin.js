
 $(document).ready(function(){
 $('#admin_login').click(function(){
    console.log("clicked");
     
    var admin_email=$('#admin_email').val();
    var admin_pass=$('#admin_pass').val();
    console.log(admin_email);
    console.log(admin_pass);
    $.ajax({
        url:"../php/admin_db.php",
        method:"post",
        dataType:"json",
        data:{
         admin_email:admin_email,
         admin_pass:admin_pass
     },
        success:function(data){
       if(data==0){
           $('#admin_status_msg1').html(
               '<small class="alert alert-danger">Invalid Email!!</small>'
           );
       }
       else if(data==1)
       {
        $('#login_status_msg1').html(
            '<div class="spinner-border text-success" role="status"></div>'
        );
        setTimeout(()=>{
            window.location.href="admin_dashboard.php";
        },1000);
       }
       }
    });
});
});