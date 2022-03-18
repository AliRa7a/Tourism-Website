<?php
include "db.php";
include "header.php";
session_start();
$error='d-none';
if(isset($_POST['submit']))
  {
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $v_data = "SELECT * FROM Users WHERE Email = '$email' and Password = '$password'";
    $result = mysqli_query($conn,$v_data);
        if(mysqli_num_rows($result)>0)
        {
            $_SESSION['email']=$email;
          echo "<script> alert('Congratulations $email! you are successfully login.');window.location.href='index.php' </script>";
           
        }
    else{ $error="d-block";
       $msg="Email and Password not matched. Try Again";
    }
}

?>

<body>
    <div class="bg ">
    <div class="container shadow-sm">
        <div class="row bg-white cover"> 
          <!--Column 1.(Image) -->
            <div class="col-md-6 align-self-center">
                <img src="imgs/signin-image.jpg" class="singup_img img-responsive mx-auto d-block " alt="sign up img">
               <p class="text-center mt-5"><a href="signup.php">Create new Account</a></p> 
            </div>
                <!--Column 2.(Form) -->
            <div class="col-md-6">
            <!--Display error message -->
            <h6 class=" text-danger p-3 error  <?php echo $error ?> " style="background-color:rgba(255,0,0,0.1)">*  <?php echo $msg ?> *
</h6>
                <h2 class="form-title text-center m-5 pt-4">Sign in</h2>
                    <div class="signin-form">
                  
                 <form method="POST" class="container" id="register-form">
                        
                    <div class="form-input">
                        <i class="fas fa-envelope mt-2"></i>
                        <input type="email" name="email" class="input-txt" placeholder="Your Email" required>
                    </div>
                        <div class="form-input " id="show_hide_password">
                            <i class="fas fa-unlock mt-2"></i> <i class="fas fa-eye reveal mt-3"></i>
                      <input type="password" name="password" class="input-txt pwd" placeholder="Password" required>
                     
                        </div>
                       
                    <div class="form-input">
                        <input type="checkbox" name="agree"  class="input-txt check_box " > 
                        <span>Remember Me  <a href="forgot_password.php" class='float-right '>Forgot Password?</a></span>  
                        </div>
                    <div class="form-input mb-5 pb-4 pt-4">
                        <input type="submit" name="submit" class=" btn btn-outline-primary px-4" value="Login">
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!-- Show/Hide Password-->
<script>

$(".reveal").on('click',function() {
  var $pwd = $(".pwd");
  if ($pwd.attr('type') === 'password') {
      $pwd.attr('type', 'text');
      $('#show_hide_password i').addClass( "fa-eye-slash" );
       $('#show_hide_password i').removeClass( "fa-eye" );
  } else {
      $pwd.attr('type', 'password');
      $('#show_hide_password i').addClass( "fa-eye" );
       $('#show_hide_password i').removeClass( "fa-eye-slash" );
  }
});
</script>