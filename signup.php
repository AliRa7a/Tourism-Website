<?php
include "db.php";
include "header.php";
session_start();
$msg=null;
$error='d-none';
if(isset($_POST['submit']))
 {
    $name = $_POST['name'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $v_email = "SELECT 1 FROM Users WHERE Email = '$email'";
    $result = mysqli_query($conn,$v_email);
    if(mysqli_num_rows($result)>0)
    {
        $msg = 'Email already exists';
        $error='d-block';
    }
    elseif($password != $re_password){
        $msg = "Passwords does'nt match";
        $error='d-block';
}
else{
    $insert =mysqli_query($conn,"INSERT INTO `Users`(`Name`, `Email`, `Password`)
    VALUES ('$name','$email','$password')");

        if(!$insert){
            echo mysqli_error();
        } 
        else{
            echo "<script> alert('Your Account is created successfully!');window.location.href='signin.php' </script>";
        }
        }
}
?>

<body>
    <div class="bg  ">
    <div class="container shadow-sm">
        <div class="row bg-white cover"> 
            <div class="col-md-7">
            <h6 class=" text-danger p-3 error  <?php echo $error ?> " style="background-color:rgba(255,0,0,0.1)">*  <?php echo $msg ?> *
</h6>
            <h2 class="form-title text-center m-5 pt-4">Sign up</h2>
                <div class="signup-form">
              
                    <form method="POST"  class="container" id="register-form">
                    <div class="form-input">
                        <i class="fas fa-user mt-2"></i>
                    <input type="text" name="name" class="input-txt " placeholder="Full Name" required>
                </div>
                <div class="form-input">
                    <i class="fas fa-envelope mt-2"></i>
                    <input type="email" name="email" class="input-txt" placeholder="Your Email" required>
                </div>
                    <div class="form-input" id="show_hide_password">
                        <i class="fas fa-unlock mt-2"></i> <i class="fas fa-eye reveal mt-3"></i>
                    <input type="password" name="password" class="input-txt pwd" pattern=".{,8}" title="Password must contain 8 or more characters" placeholder="Password" required>
                    </div>
                <div class="form-input" id="show_hide_password">
                    <i class="fas fa-unlock-alt mt-2"></i> <i class="fas fa-eye reveal mt-3"></i>
                    <input type="password" name="re_password" class="input-txt pwd" placeholder="Retype Password" required>
                    </div>
                <div class="form-input">
                    <input type="checkbox" name="agree"  class="input-txt check_box " placeholder="Retype Password"> <span>I agree all statements in <a href="">Terms of service </a>  </span>  
                    </div>
                <div class="form-input  pb-4 pt-4">
                    <input type="submit" name="submit" class=" btn btn-outline-primary px-4" value="Register">
                    </div>
            </form>
            </div>
        </div>
            <div class="col-md-5 align-self-center">
                <img src="imgs/signup-image.jpg" class="singup_img img-responsive" alt="sign up img">
               <p class="text-center mt-5"><a href="signin.php">I am already member</a></p> 
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
//Javascript for show/Hide Eye for Password 
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